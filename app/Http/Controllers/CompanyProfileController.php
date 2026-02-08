<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CompanyProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyProfile $companyProfile)
    {
        //
    }

    public function update_logo(Request $request){
        $validatedData = $request->validate([
            'logo' => 'required|file|mimes:jpeg,png,jpg,webp,PNG,JPG|max:20480'
        ]);

        $company_profile = CompanyProfile::where('admin_id', Auth::guard('admin')->user()->id)->first();

        if ($request->hasFile('logo')) {

            $asset = $request->file('logo'); // Get the single file
            if(empty($this->data['general_settings']['cloudinary_api_key']) && empty($this->data['general_settings']['cloudinary_secret_key'])){
                $filename = Str::random(20).'-'.time() . '.' . $asset->getClientOriginalExtension();
                $directory = 'brand';

                // Ensure the directory exists and set permissions
                if (!Storage::disk('public')->exists($directory)) {
                    Storage::disk('public')->makeDirectory($directory);
                    chmod(storage_path('app/public/' . $directory), 0775);
                }

                $path = $asset->storeAs($directory, $filename, 'public');
                $assetPath = Storage::url($path);
                $logo_url = asset($assetPath);
            }else{
                // Uplaod in Cloudinary if keys available in setting or else upload in storage
                $uploaded_img = Cloudinary::upload($asset->getRealPath(), [
                    'folder' => 'brand',   // optional
                ]);
                $logo_url = $uploaded_img->getSecurePath();
                $cloudinary_public_id = $uploaded_img->getPublicId();
                $validatedData['cloudinary_public_id'] = $cloudinary_public_id;
            }

            $validatedData['logo'] = $logo_url;
        }

        
        //delete Previous Image if in folder / Cloudinary
        if(!empty($company_profile->cloudinary_public_id)){
            Cloudinary::destroy($company_profile->cloudinary_public_id);
        }else if(!empty($company_profile->logo)) {
            $oldImagePath = str_replace('/storage/', '', $company_profile->logo);
            if (Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }


        $update_logo = CompanyProfile::updateOrCreate(['admin_id' => Auth::guard('admin')->user()->id],$validatedData);
        if($update_logo){
            return response()->json(['type' => 'success', 'message' => 'Logo Updated Successfully!', 'new_logo_url' => asset($logo_url)]);
        }else{
            return response()->json(['type' => 'error', 'message' => 'Oops, Something went wrong!']);
        }
    }

    public function update_brand_social_media(Request $request){
        $validatedData = $request->validate([
            'social_media_links.*' => 'required'
        ]);

        $salon_profile_update = CompanyProfile::where('admin_id', Auth::guard('admin')->user()->id)->update([
            'social_media_links' => json_encode(array_values($validatedData['social_media_links']))
        ]);

        $html = '';

        foreach($validatedData['social_media_links'] as $single_links){
            $html .= '<div class="mb-3 d-flex">
                <div class="avatar-xs d-block flex-shrink-0 me-3">
                    <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                        <i class="ri-'.$single_links['type'].'-fill"></i>
                    </span>
                </div>
                <input type="text" disabled class="form-control" id="'.$single_links['type'].'-link" placeholder="Your Link" value="'.$single_links['link'].'">
            </div>';
        }

        if($salon_profile_update)
            return response()->json(['type' => 'success', 'message' => 'Social media links updated!', 'html' => $html]);
        else
            return response()->json(['type' => 'error', 'message' => 'Something went wrong!']);
    }

    public function update_brand_details(Request $request){
        session()->flash('active_tab', 'brandSupportDetails');
        $adminId = Auth::guard('admin')->id(); 
        $validatedData = $request->validate([
            'company_name' => 'nullable',
            'brand_tag_line' => 'nullable',
            'support_phone' => 'nullable',
            'support_email' => 'nullable|email:rfc,dns',
            'support_days' => 'nullable',
            'support_hour_from' => 'nullable',
            'support_hour_to' => 'nullable',
            'whatsapp_number' => 'nullable',
            'fulladdress' => 'nullable',
            'favicon' => 'nullable|mimes:png,ico,jpg,PNG,JPEG|max:50',
        ]);


        $company_profile = CompanyProfile::firstOrNew(['admin_id' => $adminId]);
    
        // favicon
        if ($request->hasFile('favicon')) {
            $asset = $request->file('favicon'); // Get the single file
            $filename = Str::random(20).'-'.time() . '.' . $asset->getClientOriginalExtension();
            $directory = 'brand';

            //delete Previous Image if in folder
            if($company_profile->favicon && !empty($company_profile->favicon)) {
                $oldImagePath = str_replace('/storage/', '', $company_profile->favicon);
                if (Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }

            // Ensure the directory exists and set permissions
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
                chmod(storage_path('app/public/' . $directory), 0775);
            }

            $path = $asset->storeAs($directory, $filename, 'public');
            $validatedData['favicon'] = Storage::url($path);
        }

        $company_profile->fill($validatedData);
        if($company_profile->save()){
            return redirect()->route('admin.edit-profile')->with('success', 'Brand & Support Details Updated Successfully!');
        }else{
            return redirect()->route('admin.edit-profile')->with('error', 'Something went wrong');
        }
    }

}

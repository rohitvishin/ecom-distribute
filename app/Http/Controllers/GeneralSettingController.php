<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralSettingController extends Controller
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }

    public function update_maintenance_status(Request $request){

        $adminId = Auth::guard('admin')->id(); 
        $validatedData = $request->validate([
            'maintenance_mode' => 'required'
        ]);

        $GeneralSetting = GeneralSetting::firstOrNew(['admin_id' => $adminId]);
        $GeneralSetting->fill($validatedData);
        if($GeneralSetting->save()){
            return response()->json(['type' => 'success', 'message' => 'Maintainence Mode Status Updated!!!']);
        }else{
            return response()->json(['type' => 'error', 'message' => 'Oops! Something went wrong, try again later!']);
        }
    }

    public function update_general_settings(Request $request){
        session()->flash('active_tab', 'generalSettings');
        $adminId = Auth::guard('admin')->id(); 

        $validatedData = $request->validate([
            'currency' => 'nullable',
            'currency_symbol' => 'nullable',
            'cloudinary_key_name' => 'nullable',
            'cloudinary_api_key' => 'nullable',
            'cloudinary_secret_key' => 'nullable',
            'default_meta_title' => 'nullable',
            'default_meta_description' => 'nullable',
            'default_schema' => 'nullable',
            'custom_header' => 'nullable',
            'custom_footer' => 'nullable',
        ]);

        $GeneralSetting = GeneralSetting::firstOrNew(['admin_id' => $adminId]);
        $GeneralSetting->fill($validatedData);
        if($GeneralSetting->save()){
            return redirect()->route('admin.edit-profile')->with('success', 'General Settings Updated Successfully!');
        }else{
            return redirect()->route('admin.edit-profile')->with('error', 'Something went wrong');
        }

    }
}

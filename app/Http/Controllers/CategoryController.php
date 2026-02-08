<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BaseController;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['categories'] = Category::paginate(10);       
        return view('admin.category.manage', $this->data);
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug',
            'description' => 'nullable|string',
            'parent_uid' => 'nullable|string|exists:categories,category_uid',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,PNG,JPG|max:20480', // 2MB max
        ]);
        
        $category_uid = Str::uuid()->toString();
        $category = new Category();
        $category->category_uid = $category_uid;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->parent_uid = $request->parent_uid;
        $category->status = 'active';

        if ($request->hasFile('image')) {
            $asset = $request->file('image');
            $filename = Str::random(20).'-'.time() . '.' . $asset->getClientOriginalExtension();
            $directory = 'categories/' .$category_uid;

            // Ensure the directory exists and set permissions
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
            }

            $path = $asset->storeAs($directory, $filename, 'public');
            $assetPath = Storage::url($path);
            $image_url = $assetPath;

            $category->image_url = $image_url; // Store public URL
        }

        $category->save();
        return response()->json([
            'status' => true,
            'message' => 'Category created successfully.'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if(!isset($request->category_uid)){
            return response()->json(['status' => 'error', 'message' => 'Invalid Access!']);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $request->category_uid.',category_uid',
            'description' => 'nullable|string',
            'parent_uid' => 'nullable|string|exists:categories,category_uid',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,PNG,JPG|max:20480', // 2MB max
        ]);
        
        $category = Category::where('category_uid', $request->category_uid)->first();
        if(!$category){
            return response()->json(['status' => 'error', 'message' => 'Invalid Access!']);
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->parent_uid = $request->parent_uid;

        if ($request->hasFile('image')) {
            $asset = $request->file('image');
            $filename = Str::random(20).'-'.time() . '.' . $asset->getClientOriginalExtension();
            $directory = 'categories/' .$category->category_uid;

            // Ensure the directory exists and set permissions
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
            }

            $path = $asset->storeAs($directory, $filename, 'public');
            $assetPath = Storage::url($path);
            $image_url = $assetPath;

            //delete Previous Image if in folder
            if($category->image_url && !empty($category->image_url)) {
                $oldImagePath = str_replace('/storage/', '', $category->image_url);
                if (Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }

            $category->image_url = $image_url; // Store public URL
        }

        $category->save();
        return response()->json([
            'status' => true,
            'message' => 'Category Updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function get_all_categories(){
        $categories = Category::with('parent')
        ->select(['category_uid', 'parent_uid', 'name', 'slug','description','image_url', 'status', 'created_at'])
        ->get();
        return response()->json(['status' => 'true', 'data' => $categories]);
    }

    public function update_category_status(Request $request){
        $validatedData = $request->validate([
            'category_uid' => 'required|string',
            'parent_uid' => 'nullable|required|string',
            'status' => 'required|string'
        ]);

        $parent_uid = $validatedData['parent_uid'] == 'null' ? NULL : $validatedData['parent_uid'];
        $service = Category::where(['category_uid' => $request->category_uid, 'parent_uid' => $parent_uid])->first();
        if($service){
            $service->status = $validatedData['status'];
            $service->save();

            if($validatedData['status'] == 'inactive'){
                // deactivate all products of this category.
                Product::where('category_uid', $validatedData['category_uid'])->update(['status' => 'inactive']);
            }
            return response()->json(['type' => 'success', 'message' => 'Category Updated Successfully']);
        }else{
            return response()->json(['type' => 'error', 'message' => 'Oops! Something went wrong, try again later']);
        }
    }
}

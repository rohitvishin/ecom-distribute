<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
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
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductImage $productImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productImage)
    {
        //
    }

    public function upload_temp_gallery(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'product_uid' => 'required'
        ]);
        
        $product = ProductImage::createorupdate($insertData);

        $file = $request->file('file');
        $tempId = Str::uuid()->toString();
        $tempFolder = 'temp/' . $tempId;

        Storage::disk('public')->makeDirectory($tempFolder);

        $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($tempFolder, $filename, 'public');

        $gallery_data = $product->gallery ? $product->gallery : [];
        $insertData = [
            'product_uid' => $request->get('product_uid'),
            'gallery' => array_push()
        ];


        
        ProductImage::create($insertData);

        return response()->json([
            'success' => true,
            'temp_id' => $tempId,
            'file_url' => Storage::url($path),
            'filename' => $filename
        ]);
    }
}

@extends('admin.layout')

@section('content')

    <!-- Plugins css -->
    <link href="{{ asset('assets/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Add New Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                <li class="breadcrumb-item active">Add New Products</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="{{ route('admin.product-create') }}" method="POST" enctype="multipart/form-data"
                id="createproduct-form" autocomplete="off" class="" novalidate>
                @csrf
                <input type="hidden" id="product_uid" name="product_uid"  value="{{ $product_uid }}">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Product Title (Recomended: <span
                                            name="title-character">70</span> Characters Left)</label>
                                    <input type="text" class="form-control" id="title" name="title"  value="{{ old('title') }}"
                                        placeholder="Enter product title" required oninput="generateSlug(this, 'slug')">
                                    <div class="invalid-feedback">Enter product title.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Product Slug (Recomended: <span
                                            name="slug-character">100</span> Characters Left)</label>
                                    <input type="text" class="form-control" id="slug"  value="{{ old('slug') }}" name="slug"
                                        placeholder="Enter product Slug">
                                    <div class="invalid-feedback">Enter product Slug.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Product Short Description</label>
                                    <textarea class="form-control" name="short_desc"  value="{{ old('short_desc') }}" placeholder="Must enter minimum of a 100 characters" rows="3">{{ old('short_desc') }}</textarea>
                                </div>
                                <div>
                                    <label>Product Description</label>
                                    <textarea name="description" id="description-hidden" value="{{ old('description') }}" class="d-none">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Product Thumbnail</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="text-center">
                                        <div class="position-relative d-inline-block">
                                            <div class="position-absolute top-100 start-100 translate-middle">
                                                <label for="product-thumbnail-input" class="mb-0" data-bs-toggle="tooltip"
                                                    data-bs-placement="right" title="Select Image">
                                                    <div class="avatar-xs">
                                                        <div
                                                            class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                            <i class="ri-image-fill"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input class="form-control d-none" value="" name="thumbnail" id="product-thumbnail-input"
                                                    type="file" accept="image/png, image/gif, image/jpeg">
                                            </div>
                                            <div class="avatar-lg">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="{{ asset('assets/images/product-img.png') }}" id="product-img"
                                                        class="avatar-md h-auto" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Product Gallery</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <h5 class="fs-14 mb-1">Product Gallery</h5>
                                    <p class="text-muted">Add Product Gallery Images.</p>
                                    <div class="dropzone">
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                            </div>

                                            <h5>Drop files here or click to upload.</h5>
                                        </div>
                                    </div>

                                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                                        <li class="mt-2" id="dropzone-preview-list">
                                            <!-- This is used as the file preview template -->
                                            <div class="border rounded">
                                                <div class="d-flex p-2 align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="h-auto avatar-sm bg-light rounded">
                                                            <img data-dz-thumbnail class="img-fluid rounded d-block"
                                                                src="#" alt="Product-Image" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="pt-1">
                                                            <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                            <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                            <strong class="error text-danger"
                                                                data-dz-errormessage></strong>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-3">
                                                        <button type="button" data-dz-remove
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- end dropzon-preview -->
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card" style="display: none;">
                            <div class="card-header">
                                <h4>Meta Data</h4>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-title-input">Meta title</label>
                                            <input type="text" class="form-control" name="seo_title" placeholder="Enter meta title"
                                                id="seo_title" value="{{ old('seo_title') }}">
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-keywords-input">Meta
                                                Keywords</label>
                                            <input type="text" class="form-control" name="seo_keyword" placeholder="Enter meta keywords"
                                                id="seo_keyword" value="{{ old('seo_keyword') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-description-input">Meta
                                                Description</label>
                                            <textarea class="form-control" id="seo_desc" placeholder="Enter meta description" name="seo_desc" rows="3" value="{{ old('seo_desc') }}">{{ old('seo_desc') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-description-input">Product Schema</label>
                                            <textarea class="form-control" name="product_schema" id="product_schema" placeholder="Enter Product Schema" rows="7" value="{{ old('product_schema') }}">{{ old('product_schema') }}</textarea>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                            </div>
                            <!-- end card body -->
                        </div>

                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Publish</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Status</label>

                                    <select class="form-select" name="status" id="choices-publish-status-input" data-choices
                                        data-choices-search-false>
                                        <option value="Published" {{ old('status') == 'Published' ? 'selected' : (empty(old('status')) ? 'selected' : '') }}>Published</option>
                                        <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Product Categories</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-2">
                                    <a href="{{ route('admin.manage_category') }}"
                                        class="float-end text-decoration-underline">Add New</a>Select product category
                                </p>
                                <select class="form-select" id="choices-category-input" name="category_uid" data-choices
                                    data-choices-search-false>
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $item)
                                            <option {{ old('category_uid') == $item['category_uid'] ? 'selected' : '' }} value="{{ $item['category_uid'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Product General Info</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="stocks-input">SKU</label>
                                            <input type="text" class="form-control" name="sku" id="sku"
                                                placeholder="Stocks" value="{{ old('sku') }}">
                                            <div class="invalid-feedback">Enter product SKU.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="stocks-input">Available Qty</label>
                                            <input type="text" class="form-control" id="available_qty"
                                                name="available_qty" placeholder="Stocks" required value="{{ !empty(old('available_qty')) ? old('available_qty') : '1' }}">
                                            <div class="invalid-feedback">Enter Available Quantity.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="orders-input">Product MRP</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-price-addon">INR</span>
                                                <input type="text" class="form-control" id="mrp" name="mrp"
                                                    placeholder="Enter price" aria-label="Price"
                                                    aria-describedby="product-price-addon" required value="{{ old('mrp') }}">
                                                <div class="invalid-feedback">Enter Product MRP</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-price-input">Selling Price</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-price-addon">INR</span>
                                                <input type="text" class="form-control" id="selling_price"
                                                    name="selling_price" placeholder="Enter price" aria-label="Price"
                                                    aria-describedby="product-price-addon" required value="{{ old('selling_price') }}">
                                                <div class="invalid-feedback">Enter Product Selling price.</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-discount-input">Discount</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="product-discount-addon">INR</span>
                                                <input type="text" name="discount" class="form-control" id="product-discount-input"
                                                    placeholder="Enter discount" aria-label="discount"
                                                    aria-describedby="product-discount-addon" value="{{ old('discount') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Product Tags</h5>
                            </div>
                            <div class="card-body">
                                <div class="hstack gap-3 align-items-start">
                                    <div class="flex-grow-1">
                                        <input class="form-control" name="tags" data-choices
                                            data-choices-multiple-remove="true" placeholder="Enter tags" type="text"
                                            value="{{ !empty(old('tags')) ? old('tags') : 'Best Seller, New Arrival' }}" />
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                    <!-- end col -->

                    <div class="col-lg-12">
                        <!-- end card -->
                        <div class="text-start mb-3">
                            <button type="submit" id="submit-product" {{ empty(old('title')) ? 'disabled' : '' }} class="btn btn-success w-sm">Submit</button>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </form>

        </div>
        <!-- container-fluid -->
    </div>

    <script src="{{ asset('assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}" defer></script>
    <!-- dropzone js -->
    {{-- <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}" defer></script> --}}

    <script src="{{ asset('assets/js/pages/ecommerce-product-create.init.js') }}" defer></script>

    <script src="{{ asset('assets/js/product/product-add.js') }}" defer></script>

@stop

@extends('admin.layout')

@section('content')

<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-left">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Manage Categories</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex gap-2 align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Manage Categories</h5>
                                <button class="btn btn-primary btn-soft-secondary createCategory" type="button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#createCategory">
                                    <i class="ri-add-fill align-bottom"></i> Add New Category
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="elmLoader" class="d-none">
                                <div class="spinner-border text-primary avatar-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <table id="manage_data"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">SR No.</th>
                                        <th data-ordering="false">Category Name</th>
                                        <th data-ordering="false">Parent Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5">No Data found!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>


    {{-- Create Category --}}
    <div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="createCategoryLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-success-subtle">
                    <h5 class="modal-title" id="createCategoryLabel">Create New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="createCategoryBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="task-error-msg" class="alert alert-danger py-2"></div>
                    <form autocomplete="off" id="create-category-form" data-store-url="{{ route('admin.categories.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="task-title-input" class="form-label">Category Name</label>
                            <input type="text" id="task-title-input" name="name" class="form-control" placeholder="Enter Category Name">
                        </div>
                        <div class="row g-4 mb-3">
                            <div class="col-lg-6">
                                <label for="task-status" class="form-label">Select Parent Category</label>
                                <select class="form-control" name="parent_uid" data-choices data-choices-search id="task-status-input">
                                    <option value="">Select Category</option>
                                    @if(count($categories) > 0)
                                        @foreach ($categories as $singleCategory)
                                            <option value="{{ $singleCategory['category_uid'] }}">{{ $singleCategory['name'] }}</option>
                                        @endforeach
                                    @endif
                                    
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="task-title-input" class="form-label">Category Slug</label>
                            <input type="text" id="task-title-input" class="form-control" name="slug" placeholder="Enter task title">
                        </div>
                        <div class="mb-3">
                            <label for="task-title-input" class="form-label">Category Description</label>
                            <textarea type="text" id="task-title-input" name="description" class="form-control" placeholder="Enter task title"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="task-title-input" class="form-label">Category Image</label>
                            <input type="file" id="task-title-input" name="image" class="form-control">
                        </div>

                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" onclick="closeModal('createCategory')"><i class="ri-close-fill align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="addNewCatgeory">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Category --}}
    {{-- Create Category --}}
    <div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="createCategoryLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-success-subtle">
                    <h5 class="modal-title" id="createCategoryLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="createCategoryBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="task-error-msg" class="alert alert-danger py-2"></div>
                    <form autocomplete="off" id="edit-category-form" data-update-url="{{ route('admin.categories.update') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="task-title-input" class="form-label">Category Name</label>
                            <input type="text" id="edit-name" name="name" class="form-control" placeholder="Enter Category Name" oninput="generateSlug(this, 'edit-slug')">
                        </div>
                        <div class="row g-4 mb-3">
                            <div class="col-lg-6">
                                <label for="task-status" class="form-label">Select Parent Category</label>
                                <select class="form-control" name="parent_uid" data-choices data-choices-search id="edit-parent_uid" data-categories="@json($categories)">
                                    <option value="">Select Category</option>
                                    @if(count($categories) > 0)
                                        @foreach ($categories as $singleCategory)
                                            <option value="{{ $singleCategory['category_uid'] }}">{{ $singleCategory['name'] }}</option>
                                        @endforeach
                                    @endif
                                    
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="task-title-input" class="form-label">Category Slug</label>
                            <input type="text" id="edit-slug" class="form-control" name="slug" placeholder="Enter task title" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="task-title-input" class="form-label">Category Description</label>
                            <textarea type="text" id="edit-description" name="description" class="form-control" placeholder="Enter task title"></textarea>
                        </div>

                        <div class="mb-3 image-preview d-none">
                            <label for="task-title-input" class="form-label">Category Image Preview</label>
                            <img class="form-control" id="edit-image_preview" style="height: 100px; width: 100px;">
                        </div>

                        <div class="mb-3">
                            <label for="task-title-input" class="form-label">Category Image</label>
                            <input type="file" id="task-title-input" name="image" class="form-control">
                        </div>

                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" onclick="closeModal('editCategory')"><i class="ri-close-fill align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="editCatgeory" name="category_id">Edit Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Deactivate Category Confirmmation Modal --}}
    <div id="removeCategoryModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Catgeory, All Products will be actiavte in this category.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="delete-category-btn">Yes, Delete It!</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" defer></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js" defer></script>
<script src="{{ asset('assets/js/pages/datatables.init.js') }}" defer></script>
<script>
    var get_all_category_url = '{{ route('admin.get_all_category') }}';
</script>
<script src="{{ asset('assets/js/category.js') }}" defer></script>

@stop

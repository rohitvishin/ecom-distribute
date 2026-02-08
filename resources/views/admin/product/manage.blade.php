@extends('admin.layout')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div>
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('admin.add-product') }}" class="btn btn-success"
                                                id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Add
                                                Product</a>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control" id="searchProductList"
                                                    placeholder="Search Products...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link {{ $tab == 'published' ? 'active' : '' }} fw-semibold"
                                                    href="{{ route('admin.manage-products').'?tab=published' }}" role="tab">
                                                    Published <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ $counts['published'] ?? 0 }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link  {{ $tab == 'draft' ? 'active' : '' }} fw-semibold"
                                                    href="{{ route('admin.manage-products').'?tab=draft' }}" role="tab">
                                                    Draft <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ $counts['draft'] ?? 0 }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <div id="selection-element">
                                            <div class="my-n1 d-flex align-items-center text-muted">
                                                Select <div id="select-content" class="text-body fw-semibold px-1"></div>
                                                Result <button type="button"
                                                    class="btn btn-link link-danger p-0 ms-3 material-shadow-none"
                                                    data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <div id="elmLoader" class="d-none">
                                    <div class="spinner-border text-primary avatar-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="tab-content text-muted">

                                    <div class="tab-pane active" id="productnav-published" role="tabpanel">                                
                                        <div id="table-product-list-published" class="table-card gridjs-border-none">
                                            <table id="manage_data"
                                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th data-ordering="false">Thumbnail</th>
                                                        <th data-ordering="false">Product Title</th>
                                                        <th data-ordering="false">Available Qty</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($products as $single_product)
                                                    <tr>
                                                        <td><img src="{{ !empty($single_product['thumbnail']) ? asset($single_product['thumbnail']) : asset('assets/images/product-img.png') }}" height="50"></td>
                                                        <td>{{ $single_product['title'] }}</td>
                                                        <td>{{ $single_product['available_qty'] }}</td>
                                                        <td>{{ $single_product['created_at'] }}</td>
                                                        <td><a class="btn btn-sm btn-primary btn-soft-success" href="{{ route('admin.edit-product', $single_product['product_uid']) }}" target="_blank"><i class="ri-pencil-fill align-bottom"></i>  Edit</a></td>
                                                    </tr>
                                                    @empty
                                                    <tr class="text-center">
                                                        <td colspan="5">
                                                            No Products Found!!
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->
                                    
                                    <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                        <div id="table-product-list-draft" class="table-card gridjs-border-none">
                                            <table id="manage_data"
                                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th data-ordering="false">SR No.</th>
                                                        <th data-ordering="false">Product Title</th>
                                                        <th data-ordering="false">Available Qty</th>
                                                        <th>Created at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($products as $single_product)
                                                    <tr>
                                                        <td>{{ $single_product['id'] }}</td>
                                                        <td>{{ $single_product['title'] }}</td>
                                                        <td>{{ $single_product['available_qty'] }}</td>
                                                        <td>{{ $single_product['created_at'] }}</td>
                                                        <td><a class="btn btn-sm btn-primary btn-soft-success" href="{{ route('admin.edit-product', $single_product['product_uid']) }}" target="_blank"><i class="ri-pencil-fill align-bottom"></i>  Edit</a></td>
                                                    </tr>
                                                    @empty
                                                    <tr class="text-center">
                                                        <td colspan="5">
                                                            No Products Found!!
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->

                            </div>
                            <!-- end card body -->
                            @if(($tab == 'published' && $counts['published'] > 0) || ($tab == 'draft' && $counts['draft'] > 0))
                             <div class="card-footer bg-white">
                                <div class="d-flex justify-content-center">
                                    {{ $products->links() }}
                                </div>
                            </div>
                            @endif
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
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
<script src="{{ asset('assets/js/product/product-manage.js') }}" defer></script>
@stop

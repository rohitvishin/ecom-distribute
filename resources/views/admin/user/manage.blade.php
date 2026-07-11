@extends('admin.layout')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Users</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="search-box flex-grow-1">
                                        <form method="GET" action="{{ route('admin.manage-users') }}" class="d-flex align-items-center gap-2">
                                            <input type="text" name="search" value="{{ old('search', $search ?? '') }}" class="form-control" placeholder="Search by name / mobile">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            @if(!empty($search))
                                                <a href="{{ route('admin.manage-users') }}" class="btn btn-outline-secondary">Reset</a>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Active Status</th>
                                        <th>Created Date</th>
                                        <th>Total Orders Till Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-sm bg-light rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="bx bxs-user-circle text-secondary"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-semibold">{{ $user->fullname ?? 'N/A' }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->email ?? 'N/A' }}</td>
                                            <td>{{ $user->phone ?? 'N/A' }}</td>
                                            <td>
                                                @if($user->status == 'active')
                                                    <span class="badge bg-success-subtle text-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger-subtle text-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</td>
                                            <td>{{ $user->orders_count ?? 0 }}</td>
                                            <td>
                                                <form action="{{ route('admin.toggle-user-status', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to change this user status?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm {{ $user->status == 'active' ? 'btn-danger' : 'btn-success' }}">
                                                        {{ $user->status == 'active' ? 'Deactivate' : 'Activate' }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <h5 class="mb-1">No Users Found!</h5>
                                                <p class="text-muted mb-0">Try adjusting your search criteria.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if($users->hasPages())
                        <div class="card-footer border-top d-flex align-items-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-separated">
                                    @if ($users->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a></li>
                                    @endif

                                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                        @if ($page == $users->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    @if ($users->hasMorePages())
                                        <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a></li>
                                    @else
                                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                                    @endif
                                </ul>
                            </nav>
                            <div class="ms-auto text-muted">
                                Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of {{ $users->total() }} results
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@stop

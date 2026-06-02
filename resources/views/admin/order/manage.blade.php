@extends('admin.layout')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Orders</li>
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
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control" id="searchOrderList"
                                                    placeholder="Search Orders...">
                                                <i class="ri-search-line search-icon"></i>
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
                                    <div class="tab-pane active" id="ordernav-all" role="tabpanel">                                
                                        <div id="table-order-list" class="table-card gridjs-border-none">
                                            <table id="manage_orders"
                                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th data-ordering="false">Order ID</th>
                                                        <th data-ordering="false">Customer Name</th>
                                                        <th data-ordering="false">Total Amount</th>
                                                        <th data-ordering="false">Payment Status</th>
                                                        <th data-ordering="false">Order Status</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($orders as $order)
                                                    <tr>
                                                        <td><strong>#{{ $order->id }}</strong></td>
                                                        <td>{{ $order->customer_name }}</td>
                                                        <td>₹{{ number_format($order->paid_amount, 2) }}</td>
                                                        <td>
                                                            @if($order->payment_status == 'completed')
                                                                <span class="badge bg-success-subtle text-success">Paid</span>
                                                            @elseif($order->payment_status == 'pending')
                                                                <span class="badge bg-warning-subtle text-warning">Pending</span>
                                                            @elseif($order->payment_status == 'failed')
                                                                <span class="badge bg-danger-subtle text-danger">Failed</span>
                                                            @else
                                                                <span class="badge bg-secondary-subtle text-secondary">{{ ucfirst($order->payment_status) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($order->order_status == 'pending')
                                                                <span class="badge bg-warning-subtle text-warning">Pending</span>
                                                            @elseif($order->order_status == 'processing')
                                                                <span class="badge bg-info-subtle text-info">Processing</span>
                                                            @elseif($order->order_status == 'shipped')
                                                                <span class="badge bg-primary-subtle text-primary">Shipped</span>
                                                            @elseif($order->order_status == 'delivered')
                                                                <span class="badge bg-success-subtle text-success">Delivered</span>
                                                            @elseif($order->order_status == 'cancelled')
                                                                <span class="badge bg-danger-subtle text-danger">Cancelled</span>
                                                            @else
                                                                <span class="badge bg-secondary-subtle text-secondary">{{ ucfirst($order->order_status) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary btn-soft-success" onclick="viewOrderDetails({{ $order->id }})" title="View Order">
                                                                <i class="ri-eye-line align-bottom"></i> View
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr class="text-center">
                                                        <td colspan="7">
                                                            <div class="py-4">
                                                                <div class="avatar-md mx-auto mb-4">
                                                                    <div class="avatar-title bg-light rounded-circle fs-24">
                                                                        <i class="ri-inbox-line"></i>
                                                                    </div>
                                                                </div>
                                                                <h5 class="mb-1">No Orders Found!</h5>
                                                                <p class="text-muted mb-0">No orders available at the moment.</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                            </div>
                            <!-- end card body -->

                            <!-- Pagination -->
                            @if($orders->hasPages())
                            <div class="card-footer border-top d-flex align-items-center">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-separated">
                                        {{-- Previous Page Link --}}
                                        @if ($orders->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link">Previous</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $orders->previousPageUrl() }}">Previous</a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                                            @if ($page == $orders->currentPage())
                                                <li class="page-item active">
                                                    <span class="page-link">{{ $page }}</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($orders->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $orders->nextPageUrl() }}">Next</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">Next</span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                                <div class="ms-auto text-muted">
                                    Showing {{ $orders->firstItem() ?? 0 }} to {{ $orders->lastItem() ?? 0 }} of {{ $orders->total() }} results
                                </div>
                            </div>
                            @endif
                            <!-- end pagination -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Order Details Modal -->
    <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="orderDetailsContent">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewOrderDetails(orderId) {
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('orderDetailsModal'));
            const contentDiv = document.getElementById('orderDetailsContent');
            
            // Fetch order details
            fetch(`{{ url('/admin/order') }}/${orderId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const order = data.order;
                        const shipping = order.shipping_address;
                        
                        let itemsHtml = '';
                        order.items.forEach((item, index) => {
                            itemsHtml += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${item.product_name}</td>
                                    <td>${item.quantity}</td>
                                    <td>₹${item.mrp_amount}</td>
                                    <td>-₹${item.discount_amount}</td>
                                </tr>
                            `;
                        });
                        
                        const html = `
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h6 class="text-muted text-uppercase fs-13 fw-semibold">Order Information</h6>
                                    <p class="mb-2"><strong>Order ID:</strong> #${order.id}</p>
                                    <p class="mb-2"><strong>Customer:</strong> ${order.customer_name}</p>
                                    <p class="mb-2"><strong>Phone:</strong> ${order.customer_phone}</p>
                                    <p class="mb-2"><strong>Order Date:</strong> ${order.created_at}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted text-uppercase fs-13 fw-semibold">Amount Details</h6>
                                    <p class="mb-2"><strong>MRP Amount:</strong> ₹${order.mrp_amount}</p>
                                    <p class="mb-2"><strong>Discount:</strong> -₹${order.discount}</p>
                                    <p class="mb-2"><strong>Total Amount:</strong> <span class="text-success fw-bold">₹${order.paid_amount}</span></p>
                                    <p class="mb-2"><strong>Payment Status:</strong> <span class="badge bg-${order.payment_status === 'completed' ? 'success' : order.payment_status === 'pending' ? 'warning' : 'danger'}-subtle">${order.payment_status.charAt(0).toUpperCase() + order.payment_status.slice(1)}</span></p>
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h6 class="text-muted text-uppercase fs-13 fw-semibold">Shipping Address</h6>
                                    <p class="mb-1"><strong>${order.customer_name}</strong></p>
                                    <p class="mb-1">${shipping.line1}</p>
                                    ${shipping.line2 ? `<p class="mb-1">${shipping.line2}</p>` : ''}
                                    <p class="mb-1">${shipping.city}, ${shipping.state} - ${shipping.pincode}</p>
                                    <p class="mb-1">${shipping.country}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted text-uppercase fs-13 fw-semibold">Update Order Status</h6>
                                    <form id="updateStatusForm" onsubmit="updateOrderStatus(event, ${order.id})">
                                        <div class="mb-3">
                                            <select class="form-select" id="orderStatusSelect" name="order_status" required>
                                                <option value="">Select Status...</option>
                                                <option value="pending" ${order.order_status === 'pending' ? 'selected' : ''}>Pending</option>
                                                <option value="processing" ${order.order_status === 'processing' ? 'selected' : ''}>Processing</option>
                                                <option value="shipped" ${order.order_status === 'shipped' ? 'selected' : ''}>Shipped</option>
                                                <option value="delivered" ${order.order_status === 'delivered' ? 'selected' : ''}>Delivered</option>
                                                <option value="cancelled" ${order.order_status === 'cancelled' ? 'selected' : ''}>Cancelled</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary w-100">
                                            <i class="ri-check-line align-bottom"></i> Update Status
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <hr>

                            <div class="mb-3">
                                <h6 class="text-muted text-uppercase fs-13 fw-semibold mb-3">Order Items</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${itemsHtml}
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex gap-2">
                                <a href="{{ url('/admin/order') }}/${order.id}/invoice" target="_blank" class="btn btn-sm btn-info flex-grow-1">
                                    <i class="ri-file-pdf-line align-bottom"></i> View Invoice
                                </a>
                                <button type="button" class="btn btn-sm btn-secondary flex-grow-1" data-bs-dismiss="modal">
                                    <i class="ri-close-line align-bottom"></i> Close
                                </button>
                            </div>
                        `;
                        
                        contentDiv.innerHTML = html;
                    } else {
                        contentDiv.innerHTML = '<div class="alert alert-danger">Failed to load order details</div>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    contentDiv.innerHTML = '<div class="alert alert-danger">Error loading order details</div>';
                });
            
            modal.show();
        }

        function updateOrderStatus(event, orderId) {
            event.preventDefault();
            
            const status = document.getElementById('orderStatusSelect').value;
            const button = event.target.querySelector('button[type="submit"]');
            
            if (!status) {
                alert('Please select a status');
                return;
            }

            // Disable button and show loading
            button.disabled = true;
            const originalText = button.innerHTML;
            button.innerHTML = '<span class="spinner-border spinner-border-sm align-bottom me-2"></span> Updating...';

            fetch(`{{ url('/admin/order') }}/${orderId}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                },
                body: JSON.stringify({
                    order_status: status,
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    const alertHtml = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="ri-check-line align-bottom"></i> ${data.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
                    
                    const modalContent = document.getElementById('orderDetailsContent');
                    modalContent.insertAdjacentHTML('beforeend', alertHtml);

                    // Reload page after 1.5 seconds
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    alert('Error: ' + (data.error || 'Failed to update status'));
                    button.disabled = false;
                    button.innerHTML = originalText;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating order status');
                button.disabled = false;
                button.innerHTML = originalText;
            });
        }
    </script>

@stop

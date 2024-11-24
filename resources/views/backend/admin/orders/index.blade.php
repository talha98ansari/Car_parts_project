@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Orders Listing</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            {{-- <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li> --}}
                            {{-- <li class="breadcrumb-item"><a href="javasctipt:void(0)">order</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>
                {{--  --}}
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    {{-- <h3 class="mb-0">Light table</h3> --}}
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th scope="col" class="sort" data-sort="name">Customer Name</th>
                                <th scope="col" class="sort" data-sort="email">Email</th>
                                <th scope="col" class="sort" data-sort="total">Total Amount</th>
                                <th scope="col" class="sort" data-sort="status">Payment Method</th>
                                <th scope="col" class="sort" data-sort="status">Current Status</th>
                                <th scope="col" class="sort" data-sort="status">Payment Status</th>
                                <th scope="col" class="sort" data-sort="date">Checkout Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @php $i = 1; @endphp
                            @foreach ($checkouts as $checkout)
                            <tr>
                                <td class="budget">
                                    {{ $i }}
                                </td>
                                <td>
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $checkout->full_name ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $checkout->email ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">${{ number_format($checkout->total, 2) }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $checkout->payment_method ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="media-body">
                                        <select
                                            class="form-control status-dropdown"
                                            data-id="{{ $checkout->id }}"
                                            style="width: auto; display: inline-block;">
                                            <option value="In Process" {{ $checkout->status === 'Pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                            <option value="In Process" {{ $checkout->status === 'In Process' ? 'selected' : '' }}>
                                                In Process
                                            </option>
                                            <option value="Delivered" {{ $checkout->status === 'Delivered' ? 'selected' : '' }}>
                                                Delivered
                                            </option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        @if($checkout->payment_status === 'Paid')
                                        <i class="bg-primary"></i>
                                        <span class="status">Paid</span>
                                        @else
                                        <i class="bg-danger"></i>
                                        <span class="status">Unpaid</span>
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $checkout->created_at->format('d M Y, h:i A') }}</span>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('order.details', $checkout->id) }}">View Details</a>
                                            {{-- <a class="dropdown-item" href="{{ route('checkout.edit', $checkout->id) }}">Edit</a> --}}
                                            {{-- <a class="dropdown-item" href="{{ route('checkout.delete', $checkout->id) }}">Delete</a> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php $i++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    {{-- <nav aria-label="..."> --}}
                        {{-- <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul> --}}

                    {{-- </nav> --}}
                    {{-- {{ $order->links() }} --}}

                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>

@endsection

@push('js')

<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script></script>
<script>
    $(document).on('change', '.status-dropdown', function() {
        const status = $(this).val(); // Get selected value
        const checkoutId = $(this).data('id'); // Get checkout ID

        // Send AJAX request to update the status
        $.ajax({
            url: 'checkout/update-status', // Update this route as needed
            method: 'post',
            data: {
                id: checkoutId,
                status: status,
                _token: '{{ csrf_token() }}' // Include CSRF token for security
            },
            success: function(response) {
                if (response.success) {
                    alert('Status updated successfully!');
                } else {
                    alert('Failed to update status. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            }
        });
    });
</script>

@endpush

@extends('layouts.app')

@section('content')
<style>
   .table-bordered th, .table-bordered td,.table-bordered th, .table-bordered td  {
        padding:3px !important;
    }
</style>
<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Order Detail</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            {{-- <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li> --}}
                            <li class="breadcrumb-item"><a href="{{route('vparts.index')}}">Part</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Part</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">

    <div class="col-md-12 order-xl-1">
        <div class="card bg-secondary shadow">

            <div class="card-body">
                <div class="container mt-5">
                    <h2>Order Details</h2>
                    <div class="card">
                        <div class="card-header">
                            <strong>Order ID:</strong> {{ $data['order_id'] }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Customer Information</h5>
                            <table class="table2 w-75 p-2 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Full Name</th>
                                        <td>{{ $data['full_name'] }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{ $data['email'] }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{ $data['address'] }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">City</th>
                                        <td>{{ $data['city'] }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Payment Method</th>
                                        <td>{{ ucfirst($data['payment_method']) }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <h5 class="card-title mt-4">Order Summary</h5>
                            <table class="table2 w-75 p-2 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Subtotal</th>
                                        <td>${{ number_format($data['subtotal'], 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tax</th>
                                        <td>${{ number_format($data['tax'], 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total</th>
                                        <td><strong>${{ number_format($data['total'], 2) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Order Status</th>
                                        <td>
                                            <div class="media-body">
                                                <select
                                                    class="form-control status-dropdown"
                                                    data-id="{{ $data['id'] }}"
                                                    style="width: auto; display: inline-block;">
                                                    <option value="In Process" {{ $data['status'] === 'Pending' ? 'selected' : '' }}>
                                                        Pending
                                                    </option>
                                                    <option value="In Process" {{ $data['status'] === 'In Process' ? 'selected' : '' }}>
                                                        In Process
                                                    </option>
                                                    <option value="Delivered" {{ $data['status'] === 'Delivered' ? 'selected' : '' }}>
                                                        Delivered
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Payment Status</th>
                                        <td>
                                            <span class="badge {{ $data['is_paid'] ? 'badge-success' : 'badge-danger' }}">
                                                {{ $data['is_paid'] ? 'Paid' : 'Unpaid' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Delivery Status</th>
                                        <td>
                                            <span class="badge {{ $data['is_delivered'] ? 'badge-success' : 'badge-warning' }}">
                                                {{ $data['is_delivered'] ? 'Delivered' : 'Pending' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Order Date</th>
                                        <td>{{ \Carbon\Carbon::parse($data['created_at'])->format('d-m-Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Last Updated</th>
                                        <td>{{ \Carbon\Carbon::parse($data['updated_at'])->format('d-m-Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <h5 class="card-title mt-4">Order Parts</h5>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th scope="col" class="sort" data-sort="name">Name</th>
                                        <th scope="col" class="sort" data-sort="name">Category</th>
                                        <th scope="col" class="sort" data-sort="name">Part Type</th>
                                        <th scope="col" class="sort" data-sort="name">Description</th>
                                        <th scope="col" class="sort" data-sort="name">Amount</th>
                                        <th scope="col" class="sort" data-sort="completion">Status</th>
                                        {{-- <th scope="col"></th> --}}
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @php $i=1; @endphp
                                    @foreach ($parts as $u)
                                        <tr>
                                            <td class="budget">
                                                {{ $i }}
                                            </td>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                        @php $check = $d->images ?? [] @endphp
                                                        @if ($check != '' && !empty($check))
                                                            @foreach ($check as $c)
                                                                <img alt="Image placeholder" src="{{ asset($c->path) }}">

                                                            @break;
                                                        @endforeach
                                                    @endif
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{ $u->name ?? '' }}</span>
                                                </div>
                                            </div>
                                        </th>



                                        <td>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{ $u->category->name ?? '' }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{ $u->partType->name ?? '' }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{ $u->description ?? '' }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">AED {{ $u->price ?? '' }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                @if ($u->is_active == 1)
                                                    <i class="bg-primary"></i>
                                                    <span class="status">Active</span>
                                                @else
                                                    <i class="bg-danger"></i>
                                                    <span class="status">In-Active</span>
                                                @endif
                                            </span>
                                        </td>

                                        {{-- <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                        href="{{ route('parts.edit', $u->id) }}">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('parts.remove', $u->id) }}">Delete</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('parts.status', $u->id) }}">Change
                                                        Status</a>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                    @php $i++ @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>

@include('layouts.footers.auth')
</div>
<script src="{{asset('front/js/jquery.min.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function() {

      $(".addd_img").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });

    });
</script>

<script>
    $(document).on('change', '.status-dropdown', function() {
        const status = $(this).val(); // Get selected value
        const checkoutId = $(this).data('id'); // Get checkout ID

        // Send AJAX request to update the status
        $.ajax({
            url:'<?php echo route('checkout.updateStatus') ?>',

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

@endsection

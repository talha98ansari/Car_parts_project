@extends('frontend.includes.layout')
@section('content')
<style>

</style>
<section id="category">
    <div class="container">

        <div class="container-fluid">
            <div class="row py-5">
                <div class="col-md-12">
                    <h1 class="text-center fs-2"><span class="orange-text">Checkout</span></h1>
                </div>
                <div class="container checkout-container">
    <div class="row">
        <!-- Checkout Form -->
        <div class="col-md-8">
            <h3>Checkout Form</h3>
                <!-- Display Validation Errors -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="{{ route('checkout.submit') }}" method="POST">
            @csrf
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="John Doe" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="john@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="123 Main Street" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Your City" required>
                </div>
                <input type="hidden" value="{{ $totalPrice }}" name="subtotal">
                <input type="hidden" value="{{ $totalPrice }}" name="total">
                <div class="mb-3">
                    <label for="paymentMethod" class="form-label">Payment Method</label>
                    <select class="form-select" id="paymentMethod" name="paymentMethod" required>
                        {{-- <option value="credit_card" disabled>Credit Card</option> --}}
                        {{-- <option value="paypal" disabled>PayPal</option> --}}
                        <option value="cod" selected>Cash on Delivery</option>
                    </select>
                </div>
                <button type="submit" class="btn3 btn btn-lg w-100">Place Order</button>
            </form>
        </div>

        <!-- Price Details -->
        <div class="col-md-4">
            <div class="price-details">
                <h4>Price Details</h4>
                <hr>
                <p>Subtotal: <span class="float-end">AED {{ $totalPrice }}</span></p>
                {{-- <p>Tax: <span class="float-end">5.00</span></p> --}}
                <hr>
                <p class="total-price">Total: <span class="float-end">AED {{ $totalPrice }}</span></p>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</section>
@endsection

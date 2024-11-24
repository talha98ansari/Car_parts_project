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

<div class="container mt-5">
    <h1 class="text-center">Thank You for Your Purchase!</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <p class="text-center">Your order has been successfully placed. We will send you an email with your order details shortly.</p>

    <div class="text-center">
        <a href="/" class="btn btn3">Back to Home</a>
    </div>
</div>
</div>

            </div>
        </div>
    </div>
</section>
@endsection

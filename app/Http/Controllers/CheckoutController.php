<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OtherPages;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkout(){
        $partInfo = OtherPages::where('title', 'part_type')->first();
            $data = Cart::join('parts','parts.id','=','carts.product_id')
            ->where('parts.is_active', 1)
            ->where('carts.user_id', Auth::id())
        ->get();


        $totalPrice =0;
        foreach($data as $pn){
            $totalPrice += $pn->price;
        }
        return view('frontend.checkout', compact('data', 'totalPrice','partInfo'));
    }
    public function storeCheckout(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'paymentMethod' => 'required|string|max:50',
            'subtotal' => 'required|numeric',
             'total' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            // If validation fails, redirect back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $checkout = new Checkout();
        $checkout->full_name = $request->input('fullName');
        $checkout->email = $request->input('email');
        $checkout->address = $request->input('address');
        $checkout->city = $request->input('city');
        $checkout->payment_method = $request->input('paymentMethod');
        $checkout->subtotal = $request->input('subtotal');
        $checkout->tax = 0;
        $checkout->total = $request->input('total');

        if (Auth::check()) {
            $checkout->user_id = Auth::id();
        }

        $checkout->save();
       $order = Order::create([
            'check_out'=>$checkout->id,
            'is_paid'=>0,
            'is_delivered'=>0,
            'user_id'=>Auth::user()->id
        ]);

        $data = Cart::join('parts','parts.id','=','carts.product_id')
        ->where('parts.is_active', 1)
        ->where('carts.user_id', Auth::id());
        $buyed= $data->get();
        foreach($buyed as $b){
            OrderDetail::create([
                'order_id'=>$order->id,
                'product_id'=>$b->product_id
            ]);
        }


        $data->delete();
        return view('frontend.thankyou')->with('success', 'Checkout completed successfully!');

    }
}

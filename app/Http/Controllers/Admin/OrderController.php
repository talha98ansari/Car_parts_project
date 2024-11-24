<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\Part;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $checkouts = Checkout::join('order' , 'order.check_out' , 'checkout.id')
        ->select('order.id as order_id' ,'order.is_paid','order.is_delivered', 'checkout.*' )
        ->get();
        return view('backend.admin.orders.index', compact('checkouts'));
    }
    public function detail($id)
    {
        $data = Checkout::join('order' , 'order.check_out' , 'checkout.id')
        ->where('checkout.id' , $id)
       ->select('order.id as order_id' ,'order.is_paid','order.is_delivered', 'checkout.*' )
       ->first();
        $parts = Part::join('order_detail' , 'order_detail.product_id' , '=' , 'parts.id')
        ->where('order_detail.order_id' , $data->order_id)
        ->get(['parts.*']);
        ;
       return view('backend.admin.orders.detail', compact('data','parts'));
    }
    public function updateStatus(Request $request)
{
    $request->validate([
        'id' => 'required|exists:checkout,id',
        'status' => 'required|in:In Process,Delivered',
    ]);

    $checkout = Checkout::findOrFail($request->id);
    $checkout->status = $request->status;

    if ($checkout->save()) {
        return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
    } else {
        return response()->json(['success' => false, 'message' => 'Failed to update status.']);
    }
}

}

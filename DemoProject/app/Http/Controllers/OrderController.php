<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\DeliveryAddress;
use App\OrdersProduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$orderDetails = Order::latest()->paginate(10);
        return view('order.index',compact('orderDetails'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$order = Order::where('id',$id)->first();
     	return view('order.edit',compact('order')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$data = $request->all();
    	$status = $data['status'];
        Order::find($id)->update(['order_status'=>$status]);
        return redirect()->route('order.index')->with('flash_message_success','Order has been updated successfully');
    }

    public function customerDetails()
    {
        $customerDetails = DeliveryAddress::latest()->paginate(5);
        return view('order.customerPage',compact('customerDetails'));
    }

    public function orderDetails()
    {
        $orderDetails = Order::with('userOrders')->latest()->paginate(5);
        return view('order.orderPage',compact('orderDetails'));
    }

}

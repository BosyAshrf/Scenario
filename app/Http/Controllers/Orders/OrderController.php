<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::get();
      return view('Orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Orders.create');
    }

      public function store(OrderRequest $request)
    {
        $orders  = new Order();
        $orders->name = $request->name;
        $orders->notes = $request->notes;
        $orders->details = $request->details;
        $orders->status = $request->status;
         $orders->save();
 
        return redirect()->route('orders.index')->with('success','order created successfully.');
       
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrfail($id);
        return view('Orders.edit',compact('order'));
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
        $order = Order::findOrfail($id);
        $order->name = $request->name;
        $order->notes = $request->notes;
        $order->details = $request->details;
        $order->status = $request->status;
        $order->save();
        // toastr()->success('User Updated successfully!');
        return redirect()->route('orders.index')->with('success','order updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrfail($id)->delete();
        return redirect()->route('orders.index')->with('success','order deleted successfully');
    }
}

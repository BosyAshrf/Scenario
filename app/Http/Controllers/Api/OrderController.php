<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Traits\HelperTrait;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use HelperTrait;
    public function AddOrder(Request $request)
    {
        $orders = Order::create([
            'name' => $request->name,
            'details' => $request->details,
            'notes' => $request->notes,
            'status' => $request->status,
            'customer_id' =>  Auth::id(),
            
        ]);

        return $this->responseJson(200, 'Data Saved Successfully', $orders, '');

    }

    public function cancelOrder($id)
    {
        Order::findorfail($id)->delete();
        return $this->responseJson(200, 'Data Deleted Successfully', '');
    }


    public function showOrder()
    {
        $orders = Order::where('customer_id',auth()->user()->id)->get();
        return $this->responseJson(200, 'Data Returned Successfully', OrderResource::collection($orders),'');

    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //    $users = Customer::get();
    //    $providers = Service::all();
    //    return view('admins.users',compact('users','providers'));
    // }

    public function ShowUser(){
        $users = Customer::get();
        return view('admins.users',compact('users'));

    }

    public function ShowProvider(){

       $providers = Service::all();
        return view('auth.Services.index',compact('providers'));

    }

    public function ShowOrder(){

       $orders = Order::all();
        return view('Admins.services',compact('orders'));

    }

    public function deleteProvider($id)
    {
       $provider = Service::findorfail($id)->delete();
       return redirect()->back();
    }

    public function deleteUser($id)
    {
       $user = Customer::findorfail($id)->delete();
       return redirect()->back();
    }

}

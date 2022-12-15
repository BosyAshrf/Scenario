<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Service::all();
        return view('auth.Services.index',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.Services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $providers  = new Service();
        $providers->name = $request->name;
        $providers->email = $request->email;
        $providers->password = Hash::make($request['password']);
        $providers->notes = $request->notes;
        $providers->status = $request->status;
         $providers->save();
 
        return redirect()->route('providers.index')->with('success','order created successfully.');
    }

   
    public function edit($id)
    {
        $provider = Service::findOrfail($id);
        return view('auth.Services.edit',compact('provider'));
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
        $provider = Service::findOrfail($id);
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->password = Hash::make($request['password']);
        $provider->notes = $request->notes;
        $provider->status = $request->status;
        $provider->save();
        // toastr()->success('User Updated successfully!');
        return redirect()->route('providers.index')->with('success','order updated successfully');
    }

}

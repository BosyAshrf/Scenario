@extends('layouts.app')
@section('title')
    Services
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body pt-0">
                <form  method="POST" action="{{route('providers.store')}}">
                    {{ csrf_field() }}

                    <div class="row gy-2 mb-4 mt-4">
                        <label class="col-sm-3 form-label" for="name">Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter Name">
                            @if($errors->has('name'))
                                 <span class="text-danger">{{$errors->first('name')}}</span>
                              @endif
                        </div>
                    </div>
                    <br>

                    <div class="row gy-2 mb-4">
                        <label class="col-sm-3 form-label" for="email">Email</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="email" name="email" type="email" placeholder="Email Address">
                            @if($errors->has('email'))
                                 <span class="text-danger">{{$errors->first('email')}}</span>
                              @endif
                        </div>
                    </div>

                    <div class="row gy-2 mb-4">
                        <label class="col-sm-3 form-label" for="password">Password</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="password" name="password" type="password" placeholder="Enter Password">
                             @if($errors->has('password'))
                                 <span class="text-danger">{{$errors->first('password')}}</span>
                              @endif
                            
                        </div>
                    </div>
                  
                      <div class="row gy-2 mb-4">
                        <label class="col-sm-3 form-label" for="status">Status</label>
                        <div class="col-sm-9">
                            <select id="status" name="status" class="form-control">
                                    <option value="" selected disabled>choose ..</option>
                                    <option value="0">Active</option>
                                    @if (auth('web')->check())
                                    <option value="1">InActice</option>
                                    @endif
                                    {{-- <option value="initiated">initiated</option>
                                    <option value="engage">engage</option>
                                    <option value="processing">processing</option>
                                    <option value="in-progress">in-progress</option>
                                    <option value="completed">completed</option>
                                    <option value="delivered">delivered</option> --}}
                                </select>
                                 @if($errors->has('status'))
                                 <span class="text-danger">{{$errors->first('status')}}</span>
                              @endif
                        </div>
                    </div>
                    
                     <br>

                    <div class="row gy-2 mb-4">
                        <label class="col-sm-3 form-label" for="notes">Notes</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
                               
                                         @if($errors->has('notes'))
                                 <span class="text-danger">{{$errors->first('notes')}}</span>
                              @endif
                        </div>
                    </div>
                      <br>

                     {{-- <div class="row gy-2 mb-4">
                        <label class="col-sm-3 form-label" for="company_name">Company Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="company_name" name="company_name" type="text" placeholder="Enter Company Name">
                             @if($errors->has('company_name'))
                                 <span class="text-danger">{{$errors->first('company_name')}}</span>
                              @endif
                        </div>
                    </div>
                     <br> --}}

                  


                    <div class="row">
                        <div class="col-sm-9 ms-auto">
                            <input class="btn btn-primary" type="submit" value="Save">
                            <a class="btn btn-danger m-1" href="{{ route('orders.index') }}">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

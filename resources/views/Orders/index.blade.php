@extends('layouts.app')
@section('title')
    Orders
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card mb-0">
           
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Notes</th>
                                @if (auth('web')->check())
                                <th scope="col">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $loop->index+1}}</th>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->details }}</td>
                                <td>{{ $order->status() }}</td>
                                <td>{{ $order->notes }}</td>
                                @if (auth('web')->check())
                            
                                      <td>
                                        <a href="{{ route('orders.destroy',$order->id) }}" class="btn btn-danger" onclick="
                                            var result = confirm('Are you sure you want to delete this Order?');
                                            
                                            if(result){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$order->id}}').submit();
                                            }">
                                            Delete
                                        </a>
                            
                                        <form method="POST" id="delete-form-{{$order->id}}" action="{{route('orders.destroy', [$order->id])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

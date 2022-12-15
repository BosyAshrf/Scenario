@extends('layouts.app')
@section('title')
Service Provider
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-header">

                @if (auth('service')->check())
                <a class="btn btn-info" href="{{ route('providers.create') }}">Add Service</a>
                @endif

            </div>
            <br>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($providers as $provider)
                            <tr>
                                <th scope="row">{{ $loop->index+1}}</th>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->email }}</td>
                             
                                <td>

                                @if ($provider->status == 0)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                                
                                </td>

                                <td>
                                    @if (auth('service')->check())
                                <button class="btn btn-primary"><a href="{{ route('providers.edit', $provider->id) }}"
                                    style="text-decoration: none;color:white">Edit</a></button>
                                    @endif
                                        <a href="{{ route('admin.delete',$provider->id) }}" class="btn btn-danger" onclick="
                                            var result = confirm('Are you sure you want to delete this provider?');
                                            
                                            if(result){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$provider->id}}').submit();
                                            }">
                                            Delete
                                        </a>
                            
                                        <form method="POST" id="delete-form-{{$provider->id}}" action="{{route('admin.delete', [$provider->id])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                </td>
                               
                                {{-- @include('Orders.delete') --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

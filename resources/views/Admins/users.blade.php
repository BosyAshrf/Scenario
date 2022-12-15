@extends('layouts.app')
@section('title')
users
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card mb-0">
            
            <br>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->index+1}}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                      <a href="deleteUser/{{$user->id}}" class="btn btn-danger" onclick="
                                        var result = confirm('Are you sure you want to delete this user?');
                                        if(result){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$user->id}}').submit();
                                        }">
                                        Delete
                                    </a>
                        
                                    <form method="POST" id="delete-form-{{$user->id}}" action="{{route('admin.deleteUser', [$user->id])}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </td>
                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

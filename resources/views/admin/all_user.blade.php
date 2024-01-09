@extends('admin.layout')
@section('main')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Dashboard</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">All Users</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="bg-secondary ">
                            <tr>
                              <th class="text-white" scope="col">SL</th>
                              <th class="text-white" scope="col">Name</th>
                              <th class="text-white" scope="col">Email</th>
                              <th class="text-white" scope="col">User Type</th>
                              <th class="text-white" scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($user as $user)
                            <tr> 
                                <td>{{$loop->index+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->usertype}}</td>
                                <td>
                                    <a href="{{url('/edit_page',$user->id)}}"><input class="btn btn-dark btn-sm" type="button" value="edit"></a>
                                    <a href="{{url('/delete_user')}}"><input class="btn btn-danger btn-sm" type="button" value="delete"></a>
                                </td>
                              </tr> 
                            @endforeach
                            
                          </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
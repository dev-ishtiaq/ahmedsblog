<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@extends('admin.layout')

@section('title')
@foreach ($dashboard as $dashboard)
<title>{{$dashboard->title}}</title>
@endforeach

@endsection
@section('logo')
<img src="logo/{{$dashboard->logo}}" alt="logo">
@endsection

@section('main')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Dashboard</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">all post</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session()->get('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(session()->has('dlt_message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session()->get('dlt_message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-end">
                <a href="/post_page" class="btn btn-dark"><i class="text-center fa-solid fa-plus"></i> Add Post</a>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-light table-striped ">
                        <thead>
                            <h2 class="text-center">All Post</h2>
                        </thead>
                        <tbody>
                            <tr class="bg-dark">
                                <th>SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Post by</th>
                                <th>Post Status</th>
                                <th>User Type</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($post as $post)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->description}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->post_status}}</td>
                                <td>{{$post->usertype}}</td>
                                <td><img class="rounded-circle border border-success" src="postimage/{{$post->image}}" height="50" width="50" alt="image"></td>
                                <td>
                                    <a href="{{url('post_edit_page', $post->id)}}" class="d-block mb-1 btn btn-success btn-sm">Edit</a>
                                    <a href="{{url('delete_post', $post->id)}}" class="d-block mb-1 btn btn-warning btn-sm" onclick="confirmation(event)">Delete</a>
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

<script type="text/javascript">
    function confirmation(ev)
    {
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        sweetAlert({
            title       : "Are you confirm to delete this?",
            text        : "You won't able to revert this",
            icon        : "warning",
            buttons      : true,
            dangerMode  : true,
        })
        .then((willCancel)=>
        {
            if(willCancel)
            {
                window.location.href=urlToRedirect;
            }
        });
    }
</script>

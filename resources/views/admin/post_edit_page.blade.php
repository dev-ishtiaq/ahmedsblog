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
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
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

    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <div class="card-header text-center">
                    <h3>Edit Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('edit_post', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>title</label>
                            <input type="text" name="title" class="form-control border-secondary" value="{{$post->title}}">
                            @if($errors->has('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="description" rows="4" class="form-control border-secondary" value="">{{$post->description}}</textarea>
                            @if($errors->has('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label>Old Image</label>
                            <img class="rounded-4 border border-success" src="/postimage/{{$post->image}}" height="100" width="100" alt="">
                        </div>
                            <div class="form-group mb-3">
                            <label>New Image</label>
                            <input type="file" name="image" class="form-control border-secondary">
                            @if($errors->has('image'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

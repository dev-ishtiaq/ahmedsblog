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
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Ishtiaq</td>
                                <td>Des.......</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

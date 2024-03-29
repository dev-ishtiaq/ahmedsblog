@extends('admin.layout')

@section('logo')
    <img src="logo/{{$dashboard->logo}}" alt="logo" class="dark-logo" />
@endsection

@section('main')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>Admin Setting</b></div>

                <div class="card-body">
                    <form method="POST" action="{{url('/settings')}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Admin Title') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="title" value="{{$dashboard->title}}">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Fav Icon') }}</label>

                            <div class="col-md-6">
                                <input  type="file" class="form-control" name="favicon">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                                <input  type="file" class="form-control" name="logo">
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

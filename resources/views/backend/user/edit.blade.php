@extends('backend.layouts.master')

@section('title', 'All Posts')

@section('content')

<div class="container">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Profile</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/profile/edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control">
                       
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control">
                       
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" value="{{ auth()->user()->password }}" class="form-control">
                       
                    </div>
                    <div class="form-group">
                        <label>image</label>
                        <input type="file" name="image" class="form-control-file">
                       
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

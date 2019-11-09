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
                <p>Name: {{ auth()->user()->name}}</p>
                <p>Email: {{ auth()->user()->email }}</p>
            </div>
            <div class="card-footer text-right">
                <a href="{{ url('admin/profile/edit') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-edit"></i>
                    Edit
                </a>
            </div>
        </div>
    </div>
</div>




@endsection
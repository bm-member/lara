@extends('backend.layouts.master')

@section('title', 'All Posts')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-2">
            <a href="{{ url('admin/post') }}" class="btn btn-secondary">Back</a>
            {{-- <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a> --}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    {{ $post->content }}
                </div>
                <div class="card-footer">
                    Post By {{ $post->user->name }} on {{ $post->created_at }}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
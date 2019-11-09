@extends('backend.layouts.master')

@section('title', 'Edit Post')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('alerts')

            <h3>Edit Post</h3>
            <form action="{{ url("admin/post/$post->id/edit") }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control">
                            {{ $post->content }}
                        </textarea>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
                <a href="{{ url('post') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
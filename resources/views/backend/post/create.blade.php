@extends('backend.layouts.master')

@section('title', 'Create Post')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            @include('alert')

            <h3>Create Post</h3>
            <form action="{{ url('admin/post') }}" method="post">
                @csrf
                {{-- {{ csrf_field() }} --}}
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror"></textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
                <a href="{{ url('admin/post') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
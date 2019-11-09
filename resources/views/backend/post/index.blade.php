@extends('backend.layouts.master')

@section('title', 'All Posts')

@section('content')

<div class="container">

    <div class="row my-3">
        <div class="col-md-12">
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        <div class="col-md-4">
            <h3>All Posts</h3>
        </div>
        <div class="col-md-4 text-right">
            <a href="create" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i>
                Create
            </a>
        </div>

        <div class="col-md-4 ">
        <form action="{{url('admin/post')}}">
        <div class="input-group mb-3">
  <input type="text" class="form-control" name="search" placeholder="search" aria-label="Recipient's username" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" >
    <i class="fas fa-search"></i>
    </button>
  </div>
  </form>
</div>
</div>


    </div>
@can('isAdminOrAuthor')
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-6">
            <div class="card mb-2">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    {{ substr($post->content, 0, 100) }}
                </div>
                <div class="card-footer text-right">
                    <a href="{{ url("admin/post/$post->id") }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                        View
                    </a>
                    <a href="{{ url("admin/post/$post->id/edit") }}" class="btn btn-success btn-sm">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                    <a href="{{ url("admin/post/$post->id/delete") }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                        Del
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row justify-content-center">
        {{ $posts->links() }}
    </div>
		@endcan
</div>

@endsection
{{-- @stop --}}

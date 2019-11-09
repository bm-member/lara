<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links bg-dark" style="line-height: 3;">
            @auth
            <a href="{{ url('/admin/post') }}">Admin</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <!-- home post -->
        <div class="container">
            <div class="row my-3 text-center">
                <div class="col-md-12 ">
                        {{-- <a href="{{ route('/home') }}"> <h3>Home Posts</h3></a> --}}
                        <h3>Home Posts</h3>
                </div>
            </div>
            <div class="row">

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>

    </tr>
  </thead>
  <tbody>
     @foreach($posts as $post)
     <tr>
      <th>{{ $post->id }}</th>
      <td>     {{ $post->title }}</td>
      <td>  {{ substr($post->content, 0, 10) }}</td>
      </tr>
      @endforeach

  </tbody>
</table>
            </div>

            <div class="row justify-content-center mt-5">
                {{$posts->links()}}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"> </script>
</body>
</html>

<!-- http://localhost:8000/admin/post -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>
    <div id="app">
        @include('inc.navbar')

        <div class="container py-4">

            <div class="row justify-content-center">
                @if(Auth::check())
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('posts.index')}}">All Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.create')}}">New Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.trashed')}}">Trashed Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('category.index')}}">All Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('category.create')}}">New Category</a>
                            </li>
                            @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{route('users.index')}}">Users</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('settings.index')}}">Settings</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
                <div class="col-md-8">

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success')}}")
        @endif
        @if (Session::has('info'))
            toastr.info("{{ Session::get('info')}}")
        @endif
    </script>
</body>
</html>

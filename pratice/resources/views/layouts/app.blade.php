<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                                @if (Auth::user()->role->name != 'super_admin')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home.task') }}">Task</a>
                                    </li>
                                    @else

                                    {{-- Task DropDown --}}
                                    <li class="nav-item dropdown">

                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            Task<span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                            {{-- Add Task --}}
                                            <a class="dropdown-item" href="{{route('task.showaddtask')}}">Add Task</a>

                                            {{-- Add Group --}}
                                            <a class="dropdown-item" href="{{route('task.showaddgroup')}}">Add Group</a>

                                            {{-- Manage Task --}}
                                            <a class="dropdown-item" href="{{route('task.manage')}}">Manage Task</a>
                                        </div>

                                    </li>

                                @endif

                                @if(Gate::allows('manage_permission',App\User::class))
                                    <li class="nav-item">
                                            <a class="nav-link" href="{{ route('home.permissions') }}">Manage Permissions</a>
                                    </li>
                                @endif
                            @can('viewAny', App\User::class)
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home.list') }}">{{ __('User Detail') }}</a>
                                </li>
                            @endcan

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="@if(Auth::user()->image!=null) {{asset(Auth::user()->image)}} @endif
                            @if(Auth::user()->image==null) {{asset('uploads/image/avater/pngtree-web-page-ui-default-avatar-handsome-guy-png-image_344498.jpg')}} @endif"
                            alt="" class="rounded-circle" style="width:30px">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    {{-- profile --}}
                                    <a class="dropdown-item" href="{{ route('setting') }}">
                                        {{ __('profile') }}
                                    </a>

                                    {{-- setting --}}
                                    <a class="dropdown-item" href="{{ route('setting') }}">
                                        {{ __('setting') }}
                                    </a>

                                    {{-- logout --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

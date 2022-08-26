<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>بنك الأسئلة لتطبيق من سيربح المليون - النسخة الدينية</title>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
	<link rel="icon" href="{{asset('img/logo.jpg')}}" type="image/x-icon">
    <!-- fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet' type='text/css'>
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/all.min.css')}}">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('img/logo.png')}}" alt="logo" width="60" height="60">
                    بنك الأسئلة لتطبيق من سيربح المليون - النسخة الدينية
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}"> الصفحة الرئيسية</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->user_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        تسجيل خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
<!-- Footer -->
<div >
    <footer class="bg-white shadow-sm">
        <!-- Copyright -->
        <div class="text-center p-3" >
        © 2022 Copyright: 
        <a  href=#> Software Chasers</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</div>
    <!-- SCRIPTS -->

    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('js/all.min.js')}}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/script.js'])
    @livewireStyles
    @stack('style')

    <!-- Scripts -->
    @stack('style')
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="stater-kit, laravel, mazer, spatie, role, permission">
    <meta name="author" content="Laravel">
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
    <link rel="canonical" href="{{url()->full()}}">
</head>


<body>
    <x-session-message.session-message />
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="/"><img src="https://cs.ipb.ac.id/wp-content/uploads/2021/06/logoipbilkomdarkhorizontal-1024x167-1.png" alt="Logo"></a>
                        </div>
                        <div class="header-top-right">
                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        <img src="{{ Auth::user()->profile_photo_url }}">
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name">{{Auth::user()->name}}</h6>
                                        <p class="user-dropdown-status text-sm text-muted">{{Auth::user()->nim}}</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg mt-2" aria-labelledby="topbarUserDropdown" style="">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ strtok(Auth::user()->name, ' ') }} !</h6>
                                    </li>
                                    @can('dashboard')
                                    <li>
                                        <a href="/dashboard" class="dropdown-item"><p> Dashboard </p></a>
                                    </li>
                                    @endcan

                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item  ">
                                <a href="/" class="menu-link">
                                    <span><i class="bi bi-grid-fill"></i> Home</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="content-wrapper container">
                {{ $slot}}
            </div>
        </div>
    </div>
    @livewireScripts
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

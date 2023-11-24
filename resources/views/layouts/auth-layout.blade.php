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
    @vite(['resources/scss/app.scss', 'resources/scss/themes/dark/app-dark.scss', 'resources/js/app.js', 'resources/js/script.js'])

    <!-- Scripts -->
    @stack('style')
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="stater-kit, laravel, mazer, spatie, role, permission">
    <meta name="author" content="Laravel">
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
    <link rel="canonical" href="{{url()->full()}}">
</head>
<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="/"><img src="https://cs.ipb.ac.id/wp-content/uploads/2021/06/logoipbilkomdarkhorizontal-1024x167-1.png" alt="Logo"></a>
                        </div>
                        <div class="header-top-right">
                            <a href="/login" class="btn btn-primary">Login</a>
                            <a href="/register" class="btn btn-secondary">Register</a>
                        </div>
                    </div>
                </div>
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

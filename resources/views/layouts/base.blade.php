<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | Responsi UTS by Aliif</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
              <a class="navbar-brand" href="#">UTS</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @if($title != 'Home')
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    @else
                        <a class="nav-link disabled" href="/">Home</a>
                    @endif

                    @if($title != 'Inisialisasi')
                        <a class="nav-link active" aria-current="page" href="/inisialisasi">Inisialisasi</a>
                    @else
                        <a class="nav-link disabled" href="/">Inisialisasi</a>
                    @endif

                    @if($title != 'Matakuliah')
                        <a class="nav-link active" aria-current="page" href="/matakuliah">Mata Kuliah</a>
                    @else
                        <a class="nav-link disabled" href="/">Mata Kuliah</a>
                    @endif
                </div>
              </div>
            </div>
          </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

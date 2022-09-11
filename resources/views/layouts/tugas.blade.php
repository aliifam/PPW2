<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/js/app.js'])

    <title>{{ $title }} | Aliif site</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">Aliifam</a>
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

                    @if($title != 'About')
                        <a class="nav-link active" aria-current="page" href="/about">About</a>
                    @else
                        <a class="nav-link disabled" href="/">About</a>
                    @endif

                    @if($title != 'Education')
                        <a class="nav-link active" aria-current="page" href="/education">Education</a>
                    @else
                        <a class="nav-link disabled" href="/">Education</a>
                    @endif

                    @if($title != 'Projects')
                        <a class="nav-link active" aria-current="page" href="/projects">Projects</a>
                    @else
                        <a class="nav-link disabled" href="/">Projects</a>
                    @endif
                </div>
              </div>
            </div>
        </nav>
       <div class="container">
        @yield('content')
       </div>
    </div>
</body>
</html>
@extends('layouts.tugas')

@section('content')
        <h1 class="display-4">Ini adalah halaman {{ $title }}</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        
        <ul>
            @foreach ($sekolah as $s)
                <div>
                    <p class="fs-2">{{ $s["nama"] }}</p>
                    <p >{{ $s["tahun"] }}</p>
                </div>
            @endforeach
        </ul>
@endsection
@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (count($matkuls)>0)
                @foreach ($matkuls as $p)
                    <div class="well">
                        <h3><a href="/matakuliah/{{$p->id}}">{{$p->nama_matkul}}</a></h3>
                        <small>Tanggal: {{$p->created_at}}</small>
                    </div>
                @endforeach
                <div class="d-flex">
                    {{ $matkuls->links() }}
                </div>
            @else
                <p>Belum ada post</p>
            @endif
        </div>
    </div>
</div>
@endsection
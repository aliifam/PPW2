@extends('layouts.app')

@section('content')
    <style type="text/css">
        .pagination li {
            float: left;
            list-style-type: none;
            margin: 5px;
        }
    </style>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-g"> {{ $menu }} </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $menu }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div> <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h4 class="card-title">{{ $menu }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if (count($galleries) > 0)
                                        @foreach ($galleries as $gallery)
                                            <div class="col-sm-2">
                                                <div>
                                                    <a class="example-image-link"
                                                        href="{{ Storage::url($gallery->image) }}".
                                                        data-lightbox="example-2" data-title="{{ $gallery->description }}">
                                                        <img class="example-image img-fluid mb-2"
                                                            src="{{ Storage::url($gallery->image) }}"
                                                            alt="image_1" /></a>
                                                </div>
                                            </div> 
                                            @endforeach
                                        @else
                                            <h3>Tidak ada data.</h3>
                                        @endif
                                        <div class="d-flex">
                                            {{ $galleries->links() }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- 7. row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div> <!-- /.content-wrapper -->
@endsection
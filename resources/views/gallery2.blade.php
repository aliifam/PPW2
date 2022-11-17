@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="gallery">
            </div>
        </div>
    </div>
</div>
<script>
    fetch('/api/gallery')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        let html = '';
        data.data.forEach(gallery => {
            html += `
            <div class="card-header">${gallery.title}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <div>
                            <a class="example-image-link"
                                href="${gallery.image}".
                                data-lightbox="example-2" data-title="${gallery.description}">
                                <img class="example-image img-fluid mb-2"
                                    src="${gallery.image}"
                                    alt="image_1" /></a>
                        </div>
                    </div> 
                </div>
            </div>
            `;
        });
        document.getElementById('gallery').innerHTML = html;
    });
</script>
@endsection

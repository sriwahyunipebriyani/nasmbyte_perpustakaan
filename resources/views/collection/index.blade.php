@extends('layout.mainBook')
@section('judul','collection')
@section('isi')
<div class="kotak my-3">
<p><b>Collection</b></p>
</div>
<div class="container">
    <div class="row">
        @foreach ($favorites as $favorite)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card border-0 shadow-sm  h-100" style="width: 16rem;">
                    <a href="/books-detail/{{$favorite->slug}}">
                        <img src="{{ $favorite->cover != null ? asset('storage/cover/' . $favorite->cover) : asset('image/Not-Found.jpg') }}" class="card-img-top md-3 me-3" alt="Book Cover" style="height: 300px; object-fit: cover; width: 16rem;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $favorite->Judul }}</h5>
                        <p class="card-text">Some quick example text to build on the card title.</p>
                        <p class="text-end {{ $favorite->status == 'available' ? 'text-success' : 'text-danger' }}">{{ $favorite->status }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection
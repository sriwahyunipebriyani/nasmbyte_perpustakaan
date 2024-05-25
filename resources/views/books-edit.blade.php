@extends('layout.mainLayout')
@section('title','edit books')
@section('content')
    <div class="kepalakotak">
        <p>
            <b>Book editing page</b>
        </p>
    </div>

    @if ($errors->any())
<div class="alert alert-danger mt-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('status'))
<div class="alert alert-success mt-3">
    {{ session('status') }}
</div>
@endif

    <div class="container mt-4">
        <div class="table-resonsive">
            <div class="table">
                <form action="/books-edit/{{$books->slug}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-2">
                        <label for="name" class="form-label">Title</label>
                        <input type="text" name="Judul" id="Judul" class="form-control" value="{{$books->Judul}}" placeholder="title books" required>
                    </div>
                    <div class="mt-2">
                        <label for="name" class="form-label">Author</label>
                        <input type="text" name="Penulis" id="Penulis" class="form-control" value="{{$books->Penulis}}" placeholder="writer books" required>
                    </div>
                    <div class="mt-2">
                        <label for="name" class="form-label">Publisher</label>
                        <input type="text" name="Penerbit" id="Penerbit" class="form-control" value="{{$books->Penerbit}}" placeholder="publisher" required>
                    </div>
                    <div class="mt-2">
                        <label for="tahun" class="form-label">Year of publication</label>
                        <input type="number" min="1700" max="2099" step="1" value="{{$books->TahunTerbit}}" name="TahunTerbit" id="TahunTerbit" class="form-control" placeholder="year of publication" required>
                    </div>
                    <div class="mt-2">
                        <label for="name" class="form-label">Synopsis</label>
                        <textarea type="text" name="description" id="description" class="form-control h-100"  value="{{$books->description}}" placeholder="writer synopsis books" required></textarea>
                    </div>
                    <div>
                        <label for="category" class="form-label">category</label>
                        <select name="categories[]" id="category" class="form-control "  >
                            @foreach ($categories as $item)
                            <option value="{{$item->KategoriID}}">{{$item->NamaKategori}}</option>
                            @endforeach
                        </select>
                        {{-- <div class="form-text" id="category">You can choose more than one</div> --}}
                    </div>
                    {{-- <div class="mb-2">
                    <label for="currentCategories">Current Category</label>
                    <ul>
                        @foreach ($books->categories as $category )
                            <li>{{$category->NamaKategori}}</li>
                        @endforeach
                    </ul>
                    </div> --}}
                    <div class="mt-2">
                        <label for="name" class="form-label">status</label>
                        <input type="text" name="status" id="status" class="form-control" value="{{$books->status}}" placeholder="status books" required>
                    </div>
                    <div class="mb-2">
                        <label for="currentImage" class="form-label" style="display: block">Current Image</label>
                        @if ($books->cover!= '')
                            <img src="{{asset('storage/cover/'.$books->cover)}}" alt="" width="200px">
                        @else
                            <img src="{{asset('image/Not-Found.jpg')}}" alt="" width="200px">
                        @endif
                    </div>
                    <div class="mt-2">
                        <label for="image" class="form-label">Cover</label>
                        <input type="file" name="image" id="image" class="form-control" value="{{$books->cover}}" placeholder="cover books">
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <button class="btn btn-success " type="submit">save</button>
                    </div>
                        
                    
                </form>
            </div>
        </div>
    </div>
    <div class="konek"></div>

@endsection
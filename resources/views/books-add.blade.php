@extends('layout.layoutMain')
@section('matahari','books-add')
@section('tengah')
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
<div class="kepalakotak">
    <p><b>add data books</b></p>

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
                <form action="books-add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-2">
                        <label for="name" class="form-label">Title</label>
                        <input type="text" name="Judul" id="Judul" class="form-control" value="{{old('Judul')}}" placeholder="title books" required>
                    </div>
                    <div class="mt-2">
                        <label for="name" class="form-label">Author</label>
                        <input type="text" name="Penulis" id="Penulis" class="form-control" value="{{old('Penulis')}}" placeholder="writer books" required>
                    </div>
                    <div class="mt-2">
                        <label for="name" class="form-label">Publisher</label>
                        <input type="text" name="Penerbit" id="Penerbit" class="form-control" value="{{old('Penerbit')}}" placeholder="publisher" required>
                    </div>
                    <div class="mt-2">
                        <label for="tahun" class="form-label">Year of publication</label>
                        <input type="number" min="1700" max="2999" step="1" value="{{old('TahunTerbit')}}" name="TahunTerbit" id="TahunTerbit" class="form-control" placeholder="year of publication" required>
                    </div>
                    <div class="mt-2">
                        <label for="name" class="form-label">Synopsis</label>
                        <textarea type="text" name="description" id="description" class="form-control h-100"  value="{{old('Penulis')}}" placeholder="writer synopsis books" required></textarea>
                    </div>
                    <div>
                        <label for="category" class="form-label">category</label>
                        <select name="categories" id="category" class="form-control "  >
                            @foreach ($categories as $item)
                            <option value="{{$item->KategoriID}}">{{$item->NamaKategori}}</option>
                            @endforeach
                        </select>
                        {{-- <div class="form-text" id="category">You can choose more than one</div> --}}
                    </div>
                    <div class="mt-2">
                        <label for="name" class="form-label">status</label>
                        <select type="text" name="status" id="status" class="form-control" value="{{old('status')}}" placeholder="status books" required>
                            <option value="">select status</option>
                            <option value="available">available</option>
                            <option value="unavailable">unavailable</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="image" class="form-label">Cover</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="cover books">
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <button class="btn btn-success " type="submit">save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select-multiple').select2();
        });</script> --}}
@endsection

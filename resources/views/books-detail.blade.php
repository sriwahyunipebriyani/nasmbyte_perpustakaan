@extends('layout.mainBook')
@section('judul', 'books-detail')
@section('isi')
@if (session('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
@endif
<div class="row">
    <div class="col-lg-4 ">
        <div class="p-10 px-16 flex flex-row flex-1 justify-center  space-x-10">
            <img src="{{  $book->cover != null ? asset('storage/cover/' . $book->cover) : asset('image/Not-Found.jpg')  }}" alt="" class="h-[550px] w-[350px] object-cover rounded" height="550px" width="350px">
        </div>
    </div>
    <div class="col-lg-5">
            <div class="my-3 ">
                <h3>{{$book->Judul}}</h3>
            </div>
            
            <p><b>Detail book</b></p>
            <p class="font-semibold text-lg text-black">Penulis :{{ $book->Penulis }}</p>
            <p class="font-semibold text-lg text-black">Penerbit :{{ $book->Penerbit }} </p>
            <p class="font-semibold text-lg text-black">Tahun terbit :{{ $book->TahunTerbit }}</p>
            <p class="font-semibold text-lg text-black">Sinopsis :</p>
            <div class="p-3 max-w-full bg-greenjabar/10 rounded text-black text-justify">
                <p>{{$book->description}}</p>
            </div>
    </div>
    <div class="col-lg-3">
        <div class="flex justify-end">
            <div class=" bg-white rounded-lg shadow-md p-4">
                <button type="button" class="btn btn-primary form-control py-2 px-4 rounded " data-bs-toggle="modal" data-bs-target="#exampleModal">+ borrow</button>
                <!-- Tampilkan tombol "Tambah ke Favorit" jika buku belum ada dalam koleksi favorit -->
                
                @auth
                @if (!auth()->user()->koleksipribadi->contains($book->BukuID))
                    <form action="{{ route('books-detail.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="BukuID" value="{{ $book->BukuID }}">
                        <button type="submit" class="btn btn-light form-control mt-2"><i class="bi bi-bookmark"></i> save</button>
                    </form>
                <!-- Tampilkan tombol "Hapus dari Favorit" jika buku sudah ada dalam koleksi favorit -->
                @else
                    <form action="{{ route('books-detail.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="BukuID" value="{{ $book->BukuID }}">
                        <button type="submit" class="btn btn-light form-control mt-2"><i class="bi bi-bookmark-fill"></i> unsave</button>
                    </form>
                @endif
            @endauth
            
            </div>
        </div>
        
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Peminjaman Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form untuk memasukkan data peminjaman buku -->
                <form action="{{ route('books.rent', ['BukuID' => $book->BukuID]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul" placeholder="Masukkan judul buku" value="{{ $book->Judul }}" >
                        <!-- Nilai buku diambil dari data yang telah dipass dari kontroller -->
                    </div>
                    {{-- <div class="mb-3">
                        <label for="borrowerName" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" id="borrowerName" name="borrowerName" placeholder="Masukkan nama peminjam"  value="{{$user->username}}" required>
                    </div> --}}
                    <div class="mb-3">
                        <label for="borrowDate" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="borrowDate" name="borrowDate" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- ulasan --}}
    <!-- Form untuk menyimpan ulasan baru -->
    <div class="container my-3">

        <form method="POST" action="{{ route('books-detail.storeulasan', ['BukuID' => $book->BukuID]) }}">
            @csrf
            <div class="form-group">
                <label for="Ulasan">Ulasan:</label>
                <textarea class="form-control" id="Ulasan" name="Ulasan" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="Rating">Rating:</label>
                <div class="rating">
                    <input type="radio"  id="star5" name="Rating" value="5">
                    <label for="star5" class="me-2" title="5 stars">5 </label>
                    <input type="radio" class="me-2"  id="star4" name="Rating" value="4">
                    <label for="star4" class="me-2"  title="4 stars">4 </label>
                    <input type="radio" class="me-2"  id="star3" name="Rating" value="3">
                    <label for="star3" class="me-2"  title="3 stars">3 </label>
                    <input type="radio" class="me-2"  id="star2" name="Rating" value="2">
                    <label for="star2" class="me-2"  title="2 stars">2 </label>
                    <input type="radio" class="me-2"  id="star1" name="Rating" value="1">
                    <label for="star1" class="me-2"  title="1 star">1 </label>
                </div>
            </div >
            <div class="mt-3">
    
                <button type="submit" class="btn btn-primary">Simpan Ulasan</button>
            </div>
        </form>
    </div>
    
@endsection

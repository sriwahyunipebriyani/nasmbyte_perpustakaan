@extends('layout.layoutMain')
@section('matahari', 'Books')
@section('tengah')

    <div class="d-flex justify-content-end mt-4">
        <a href="books-deleted-list" class="btn btn-secondary me-3">view deleted books</a>
        <a type="button" class="btn btn-primary" href="books-add" >
            + Add Data
        </a>
    </div>
    <div class="kepalakotak mt-3">halaman books</div>
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

     {{-- nyoba aja --}}
     <div class="container mt-4">
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun terbit</th>
                        {{-- <th>Catgory</th> --}}
                        <th>Status</th>
                        <th>Cover</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>no</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun terbit</th>
                        {{-- <th>Catgory</th> --}}
                        <th>Status</th>
                        <th>Cover</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $book->Judul }}</td>
                        <td>{{ $book->Penulis }}</td>
                        <td>{{ $book->Penerbit }}</td>
                        <td>{{ $book->TahunTerbit }}</td>
                        {{-- <td>
                        @foreach ($book->categories as $category)
                            {{$category->NamaKategori}}<br>
                        @endforeach
                    </td> --}}
                        <td>{{ $book->status }}</td>
                        <td>
                            <img src="{{ asset('storage/cover/' . $book->cover) }}" style="height: 80px">
                        </td>
                        <td>

                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#Modaledit">
                                <a href="books-edit/{{ $book->slug }}">edit</a>
                            </button>
                            <a class="btn btn-danger" data-bs-toggle="modal"
                                href="#EditModalToggle-{{ $book->slug }}" role="button">Delete</a>
                        </td>
                    </tr>
                    <!-- Modal Konfirmasi -->
                    <div class="modal fade" id="EditModalToggle-{{ $book->slug }}" aria-hidden="true"
                        aria-labelledby="EditModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="EditModalToggleLabel">Modal 1</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Show a second modal and hide this one with the button below.
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                                        data-bs-toggle="modal">
                                        <a href="/books">close</a>
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        <a href="/books-destroy/{{ $book->slug }}">delete</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
@endsection

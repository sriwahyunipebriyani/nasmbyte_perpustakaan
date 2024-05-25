@extends('layout.layoutMain')
@section('matahari','category')
@section('tengah')

<div class="d-flex justify-content-end mt-4">
    <a href="/category-deleted-list" class="btn btn-secondary me-2" type="button">deleted category</a>
    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        + add
      </a>
      
</div>

<div class="kepalakotak mt-3">
    <p>Category book list</p>
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
 {{-- nyoba aja --}}
 <div class="container mt-4">
    <div class="table-responsive">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category Books</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Category Books</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($categories as $item)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>{{$item->NamaKategori}}</td>
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Modaledit-{{$item->slug}}">
                            edit
                    </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$item->slug}}">
                            Delete
                        </button>
                    </td>
                </tr>
                {{-- modal add --}}
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title " id="staticBackdropLabel">Add category</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('category-add.store') }}" method="POST">
                                    @csrf
                                    <div class="mt-2">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="NamaKategori" id="NamaKategori" class="form-control" placeholder="Category name">
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                {{-- moal edit --}}
                <div class="modal fade" id="Modaledit-{{$item->slug}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Books Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('category.update', $item->slug) }}" method="POST">
                                @csrf
                                @method('put')
                                <div>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="NamaKategori" id="NamaKategori" value="{{$item->NamaKategori}}" class="form-control" placeholder="Category name">
                                </div>
                                <div class="mt-3">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                    <!-- Modal Konfirmasi -->
                <div class="modal" id="deleteModal-{{$item->slug}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus data ini?
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    <a href="/category">  Batal</a>
                                </button>

                                <button type="submit" class="btn btn-danger">
                                    <a href="/category-destroy/{{$item->slug}}">delete</a>
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

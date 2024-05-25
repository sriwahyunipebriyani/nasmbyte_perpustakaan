@extends('layout.layoutMain')
@section('matahari','boosk-deleted')
@section('tengah')

<div class="d-flex justify-content-end mt-4">
    <a href="books" class="btn btn-secondary me-3">Back</a>
    
</div>
<div class="container mt-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    
    <div class="table-responsive">
        <table class="table">
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
            <tbody>
                @foreach ($deletedBooks as $item )
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>{{ $item->Judul }}</td>
                    <td>{{ $item->Penulis }}</td>
                    <td>{{ $item->Penerbit }}</td>
                    <td>{{ $item->TahunTerbit }}</td>
                    {{-- <td>
                        @foreach ($book->categories as $category )
                            {{$category->NamaKategori}}<br>
                        @endforeach
                    </td> --}}
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->cover }}</td>
                    <td>
                        <a href="books-restore/{{$item->slug}}" class="btn btn-outline-secondary">Restore</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
<div class="konek"></div>
@endsection
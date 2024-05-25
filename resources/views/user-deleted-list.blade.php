@extends('layout.layoutMain')
@section('matahari','users-deleted')
@section('tengah')

<div class="d-flex justify-content-end mt-4">
    <a href="users" class="btn btn-secondary me-3">Back</a>

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

    <table class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedUser as $item )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->namaLengkap}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>
                            <a type="button" href="user-restore/{{$item->slug}}" class="btn btn-outline-secondary">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </table>
</div>
<div class="konek"></div>
@endsection

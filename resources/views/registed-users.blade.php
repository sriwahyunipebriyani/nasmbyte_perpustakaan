@extends('layout.layoutMain')
@section('matahari','users | new regist')
@section('tengah')
<div class="d-flex justify-content-end">

    <a class="button btn btn-secondary me-2" href="/users" >
    Back
    </a>

</div>
    <div class="kepalakotak mt-4">
        <p><b>The page for users who have newly registered and are not yet active.</b></p>
    </div>
    <div class="container mt-3">
        <div class="table-responsive">
            <table class="table">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->namaLengkap}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>
                                <button type="button" class="btn btn-info ">
                                    <a href="/user-detail/{{ $item->slug }}">Detail</a>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </table>
        </div>
    </div>

@endsection

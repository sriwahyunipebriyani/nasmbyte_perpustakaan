    @extends('layout.layoutMain')
    @section('matahari','users')
    @section('tengah')
        <div class="d-flex justify-content-end mt-4">
            <a class="button btn btn-secondary me-2" href="/user-deleted-list" >
                View Banned User
            </a>
            <a class="button btn btn-primary" href="/registed-users">
                New Register User
            </a>
        </div>
        <div class="kepalakotak mt-3">
            User list
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
                            <table id="datatablesSimple">
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
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($user as $item )
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->namaLengkap}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>
                                            <a  class="btn btn-info " href="/user-detail/{{$item->slug}}">
                                                Detail
                                            </a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$item->slug}}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
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
                                                        <a href="/users">  Batal</a>
                                                    </button>
                
                                                    <button type="submit" class="btn btn-danger">
                                                        <a href="/user-destroy/{{$item->slug}}">delete</a>
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

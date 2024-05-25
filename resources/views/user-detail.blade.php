@extends('layout.mainLayout')
@section('title','users | detail')
@section('content')
<div class="d-flex justify-content-end mt-4">
    @if($user->status == 'inactive')
    <a class="button btn btn-primary" href="/user-approve/{{ $user->slug }}" >Approve user
    </a>
    @endif
</div>
@if (session('status'))
<div class="alert alert-success mt-3">
    {{ session('status') }}
</div>
@endif
<div class="kepalakotak mt-4">
    <p><b>halaman list user detail</b></p>
</div>
<div class="container mt-3">
        <div>
            <p><b>Details of users who accessed the library </b></p>
        </div>
        <div class="mt-3">
            <label class="form-label">Email </label>
            <input type="email" class="form-control" readonly value="{{ $user->email }}" name="email" id="email" placeholder="Enter email address" required  />
        </div>
        <div class="column">
        <div class="mt-2">
            <label class="form-label">Full Name</label>
            <input type="text" name="namaLengkap" id="namaLengkap" readonly value="{{ $user->namaLengkap }}" class="form-control" placeholder="Enter your name" required />
        </div>
        <div class="mt-2">
            <label class="form-label">Username</label>
            <input type="text" name="username" id="username" readonly value="{{ $user->username }}" class="form-control" placeholder="Enter username" required />
        </div>
        <div class="mt-2">
            <label for="Address" class="form-label">Addres</label>
            <textarea  name="alamat" id="alamat" cols="30" rows="5" class="form-control" readonly style="resize: none" required>{{ $user->alamat }}</textarea>
        </div>
        <div class="mt-2">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" readonly value="{{ $user->status }}" name="status" id="status" placeholder="Enter your status" required  />
        </div>
        <div class="mt-3">
            <h4><b>User rent log</b></h4>
            <x-rent-log-table :rentlog='$rent_logs'/>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <a href="/users" class="btn btn-secondary form-control">Back</a>
        </div>
    </div>
</div>
<div class="konek"></div>
@endsection

@extends('layout.layoutMain')
@section('matahari','book a rent')
@section('tengah')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="kepalakotak mt-3 ">
    <b>form books rent</b>
</div>
@if (session('message'))
<div class="alert mt-3 {{session('alert-class')}}">
    {{ session('message') }}
</div>
@endif
    <div class="container mt-3 ">
        <form action="book-rent" method="POST">
            @csrf
            <div class="mb-3 ">
                <label for="user" class="form-label">User</label>
                <select name="UserID" id="UserID" class="form-control js-example-basic-single">
                    <option value="">Select User</option>
                    @foreach ($users as $item )
                        <option value="{{$item->UserID}}">{{$item->username}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="books" class="form-label">Books</label>
                <select name="BukuID" id="BookID" class="form-control js-example-basic-single">
                    <option value="">Select Books</option>
                    @foreach ($books as $item )
                        <option value="{{$item->BukuID}}">{{$item->Judul}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-100">submit</button>
            </div>
        </form>
    </div>
    <div class="konek"></div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection
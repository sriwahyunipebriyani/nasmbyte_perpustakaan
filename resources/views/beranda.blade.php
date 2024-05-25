@extends('layout.mainBook')
@section('judul', 'beranda')
@section('isi')
    <div class="kotak mt-3">
        <div class="my-2">

            <b>home page</b>
        </div>
    </div>
    <div class="container mt-3">
        <p><b>home page</b></p>
        <hr>
        <div class="my-2 text-center">
            <strong>
                <h6>
                    Welcome to Nasmbyte library {{Auth::user()->username}} <br><br>
                    "The more that you read, the more things you will know. The more that you learn, the more places you'll go." - Dr. Seuss
                </h6>

            </strong>
        </div>
    </div>
@endsection

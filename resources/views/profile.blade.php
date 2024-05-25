@extends('layout.mainBook')
@section('title','profile')
@section('isi')
    <div class="kotak my-4">
        <h4 class="text-center text-2xl font-bold mb-2 pb-1 border-b-2 border-blue-500" style="color: #3884BC;""><b>Your rent log</b></h4>
    </div>
    <div class="container">
        <x-rent-log-table :rentlog='$rent_logs'/>
    </div>
@endsection
@extends('layout.layoutMain')
@section('matahari','RentLog')
@section('tengah')
    <div class="kepalakotak mt-4">
        <b>Rent log list</b>
    </div>
    
    <div class="container mt-3">
        <x-rent-log-table :rentlog='$rent_logs'/>
    </div>
    <div class="konek"></div>
@endsection
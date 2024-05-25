<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;

class RentLogController extends Controller
{
    public function index()
    {
        $renlogs = peminjaman::with(['user','book'])->get();
        return view('rentLog',['rent_logs'=> $renlogs]);
    }
}
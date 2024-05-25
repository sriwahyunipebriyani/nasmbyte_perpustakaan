<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\books;
use App\Models\peminjaman;
use App\Models\ulasanbukus;
use App\Models\kategoribuku;

class DashboardController extends Controller
{
    public function index()
    {
        // $request->session()->flush();
        $bookCount = books::count();
        $categories = kategoribuku::all();
        $categoryCount = kategoribuku::count();
        $userCount = User::count();
        $ulasanCount = ulasanbukus::count();
        
        $renlogs = peminjaman::with(['user','book'])->get();
        return view('dashboard', ['book_count' => $bookCount, 'category_count' => $categoryCount, 'user_count' => $userCount, 'ulasan_buku' => $ulasanCount,'rent_logs' => $renlogs,'categories' => $categories]);
        // dd(Auth::user());
    }
    public function berandaProfile(){
        $categories = kategoribuku::all();
        return view('beranda',['categories' => $categories]);
    }
}
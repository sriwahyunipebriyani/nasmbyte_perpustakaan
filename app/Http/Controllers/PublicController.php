<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\kategoribuku;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request) {
        $categories = kategoribuku::all();
        $book = books::all();
        return view('homePage',['book' => $book, 'categories' => $categories]);
    }

    public function buku(Request $request) {
        $categories = kategoribuku::all();
        
        if ($request->category || $request->Judul) {
            $book = books::where('Judul', 'like','%'.$request->Judul.'%')->get();
            // $categories = kategoribuku::whereHas('categories', function($q) use($request){
                // $q->where('KategoriID', $request->category);
                //         })->get();
            }else {
                $book = books::all();
                
                // echo"kesalahan pada sistem";
        }

        return view('books-list',['book' => $book, 'categories' => $categories]);
    }


}
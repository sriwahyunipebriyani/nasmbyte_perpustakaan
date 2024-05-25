<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\kategoribuku;
use Illuminate\Http\Request;
use App\Models\koleksipribadi;

class FavoriteController extends Controller
{
    public function index()
    {
        $categories = kategoribuku::all();
        $user = auth()->user();
        $favorites = $user->koleksipribadi()->paginate(10);

        return view('collection.index', ['favorites' => $favorites,'categories' => $categories]);
    }

    public function addFavorite(Request $request)
    {
        $user = auth()->user();
        $book = books::findOrFail($request->BukuID);

        $user->koleksipribadi()->attach($book);

        return redirect()->back()->with('message', 'Book added to favorites successfully');
    }

    public function removeFavorite(Request $request)
    {
        $user = auth()->user();
        $book = books::findOrFail($request->BukuID);
    
        $user->koleksipribadi()->detach($book);
    
        return redirect()->back()->with('message', 'Book removed from favorites successfully');
    }
    
}
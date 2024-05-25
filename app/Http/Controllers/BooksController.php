<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\kategoribuku;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = books::all();
        return view('books', ['books' => $books]);
    }
    public function add()
    {
        $categories = kategoribuku::all();
        return view('books-add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([
            'Judul' => 'required|max:255',
            'Penulis' => 'required|max:255',
            'Penerbit' => 'required|max:255',
            'TahunTerbit' => 'required|max:255',
        ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->Judul . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAS('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = books::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Books Added Successfully !');
    }
    public function edit($slug)
    {
        $books = books::where('slug', $slug)->first();
        $categories = kategoribuku::all();
        return view('books-edit', ['books' => $books, 'categories' => $categories]);
    }
    public function update(Request $request, $slug)
    {
        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->Judul . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAS('cover', $newName);
            $request['cover'] = $newName;
        }

        $books = books::where('slug', $slug)->first();
        $books->update($request->all());

        if ($request->categories) {
            $books->categories()->sync($request->categories);
        }
        return redirect('books')->with('status', 'Books Updated Successfully !');

    }
    public function delete($slug)
    {
        $book = books::where('slug', $slug)->first();
        return view('books-delete', ['book' => $book]);
    }
    public function destroy($slug)
    {
        $book = books::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Books Deleted Successfullly !');
    }
    public function deletedBooks()
    {
        $deletedBooks = books::onlyTrashed()->get();
        return view('books-deleted-list', ['deletedBooks' => $deletedBooks]);
    }
    public function restore($slug)
    {
        $books = books::withTrashed()->where('slug', $slug)->first();
        $books->restore();
        return redirect('books')->with('status', 'books restore Successfully!');
    }
    public function detail($slug)
    {
        $book = books::where('slug', $slug)->first();
        $categories = kategoribuku::all();
        return view('books-detail', ['book' => $book, 'categories' => $categories]);
    }
}
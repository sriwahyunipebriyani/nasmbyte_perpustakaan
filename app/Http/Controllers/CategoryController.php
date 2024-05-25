<?php

namespace App\Http\Controllers;

use App\Models\kategoribuku;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = kategoribuku::all();
        return view('category', ['categories' => $categories]);
    }
    public function add()
    {

        $categories = kategoribuku::all();
        return view('category-add', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NamaKategori' => 'required|unique:kategoribukus|max:255',

        ]);
        $category = kategoribuku::create($request->all());
        return redirect('category')->with('status', 'Categori Added Successlly !');
    }
    public function edit($slug)
    {
        $category = kategoribuku::where('slug', $slug)->first();
        return view('category-edit', ['category' => $category]);
    }
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'NamaKategori' => 'required|unique:kategoribukus|max:255',

        ]);
        $category = kategoribuku::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('category')->with('status', 'Categori Updated Successlly !');
    }
    public function delete($slug)
    {
        $category = kategoribuku::where('slug', $slug)->first();
        return view('category-delete', ['category' => $category]);
    }
    public function destroy($slug)
    {

        $category = kategoribuku::where('slug', $slug)->first();
        $category->delete();
        return redirect('category')->with('status', 'Categori Deleted Successlly !');
    }
    public function deletedCategory()
    {
        $deletedCategories = kategoribuku::onlyTrashed()->get();
        return view('category-deleted-list', ['deletedCategories' => $deletedCategories]);
    }
    public function restore($slug)
    {
        $category = kategoribuku::withTrashed()->where('slug', $slug)->first();
        // dd($category);
        $category->restore();
        return redirect('category')->with('status', 'Categori restore Successlly !');
    }
}

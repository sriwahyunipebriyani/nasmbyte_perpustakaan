<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\books;
use App\Models\peminjaman;
use App\Models\ulasanbukus;
use App\Models\kategoribuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()  {
        $users = User::where('UserID','!=',1)->where('status', '!=', 'inactive-')->get();
        $books = books::all();
        return view('book-rent',['users' => $users, 'books' => $books]);
    }
    public function store(Request $request) {
        $request['TanggalPeminjaman'] = Carbon::now()->toDateString();
        $request['TanggalPengembalian'] = Carbon::now()->addDay(3)->toDateString();

        $book = books::findOrFail($request->BukuID)->only('status');

        if($book['status'] != 'available'){
            Session::flash('message', 'Cannot rent the book is not available!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        }else{
            $count = peminjaman::where('UserID' , $request->UserID)->where('actual_return_date', null)
            ->count();

            if($count >= 3){
                Session::flash('message', 'Cannot rent ,user has reach limit of book!');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }else{
                try {
                    DB::beginTransaction();
                    // Proses insert to rent books table
                    peminjaman::create($request->all());
                    // proses update book table
                    $book = books::findOrFail($request->BukuID);
                    $book->status = 'unavailable';
                    $book->save();
                    DB::commit();

                    Session::flash('message', "Your book rental has been successful!");
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();

                }
            }

        }
    }

    public function rent(Request $request, $BukuID)
    {
        // Mendapatkan user yang sedang login
        $user = auth()->user(); 
                
        // Mendapatkan informasi buku
        $book = books::findOrFail($BukuID);

        // Membuat tanggal peminjaman
        $borrowDate = Carbon::now(); 

        // Membuat tanggal pengembalian default 3 hari setelah peminjaman
        $returnDate = $borrowDate->copy()->addDays(3); 

        if ($book['status'] != 'available') {
            Session::flash('message', 'Cannot rent the book is not available!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }else{

            // Menyimpan data peminjaman
            $bookRent = new peminjaman();
            $bookRent->UserID = $user->UserID;
            $bookRent->BukuID = $book->BukuID;
            $bookRent->TanggalPeminjaman = $borrowDate;
            $bookRent->TanggalPengembalian	= $returnDate;
            $bookRent->save();
    
            // Mengubah status buku menjadi dipinjam
            $book->status = 'unavailable';
            $book->save();
    
    
            return redirect()->back()->with('message', 'Buku berhasil dipinjam.');
        }
    }

    public function returnBook() {
        $users = User::where('UserID','!=',1)->where('status', '!=', 'inactive-')->get();
        $books = books::all();
        return view('return-book',['users' => $users, 'books' => $books]);
    }
    public function getBooksByUser($UserID)
{
    $books = books::whereHas('peminjaman', function ($query) use ($UserID) {
        $query->where('UserID', $UserID)->whereNull('actual_return_date');
    })->pluck('Judul', 'BukuID');

    $options = '<option value="">Select Books</option>';
    foreach ($books as $key => $value) {
        $options .= '<option value="' . $key . '">' . $value . '</option>';
    }

    return $options;
}
    

    public function saveReturnBook(Request $request)  {
        // user & buku yang diplih benar,maka berhasil return
        $rent = peminjaman::where('UserID', $request->UserID)->where('BukuID', $request->BukuID)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();
        

        if($countData == 1){
           // Mengubah status buku menjadi 'available' dengan mengakses langsung tabel Buku
            $book = books::find($request->BukuID);
            $book->status = 'available';
            $book->save();
            // kita akan return book
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'The book has been successfully returned');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-return');
        }else{
            // user dan buku yang di pilih salah maka notifiasi error
            Session::flash('message', 'The book has error process');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');

        }
    }
    public function detail($BukuID)
    {   $categories = kategoribuku::all();
        $book = Book::findOrFail($BukuID);
        // Menggunakan relationship 'reviews' yang telah didefinisikan di model Book
        $reviews = ulasanbukus::where('BukuID', $BukuID)->get();

        return view('books-detail', compact('book', 'reviews','categories'));
    }
    public function storeulasan(Request $request, $BukuID)  {
        $categories = kategoribuku::all();
        $book = books::findOrFail($BukuID);
        $ulasans = ulasanbukus::where('BukuID', $BukuID)->get();

        $request->validate([
            'Ulasan' => 'required',
            'Rating' => 'required|numeric|min:1|max:5',
        ]);

        $ulasan = new ulasanbukus();
        $ulasan->BukuID = $BukuID;
        $ulasan->UserID = auth()->id();
        $ulasan->Ulasan = $request->Ulasan;
        $ulasan->Rating = $request->Rating;
        $ulasan->save();

        Session::flash('message', 'The book has been successfully comment');
        Session::flash('alert-class', 'alert-success');
        // return redirect('books-detail');
        return view('books-detail', ['book' => $book,'ulasans' => $ulasans, 'categories' => $categories]);
    }
    
}
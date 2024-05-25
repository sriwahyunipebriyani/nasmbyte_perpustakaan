<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Route
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/',[PublicController::class, 'index']);
Route::get('books-list',[PublicController::class, 'buku']);


Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'regist']);
    Route::post('register', [AuthController::class, 'registerProsess']);

});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');
Route::middleware(['only_admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::get('books', [BooksController::class, 'index']);
    Route::get('books-add', [BooksController::class, 'add']);
    Route::post('books-add', [BooksController::class, 'store']);
    Route::get('books-edit/{slug}', [BooksController::class, 'edit']);
    Route::post('books-edit/{slug}', [BooksController::class, 'update']);
    Route::get('books-delete/{slug}', [BooksController::class, 'delete']);
    Route::get('books-destroy/{slug}', [BooksController::class, 'destroy']);
    Route::get('books-deleted-list', [BooksController::class, 'deletedBooks']);
    Route::get('books-restore/{slug}', [BooksController::class, 'restore']);

    Route::get('category', [CategoryController::class, 'index']);
    Route::resource('category-add', CategoryController::class);
    Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
    Route::resource('category', CategoryController::class);
    Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
    Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
    Route::get('category-deleted-list', [CategoryController::class, 'deletedCategory']);
    Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('registed-users', [UserController::class, 'registeredUser']);
    Route::get('user-detail/{slug}', [UserController::class, 'show']);
    Route::get('user-approve/{slug}', [UserController::class, 'approve']);
    Route::get('user-delete/{slug}', [UserController::class, 'delete']);
    Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
    Route::get('user-deleted-list', [UserController::class, 'deletedUser']);
    Route::get('user-restore/{slug}', [UserController::class, 'restore']);


});


Route::get('/collection', [FavoriteController::class, 'index'])->name('collection.index');
Route::post('/books-detail/add', [FavoriteController::class, 'addFavorite'])->name('books-detail.add');
Route::post('/books-detail/remove', [FavoriteController::class, 'removeFavorite'])->name('books-detail.remove');

Route::get('books-detail/{slug}',[BooksController::class, 'detail']);

Route::get('beranda', [DashboardController::class, 'berandaProfile']);

Route::get('/book/{BukuID}/list', [BookRentController::class, 'detail'])->name('book-list.detail');
Route::post('/book/{BukuID}/detail', [BookRentController::class, 'storeulasan'])->name('books-detail.storeulasan');
Route::post('/books/{BukuID}/rent', [BookRentController::class, 'rent'])->name('books.rent');
Route::get('book-return',[BookRentController::class, 'returnBook']);
Route::get('get-books/{UserID}', [BookRentController::class, 'getBooksByUser']);
Route::post('book-return',[BookRentController::class, 'saveReturnBook']);
Route::get('book-rent',[BookRentController::class,'index']);
Route::post('book-rent',[BookRentController::class,'store']);
Route::get('rentLog', [RentLogController::class, 'index']);

});
<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\books;
use App\Models\peminjaman;
use App\Models\kategoribuku;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $categories = kategoribuku::all();
        $renlogs = peminjaman::with(['user','book'])->where('UserID', Auth::user()->UserID)->get();
        return view('profile',['categories' => $categories ,'rent_logs' => $renlogs]);
        // dd(Auth::user());
    }
    public function index()
    {
        $user = User::where('RolesID',2)->where('status','active')->get();
        return view('users', ['user' => $user]);
    }
    public function registeredUser()
    {
        $user = User::where('status','inactive')->where('RolesID' ,2)->get();
        return view('registed-users', ['user' => $user]);
    }
    public function show($slug)  {
        $user = User::where('slug',$slug)->first();
        $renlogs = peminjaman::with(['user','book'])->where('UserID', $user->UserID)->get();
        return view('user-detail',['user' => $user, 'rent_logs' => $renlogs]);
    }
    public function approve($slug) {
    $user = User::where('slug', $slug)->first();
    $user->status = 'active';
    $user->save();

    return redirect()->back()->with('status', 'User Approved Successfully !');
}
    public function delete($slug)  {
        $user = User::where('slug', $slug)->first();
       return view('user-delete',['user' => $user]);
    }
    public function destroy($slug)  {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status',' User Banned  Successfullty !');
    }
    public function deletedUser()  {

        $deletedUser = User::onlyTrashed()->get();
        return view('user-deleted-list', ['deletedUser' => $deletedUser]);
    }
    public function restore($slug)  {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status',' User restore Successfullty !');

    }
}
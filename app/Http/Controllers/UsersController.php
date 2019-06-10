<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function usersListing() {
        $users = User::with('hats')->where('id', 1)->get();
        return view('user-listing', compact('users'));
        // return view('user-listing')->with(['users'=>$users]);
    }
}

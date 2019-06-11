<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hat;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginFormRequest;

class UsersController extends Controller
{
    public function usersListing() {
        $users = User::with('hats')->where('id', 1)->get();
        return view('user-listing', compact('users'));
        // return view('user-listing')->with(['users'=>$users]);
    }

    public function getLogin() {
        return view('login');
    }

    public function postLogin(LoginFormRequest $request) {

        // return [
        //     $request->$username,
        //     $request->$password
        // ];

        // $input = [
        //     'username' => request()->get('username'),
        //     'password' => request()->get('password')
        // ];

        // $validator = Validator::make($input, $rules, $messages);

        // if($validator->fails()) {
        //     return redirect('/login-test')
        //     ->withErrors($validator)
        //     ->withInput();
        // }

        // return $validator->messages();

        $user=User::find(1);

        Auth::attempt([
            'email'=>$request->username, 
            'password'=>$request->password
        ]);
        return redirect()->route('home');

    }

    public function assignHat() {

        $hat = Hat::create([
            'name' => 'Jimmy'
        ]);

        $user = User::find(2);
        $user->hats()->save($hat);

        // UserHat::create([
        //     'user_id'=>auth()->user()->id,
        //     'hat_id'=>100
        // ]);

        // auth()->user();

        $hats = Hat::with('owner')->get();

        // $hats=Hat::with('owner', function ($query) {
        //     $query->where('user_id', 50);
        // })->get();

        return $hats;

        // return view('hats', compact('hats'));
    }
}

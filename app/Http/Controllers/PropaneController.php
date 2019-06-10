<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropaneController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function getAllPosts() {
        return response()->json(['message' => 'hello']);
    }

    public function test($id) {
        return request()->get('search').' '.$id;;
    }

    public function postData() {
        //$data = request()->all();
        return request()->get('name');
    }
}

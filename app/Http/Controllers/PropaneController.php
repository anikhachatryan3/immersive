<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropaneController extends Controller {
    public function getAllPosts() {
        return response()->json(['message' => 'hello']);
    }
}

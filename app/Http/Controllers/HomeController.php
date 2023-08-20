<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function home() {
        $posts = DB::table('posts')->get();
        return view('home', ['posts' => $posts]);
    }

    public function about() {
        return view('about');
    }
}

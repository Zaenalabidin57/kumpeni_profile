<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home', [
            'title' => 'Selamat Datang Di Blog Kami',
            'posts' => Post::latest()->limit(3)
        ]);
    }
}

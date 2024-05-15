<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home', [
            'title' => 'Selamat Datang Di Blog Kami',
            'posts' => Post::where('status', 1)->latest()->limit(3)->get()
        ]);
    }
    public function contact()
    {
        return view('frontend.pages.contact', [
            'title' => 'Selamat Datang di Sekolah Tinggi Manajemen Informatika'
        ]);
    }

    public function about()
    {
        return view('frontend.pages.about', [
            'title' => 'Selamat Datang di Sekolah Tinggi Manajemen Informatika'
        ]);
    }

    public function blog_index()
    {
        $items = Post::where('status', 1)->latest()->get();
        return view('frontend.pages.blog.index', [
            'title' => 'Berita Terbaru',
            'items' => $items
        ]);
    }
    public function blog_detail($slug)
    {
        $item = Post::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('frontend.pages.blog.show', [
            'title' => $item->title,
            'item' => $item
        ]);
    }
}

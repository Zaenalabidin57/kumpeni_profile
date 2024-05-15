<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'users' => User::count(),
            'posts' => auth()->user()->posts()->count(),
            'post_categories' => PostCategory::count(),
            'post_tags' => PostTag::count()
        ];
        $post_latests = Post::with('category','user')->latest()->limit(10)->get();
       return view('admin.pages.dashboard',[
        'title' => 'Dashboard',
        'count' => $count,
        'post_latests' => $post_latests
       ]);
    }
}

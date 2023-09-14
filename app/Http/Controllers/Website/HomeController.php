<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        /// avoid n+1 problem
        // $posts=Post::whereDoesntHave('categories')->get();
        // $posts=Post::whereHas('categories')->get();
        $posts = Post::with('user')->with('categories');

        if (request('search')) {
            $posts = $posts->where('title', 'like', '%' . request('search') . '%');

        }
        $posts = $posts->latest()->paginate(2);

        return view('home', compact('posts'));
    }
}

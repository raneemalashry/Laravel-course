<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // n+1 problem  posts with user
        //  $posts=Post::with('user')->get();
        // foreach($posts as $post){
        //     dd($post->user);
        // }
        //    dd($post->user());
// user posts
        $posts = Auth::user()->posts()->get();  //auth()->user()->posts;

        dD($posts);
        //    dd($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            // auth()->user()->id
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('home')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return "Hello From Show Website Post Id :" . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

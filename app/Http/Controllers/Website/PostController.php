<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
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
        $categories=Category::all();
        return view('posts.create' ,compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // dd($request->all());
        // dd($request->file('image'));
        // dd($request->file('image')->getClientOriginalExtension());
        $imageName=time().'.'.$request->file('image')->getClientOriginalExtension();
        // dd($imageName);
        // dd(public_path('storage/posts'));

        $request->file('image')->move(public_path('storage/posts'), $imageName);

        $post= Post::create([
            'title' => $request->title,
            'content' => $request->content,
            // auth()->user()->id
            'user_id' => auth()->id(),
            'image'=>$imageName
        ]);
        // dd($post);

        //attach [id,id,id,id]
        $post->categories()->attach($request->categories);
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
    public function edit(Post $post)
    {
        $categories=Category::all();
        $selectedCategories =$post->categories()->pluck('categories.id')->toArray();
        // dd($selectedCategories);
        return view('posts.edit', compact('post' , 'categories' , 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        if($request->hasfile('image')){
            if(file_exists(public_path($post->image_path))){
                unlink(public_path($post->image_path));
            }
            $imageName=time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/posts'), $imageName);

        }
        // dd($request->all() , $post);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'image'=>$imageName ?? $post->image
        ]);
        //sync
        $post->categories()->sync($request->categories);
        return redirect()->route('home')->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(file_exists(public_path($post->image_path))){
            unlink(public_path($post->image_path));
        }
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('home')->with('success', 'Post Deleted Successfully');
    }
}

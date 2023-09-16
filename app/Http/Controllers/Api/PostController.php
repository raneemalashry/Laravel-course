<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest();
        if(request('search'))
        {
            $posts=$posts->where('title' , 'like' , '%'.request('search').'%');
        }
        $posts=$posts->get();
        return responseJson('success', 'all posts', PostResource::collection($posts)->paginate(2));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => "required|string|max:255",
            'content' => "required|string",
            'categories' => 'required|array|exists:categories,id',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',

        ]);
        if ($validator->fails()) {
            return responseJson('error', 'validation Failed', $validator->errors());
        }
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('storage/posts'), $imageName);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth('api')->user()->id,
            'image' => $imageName,

        ]);
        $post->categories()->attach($request->categories);
        return responseJson('success', 'post created successfully', new PostResource($post));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $validator = Validator::make($request->all(), [
            'title' => "required|string|max:255",
            'content' => "required|string",
            'categories' => 'required|array|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',

        ]);
        if ($validator->fails()) {
            return responseJson('error', 'validation Failed', $validator->errors());
        }
        if ($request->image) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/posts'), $imageName);
            $post->update(['image' => $imageName]);

        }
        $post->update([
            'title'=>$request->title,
            'content'=>$request->content,
        ]);
        $post->categories()->sync($request->categories);
        return responseJson('success' , 'post updatedd successfully' , new PostResource($post));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        /// delete image / categoriess
        $post->delete();
        return responseJson('success' , 'post deleted successfully');
    }
}

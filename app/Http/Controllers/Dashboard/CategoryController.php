<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories =Category::all();
        // $categories= Category::where('id','!=' , 1)->get();
        // $categories= Category::latest()->get();
        //pagination
        // $categories= Category::latest()->simplePaginate(2);
        $categories = Category::latest()->paginate();

        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // dd($request->validated());
        // Category::create([
        //     'name'=>$request->name
        // ]);
        Category::create($request->validated());
        // return redirect()->back()->with('success', "Category Created Successfully");
        return redirect()->route('dashboard.categories.index')->with('success', "Category Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //Model Binding
        // $category=Category::where('id' , $id)->first();
        // $category=Category::findorfail($id);
        return view('dashboard.categories.edit'  , compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update(['name'=>$request->name]);
        return redirect()->route('dashboard.categories.index')->with('success', "Category Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
       $category->delete();
       return redirect()->route('dashboard.categories.index')->with('success', "Category Deleted Successfully");

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(2);
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'slug' => 'nullable',
            'meta_title' => 'required|string',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required'
        ]);

        if (empty($request->slug)) {
            $slug = Str::slug($request->title);
            // dd($slug);
        } else {
            $slug = $request->slug;
        }
        $sql = Category::create([
            'name' => $request->name,
            'title' => $request->title,
            'slug' => $slug,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => $request->status,
        ]);

        if ($sql) {
            return redirect()->route('category.index')->with('success', 'Category has been successfully added.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
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
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'slug' => 'nullable',
            'meta_title' => 'required|string',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required'
        ]);
        $sql = $category->update([
            'name' => $request->name,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => $request->status,
        ]);

        if ($sql) {
            return redirect()->route('category.index')->with('success', 'Category has been successfully updated.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $sql = $category->delete();
        if ($sql) {
            return redirect()->route('category.index')->with('success', 'Category has been successfully deleted.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}

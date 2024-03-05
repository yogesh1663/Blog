<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(3);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get(['id', 'title']);
        return view('admin.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->slug == NULL || $request->slug == "") {
            $slug = Str::slug($request->title);
        } else {
            $slug = $request->slug;
        }

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/post/', $filename);

        $request->validate([
            'title' => 'required|string',
            'slug' => 'nullable|unique:posts,slug',
            'image' => 'required|image',
            'description' => 'required',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required',
        ]);

        $query = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category,
            'image' => $filename,
            'description' => $request->description,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => $request->status
        ]);

        if ($query) {
            return redirect()->route('post.index')->with('success', 'Post has been successfully created');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::get(['id', 'title']);
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {


        $request->validate([
            'title' => 'required|string',
            'slug' => 'nullable|unique:posts,slug,' . $post->id,
            'image' => 'nullable|image',
            'description' => 'required',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required',
        ]);
        if ($request->slug == NULL || $request->slug == "") {
            $slug = Str::slug($request->title);
        } else {
            $slug = $request->slug;
        }

        if ($request->image) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/post/', $filename);
            if ($post->image) {
                if (Storage::exists('public/post/' . $post->image)) {
                    Storage::delete('public/post/' . $post->image);
                }
            }
        }
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category_id = $request->category;
        if ($request->image) {
            $post->image = $filename;
        }
        $post->description = $request->description;
        $post->meta_description = $request->meta_description;
        $post->meta_keywords = $request->meta_keywords;
        $post->status = $request->status;
        $query = $post->save();

        if ($query) {
            return redirect()->route('post.index')->with('success', 'Post has been successfully updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            if (Storage::exists('public/post/' . $post->image)) {
                Storage::delete('public/post/' . $post->image);
            }
        }
        $query = $post->delete();
        if ($query) {
            return redirect()->route('post.index')->with('success', 'Post has been successfully deleted.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'posts' => Post::count(),
            'categories' => Category::count(),
            'tags' => Tag::count(),
            'users' => User::count(),
        ];

        return view('dashboard.index', compact('stats'));
    }

    // Categories
    public function categories()
    {
        $categories = Category::withCount('posts')->get();
        return view('dashboard.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:categories']);
        Category::create($request->only('name'));
        return back()->with('success', 'Category added successfully!');
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('success',' Category deleted successfully!');
    }

    // Tags
    public function tags()
    {
        $tags = Tag::withCount('posts')->get();
        return view('dashboard.tags', compact('tags'));
    }

    public function storeTag(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:tags']);
        Tag::create($request->only('name'));
        return back()->with('success', 'Tag added successfully!');
    }

    public function deleteTag($id)
    {
        Tag::findOrFail($id)->delete();
        return back()->with('success', 'Tag deleted successfully!');
    }

    // Posts
    public function posts()
    {
        $posts = Post::with(['user', 'category'])->latest()->paginate(20);
        return view('dashboard.posts', compact('posts'));
    }

    public function deletePost($id)
    {
        Post::findOrFail($id)->delete();
        return back()->with('success', 'post deleted successfully');
    }
  }
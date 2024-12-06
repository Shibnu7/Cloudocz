<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::all();
        return view('blog.index', compact('posts'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload if there is one
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create the blog post
        BlogPost::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->status ? 1 : 0, // Ensure status is set correctly
        ]);

        return redirect()->route('blog-posts.index')->with('success', 'Blog post created successfully!')->with('image_path', $imagePath);
    }

    public function show(BlogPost $blogPost)
    {
        return view('blog.show', compact('blogPost'));
    }

    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit', compact('blogPost'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blogPost->title = $request->title;
        $blogPost->description = $request->description;
        $blogPost->content = $request->content;
        $blogPost->status = $request->status ? 1 : 0;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blogPost->image) {
                Storage::disk('public')->delete($blogPost->image);
            }
            $blogPost->image = $request->file('image')->store('images', 'public');
        }

        $blogPost->save();
        return redirect()->route('blog-posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(BlogPost $blogPost)
    {
        if ($blogPost->image) {
            Storage::disk('public')->delete($blogPost->image);
        }
        $blogPost->delete();
        return redirect()->route('blog-posts.index')->with('success', 'Post deleted successfully.');
    }
}

@extends('layouts.app')

@section('content')
<h1>Create Blog Post</h1>
<form action="{{ route('blog-posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Title</label>
        <input type="text" name="title" required>
    </div>
    <div>
        <label>Description</label>
        <textarea name="description" required></textarea>
    </div>
    <div>
        <label>Content</label>
        <textarea name="content" required></textarea> <!-- Use WYSIWYG editor here -->
    </div>
    <div>
        <label>Image</label>
        <input type="file" name="image">
    </div>
    <div>
        <label>Status</label>
        <input type="checkbox" name="status" value="1" checked>
    </div>
    <button type="submit">Create Post</button>
</form>

@if(session('image_path'))
    <h3>Uploaded Image:</h3>
    <img src="{{ asset('storage/' . session('image_path')) }}" alt="Uploaded Image" width="200">
@endif
@endsection

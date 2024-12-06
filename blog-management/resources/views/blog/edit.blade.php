@extends('layouts.app')

@section('content')
<h1>Edit Blog Post</h1>
<form action="{{ route('blog-posts.update', $blogPost) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ $blogPost->title }}" required>
    </div>
    <div>
        <label>Description</label>
        <textarea name="description" required>{{ $blogPost->description }}</textarea>
    </div>
    <div>
        <label>Content</label>
        <textarea name="content" required>{{ $blogPost->content }}</textarea> <!-- Use WYSIWYG editor here -->
    </div>
    <div>
        <label>Image</label>
        <input type="file" name="image">
        @if ($blogPost->image)
            <h3>Current Image:</h3>
            <img src="{{ asset('storage/' . $blogPost->image) }}" alt="Post Image" width="100">
        @endif
    </div>
    <div>
        <label>Status</label>
        <input type="checkbox" name="status" value="1" {{ $blogPost->status ? 'checked' : '' }}>
    </div>
    <button type="submit">Update Post</button>
</form>
@endsection

@extends('layouts.app')

@section('content')
<h1>Blog Posts</h1>
<a href="{{ route('blog-posts.create') }}">Create New Post</a>

<!-- Success Message Alert -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @php session()->forget('success'); @endphp
@endif

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->status ? 'Enabled' : 'Disabled' }}</td>
                <td>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="50">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a href="{{ route('blog-posts.edit', $post) }}">Edit</a>
                    <form action="{{ route('blog-posts.destroy', $post) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@extends('layouts.app')

@section('title', 'manage posts ')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 text-start">
        <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Back to Dashboard</a>
        <h2>Manage Posts</h2>
    </div>
    <div class="card-body">
        @if($posts->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">View</a>
                                    <form method="POST" action="{{ route('dashboard.posts.delete', $post->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this post?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
                                        {{ Str::limit($post->title, 50) }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-muted">No posts available.</p>
        @endif
    </div>
@endsection
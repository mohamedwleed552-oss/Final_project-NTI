@extends('layouts.app')

@section('title', 'Posts List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-start">All Posts</h2>
    @auth
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    @endauth
</div>

@if($posts->count() > 0)
    @foreach($posts as $post)
        <div class="card text-start mb-3">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">{{ $post->title }}</a>
                </h5>
                <p class="card-text">{{ Str::limit($post->content, 200) }}</p>
                
                <div class="mb-2">
                    <span class="badge bg-secondary">{{ $post->category->name }}</span>
                    @foreach($post->tags as $tag)
                        <span class="tag">{{ $tag->name }}</span>
                    @endforeach
                </div>
                
                <small class="text-muted">
                    By: {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}
                </small>
            </div>
        </div>
    @endforeach
    
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@else
    <div class="alert alert-info text-start">
        <h4>No Posts Available</h4>
        <p>Be the first to create a post!</p>
        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
        @endauth
    </div>
@endif


@endsection
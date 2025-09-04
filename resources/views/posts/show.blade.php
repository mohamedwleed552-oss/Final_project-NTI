@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="card">
    <div class="card-body text-start">
        <h1 class="card-title">{{ $post->title }}</h1>
        <div class="mb-3">
            <span class="badge bg-secondary">{{ $post->category->name }}</span>
            @foreach($post->tags as $tag)
                <span class="badge bg-info text-dark">{{ $tag->name }}</span>
            @endforeach
        </div>
        <p class="card-text">{{ $post->content }}</p>
        <small class="text-muted">
            By: {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}
        </small>
    </div>
</div>

<!-- Comments Section -->
<div class="mt-4 text-start">
    <h4>Comments ({{ $post->comments->count() }})</h4>
    
    @auth
        <div class="card mt-3">
            <div class="card-body">
                <form method="POST" action="{{ route('posts.comments.store', $post->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="content" class="form-label">Add a Comment</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            </div>
        </div>
    @endauth
    
    @foreach($post->comments as $comment)
        <div class="card mt-3">
            <div class="card-body">
                <p class="card-text">{{ $comment->content }}</p>
                <small class="text-muted">
                    By: {{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}
                </small>
            </div>
        </div>
    @endforeach
    
    @if($post->comments->count() == 0)
        <p class="text-muted mt-3">No comments yet.</p>
    @endif
</div>

<div class="mt-4 text-start">
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
</div>

@endsection
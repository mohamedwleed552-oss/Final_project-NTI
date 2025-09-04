@extends('layouts.app')

@section('title', '  Create new Post ')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card text-start">

            <div class="card-header">

                <h4>Create Post</h4>

            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('posts.store') }}">

                    @csrf

                    <div class="mb-3">

                        <label for="title" class="form-label">Title</label>

                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>

                    </div>

                    

                    <div class="mb-3">

                        <label for="content" class="form-label">Content</label>

                        <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>

                    </div>

                    

                    <div class="mb-3">

                        <label for="category_id" class="form-label">Category</label>

                        <select class="form-control" id="category_id" name="category_id" required>

                            <option value="">Select Category</option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    

                    <div class="mb-3">

                        <label class="form-label">Tags</label>

                        <div class="row">

                            @foreach($tags as $tag)

                                <div class="col-md-4">

                                    <div class="form-check">

                                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}"

                                            {{ is_array(old('tags')) && in_array($tag->id, old('tags')) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="tag{{ $tag->id }}">

                                            {{ $tag->name }}

                                        </label>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                    

                    <button type="submit" class="btn btn-primary">Create Post</button>

                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>

                </form>

            </div>

        </div>

    </div>

</div>
@endsection
@extends('layouts.app')

@section('title', 'manage tags ')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Back to Dashboard</a>
        <h2 class="fw-bold">Manage Tags</h2>
    </div>
    <!-- Add Tag Form -->
    <div class="card-header text-start">
        <h5 class="text-start">Add New Tag</h5>
    </div>
    <div class="card mb-4">
        <div class="card-header text-start">
            <h5 class="text-start">Add New Tag</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.tags.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">Add</button>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" placeholder="Tag Name" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Tags List -->
    <div class="card">
        <div class="card-header">
            <h5>Tags List</h5>
        </div>
        <div class="card-body">
            @if($tags->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped text-start">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Posts Count</th>
                                <th>Created At</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>
                                        <form method="POST" action="{{ route('dashboard.tags.delete', $tag->id) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this tag?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td>{{ $tag->posts_count }}</td>
                                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                                    <td>{{ $tag->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">No tags available.</p>
            @endif
        </div>
    </div>
@endsection
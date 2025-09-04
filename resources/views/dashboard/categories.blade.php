@extends('layouts.app')

@section('title', 'manage Categories ')

@section('content')
    <div class="card mb-4 text-start">
        <div class="card-header">
            <h5>Add New Category</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.categories.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">Add</button>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" placeholder="Category Name" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories List -->
    <div class="card text-start">
        <div class="card-header">
            <h5>Categories List</h5>
        </div>
        <div class="card-body">
            @if($categories->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Posts Count</th>
                                <th>Created At</th>
                                <th class="text-start">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <form method="POST" action="{{ route('dashboard.categories.delete', $category->id) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this category?')"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td>{{ $category->posts_count }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td class="text-start">{{ $category->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">No categories available.</p>
            @endif
        </div>
    </div>

< @endsection
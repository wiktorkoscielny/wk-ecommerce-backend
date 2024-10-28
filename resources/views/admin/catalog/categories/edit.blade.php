@extends('admin.layouts.app')

@section('content')
    <h2>Edit Category</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Category Name -->
        <div>
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        </div>

        <!-- Description -->
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ $category->description }}</textarea>
        </div>

        <br />

        <!-- Save and Continue Editing -->
        <button type="submit" class="btn btn-primary" name="action" value="save_continue">Save and Continue Editing</button>

        <!-- Save Changes -->
        <button type="submit" class="btn btn-success" name="action" value="save">Save Changes</button>

        <!-- Go Back -->
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Go Back</a>
    </form>

    <!-- Delete Product (Separate form for delete) -->
    <form action="{{ route('admin.categories.destroy', $product->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete Category</button>
    </form>
@endsection

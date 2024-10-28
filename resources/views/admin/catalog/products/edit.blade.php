@extends('admin.layouts.app')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div>
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" required>
        </div>

        <!-- Description -->
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ $product->description }}</textarea>
        </div>

        <!-- Price -->
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}" required>
        </div>

        <!-- Stock -->
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required>
        </div>

        <br />

        <!-- Save and Continue Editing -->
        <button type="submit" class="btn btn-primary" name="action" value="save_continue">Save and Continue Editing</button>

        <!-- Save Changes -->
        <button type="submit" class="btn btn-success" name="action" value="save">Save Changes</button>

        <!-- Go Back -->
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Go Back</a>
    </form>

    <!-- Delete Product (Separate form for delete) -->
    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete Product</button>
    </form>
@endsection

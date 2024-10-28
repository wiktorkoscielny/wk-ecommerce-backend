@extends('admin.layouts.app')

@section('content')
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 mt-6">Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="bg-white p-6 rounded-md shadow-md space-y-4">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div>
            <label for="name" class="block text-gray-700 font-medium">Product Name</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" required
                   class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-gray-700 font-medium">Price</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}" required
                   class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Stock -->
        <div>
            <label for="stock" class="block text-gray-700 font-medium">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required
                   class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea name="description" id="description"
                      class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ $product->description }}</textarea>
        </div>

        <!-- Buttons Section -->
        <div class="flex items-center space-x-3 mt-6">
            <!-- Save and Continue Editing -->
            <button type="submit" name="action" value="save_continue"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-150">
                Save and Continue Editing
            </button>

            <!-- Save Changes -->
            <button type="submit" name="action" value="save"
                    class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-150">
                Save Changes
            </button>

            <!-- Go Back -->
            <a href="{{ route('admin.products.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-150">
                Go Back
            </a>
        </div>
    </form>

    <!-- Delete Product (Separate form for delete) -->
    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-150"
                onclick="return confirm('Are you sure you want to delete this product?');">
            Delete Product
        </button>
    </form>
@endsection

@extends('admin.layouts.app')

@section('content')
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 mt-6">Edit Category</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="bg-white p-6 rounded-md shadow-md space-y-4">
        @csrf
        @method('PUT')

        <!-- Category Name Field -->
        <div>
            <label for="name" class="block text-gray-700 font-medium">Category Name</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" required
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Description Field -->
        <div>
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea name="description" id="description"
                      class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ $category->description }}</textarea>
        </div>

        <div class="mt-6 space-x-2">
            <!-- Save and Continue Editing -->
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-150" name="action" value="save_continue">
                Save and Continue Editing
            </button>

            <!-- Save Changes -->
            <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded-md hover:bg-green-600 transition duration-150" name="action" value="save">
                Save Changes
            </button>

            <!-- Go Back -->
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-400 text-white font-bold py-2 px-4 rounded-md hover:bg-gray-500 transition duration-150">
                Go Back
            </a>
        </div>
    </form>

    <!-- Delete Category (Separate form for delete) -->
    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded-md hover:bg-red-600 transition duration-150" onclick="return confirm('Are you sure you want to delete this category?');">
            Delete Category
        </button>
    </form>
@endsection

@extends('admin.layouts.app')

@section('content')

    <h2 class="text-3xl font-semibold text-gray-800 mb-6 mt-6">Create New Product</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" class="bg-white p-6 rounded-md shadow-md space-y-4">
        @csrf

        <!-- Product Name Field -->
        <div>
            <label for="name" class="block text-gray-700 font-medium">Product Name</label>
            <input type="text" name="name" id="name" required
                   class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Price Field -->
        <div>
            <label for="price" class="block text-gray-700 font-medium">Price</label>
            <input type="text" name="price" id="price" required
                   class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Stock Field -->
        <div>
            <label for="stock" class="block text-gray-700 font-medium">Stock</label>
            <input type="number" name="stock" id="stock" required
                   class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Description Field -->
        <div>
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea name="description" id="description"
                      class="min-h-[200px] w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit"
                    class="md:max-w-52 mt-4 w-full bg-green-500 text-white font-bold py-2 rounded-md hover:bg-green-600 transition duration-150">
                Create
            </button>
        </div>
    </form>

@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="p-6 bg-gray-100">

        <!-- Page Title -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Products</h2>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 border border-green-200 rounded p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Bar -->
        <form method="GET" action="{{ route('admin.products.index') }}" class="mb-4 flex space-x-2">
            <input type="text" name="search" placeholder="Search products..." value="{{ request()->get('search') }}"
                   class="flex-grow px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Search
            </button>
        </form>

        <!-- Add New Product Button -->
        <a href="{{ route('admin.products.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600">
            Add New Product
        </a>

        <!-- Reusable Grid Component -->
        <x-grid
            :headers="['ID', 'Name', 'Price', 'Stock']"
            :fields="['id', 'name', 'price', 'stock']"
            :items="$products->items()"
            :paginator="$products"
            :editRoute="'admin.products.edit'"
            :deleteRoute="'admin.products.destroy'"
            :bulkDeleteRoute="'admin.products.bulkDelete'"
        />

        <!-- Pagination Links -->
        @if ($products->count() > 0)
            <div class="mt-4">
                {{ $products->links() }} <!-- Pagination with Tailwind styling -->
            </div>
        @else
            <div class="bg-yellow-100 text-yellow-800 border border-yellow-200 rounded p-4 mt-4">
                No products found.
            </div>
        @endif
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">

        <!-- Page Title -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Categories</h2>

        <!-- Add New Root Category Button -->
        <a href="{{ route('admin.categories.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600">
            Add New Root Category
        </a>

        <!-- Category Tree Wrapper -->
        <div x-data="{ open: false }" class="space-y-4">
            @foreach ($categories as $category)
                @if (is_null($category->parent_id))
                    <!-- Include Category Item Partial -->
                    @include('admin.catalog.categories.partials.category-item', ['category' => $category])
                @endif
            @endforeach
        </div>

    </div>
@endsection

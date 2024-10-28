@extends('admin.layouts.app')

@section('content')
    <h2>Categories</h2>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add New Root Category</a>

    <div x-data="{ open: false }" class="category-tree">
        @foreach ($categories as $category)
            @if (is_null($category->parent_id))
                @include('admin.catalog.categories.partials.category-item', ['category' => $category])
            @endif
        @endforeach
    </div>

@endsection


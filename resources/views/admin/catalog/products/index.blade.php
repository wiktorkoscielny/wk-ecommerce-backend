@extends('admin.layouts.app')

@section('content')
    <h2>Products</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Search Bar -->
    <form method="GET" action="{{ route('admin.products.index') }}">
        <input type="text" name="search" placeholder="Search products..." value="{{ request()->get('search') }}" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-2">Add New Product</a>

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
        <div class="mt-3">
            {{ $products->links() }} <!-- Add pagination links -->
        </div>
    @else
        <div class="alert alert-warning mt-3">No products found.</div>
    @endif
@endsection

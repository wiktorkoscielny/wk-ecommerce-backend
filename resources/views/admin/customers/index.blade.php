@extends('admin.layouts.app')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">

        <!-- Page Title -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Customers</h2>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 border border-green-200 rounded p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Bar -->
        <form method="GET" action="{{ route('admin.customers.index') }}" class="mb-4 flex space-x-2">
            <input type="text" name="search" placeholder="Search customers..." value="{{ request()->get('search') }}"
                   class="flex-grow px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Search
            </button>
        </form>

        <!-- Add New Customer Button -->
        <a href="{{ route('admin.customers.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600">
            Add New Customer
        </a>

        <!-- Reusable Grid Component -->
        <x-grid
            :headers="['ID', 'Name', 'Email']"
            :fields="['id', 'name', 'email']"
            :items="$customers->items()"
            :paginator="$customers"
            :editRoute="'admin.customers.edit'"
            :deleteRoute="'admin.customers.destroy'"
            :bulkDeleteRoute="'admin.customers.bulkDelete'"
        />

        <!-- Pagination Links -->
        @if ($customers->count() > 0)
            <div class="mt-4">
                {{ $customers->links() }}
            </div>
        @else
            <div class="bg-yellow-100 text-yellow-800 border border-yellow-200 rounded p-4 mt-4">
                No customers found.
            </div>
        @endif
    </div>
@endsection

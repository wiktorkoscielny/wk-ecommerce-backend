@extends('admin.layouts.app')

@section('content')
    <h2>Customers</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('admin.customers.index') }}">
        <input type="text" name="search" placeholder="Search customers..." value="{{ request()->get('search') }}" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <a href="{{ route('admin.customers.create') }}" class="btn btn-primary mb-2">Add New Customer</a>

    <x-grid
        :headers="['ID', 'Name', 'Email']"
        :fields="['id', 'name', 'email']"
        :items="$customers->items()"
        :paginator="$customers"
        :editRoute="'admin.customers.edit'"
        :deleteRoute="'admin.customers.destroy'"
        :bulkDeleteRoute="'admin.customers.bulkDelete'"

    />

    @if ($customers->count() > 0)
        <div class="mt-3">
            {{ $customers->links() }}
        </div>
    @else
        <div class="alert alert-warning mt-3">No customers found.</div>
    @endif
@endsection

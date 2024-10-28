@extends('admin.layouts.app')

@section('content')
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 mt-6">Edit Customer</h2>

    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" class="bg-white p-6 rounded-md shadow-md space-y-4">
        @csrf
        @method('PUT')

        <!-- Customer Name Field -->
        <div>
            <label for="name" class="block text-gray-700 font-medium">Customer Name</label>
            <input type="text" name="name" id="name" value="{{ $customer->name }}" required
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ $customer->email }}" required
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Password Field -->
        <div>
            <label for="password" class="block text-gray-700 font-medium">Password</label>
            <input type="password" name="password" id="password" required
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <div class="flex items-center space-x-3 mt-6">
            <!-- Save and Continue Editing Button -->
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-150" name="action" value="save_continue">
                Save and Continue Editing
            </button>

            <!-- Save Changes Button -->
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-150" name="action" value="save">
                Save Changes
            </button>

            <!-- Go Back Link -->
            <a href="{{ route('admin.products.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-150">
                Go Back
            </a>
        </div>
    </form>

    <!-- Delete Customer Form -->
    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-150"
                onclick="return confirm('Are you sure you want to delete this customer?');">
            Delete Customer
        </button>
    </form>
@endsection

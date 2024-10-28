@extends('admin.layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold text-gray-800 mb-6 mt-6">Create New Customer</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oh no!</strong>
            <span class="block sm:inline">Please fix the following errors:</span>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.customers.store') }}" method="POST" class="bg-white p-6 rounded-md shadow-md space-y-4">
        @csrf

        <!-- Name Field -->
        <div>
            <label for="name" class="block text-gray-700 font-medium">Name</label>
            <input type="text" name="name" id="name" required
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" id="email" required
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Password Field -->
        <div>
            <label for="password" class="block text-gray-700 font-medium">Password</label>
            <input type="password" name="password" id="password" required
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="md:max-w-52 mt-4 w-full bg-green-500 text-white font-bold py-2 rounded-md hover:bg-green-600 transition duration-150">
                Create
            </button>
        </div>
    </form>
@endsection

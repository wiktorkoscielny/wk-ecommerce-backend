<!-- resources/views/admin/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
<div class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
    <!-- Title -->
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Admin Login</h2>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <ul class="list-disc ml-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Login Form -->
    <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
        @csrf
        <!-- Email Field -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-100">
        </div>

        <!-- Password Field -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" id="password" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-100">
        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition duration-200">
            Login
        </button>
    </form>
</div>
</body>
</html>

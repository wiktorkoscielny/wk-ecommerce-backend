<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 h-screen flex flex-col">
<div x-data="{ sidebarOpen: false }" class="flex flex-1">
    <!-- Fixed Sidebar -->
    <aside :class="{'block': sidebarOpen, 'hidden': !sidebarOpen, 'fixed': true, 'w-64': true, 'bg-gray-800': true, 'text-white': true, 'min-h-screen': true, 'p-4': true}"
           class="hidden lg:block" x-data="{activeTab: '{{ Route::currentRouteName() }}'}">
        <h2 class="text-lg font-bold">Admin Panel</h2>
        <nav class="mt-6">
            <div x-data="{ open: activeTab.includes('admin.dashboard') ? true : false }"
                 :class="{ 'bg-gray-700': activeTab.includes('admin.dashboard')}">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex justify-between w-full p-2 rounded hover:bg-gray-700 focus:outline-none"
                   :class="{ 'bg-gray-700': activeTab === 'admin.dashboard' }">
                    <span>Dashboard</span>
                </a>
            </div>
            <div x-data="{ open: activeTab.includes('admin.products') || activeTab.includes('admin.categories') ? true : false }" class="mt-4">
                <button @click="open = !open" class="flex justify-between w-full p-2 rounded hover:bg-gray-700 focus:outline-none">
                    <span>Catalog</span>
                    <span x-show="!open">+</span>
                    <span x-show="open">-</span>
                </button>
                <div x-show="open" class="ml-4">
                    <a href="{{ route('admin.products.index') }}" class="block py-1 hover:bg-gray-700 rounded"
                       :class="{ 'bg-gray-700': activeTab.includes('admin.products')}">Products</a>
                    <a href="{{ route('admin.categories.index') }}" class="block py-1 hover:bg-gray-700 rounded"
                       :class="{ 'bg-gray-700': activeTab.includes('admin.categories')}">Categories</a>
                </div>
            </div>
            <div x-data="{ open: activeTab.includes('admin.customers') }" class="mt-4">
                <button @click="open = !open" class="flex justify-between w-full p-2 rounded hover:bg-gray-700 focus:outline-none">
                    <span>Customers</span>
                    <span x-show="!open">+</span>
                    <span x-show="open">-</span>
                </button>
                <div x-show="open" class="ml-4">
                    <a href="{{ route('admin.customers.index') }}" class="block py-1 hover:bg-gray-700 rounded"
                       :class="{ 'bg-gray-700': activeTab.includes('admin.customers')}">Customers</a>
                </div>
            </div>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 ml-0 lg:ml-64 p-6 flex flex-col">
        <!-- Header -->
        <header class="pb-4 pt-4 flex justify-between items-center mb-4 sticky top-0 bg-gray-100 z-10 border-b-2 border-gray-800">
            <h1 class="text-2xl font-bold">Admin Panel</h1>

            <!-- Mobile toggle button -->
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 text-gray-800 bg-white rounded focus:outline-none">
                Menu
            </button>

            <nav class="hidden lg:flex space-x-4">
                <a href="{{ route('admin.dashboard') }}" class="no-underline hover:no-underline text-gray-800 hover:underline py-2 px-4 rounded-md hover:bg-gray-200 transition">Dashboard</a>
                <a href="{{ route('admin.logout') }}"
                   class="no-underline hover:no-underline text-red-500 hover:underline py-2 px-4 rounded-md hover:bg-red-100 transition"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </nav>

            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </header>

        <!-- Scrollable Content -->
        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</div>

<!-- Footer -->
<footer class="mt-6 text-center bg-gray-200">
    <hr>
    <p>&copy; 2024 Wiktor Koscielny E-commerce Project</p>
</footer>
</body>
</html>

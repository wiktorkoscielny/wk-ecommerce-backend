@props(['category'])

<div class="category-item" x-data="{ open: false }">
    <div class="flex items-center mb-2">
        <!-- Button to toggle visibility of children categories -->
        <button
            @click="open = !open"
            class="text-sm text-gray-600 hover:text-gray-800 focus:outline-none"
            x-show="{{ $category->children->isNotEmpty() ? 'true' : 'false' }}"
        >
            <span x-show="!open">+</span>
            <span x-show="open">-</span>
        </button>

        <!-- Category name -->
        <span class="ml-2 text-gray-800 font-medium">{{ $category->name }}</span>

        <!-- Edit Button -->
        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning text-sm bg-yellow-500 text-white px-2 py-1 rounded ml-3 hover:bg-yellow-400">Edit</a>

        <!-- Delete Form -->
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline ml-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm text-white bg-red-500 px-2 py-1 rounded hover:bg-red-400" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
        </form>

        <!-- Add Subcategory Button -->
        <a href="{{ route('admin.categories.create', ['parent_id' => $category->id]) }}" class="text-sm text-white bg-blue-500 px-2 py-1 rounded ml-3 hover:bg-blue-400">Add Subcategory</a>
    </div>

    <!-- Children categories -->
    <div x-show="open" class="ml-4">
        @foreach ($category->children as $childCategory)
            <x-categoryTree :category="$childCategory" />
        @endforeach
    </div>
</div>

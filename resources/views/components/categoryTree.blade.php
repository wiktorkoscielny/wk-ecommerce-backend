@props(['category'])

<div class="category-item border-b border-gray-200 py-3" x-data="{ open: false }">
    <div class="flex items-center mb-2">

        <!-- Toggle Button for Child Categories -->
        <button
            @click="open = !open"
            class="flex items-center justify-center w-8 h-8 bg-gray-200 text-gray-700 hover:bg-gray-300 hover:text-gray-900 rounded-full transition duration-150"
            x-show="{{ $category->children->isNotEmpty() ? 'true' : 'false' }}"
        >
            <span x-show="!open" class="text-2xl font-bold leading-none">+</span>
            <span x-show="open" class="text-2xl font-bold leading-none">-</span>
        </button>

        <!-- Category Name -->
        <span class="ml-4 text-gray-800 font-semibold">{{ $category->name }}</span>

        <!-- Action Buttons -->
        <div class="ml-auto flex space-x-2">

            <!-- Edit Button -->
            <a href="{{ route('admin.categories.edit', $category->id) }}"
               class="bg-yellow-500 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-md hover:bg-yellow-400 hover:shadow-lg transition duration-150">
                Edit
            </a>

            <!-- Delete Form -->
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-md hover:bg-red-400 hover:shadow-lg transition duration-150"
                        onclick="return confirm('Are you sure you want to delete this category?');">
                    Delete
                </button>
            </form>

            <!-- Add Subcategory Button -->
            <a href="{{ route('admin.categories.create', ['parent_id' => $category->id]) }}"
               class="bg-blue-500 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-md hover:bg-blue-400 hover:shadow-lg transition duration-150">
                Add Subcategory
            </a>
        </div>
    </div>

    <!-- Child Categories -->
    <div x-show="open" class="ml-10 pl-6 border-l-2 border-gray-300 space-y-2 transition duration-150">
        @foreach ($category->children as $childCategory)
            <x-categoryTree :category="$childCategory" />
        @endforeach
    </div>
</div>

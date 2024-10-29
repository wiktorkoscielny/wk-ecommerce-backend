<div class="ml-2 category-item border-b border-gray-200 py-2" x-data="{ open: false }">
    <div class="flex items-center space-x-2">

        <!-- Toggle Button -->
        <button @click="open = !open"
                class="w-8 h-8 flex items-center justify-center bg-gray-200 text-gray-700 rounded-full hover:bg-gray-300 transition duration-150 focus:outline-none">
            <span x-show="!open" x-transition class="text-xl font-bold leading-none">+</span>
            <span x-show="open" x-transition class="text-xl font-bold leading-none">-</span>
        </button>

        <!-- Category Name -->
        <span class="text-gray-800 font-medium">{{ $category->name }}</span>

        <!-- Action Buttons -->
        <div class="ml-auto flex space-x-2">

            <!-- Edit Button -->
            <a href="{{ route('admin.categories.edit', $category->id) }}"
               class="bg-yellow-500 text-white text-sm font-semibold px-3 py-1 rounded-md hover:bg-yellow-400 transition duration-150 shadow">
                Edit
            </a>

            <!-- Delete Form -->
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 text-white text-sm font-semibold px-3 py-1 rounded-md hover:bg-red-400 transition duration-150 shadow"
                        onclick="return confirm('Are you sure you want to delete this category?');">
                    Delete
                </button>
            </form>

            <!-- Add Subcategory Button -->
            <a href="{{ route('admin.categories.create', ['parent_id' => $category->id]) }}"
               class="bg-blue-500 text-white text-sm font-semibold px-3 py-1 rounded-md hover:bg-blue-400 transition duration-150 shadow">
                Add Subcategory
            </a>
        </div>
    </div>

    <!-- Child Categories -->
    <div x-show="open" x-transition class="ml-10 mt-2 pl-4 border-l-2 border-gray-300 space-y-2 transition duration-150">
        @foreach ($category->children as $child)
            @include('admin.catalog.categories.partials.category-item', ['category' => $child])
        @endforeach
    </div>
</div>

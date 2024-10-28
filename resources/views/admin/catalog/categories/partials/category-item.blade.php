<div class="ml-1 category-item" x-data="{ open: false }">
    <div class="d-flex align-items-center">
        <button @click="open = !open" class="btn btn-sm">
            <span x-show="!open">+</span>
            <span x-show="open">-</span>
        </button>

        <span class="ml-2">{{ $category->name }}</span>

        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm ml-3">Edit</a>

        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
        </form>

        <a href="{{ route('admin.categories.create', ['parent_id' => $category->id]) }}" class="btn btn-primary btn-sm ml-3">Add Subcategory</a>
    </div>

    <div x-show="open" class="ml-4">
        @foreach ($category->children as $child)
            @include('admin.catalog.categories.partials.category-item', ['category' => $child])
        @endforeach
    </div>
</div>

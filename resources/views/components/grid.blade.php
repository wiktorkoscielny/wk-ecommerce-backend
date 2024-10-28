@props(['headers', 'fields', 'items', 'editRoute', 'deleteRoute', 'bulkDeleteRoute'])

<div class="p-6 bg-white rounded-lg shadow-md">
    <!-- Bulk Delete Button -->
    @isset($bulkDeleteRoute)
        <button id="bulk-delete-btn" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded mb-4">
            Delete Selected
        </button>
    @endisset

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <input type="checkbox" id="select-all" class="rounded">
                </th>
                @foreach ($headers as $header)
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $header }}
                    </th>
                @endforeach
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

            @if(count($items) === 0)
                <tr>
                    <td colspan="{{ count($headers) + 2 }}" class="px-4 py-2 text-center text-gray-500">
                        No products found.
                    </td>
                </tr>
            @else
                @foreach ($items as $item)
                    <tr>
                        <td class="px-4 py-2">
                            <input type="checkbox" name="selected[]" value="{{ $item->id }}" class="item-checkbox rounded">
                        </td>
                        @foreach ($fields as $field)
                            <td class="px-4 py-2 text-gray-700">{{ $item->$field }}</td>
                        @endforeach
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route($editRoute, $item->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                Edit
                            </a>
                            <form method="POST" action="{{ route($deleteRoute, $item->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('select-all').addEventListener('click', function(event) {
            let checkboxes = document.querySelectorAll('.item-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
        });

        document.getElementById('bulk-delete-btn').addEventListener('click', function() {
            let selectedIds = [];
            document.querySelectorAll('.item-checkbox:checked').forEach(function(checkbox) {
                selectedIds.push(checkbox.value);
            });

            if (selectedIds.length > 0) {
                if (confirm('Are you sure you want to delete the selected items?')) {
                    fetch("{{ route($bulkDeleteRoute) }}", {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({ ids: selectedIds })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                window.location.reload();
                            } else {
                                alert('Failed to delete items.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while deleting items.');
                        });
                }
            } else {
                alert('Please select at least one item to delete.');
            }
        });
    </script>
</div>

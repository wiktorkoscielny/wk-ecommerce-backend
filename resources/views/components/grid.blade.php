<!-- resources/views/components/grid.blade.php -->
@props(['headers', 'fields', 'items', 'editRoute', 'deleteRoute', 'bulkDeleteRoute'])

<div>
    <!-- Bulk Delete Button -->
    @isset($bulkDeleteRoute)
        <button id="bulk-delete-btn" class="btn btn-danger">Delete Selected</button>
    @endisset

    <table class="table">
        <thead>
        <tr>
            <th><input type="checkbox" id="select-all"></th>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        @if(count($items) === 0)
            <tr>
                <td colspan="{{ count($headers) + 1 }}">No products found.</td>
            </tr>
        @else
            @foreach ($items as $item)
                <tr>
                    <td><input type="checkbox" name="selected[]" value="{{ $item->id }}" class="item-checkbox"></td>
                    @foreach ($fields as $field)
                        <td>{{$item->$field}}</td>
                    @endforeach
                    <td>
                        <a href="{{ route($editRoute, $item->id) }}" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ route($deleteRoute, $item->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

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

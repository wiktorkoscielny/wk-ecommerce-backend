@extends('admin.layouts.app')

@section('content')
    <h2>Edit Customers</h2>

    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Customers Name</label>
            <input type="text" name="name" id="name" value="{{ $customer->name }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $customer->email }}" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="{{ $customer->password }}" required>
        </div>
        <br />

        <button type="submit" class="btn btn-primary" name="action" value="save_continue">Save and Continue Editing</button>

        <button type="submit" class="btn btn-success" name="action" value="save">Save Changes</button>

        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Go Back</a>
    </form>

    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?');">Delete Customer</button>
    </form>
@endsection

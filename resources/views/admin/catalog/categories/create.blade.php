@extends('admin.layouts.app')
@section('content')
    <h2>Create Category</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
        </div>

        @isset($parent_id)
            <input type="hidden" name="parent_id" value="{{ $parent_id }}">
        @endisset

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

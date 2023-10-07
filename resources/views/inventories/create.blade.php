@extends('layouts.adminnavbar')

@section('content')
    <div class="container">
        <h2>Create New Inventory Item</h2>
        <form method="POST" action="{{ route('inventories.store') }}">
            @csrf
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

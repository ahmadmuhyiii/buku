@extends('layouts.adminnavbar')

@section('content')
    <div class="container">
        <h2>Edit Inventory Item</h2>
        <form method="POST" action="{{ route('inventories.update', $inventory->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ $inventory->code }}" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $inventory->name }}"
                    required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $inventory->price }}"
                    required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $inventory->stock }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

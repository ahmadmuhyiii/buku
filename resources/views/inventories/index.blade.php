@extends('layouts.adminnavbar')

@section('content')
    <div class="container">
        <h2>Inventory Items</h2>
        <a href="{{ route('inventories.create') }}" class="btn btn-success mb-2">Create New</a>
        <a href="{{ route('pdf5') }}" class="btn btn-primary mb-2">Cetak Data</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->id }}</td>
                        <td>{{ $inventory->code }}</td>
                        <td>{{ $inventory->name }}</td>
                        <td>{{ $inventory->price }}</td>
                        <td>{{ $inventory->stock }}</td>
                        <td>
                            <a href="{{ route('inventories.edit', $inventory->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

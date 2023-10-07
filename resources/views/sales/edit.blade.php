@extends('layouts.adminnavbar')

@section('content')
    <div class="container">
        <h1>Edit Penjualan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('sales.update', $sale->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="number" class="form-label">Number</label>
                <input type="text" class="form-control" id="number" name="number" value="{{ $sale->number }}">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $sale->date }}">
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Qty</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{ $sale->qty }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price"
                    value="{{ $sale->price }}">
            </div>
            <div class="mb-3">
                <label for="inventory_id" class="form-label">Inventory ID</label>
                <input type="number" class="form-control" id="inventory_id" name="inventory_id"
                    value="{{ $sale->inventory_id }}">
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $sale->user_id }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection

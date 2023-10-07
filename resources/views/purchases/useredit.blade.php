@extends('layouts.puchasesnavbar')

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

        <form method="POST" action="{{ route('purchases.userupdate', $purchase->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="number" class="form-label">Number</label>
                <input type="text" class="form-control" id="number" name="number" value="{{ $purchase->number }}"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $purchase->date }}">
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Qty</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{ $purchase->qty }}">
            </div>

            <div class="mb-3">
                <label for="inventory_id" class="form-label">Inventory ID</label>
                <select class="form-control" id="inventory_id" name="inventory_id">
                    @if (!$purchase->inventory_id)
                        <!-- Jika tidak ada nilai awal -->
                        <option value="" selected>Pilih Inventory</option>
                    @endif

                    @foreach ($inventories as $inventory)
                        <option value="{{ $inventory->id }}" data-price="{{ $inventory->price }}"
                            {{ $purchase->inventory_id == $inventory->id ? 'selected' : '' }}>
                            {{ $inventory->name }}->{{ $inventory->price }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price <small>(Tulis dengan 1000 tanpa imbuhan .00)</small></label>
                <input type="number" step="0.01" class="form-control" id="price" name="price"
                    value="{{ $purchase->price }}">
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="number" class="form-control" id="user_id" name="user_id"
                    value="{{ old('user_id', $purchase->user_id) }}" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection

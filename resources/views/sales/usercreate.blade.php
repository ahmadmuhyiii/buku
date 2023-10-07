@extends('layouts.salesnavbar')

@section('content')
    <div class="container">
        <h1>Buat Penjualan Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('sales.userstore') }}">
            @csrf
            {{-- <div class="mb-3">
                <label for="number" class="form-label">Number</label>
                <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}">
            </div> --}}
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Qty</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{ old('qty') }}">
            </div>
            <div class="mb-3">
                <label for="inventory_id" class="form-label">Inventory ID</label>
                <select class="form-control" id="inventory_id" name="inventory_id">
                    <option value="">Pilih Inventory</option>
                    @foreach ($inventories as $inventory)
                        <option value="{{ $inventory->id }}" data-price="{{ $inventory->price }}">
                            {{ $inventory->name }}->{{ $inventory->price }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price <small>(Tulis dengan 1000 tanpa imbuhan .00)</small></label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="#price">
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">User id</label>
                <input type="number" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}"
                    readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection


<script>
    $(document).ready(function() {
        // Saat "Inventory ID" dipilih
        $('#inventory_id').change(function() {
            var selectedInventoryId = $(this).val();
            var selectedInventory = $('option:selected', this);

            // Pastikan data 'price' tersedia pada option yang dipilih
            if (selectedInventory.data('price')) {
                var price = parseFloat(selectedInventory.data('price')).toFixed(2);
                $('#price').val(price);
            } else {
                // Jika data 'price' tidak tersedia, kosongkan nilai "Price"
                $('#price').val('');
            }
        });
    });
</script>

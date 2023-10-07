@extends('layouts.salesnavbar')

@section('content')
    <div class="container">
        <h1>Detail Penjualan</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $sale->id }}</td>
                </tr>
                <tr>
                    <th>Number</th>
                    <td>{{ $sale->number }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $sale->date }}</td>
                </tr>
                <tr>
                    <th>Qty</th>
                    <td>{{ $sale->qty }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $sale->price }}</td>
                </tr>
                <tr>
                    <th>Inventory ID</th>
                    <td>({{ $sale->inventory_id }}) name : {{ $sale->Getinventories->name }}</td>
                </tr>
                <tr>
                    <th>User ID</th>
                    <td>{{ $sale->user_id }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('sales.userindex') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection

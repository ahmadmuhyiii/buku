@extends('layouts.puchasesnavbar')

@section('content')
    <div class="container">
        <h1>Detail Pembelian : {{ Auth::user()->name }}</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $purchase->id }}</td>
                </tr>
                <tr>
                    <th>Number</th>
                    <td>{{ $purchase->number }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $purchase->date }}</td>
                </tr>
                <tr>
                    <th>Qty</th>
                    <td>{{ $purchase->qty }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $purchase->price }}</td>
                </tr>
                <tr>
                    <th>Inventory ID</th>
                    <td>({{ $purchase->inventory_id }}) name : {{ $purchase->Getinventories->name }}</td>
                </tr>
                <tr>
                    <th>User ID</th>
                    <td>{{ $purchase->user_id }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('purchases.userindex') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection

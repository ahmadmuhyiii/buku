@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Purchases Data</h1>
        <a href="{{ route('pdf') }}" class="btn btn-primary mb-2">Cetak Data</a>


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Inventory</th>
                    <th>Number</th>
                    <th>Date</th>
                    <th>User ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    {{-- <th>Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td>({{ $purchase->inventory_id }}) -> {{ $purchase->getInventories->name }}</td>
                        <td>{{ $purchase->number }}</td>
                        <td>{{ $purchase->date }}</td>
                        <td>({{ $purchase->user_id }}) -> {{ $purchase->getUser->name }}</td>
                        <td>{{ $purchase->qty }}</td>
                        <td>{{ $purchase->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

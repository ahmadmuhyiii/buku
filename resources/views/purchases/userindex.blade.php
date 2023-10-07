@extends('layouts.puchasesnavbar')

@section('content')
    <div class="container">
        <h1>Purchases Data</h1>
        <a href="{{ route('purchases.usercreate') }}" class="btn btn-success mb-2">Create New</a>


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Date</th>
                    <th>User ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td>{{ $purchase->number }}</td>
                        <td>{{ $purchase->date }}</td>
                        <td>{{ $purchase->user_id }}</td>
                        <td>
                            <a href="{{ route('purchases.usershow', $purchase->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('purchases.useredit', $purchase->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('purchases.userdestroy', $purchase->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

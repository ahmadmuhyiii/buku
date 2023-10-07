@extends('layouts.salesnavbar')

@section('content')
    <div class="container">
        <h1>Sales Data : {{ Auth::user()->name }}</h1>
        <a href="{{ route('sales.usercreate') }}" class="btn btn-success mb-2">Create New</a>


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
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->number }}</td>
                        <td>{{ $sale->date }}</td>
                        <td>{{ $sale->user_id }}</td>
                        <td>
                            <a href="{{ route('sales.usershow', $sale->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('sales.useredit', $sale->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('sales.userdestroy', $sale->id) }}" method="POST"
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

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Purchases Data</title>
</head>

<body>
    <h1>Purchases Data : {{ Auth::user()->name }}</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Inventory</th>
                <th>Number</th>
                <th>Date</th>
                <th>User ID</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->getInventories->name }}</td>
                    <td>{{ $purchase->number }}</td>
                    <td>{{ $purchase->date }}</td>
                    <td>{{ $purchase->getUser->name }}</td>
                    <td>{{ $purchase->qty }}</td>
                    <td>{{ $purchase->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

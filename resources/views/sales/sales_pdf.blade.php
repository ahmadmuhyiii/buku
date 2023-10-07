<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sales Data</title>
</head>

<body>
    <h1>Sales Data</h1>

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
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->getInventories->name }}</td>
                    <td>{{ $sale->number }}</td>
                    <td>{{ $sale->date }}</td>
                    <td>{{ $sale->getUser->name }}</td>
                    <td>{{ $sale->qty }}</td>
                    <td>{{ $sale->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

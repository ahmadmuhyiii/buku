<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Inventories Data</title>
</head>

<body>
    <h1>Inventories Data : {{ Auth::user()->name }}</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->id }}</td>
                    <td>{{ $inventory->code }}</td>
                    <td>{{ $inventory->name }}</td>
                    <td>{{ $inventory->price }}</td>
                    <td>{{ $inventory->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

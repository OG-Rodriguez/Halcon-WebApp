<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archived Orders</title>
</head>
<body>
    <h1>Archived Orders</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Invoice Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($archivedOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->invoice_number }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <form action="{{ route('orders.restore', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Restore</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

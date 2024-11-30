<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
</head>
<body>
    <h1>Order List</h1>
    <a href="{{ route('orders.create') }}">Create New Order</a>

    <form method="GET" action="{{ route('orders.index') }}">
        <div>
            <input type="text" name="invoice_number" placeholder="Invoice Number" value="{{ request('invoice_number') }}">
        </div>
        <div>
            <input type="text" name="customer_id" placeholder="Customer ID" value="{{ request('customer_id') }}">
        </div>
        <div>
            <select name="status">
                <option value="">Select Status</option>
                <option value="Ordered" {{ request('status') == 'Ordered' ? 'selected' : '' }}>Ordered</option>
                <option value="In process" {{ request('status') == 'In process' ? 'selected' : '' }}>In Process</option>
                <option value="In route" {{ request('status') == 'In route' ? 'selected' : '' }}>In Route</option>
                <option value="Delivered" {{ request('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>
        <div>
            <input type="date" name="order_date" value="{{ request('order_date') }}">
        </div>
        <div>
            <button type="submit">Filter</button>
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Invoice Number</th>
                <th>Customer ID</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Delivery Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->invoice_number }}</td>
                    <td>{{ $order->customer_id }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->order_date->format('Y-m-d') }}</td>
                    <td>{{ $order->delivery_address }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <form action="{{ route('orders.restore', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit">Restore</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
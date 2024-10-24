<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order</h1>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="invoice_number" value="{{ $order->invoice_number }}" required>
        <input type="text" name="customer_id" value="{{ $order->customer_id }}" required>
        <select name="status" required>
            <option value="">Select Status</option>
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_process" {{ $order->status == 'in_process' ? 'selected' : '' }}>In Process</option>
            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
            <option value="in_route" {{ $order->status == 'in_route' ? 'selected' : '' }}>In Route</option>
        </select>
        <button type="submit">Update Order</button>
    </form>
</body>
</html>

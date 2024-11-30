<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order</h1>
    <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="invoice_number">Invoice Number:</label>
            <input type="text" name="invoice_number" value="{{ $order->invoice_number }}" required>
        </div>
        <div>
            <label for="customer_id">Customer ID:</label>
            <input type="text" name="customer_id" value="{{ $order->customer_id }}" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" required>
                <option value="">Select Status</option>
                <option value="{{ \App\Models\Order::STATUS_ORDERED }}" {{ $order->status == \App\Models\Order::STATUS_ORDERED ? 'selected' : '' }}>Ordered</option>
                <option value="{{ \App\Models\Order::STATUS_IN_PROCESS }}" {{ $order->status == \App\Models\Order::STATUS_IN_PROCESS ? 'selected' : '' }}>In Process</option>
                <option value="{{ \App\Models\Order::STATUS_IN_ROUTE }}" {{ $order->status == \App\Models\Order::STATUS_IN_ROUTE ? 'selected' : '' }}>In Route</option>
                <option value="{{ \App\Models\Order::STATUS_DELIVERED }}" {{ $order->status == \App\Models\Order::STATUS_DELIVERED ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>
        <div>
            <label for="photo">Upload Photo (if applicable):</label>
            <input type="file" name="photo" id="photo">
        </div>
        <button type="submit">Update Order</button>
    </form>
</body>
</html>
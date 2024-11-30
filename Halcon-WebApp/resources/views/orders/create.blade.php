<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
</head>
<body>
    <h1>Create Order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div>
            <label for="invoice_number">Invoice Number:</label>
            <input type="text" name="invoice_number" id="invoice_number" placeholder="Invoice Number" required>
        </div>
        <div>
            <label for="customer_id">Customer ID:</label>
            <input type="text" name="customer_id" id="customer_id" placeholder="Customer ID" required>
        </div>
        <div>
            <label for="status">Select Status:</label>
            <select name="status" id="status" required>
                <option value="">Select Status</option>
                <option value="{{ \App\Models\Order::STATUS_ORDERED }}">Ordered</option>
                <option value="{{ \App\Models\Order::STATUS_IN_PROCESS }}">In Process</option>
                <option value="{{ \App\Models\Order::STATUS_IN_ROUTE }}">In Route</option>
                <option value="{{ \App\Models\Order::STATUS_DELIVERED }}">Delivered</option>
            </select>
        </div>
        <div>
            <label for="order_date">Order Date:</label>
            <input type="date" name="order_date" id="order_date" required>
        </div>
        <div>
            <label for="delivery_address">Delivery Address:</label>
            <input type="text" name="delivery_address" id="delivery_address" placeholder="Delivery Address" required>
        </div>
        <div>
            <label for="notes">Notes:</label>
            <textarea name="notes" id="notes" placeholder="Notes"></textarea>
        </div>
        <button type="submit">Create Order</button>
    </form>
</body>
</html>
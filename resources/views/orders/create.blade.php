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
        <input type="text" name="invoice_number" placeholder="Invoice Number" required>
        <input type="text" name="customer_id" placeholder="Customer ID" required>
        <select name="status" required>
            <option value="">Select Status</option>
            <option value="pending">Pending</option>
            <option value="in_process">In Process</option>
            <option value="delivered">Delivered</option>
            <option value="in_route">In Route</option>
        </select>
        <button type="submit">Create Order</button>
    </form>
</body>
</html>

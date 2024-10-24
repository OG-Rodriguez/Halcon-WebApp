<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
</head>
<body>
    <h1>Check Your Order Status</h1>
    <form action="{{ route('orders.check') }}" method="GET">
        <input type="text" name="customer_number" placeholder="Customer Number" required>
        <input type="text" name="invoice_number" placeholder="Invoice Number" required>
        <button type="submit">Check Status</button>
    </form>
</body>
</html>

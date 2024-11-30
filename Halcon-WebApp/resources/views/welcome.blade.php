<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Check</title>
</head>
<body>
    <h1>Check Your Order Status</h1>

    <form action="{{ route('orders.check') }}" method="GET">
        @csrf
        <div>
            <label for="customer_id">Customer ID:</label>
            <input type="text" name="customer_id" id="customer_id" required>
        </div>
        <div>
            <label for="invoice_number">Invoice Number:</label>
            <input type="text" name="invoice_number" id="invoice_number" required>
        </div>
        <button type="submit">Check Status</button>
    </form>
</body>
</html>

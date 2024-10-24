<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>
    <p>Customer: {{ $order->customer->name }}</p>
    <p>Invoice: {{ $order->invoice->number }}</p>
    <p>Status: {{ $order->status }}</p>
    <p>Order Date: {{ $order->order_date }}</p>
    <a href="{{ route('orders.index') }}">Back to Order List</a>
</body>
</html>
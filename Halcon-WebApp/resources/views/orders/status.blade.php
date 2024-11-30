<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
</head>
<body>
    <h1>Order Status</h1>

    <p>Customer Number: {{ $order->customer_number }}</p>
    <p>Invoice Number: {{ $order->invoice_number }}</p>
    <p>Status: {{ $order->status }}</p>

    @if ($order->status === 'Delivered')
        <h2>Delivery Photos</h2>
        @foreach ($photos as $photo)
            <img src="{{ asset($photo->photo_path) }}" alt="Delivery Photo">
        @endforeach
    @endif

    <a href="{{ url('/') }}">Back to Home</a>
</body>
</html>
<!-- resources/views/orders/status.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
</head>
<body>
    <h1>Order Status for Invoice {{ $invoiceNumber }}</h1>
    <p>Status: {{ $orderStatus }}</p>
    <a href="{{ route('home') }}">Back to Home</a>
</body>
</html>

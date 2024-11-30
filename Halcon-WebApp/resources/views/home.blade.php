<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Your Order Status</title>
</head>
<body>
    <h1>Check Your Order Status</h1>
    <form action="{{ route('orders.check') }}" method="GET">
        <input type="text" name="customer_number" placeholder="Customer Number" required>
        <input type="text" name="invoice_number" placeholder="Invoice Number" required>
        <button type="submit">Check Status</button>
    </form>

    {{-- Assuming $orderStatus is passed to this view --}}
    @if(isset($orderStatus))
        @if($orderStatus == 'delivered')
            <h2>Your order has been delivered!</h2>
            <img src="{{ $deliveryPhoto }}" alt="Delivery Photo">
        @elseif($orderStatus == 'in_process')
            <h2>Your order is in process.</h2>
            <p>Process Name: {{ $processName }}</p>
            <p>Date: {{ $processDate }}</p>
        @endif
    @endif
</body>
</html>


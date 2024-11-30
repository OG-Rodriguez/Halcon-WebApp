<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <ul>
        <li><a href="{{ route('users.index') }}">Manage Users</a></li>
        <li><a href="{{ route('orders.index') }}">Manage Orders</a></li>
        <li><a href="{{ route('invoices.index') }}">Manage Invoices</a></li>
        <li><a href="{{ route('orders.archived') }}">View Archived Orders</a></li>
    </ul>
</body>
</html>

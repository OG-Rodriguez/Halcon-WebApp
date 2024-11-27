<!DOCTYPE html>
<html>
<head>
    <title>Invoices</title>
</head>
<body>
    <h1>Invoices List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Invoice Number</th>
                <th>Customer ID</th>
                <th>Order ID</th>
                <th>Total Amount</th>
                <th>Invoice Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->customer_id }}</td>
                    <td>{{ $invoice->order_id }}</td>
                    <td>{{ $invoice->total_amount }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td>
                        <a href="{{ route('invoices.show', $invoice->id) }}">View</a>
                        <a href="{{ route('invoices.edit', $invoice->id) }}">Edit</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
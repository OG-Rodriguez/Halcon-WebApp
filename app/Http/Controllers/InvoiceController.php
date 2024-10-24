<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Order;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('order')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('invoices.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|unique:invoices',
            'order_id' => 'required|exists:orders,id',
            'customer_name' => 'required|string|max:255',
            'fiscal_data' => 'nullable|string',
            'date' => 'required|date',
            'delivery_address' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function show($id)
    {
        $invoice = Invoice::with('order')->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $orders = Order::all(); // To allow selection of order
        return view('invoices.edit', compact('invoice', 'orders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'invoice_number' => 'required|unique:invoices,invoice_number,' . $id,
            'order_id' => 'required|exists:orders,id',
            'customer_name' => 'required|string|max:255',
            'fiscal_data' => 'nullable|string',
            'date' => 'required|date',
            'delivery_address' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}


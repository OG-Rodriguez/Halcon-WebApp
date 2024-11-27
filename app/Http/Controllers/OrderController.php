<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display a listing of orders
    public function index() {
        $orders = Order::with(['customer', 'invoice'])->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    // Show the form for creating a new order
    public function create() {
        $customers = Customer::all();
        return view('orders.create', compact('customers'));
    }

    // Store a newly created order
    public function store(Request $request) {
        $request->validate([
            'customer_id' => 'required',
            'invoice_id' => 'required',
            'status' => 'required',
            'order_date' => 'required|date',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Show the form for editing the specified order
    public function edit($id)
    {
        $order = Order::findOrFail($id); // Retrieve the order or throw a 404
        return view('orders.edit', compact('order'));
    }


    // Update the specified order
    public function update(Request $request, Order $order) {
        $request->validate([
            'status' => 'required',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Logically delete the specified order
    public function destroy(Order $order) {
        $order->delete(); // You might want to set a deleted_at timestamp for logical deletion
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }

    public function archived()
    {
        // Fetch archived orders from the database
        $archivedOrders = Order::onlyTrashed()->get(); // Assuming you are using soft deletes

        return view('orders.archived', compact('archivedOrders'));
    }
}



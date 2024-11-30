<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderStatus;
use App\Models\OrderPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // Display a listing of orders with filters
    public function index(Request $request) {
        $query = Order::query();

        if ($request->filled('invoice_number')) {
            $query->where('invoice_number', 'like', '%' . $request->invoice_number . '%');
        }

        if ($request->filled('customer_id')) {
            $query->where('customer_id', $request->customer_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('order_date')) {
            $query->whereDate('order_date', $request->order_date);
        }

        $orders = $query->with(['customer'])->orderBy('created_at', 'desc')->get();
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
            'invoice_number' => 'required|unique:orders,invoice_number',
            'customer_id' => 'required',
            'status' => 'required',
            'order_date' => 'required|date',
            'delivery_address' => 'required',
        ]);

        // Generate a unique invoice number if not provided
        $invoice_number = $request->invoice_number;
        while (Order::where('invoice_number', $invoice_number)->exists()) {
            $invoice_number = $request->invoice_number . '-' . Str::random(5);
        }

        // Create the order
        $order = Order::create([
            'invoice_number' => $invoice_number,
            'customer_id' => $request->customer_id,
            'status' => 'Ordered', // Default status
            'order_date' => $request->order_date,
            'delivery_address' => $request->delivery_address,
            'notes' => $request->notes,
        ]);

        // Store the initial status history
        OrderStatus::create([
            'order_id' => $order->id,
            'status' => 'Ordered',
            'updated_by' => auth()->id(), // Assuming logged in user is changing the status
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Show the form for editing the specified order
    public function edit($id) {
        $order = Order::findOrFail($id); // Retrieve the order or throw a 404
        return view('orders.edit', compact('order'));
    }

    // Update the specified order
    public function update(Request $request, Order $order) {
        $request->validate([
            'status' => 'required',
            'photo' => 'nullable|image',
        ]);

        // Track status change
        if ($order->status != $request->status) {
            // Add to status history before updating
            OrderStatus::create([
                'order_id' => $order->id,
                'status' => $order->status,
                'updated_by' => auth()->id(),
            ]);
        }

        // Update the order's status
        $order->update($request->all());

        // If status is 'In Route' or 'Delivered', allow for photo upload
        if (in_array($order->status, ['In Route', 'Delivered'])) {
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('order_photos');
                OrderPhoto::create([
                    'order_id' => $order->id,
                    'photo_path' => $path,
                    'uploaded_by' => auth()->id(),
                ]);

                // Update status to Delivered if the final photo is uploaded
                if ($order->status == 'In Route') {
                    $order->status = 'Delivered';
                    $order->save();
                }
            }
        }

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Logically delete the specified order (soft delete)
    public function destroy(Order $order) {
        $order->delete(); // Soft delete using Eloquent's soft delete feature

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }

    // Display archived orders (soft deleted)
    public function archived() {
        // Fetch archived orders from the database
        $archivedOrders = Order::onlyTrashed()->get(); // Get soft-deleted orders

        return view('orders.archived', compact('archivedOrders'));
    }

    // Restore an archived order (soft deleted)
    public function restore($id) {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->restore(); // Restore the soft deleted order

        return redirect()->route('orders.index')->with('success', 'Order restored successfully.');
    }

    // Check the status of an order
    public function checkStatus(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'invoice_number' => 'required',
        ]);

        $order = Order::where('customer_id', $request->customer_id)
                      ->where('invoice_number', $request->invoice_number)
                      ->first();

        if (!$order) {
            return back()->withErrors(['message' => 'Order not found.']);
        }

        $photos = [];
        if ($order->status === 'Delivered') {
            $photos = OrderPhoto::where('order_id', $order->id)->get();
        }

        return view('orders.status', compact('order', 'photos'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request, $orderId)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $order = Order::findOrFail($orderId);
        $path = $request->file('photo')->store('photos', 'public');

        // Assuming the Order model has a 'photo' field
        $order->photo = $path;
        $order->save();

        return redirect()->route('orders.show', $orderId)->with('success', 'Photo uploaded successfully.');
    }

    public function show($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('orders.show', compact('order'));
    }

    public function destroy($orderId)
    {
        $order = Order::findOrFail($orderId);
        if ($order->photo) {
            Storage::disk('public')->delete($order->photo);
            $order->photo = null;
            $order->save();
        }

        return redirect()->route('orders.show', $orderId)->with('success', 'Photo deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\OrderPhoto;
use Illuminate\Http\Request;

class OrderPhotoController extends Controller
{
    // Store a newly uploaded photo for an order
    public function store(Request $request, $orderId)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validating image
        ]);

        $path = $request->file('photo')->store('order_photos'); // Storing photo

        OrderPhoto::create([
            'order_id' => $orderId,
            'photo_path' => $path,
            'uploaded_by' => auth()->id(), // Assuming user is logged in
            'type' => $request->input('type'), // e.g., "Loaded", "Delivered"
        ]);

        return redirect()->route('orders.show', $orderId)->with('success', 'Photo uploaded successfully.');
    }

    // Show all photos for an order
    public function index($orderId)
    {
        $photos = OrderPhoto::where('order_id', $orderId)->get();
        return view('order_photos.index', compact('photos'));
    }
}

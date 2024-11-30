<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    // Display a listing of order status history
    public function index($orderId)
    {
        $statusHistory = OrderStatus::where('order_id', $orderId)
                                           ->orderBy('updated_at', 'desc')
                                           ->get();

        return view('order_status_history.index', compact('statusHistory'));
    }
}

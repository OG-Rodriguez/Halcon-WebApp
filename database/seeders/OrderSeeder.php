<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Invoice;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Create 10 orders and related invoices
        Order::factory()
            ->count(10)
            ->create()
            ->each(function ($order) {
                Invoice::factory()->create(['orderID' => $order->orderID]);
            });
    }
}



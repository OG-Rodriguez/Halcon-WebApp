<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class OrderPhotoSeeder extends Seeder
{
    public function run()
    {
        // Get a list of orders and users
        $orders = Order::all();
        $users = User::all();

        foreach ($orders as $order) {
            // Add a random number of photos to each order
            foreach (['Loaded', 'Delivered'] as $type) {
                DB::table('order_photos')->insert([
                    'order_id' => $order->id,
                    'type' => $type, // Either 'Loaded' or 'Delivered'
                    'photo_path' => 'photos/order_' . $order->id . '_' . $type . '.jpg', // Dummy photo path
                    'uploaded_by' => $users->random()->id, // Random user from the users table
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
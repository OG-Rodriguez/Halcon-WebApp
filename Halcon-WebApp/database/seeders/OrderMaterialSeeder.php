<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Material;
use Carbon\Carbon;

class OrderMaterialSeeder extends Seeder
{
    public function run()
    {
        // Get a list of orders and materials
        $orders = Order::all();
        $materials = Material::all();

        foreach ($orders as $order) {
            // Loop through each order and attach random materials
            foreach ($materials->random(2) as $material) { // Adjust the number of materials to link with each order
                DB::table('order_materials')->insert([
                    'order_id' => $order->id,
                    'material_id' => $material->id,
                    'quantity' => rand(1, 100), // Random quantity
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}


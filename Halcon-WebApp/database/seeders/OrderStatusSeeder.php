<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderStatusSeeder extends Seeder
{
    public function run()
    {
        // Insert order statuses
        DB::table('order_status')->insert([
            [
                'order_id' => 1,
                'status' => 'Ordered',
                'updated_by' => 1, // Assuming user ID 1 is the updater
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 2,
                'status' => 'In process',
                'updated_by' => 1, // Assuming user ID 1 is the updater
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 3,
                'status' => 'Delivered',
                'updated_by' => 1, // Assuming user ID 1 is the updater
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Insert customers first if they don't exist
        DB::table('customers')->insert([
            ['id' => 1, 'name' => 'Customer 1', 'customer_number' => 'CUST001', 'fiscal_data' => 'Fiscal Data 1'],
            ['id' => 2, 'name' => 'Customer 2', 'customer_number' => 'CUST002', 'fiscal_data' => 'Fiscal Data 2'],
            ['id' => 3, 'name' => 'Customer 3', 'customer_number' => 'CUST003', 'fiscal_data' => 'Fiscal Data 3'],
        ]);

        // Insert orders referencing customer IDs
        DB::table('orders')->insert([
            'invoice_number' => 'INV-' . Str::random(10),
            'customer_id' => 1,
            'status' => 'Ordered',
            'order_date' => Carbon::now(),
            'delivery_address' => 'Address 1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('orders')->insert([
            'invoice_number' => 'INV-' . Str::random(10),
            'customer_id' => 2,
            'status' => 'In process',
            'order_date' => Carbon::now(),
            'delivery_address' => 'Address 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('orders')->insert([
            'invoice_number' => 'INV-' . Str::random(10),
            'customer_id' => 3,
            'status' => 'Delivered',
            'order_date' => Carbon::now(),
            'delivery_address' => 'Address 3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}


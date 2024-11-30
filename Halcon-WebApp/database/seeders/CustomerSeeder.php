<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Insert customers if they don't exist
        $customers = [
            [
                'name' => 'Customer 1',
                'customer_number' => 'CUST001',
                'fiscal_data' => 'Fiscal Data 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Customer 2',
                'customer_number' => 'CUST002',
                'fiscal_data' => 'Fiscal Data 2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Customer 3',
                'customer_number' => 'CUST003',
                'fiscal_data' => 'Fiscal Data 3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($customers as $customer) {
            DB::table('customers')->updateOrInsert(
                ['customer_number' => $customer['customer_number']],
                $customer
            );
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        // Insert sample material data
        DB::table('materials')->insert([
            [
                'name' => 'Cement',
                'stock_quantity' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sand',
                'stock_quantity' => 200,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Steel Rods',
                'stock_quantity' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bricks',
                'stock_quantity' => 500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more materials as needed
        ]);
    }
}

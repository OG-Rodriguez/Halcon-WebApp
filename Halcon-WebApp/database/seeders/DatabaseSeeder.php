<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Run the seeders for roles, users, customers, orders, materials, etc.
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CustomerSeeder::class,
            OrderSeeder::class,
            OrderStatusSeeder::class,
            OrderPhotoSeeder::class,
            MaterialSeeder::class,
            OrderMaterialSeeder::class,
        ]);
    }
}

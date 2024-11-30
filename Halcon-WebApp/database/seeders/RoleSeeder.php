<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Sales']);
        Role::create(['name' => 'Purchasing']);
        Role::create(['name' => 'Warehouse']);
        Role::create(['name' => 'Route']);
        Role::create(['name' => 'Admin']);
    }
}

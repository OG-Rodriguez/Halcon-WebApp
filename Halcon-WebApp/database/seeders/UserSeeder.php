<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $roles = Role::all()->keyBy('name');

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@halcon.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'status' => 'Active',
            'role_id' => $roles['Admin']->id, // Assigning a valid role_id
        ]);

        User::create([
            'name' => 'Miss Sharon Kirlin',
            'email' => 'mclaughlin.lilliana@example.org',
            'password' => bcrypt('password'),
            'role' => 'Purchasing',
            'status' => 'Active',
            'role_id' => $roles['Purchasing']->id, // Assigning a valid role_id
        ]);

        // Add more users as needed
    }
}




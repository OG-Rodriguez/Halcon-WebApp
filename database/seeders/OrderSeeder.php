<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Create a customer
        $customer = Customer::create([
            'name' => 'Test Customer',
            'email' => 'test@example.com',
            'unique_customer_number' => 'CUST001', // Provide a unique customer number
        ]);

        // Create an order for the newly created customer
        Order::create([
            'user_id' => 1, // assuming a user with ID 1 exists
            'customer_id' => $customer->id, // Use the newly created customer's ID
            'product_name' => 'Test Product',
            'quantity' => 1,
            'price' => 100,
            'order_date' => now() // or any specific date
        ]);
    }
}




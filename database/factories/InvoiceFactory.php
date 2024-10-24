<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Customer; // Import the Customer model if needed
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'invoice_number' => $this->faker->unique()->numerify('INV-#####'), // Generates a unique invoice number
            'customer_id' => Customer::factory(), // Create a related customer
            'total_amount' => $this->faker->randomFloat(2, 10, 1000), // Random total amount
            'invoice_date' => $this->faker->date(), // Random invoice date
            'order_id' => Order::factory(), // Create a related order
        ];
    }
}


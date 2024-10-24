<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'unique_customer_number' => $this->faker->unique()->randomNumber(), // Unique customer number
            'fiscal_data' => $this->faker->sentence, // Example for fiscal data
            'delivery_address' => $this->faker->address, // Example for delivery address
            'notes' => $this->faker->sentence, // Example for notes
        ];
    }
}


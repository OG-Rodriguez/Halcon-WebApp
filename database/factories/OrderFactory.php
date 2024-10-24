<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition() {
        return [
            'customer_id' => Customer::factory(),
            'invoice_id' => Invoice::factory(),
            'status' => 'Ordered',
            'order_date' => $this->faker->dateTime(),
            'delivery_date' => null,
            'notes' => $this->faker->text(),
        ];
    }
}

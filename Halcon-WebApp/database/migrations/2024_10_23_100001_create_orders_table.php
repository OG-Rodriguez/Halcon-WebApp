<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['Ordered', 'In process', 'In route', 'Delivered']);
            $table->timestamp('order_date');
            $table->string('delivery_address');
            $table->text('notes')->nullable();
            $table->boolean('deleted')->default(false); // Soft delete indicator
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

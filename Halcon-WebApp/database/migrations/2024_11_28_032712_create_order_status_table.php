<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusTable extends Migration
{
    public function up()
    {
        Schema::create('order_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['Ordered', 'In process', 'In route', 'Delivered']);
            $table->foreignId('updated_by')->constrained('users')->onDelete('cascade');
            $table->timestamp('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_status');
    }
}


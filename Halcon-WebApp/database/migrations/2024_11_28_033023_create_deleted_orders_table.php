<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletedOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('deleted_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('deleted_by')->constrained('users')->onDelete('cascade');
            $table->timestamp('deleted_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('deleted_orders');
    }
}

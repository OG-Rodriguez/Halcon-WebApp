<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_number', 'customer_id', 'total_amount', 'invoice_date', 'order_id'];

    // One-to-one relationship with Order
    public function order() {
        return $this->hasOne(Order::class);
    }

    // Many-to-one relationship with Customer
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}





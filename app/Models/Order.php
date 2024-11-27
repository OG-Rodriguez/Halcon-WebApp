<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this line
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes; // Add this line

    protected $fillable = [
        'customer_id',
        'invoice_id',
        'status',
        'order_date',
        'delivery_date',
        'notes'
    ];

    // Many-to-one relationship with Customer
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    // Many-to-one relationship with Invoice
    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }

    // One-to-many relationship with Photos
    public function photos() {
        return $this->hasMany(Photo::class);
    }

    // Many-to-one relationship with Employee
    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}

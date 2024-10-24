<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import HasFactory

class Customer extends Model
{
    use HasFactory; // Use HasFactory trait

    protected $fillable = ['name', 'unique_customer_number', 'fiscal_data', 'delivery_address', 'notes'];

    // One-to-many relationship with Orders
    public function orders() {
        return $this->hasMany(Order::class);
    }
}






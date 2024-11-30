<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', // Name or company name
        'customer_number', // Unique identifier
        'fiscal_data', // Fiscal information
    ];

    /**
     * A customer can have many orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}







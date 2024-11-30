<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this import
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory; // Use the trait to enable factory support

    protected $fillable = ['order_id', 'status', 'updated_by', 'updated_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['order_id', 'url'];

    // Many-to-one relationship with Order
    public function order() {
        return $this->belongsTo(Order::class);
    }
}


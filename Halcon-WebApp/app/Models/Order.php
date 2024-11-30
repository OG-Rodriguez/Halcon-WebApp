<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    // Constants for order status
    const STATUS_ORDERED = 'Ordered';
    const STATUS_IN_PROCESS = 'In process';
    const STATUS_IN_ROUTE = 'In route';
    const STATUS_DELIVERED = 'Delivered';

    protected $fillable = [
        'invoice_number', 'customer_id', 'status', 'order_date', 'delivery_address', 'notes', 'deleted'
    ];

    protected $casts = [
        'order_date' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->status = self::STATUS_ORDERED;
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderStatus()
    {
        return $this->hasMany(OrderStatus::class);
    }

    public function orderPhotos()
    {
        return $this->hasMany(OrderPhoto::class);
    }

    public function orderMaterials()
    {
        return $this->hasMany(OrderMaterial::class);
    }
}
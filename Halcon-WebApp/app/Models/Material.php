<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['name', 'stock_quantity'];

    public function orderMaterials()
    {
        return $this->hasMany(OrderMaterial::class);
    }
}

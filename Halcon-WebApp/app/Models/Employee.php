<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'role_id'];

    // Many-to-one relationship with Role
    public function role() {
        return $this->belongsTo(Role::class);
    }

    // One-to-many relationship with Orders
    public function orders() {
        return $this->hasMany(Order::class);
    }
}


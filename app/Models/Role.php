<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // One-to-many relationship with Employees
    public function employees() {
        return $this->hasMany(Employee::class);
    }
}

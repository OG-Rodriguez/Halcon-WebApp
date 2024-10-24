<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // Add any other necessary fields here
    ];

    /**
     * Define the relationship with User.
     * A department can have many users.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

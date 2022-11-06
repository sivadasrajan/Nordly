<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city',
        'category_id',
        'ceo',
        'address',
        'email',
        'phone',
        'products'
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}

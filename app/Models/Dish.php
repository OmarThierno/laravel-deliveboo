<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    // 1:N
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // N:N
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    protected $fillable = [
        'restaurant_id',
        'name',
        'slug',
        'description',
        'allergens',
        'price',
        'visibility',
        'thumb'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // N:N
    public function dishes()
    {
        $this->belongsToMany(Dish::class, 'dish_order');
    }

    protected $fillable = ['name', 'surname', 'phone_number', 'address', 'order_date', 'price', 'status'];
}

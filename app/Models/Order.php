<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;

    use SoftDeletes;

    // N:N
    public function dishes()
    {
        // return $this->belongsToMany(Dish::class, 'dish_order');
        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }

    protected $fillable = ['name', 'surname', 'phone_number', 'address', 'order_date', 'price', 'status'];
}

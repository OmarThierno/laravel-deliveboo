<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function scopeRecent($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->subDay(1));
    }
}

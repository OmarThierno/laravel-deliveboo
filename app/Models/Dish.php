<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    public function restaurant(){

        $this->belongsTo(Restaurant::class);
    }

    protected $fillable = ['name', 'slug', 'description', 'allergens', 'price', 'visibility', 'thumb'];
}

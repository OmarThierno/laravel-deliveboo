<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    public function typologies()
    {
        return $this->belongsToMany(Typology::class, 'restaurant_typology');
    }

    protected $fillable = ['business_name', 'user_id', 'slug', 'address', 'image', 'vat_number'];
}

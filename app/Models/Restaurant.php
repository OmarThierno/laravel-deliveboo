<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;

    // 1:1
    public function user(){

        return $this->belongsTo(User::class);
    }

    // 1:N
    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    // N:N
    public function typologies()
    {
        return $this->belongsToMany(Typology::class);
    }

    protected $fillable = ['user_id', 'business_name', 'slug', 'address', 'image', 'vat_number'];
}

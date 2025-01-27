<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = config("restaurants");
        // dd($restaurants);
        foreach($restaurants as $restaurant) {
            // dd($restaurant);
            $newRestaurant = new Restaurant();
            $newRestaurant->fill($restaurant);
            $newRestaurant->save();
        }
    }
}

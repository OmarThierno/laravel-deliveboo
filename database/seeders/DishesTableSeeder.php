<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = config('dishes');

        foreach($dishes as $dish) {
            $newDish = new Dish();
            $newDish->fill($dish);
            $newDish->save();
        }
    }
}

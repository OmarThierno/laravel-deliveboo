<?php

namespace Database\Seeders;

use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "Hamburgeria", "Pizzeria al taglio", "Focacceria", "Paninoteca", "Kebab",
            "Friggitoria", "Chicken Wings", "Fish & Chips", "Tacos", "Burritos",
            "Hot Dog", "Pizza al metro", "Poke Bowl", "Sushi Takeaway", "Cafeteria",
            "Gelateria", "Donuteria", "Sandwich Bar", "Salad Bar", "Street Food"
        ];

        foreach($types as $type) {
            $newType = new Typology();
            $newType->name = $type;
            $newType->save();
        }
    }
}

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
            "Pizzeria", "Trattoria", "Osteria", "Fish & Chips", "Enoteca",
            "Ristorante di Pesce", "Ristorante Vegetariano", "Agriturismo", "Ristorante di Carne", "Braceria",
            "Ristorante Gourmet", "Ristorante Tipico", "Pizzeria Gourmet", "Trattoria di Famiglia", "Ristorante di Sushi",
            "Ristorante Etnico", "Ristorante Fusion", "Ristorante di Montagna", "Ristorante di Mare", "Ristorante Vegan"
        ];

        foreach ($types as $type) {
            $newType = new Typology();
            $newType->name = $type;
            $newType->save();
        }
    }
}

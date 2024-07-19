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
            "Pizzeria", "Trattoria", "Osteria", "Fish & Chips", "Poke Bowl",
            "Ristorante di Pesce", "Ristorante Vegetariano", "Agriturismo", "Ristorante di Carne", "Braceria",
            "Ristorante Gourmet", "Ristorante Tipico", "Pizzeria Gourmet", "Trattoria di Famiglia", "Ristorante di Sushi",
            "Ristorante Etnico", "Ristorante Fusion", "Ristorante di Montagna", "Ristorante di Mare", "Ristorante Vegan"
        ];

        $icons = [
            "https://cdn-icons-png.flaticon.com/128/1404/1404945.png", "https://cdn-icons-png.flaticon.com/128/4780/4780045.png", 'https://cdn-icons-png.flaticon.com/128/8732/8732445.png',
            'https://cdn-icons-png.flaticon.com/128/2095/2095671.png', 'https://cdn-icons-png.flaticon.com/128/2276/2276931.png',
            'https://cdn-icons-png.flaticon.com/128/3075/3075977.png', 'https://cdn-icons-png.flaticon.com/128/2329/2329865.png', 'https://cdn-icons-png.flaticon.com/128/5854/5854405.png', 'https://cdn-icons-png.flaticon.com/128/2276/2276941.png', 'https://cdn-icons-png.flaticon.com/128/12705/12705609.png', 'https://cdn-icons-png.flaticon.com/128/1699/1699834.png', 'https://cdn-icons-png.flaticon.com/128/4727/4727368.png', 'https://cdn-icons-png.flaticon.com/128/2674/2674065.png', "https://cdn-icons-png.flaticon.com/128/3900/3900300.png", 'https://cdn-icons-png.flaticon.com/128/2252/2252075.png', 'https://cdn-icons-png.flaticon.com/128/4727/4727322.png', 'https://cdn-icons-png.flaticon.com/128/2276/2276934.png', 'https://cdn-icons-png.flaticon.com/128/6750/6750632.png', 'https://cdn-icons-png.flaticon.com/128/2515/2515297.png', 'https://cdn-icons-png.flaticon.com/128/9273/9273859.png'
        ];

        for ($i = 0; $i < 20; $i++) {
            $type = $types[$i];
            $icon = $icons[$i];
            $newType = new Typology();
            $newType->name = $type;
            $newType->icon = $icon;
            $newType->save();
        }
    }
}

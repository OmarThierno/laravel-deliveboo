<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes_orders = config('dish_order');
        foreach ($dishes_orders as $dish_order) {
            DB::table('dish_order')->insert([
                'dish_id' => $dish_order['dish_id'],
                'order_id' => $dish_order['order_id'],
                'quantity' => $dish_order['quantity']
            ]);
        }
    }
}

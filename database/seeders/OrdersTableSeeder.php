<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = config('orders');
        foreach($orders as $order) {
            $newOrder = new Order();
            $newOrder->fill($order);
            $newOrder->save();
        }
    }
}

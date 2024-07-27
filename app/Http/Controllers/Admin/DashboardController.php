<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller{
    public function index(Order $order, Dish $dish, Restaurant $restaurant)
    {
        $userId = Auth::id();

        // partenza, numero di indici, con cosa inizializzi
        $priceData = array_fill(0, 6, 0);
        
        if (Restaurant::where('user_id', $userId)->first() !== null){
            $restaurant = Restaurant::where('user_id', $userId)->first();
            $dishes = Dish::where('restaurant_id', $restaurant->id)->get();


            foreach ($dishes as $dish) {
                for ($month = 2; $month <= 7; $month++) {
                    $totalMonth = 0;

                    foreach ($dish->orders()->whereMonth('order_date', $month)->get() as $order) {
                        $totalMonth += $order->price;
                    }

                    $priceData[$month - 2] += $totalMonth;
                }
            }
        }

        return view('admin.dashboard', compact('priceData'));
    }
}


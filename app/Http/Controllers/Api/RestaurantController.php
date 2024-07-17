<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {
        $restaurants = Restaurant::with(['typologies', 'dishes'])->paginate(5);

        $data = [
            'results' => $restaurants,
            'success' => true
        ];

        return response()->json($data);
    }
}

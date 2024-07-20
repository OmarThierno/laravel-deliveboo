<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request) {
        // dd($request->all());
        $restaurantQuery = Restaurant::with(['typologies', 'dishes']);
        if($request->typology_id) {                     
            $restaurantQuery->whereHas('typologies', function ($query) use ($request) {
                $query->where('typology_id', $request->typology_id);
            });
        }
        if ($request->search) {
            // dd($request->search);
            $restaurantQuery->where('business_name', 'like', '%'.$request->search. '%');
        }

        $restaurants = $restaurantQuery->get();

        if (!$restaurants->isNotEmpty()) {
            return response()->json([
                'success'=> false
            ], 404);
        }
        $data = [
            'results' => $restaurants,
            'success' => true
        ];

        return response()->json($data);
    }

    public function show(string $restaurant){
        $restaurant = Restaurant::with(['dishes', 'typologies'])->where('slug', $restaurant)->first();
        // dd($restaurant);
        
        $data = [
            'results' => $restaurant,
            'success' => true
        ];

        return response()->json($data);
    }
}

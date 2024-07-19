<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dishesQuery = Dish::where('restaurant_id', $request->restaurant_id);

        if($request->name){
            $dishesQuery->where('name', 'like', '%'.$request->name.'%');
        }

        $dishes = $dishesQuery->get();
        $data = [
            'results' => $dishes,
            'success' => true,
        ];

        return response()->json($data);
    }
}

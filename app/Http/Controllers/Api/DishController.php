<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsTrue;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dishesQuery = Dish::where('visibility', true)->where('restaurant_id', $request->restaurant_id);

        if($request->name){
            $dishesQuery->where('name', 'like', '%'.$request->name.'%');
        }

        $dishes = $dishesQuery->get();

        if(!$dishes->isNotEmpty()) {
            return response()->json([
                'success'=> false
            ], 404);
        }

        $data = [
            'results' => $dishes,
            'success' => true,
        ];

        return response()->json($data);
    }
}

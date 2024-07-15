<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::id();
        //prelevo tutti i dati
        $restaurants = Restaurant::with('user')->where('user_id', $user)->get();
        // ->paginate(10);
        
        if ($restaurants == null) {
            $existRestaurant = false;
        } else {
            $existRestaurant = true;
        }
        return view('admin.restaurants.index', compact('restaurants', 'existRestaurant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->slug = Str::slug($request->business_name);
        $restaurant->user_id = Auth::id();
        $restaurant->save();
        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

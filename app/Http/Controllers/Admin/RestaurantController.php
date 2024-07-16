<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Typology;
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
        
        // if ($restaurants == null) {
        //     $existRestaurant = false;
        // } else {
        //     $existRestaurant = true;
        // }
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typologies = Typology::all();
        return view('admin.restaurants.create', compact('typologies'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'address' => 'required|string',
            'image' => 'nullable',
            'vat_number' => 'required|integer',
            'typology_id' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->slug = Str::slug($request->business_name);
        $restaurant->user_id = Auth::id();
        // $this->associateTypology($restaurant, $request->typology_name);
        $restaurant->save();

        $restaurant->typologies()->attach($request->typology_id);

        return redirect()->route('admin.restaurants.create')->with('success', 'Restaurant and typology created successfully!');
    }

    /**
     * Associate a typology with a restaurant.
     */
    private function associateTypology(Restaurant $restaurant, $typologyName)
    {
        $typology = Typology::firstOrCreate(['name' => $typologyName]);

        $restaurant->typologies()->attach($typology->id);
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
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        
        return redirect()->route('admin.restaurants.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Typology;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //prelevo tutti i dati
        $restaurants = Restaurant::paginate(10);
        return view('admin.restaurants.index', compact('restaurants'));
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
        $request->validate([
            'business_name' => 'required|string|max:255',
            'address' => 'required|string',
            'image' => 'nullable|string',
            'vat_number' => 'required|integer',
            'typology_name' => 'required|string|max:255',
        ]);

        $restaurant = Restaurant::create([
            'user_id' => auth()->id(),
            'business_name' => $request->business_name,
            'slug' => Str::slug($request->business_name),
            'address' => $request->address,
            'image' => $request->image,
            'vat_number' => $request->vat_number,
        ]);

        $this->associateTypology($restaurant, $request->typology_name);

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
    public function destroy(string $id)
    {
        //
    }
}

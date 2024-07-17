<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Typology;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $auth_user = Auth::user();
        $restaurant = $auth_user->restaurant;

        if ($restaurant) {
            return view('admin.restaurants.show', compact('restaurant'));
        } else {
            return view('admin.restaurants.index');
        }
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

    public function store(StoreRestaurantRequest $request)
    {

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image_path = Storage::put('post_images', $request->image);
            $data['image'] = $image_path;
        }

        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->slug = Str::slug($request->business_name);
        $restaurant->user_id = Auth::id();
        $restaurant->save();

        $restaurant->typologies()->attach($request->typology_id);

        return redirect()->route('admin.restaurants.show', $restaurant)->with('Successo!', 'Il Ristorante è stato creato correttamente!');
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
    public function edit(string $slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();
        $typologies = Typology::all();

        return view('admin.restaurants.edit', compact('restaurant', 'typologies'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, $slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();
        $data = $request->validated();

        // if ($request->hasFile('image')) {
        //     Storage::delete($restaurant->image);
        // }
        // $image_path = Storage::put('post_images', $request->image);
        // $data['image'] = $image_path;


        $restaurant->fill($data);
        $restaurant->slug = Str::slug($request->business_name);

        // $this->associateTypology($restaurant, $request->typology_name);
        $restaurant->save();
        //sync  permette di aggiornare le relazioni many-to-many rimuovendo e aggiungendo i record necessari
        $restaurant->typologies()->sync([$request->typology_id]);
        return redirect()->route('admin.restaurants.show', ['restaurant' => $restaurant->slug])->with('success', 'Restaurant updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->image) {
            Storage::delete($restaurant->image);
        }

        $restaurant->delete();

        return redirect()->route('admin.restaurants.index');
    }
}

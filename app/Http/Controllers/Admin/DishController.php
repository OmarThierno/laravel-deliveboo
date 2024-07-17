<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use Illuminate\Support\Str;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $dishes = Dish::whereHas('restaurant', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->paginate(10);

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);
        $data['visibility'] = 1;

        $restaurant = Auth::user()->restaurant;
        $data['restaurant_id'] = $restaurant->id;

        if ($request->hasFile('thumb')) {
            $imagePath = $request->file('thumb')->store('dishes');
            $data['thumb'] = $imagePath;
        }

        $dish = Dish::create($data);

        return redirect()->route('admin.dishes.show', $dish->slug)->with('success', 'Piatto creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, $slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);

        // Aggiorna l'immagine se è stata fornita
        if ($request->hasFile('thumb')) {
            $imagePath = $request->file('thumb')->store('dishes');
            $data['thumb'] = $imagePath;

            if ($dish->thumb) {
                Storage::delete($dish->thumb);
            }
        }

        $dish->update($data);

        return redirect()->route('admin.dishes.show', $dish->slug)->with('success', 'Piatto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();

        if ($dish->thumb) {
            Storage::delete($dish->thumb);
        }

        $dish->delete();

        return redirect()->route('admin.dishes.index')->with('success', 'Piatto eliminato con successo!');
    }
}

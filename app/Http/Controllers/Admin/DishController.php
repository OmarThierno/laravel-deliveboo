<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;

class DishController extends Controller
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-dishes', function (User $user, Dish $dish) {
            return Auth::user() === $dish->restaurant_id->id;
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->restaurant) {
            return redirect()->route('admin.restaurants.index')->withErrors(['error' => 'Prima di creare un piatto dovresti avere un ristorante. Creane uno direttamente qua sotto!']);
        }

        $user_id = Auth::id();
        $dishes = Dish::whereHas('restaurant', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->orderBy('name', 'asc')->paginate(10); // Ordinamento alfabetico

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
     * Create unique SKU's for dishes
     */
    public function generateSKU(Dish $dish)
    {
        // Ottieni il ristorante dell'utente autenticato
        $restaurant = Auth::user()->restaurant;

        // Abbreviazione del nome del ristorante
        $restaurantAbbr = collect(explode(' ', $restaurant->business_name))
            ->map(function ($word) {
                return Str::upper(Str::substr($word, 0, 1));
            })
            ->implode('');

        // Abbreviazione del nome del piatto
        $dishAbbr = collect(explode(' ', $dish->name))
            ->map(function ($word) {
                return Str::upper(Str::substr($word, 0, 1));
            })
            ->implode('');

        // Data di creazione formattata
        if ($dish->created_at instanceof \DateTime) {
            $createdDate = $dish->created_at->format('His');
        } else {
            $createdDate = (new \DateTime($dish->created_at))->format('His');
        }

        // SKU completo
        $sku = $restaurantAbbr . $dishAbbr . '-' . $createdDate;

        return $sku;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();
        $data['visibility'] = 1;

        $tempDish = new Dish($data);

        // Genera lo SKU utilizzando il ristorante e il piatto temporaneo
        $sku = $this->generateSKU($tempDish);

        // Assegna lo SKU generato al campo slug
        $data['slug'] = $sku;

        //ristorante dell'utente autenticato
        $restaurant = Auth::user()->restaurant;
        $data['restaurant_id'] = $restaurant->id;

        if ($request->hasFile('thumb')) {
            $imagePath = Storage::put('post_images', $request->thumb);
            $data['thumb'] = $imagePath;
        }

        // Crea il piatto per ottenere la data di creazione
        $dish = Dish::create($data);

        return redirect()->route('admin.dishes.show', $dish->slug)->with('success', 'Piatto creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();

        if (!Gate::allows('view-dishes', $dish)) {
            abort(404, 'Non Trovato');
        }

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();

        if (!Gate::allows('view-dishes', $dish)) {
            abort(404, 'Non Trovato');
        }

        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();

        if (!Gate::allows('view-dishes', $dish)) {
            abort(404, 'Non Trovato');
        }

        if ($request->has('visibility')) {
            // Aggiorna solo il campo visibility
            $dish->visibility = $request->input('visibility') == '1' ? true : false;
            $dish->save();

            return response()->json(['success' => true]);
        }

        // Se non è stato passato il parametro visibility, gestisci l'aggiornamento degli altri campi
        $data = $request->all();

        if ($request->hasFile('thumb')) {
            if ($request->thumb) {
                Storage::delete($dish->thumb);
            }
            $imagePath = $imagePath = Storage::put('post_images', $request->thumb);
            $data['thumb'] = $imagePath;
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

        if (!Gate::allows('view-dishes', $dish)) {
            abort(404, 'Non Trovato');
        }

        if ($dish->thumb) {
            Storage::delete($dish->thumb);
        }

        $dish->delete();

        return redirect()->route('admin.dishes.index')->with('success', 'Piatto eliminato con successo!');
    }
}

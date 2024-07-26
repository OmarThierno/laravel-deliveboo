<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        $orderQuery =  Order::with('dishes')->recent();

        $restaurants = Restaurant::all();
        foreach ($restaurants as $restaurant) {
            if(Auth::id() === $restaurant->user_id) {
                $orderQuery->whereHas('dishes', function ($query) use ($restaurant) {
                    $query->where('restaurant_id', $restaurant->id);
                });
            }
            $user = Auth::id() === $restaurant->user_id;

        }
        
        $orders = $orderQuery->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // $dishesWithQuantities = $order->dishes()->withPivot('quantity')->get();
        // dd($dishesWithQuantities->all());

        if (Gate::denies('view-orders', $order)) {
            abort(404, 'Non Trovato');
        }

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        if (Gate::denies('view-orders', $order)) {
            abort(404, 'Non Trovato');
        }

        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

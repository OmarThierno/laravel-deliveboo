<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Dish;
use App\Models\Order;
use Braintree\Gateway;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway){
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway){

        // dd(json_decode($request->dish_id, true));
        $dataPayment  = json_decode($request->json_data, true);

        $total = 0;

        foreach($dataPayment as $prod){
            $dish = Dish::findOrFail($prod['dish_id']);
            $total += $dish['price'] * $prod['quantity'];
        }

        // dd($total);

        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        if($result->success){

            $data = [
                'success' => true,
                'message' => "Transazione eseguita",
            ];

            return response()->json($data, 200);
        }else{

            $data = [
                'success' => false,
                'message' => "Transazione interrotta",
            ];

            return response()->json($data, 401);
        }
    
        // return response()->json($result, 200);
    }


    // public function index(){
    // }

    // public function create(){
    // }

    public function store(Request $request)
    {
        $userData = json_decode($request->input('user'), true);
        $productsData = json_decode($request->input('products'), true);

        // $validator = Validator::make(
        //     ['user' => $userData, 'products' => $productsData],
        //     [
        //         'user' => 'required|array',
        //         'products' => 'required|array',
        //     ]
        // );

        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Dati non validi',
        //         'errors' => $validator->errors()
        //     ], 400);
        // }

        $total = 0;

        foreach ($productsData as $product) {
            $dish = Dish::findOrFail($product['dish_id']);
            $total += $dish->price * $product['quantity'];
        }

        $order = new Order();
        $order->name = $userData['name'];
        $order->surname = $userData['surname'];
        $order->phone_number = $userData['phone'];
        $order->address = $userData['address'];
        $order->order_date = Carbon::now();
        $order->price = $total;
        $order->status = 'running';
        $order->save();

        foreach ($productsData as $product) {
            $dish = Dish::findOrFail($product['dish_id']);
            $order->dishes()->attach($dish->id, ['quantity' => $product['quantity']]);
        }

        return response()->json([
            'success' => true,
            'order' => $order
        ], 200);
    }
}

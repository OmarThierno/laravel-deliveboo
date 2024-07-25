<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Dish;
use Braintree\Gateway;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
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

        $result = $gateway->transaction()->sale([
            'amount' => '109.00',
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

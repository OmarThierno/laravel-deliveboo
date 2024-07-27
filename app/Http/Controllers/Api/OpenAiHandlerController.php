<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenAiHandler;

class OpenAiHandlerController extends Controller
{
    public function chat(Request $request) {

        if ($request->message) {

            $message = $request->message;
          
            if (!$request->thread_id) {
              $thread_id = '';
            } else {
              $thread_id = $request->thread_id;
            }
          
            $key =  env('OPEN_AI_KEY'); 
            $assistan_id = env('OPEN_AI_ASSISTAN_ID');
          
            $handler = new OpenAiHandler($key, $assistan_id);
            $handler->main($message, $thread_id);
          
            $thread_id_return = $handler->getThreadIdReturn();
            $message_return = $handler->getMessage_return();
          
            $data = [
              'threadid' => $thread_id_return,
              'message' =>  $message_return,
              'success' => true
            ];
          
          }

        return response()->json($data, 200);
    }
}

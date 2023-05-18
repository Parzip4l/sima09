<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        if($user = Auth::user()){
            if($user->level == '2'){
                if ($request->title == null) {
                    return;
                }
            
                $title = $request->title;
            
                $result = OpenAI::completions()->create([
                    "model" => "text-davinci-003",
                    "temperature" => 0.7,
                    "top_p" => 1,
                    "frequency_penalty" => 0,
                    "presence_penalty" => 0,
                    'max_tokens' => 600,
                    'prompt' => sprintf($title),
                ]);
            
                $content = trim($result['choices'][0]['text']);
            
            
                return view('pages.apps.chat', compact('title', 'content'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }
}

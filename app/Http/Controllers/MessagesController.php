<?php

namespace App\Http\Controllers;

use app\User;
use App\Message;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    
    public function store(Request $request,$id){
    $this->validate($request, [
        'body' => 'required',
        'article' => 'required',
    ]);
    
    $comment = Message::create([
        'body' => request('body'),
        'article' => request('article'),
        'user_id_to' => $id,
        'user_id_from' => auth()->id(),
    ]);
    return back();
    }
  
}

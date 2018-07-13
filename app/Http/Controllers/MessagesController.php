<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    
    public function store(Request $request,$id){
    $this->validate($request, [
        'body' => 'required',
        'article' => 'required',
    ]);
    
    $message = Message::create([
        'body' => request('body'),
        'article' => request('article'),
        'user_id_to' => $id,
        'user_id_from' => auth()->id(),
    ]);
    return back();
    }
    public function showDialog(User $user)
    {
    $messages_from = $user->messages_from_user->unique('user_id_to');
    $messages_to = $user->messages_to_user->unique('user_id_from');
    $uniq_name = array();
    foreach ($messages_from as $message)
    {
        $name = $message->user_message_to->name;
        $uniq_name[$name] = $message->user_message_to;
    }
    foreach ($messages_to as $message)
    {
        $name = $message->user_message_from->name;
        if (!isset($uniq_name[$name]))
        {
        $uniq_name[$name] = $message->user_message_from;
        }
    }
    return view('profiles.showdialog', ['users' => $uniq_name]);
    }

    public function showCurrent(User $user, User $with_user) {
        $messages = Message::where(function ($query) use ($user,$with_user) {
            $query->where('user_id_from', $user->id)
                ->where('user_id_to', $with_user->id);
        })->orWhere(function($query) use ($user,$with_user) {
            $query->where('user_id_to', $user->id)
                ->where('user_id_from', $with_user->id);
        })->orderBy('updated_at', 'asc')->get();

        return view('profiles.message', [
            'messages' => $messages,
            'user' => $user,
            'with_user' => $with_user
        ]);  
}
}

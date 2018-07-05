<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Channel;
use App\Theme;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request,Channel $channel, Theme $theme)
    {
        $this->validate($request, [
            'body' => 'required|max:355',
        ]);

        $comment = Comment::create([
            'body' => request('body'),
            'theme_id' => $theme->id,
            'user_id' => auth()->id(),
        ]);
        return back()->withInput();
        
    }
}

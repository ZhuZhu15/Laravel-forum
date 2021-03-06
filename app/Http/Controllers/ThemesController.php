<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Channel;
use App\Comment;
class ThemesController extends Controller
{

    public function create($name)
    {
        return view('themes.create',['name' => $name]);
    }

    public function store(Request $request, $name)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'body' => 'required|max:50',
        ]);
        $id = Channel::where('name', $name)->value('id');
        $theme = Theme::create([
            'name' => request('name'),
            'body' => request('body'),
            'user_id' => auth()->id(),
            'channel_id' => $id,
        ]);
       return redirect('/channels/'.$name);
    }
    public function show(Channel $channel, Theme $theme) {
        $comments = $theme->comments()->paginate(5);
        return view('themes.show', ['channel' => $channel,
         'theme'=> $theme,
         'comments' => $comments,]);
    }
    public function delete(Theme $theme)
    {
       $this->authorize('update', $theme);
       $theme->comments()->delete();
       $theme->delete();
       return back();  
    }    
}

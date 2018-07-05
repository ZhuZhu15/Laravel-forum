<?php
namespace App\Http\Controllers;

use App\Channel;
use App\Theme;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function create()
    {
        return view('channels.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'body' => 'required|max:50',
        ]);

        $channel = Channel::create([
            'name' => request('name'),
            'body' => request('body')
        ]);

        return view('home');
    }
    public function show(Channel $channel)
    {
        $themes = $channel->themes;
        return view('channels.show', ['themes' => $themes, 'channel' => $channel]);
    }
} 
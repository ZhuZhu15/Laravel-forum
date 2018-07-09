<?php

namespace App\Http\Controllers;
use App\User;
use app\Comment;


class ProfilesController extends Controller
{

    public function show(User $user)
    {
       /* $comments_first = $user->comments->sortByDesc('updated_at')->take(5);
        $comments_second = $user->comments()->orderBy('updated_at','desc')->limit(5)->get();

        
        foreach ($comments_first as $comment)
        {
            echo $comment->body . "  ";
        }
        echo "<br>";
        foreach ($comments_second as $comment) {
            echo $comment->body . "  " ;
          };*/
        

         return view('profiles.show', [
            'profileUser' => $user,
            'themes' => $user->themes()->paginate(3),
            'comments' => $user->comments->sortByDesc('updated_at')->take(5),
        ]);
    }
} 


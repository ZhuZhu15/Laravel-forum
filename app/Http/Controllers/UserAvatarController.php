<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class UserAvatarController extends Controller
{
  /**
   * Обновление аватара пользователя.
   *
   * @param  Request  $request
   * @return Response
   */
  public function avatar(Request $request, User $user)
  {
    request()->validate([
      'avatar' => ['required', 'image']
    ]);
    if(isset($user->img)){
      Storage::delete('public/avatars/'.$user->img);
    }
    $img = $request->file('avatar')->store('public/avatars');
    $img = str_replace('public/avatars/',"",$img);
    $avatar = User::where('id', $user->id)
        ->update(['img' => $img]);
    return back()->withInput();
  }
}
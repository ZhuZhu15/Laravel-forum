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
      Storage::delete('public/'.$user->img);
    }
    $img = $request->file('avatar')->store('public');
    $img = str_replace('public/',"",$img);
    $avatar = User::where('id', $user->id)
        ->update(['img' => $img]);
    return back()->withInput();
  }
}
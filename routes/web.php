<?php
use app\Theme;
use app\Comment;
use App\User;
use app\Message;
use Illuminate\Support\Facades\Storage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('channels/create', 'ChannelsController@create')->middleware('auth');
Route::post('channels', 'ChannelsController@store')->middleware('auth');
Route::get('channels/{channel}', 'ChannelsController@show')->name('channel');
Route::get('channels/{name}/createtheme', 'ThemesController@create')->middleware('auth');
Route::post('channels/{name}/themes', 'ThemesController@store')->middleware('auth');
Route::get('profiles/{user}', 'ProfilesController@show')->name('profile');
Route::get('channels/{channel}/{theme}', 'ThemesController@show')->name('theme');
Route::get('/test', function(){
   $user = User::find(1);
   $msg_from_user = $user->comments_from_user;
   foreach ($msg_from_user as $message){
       echo $message->body . "<br/>";
       echo "from " . $message->user_comment_from->name . "<br/>";
       echo "to " . $message->user_comment_to->name . "<br/>";
       echo "<hr>";
   }
   $msg_to_user = $user->comments_to_user;
   foreach ($msg_to_user as $message){
       echo $message->body . "<br/>";
       echo "from " . $message->user_comment_from->name . "<br/>";
       echo "to " . $message->user_comment_to->name . "<br/>";
   }
});
Route::post('profiles/{user}/avatar', 'UserAvatarController@avatar')->name('avatar')->middleware('auth');
Route::post('/channels/{channel}/{theme}/createcomment', 'CommentsController@store')->name('create-comment')->middleware('auth');

Auth::routes();


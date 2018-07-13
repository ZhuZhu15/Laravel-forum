<?php
use App\Theme;
use App\Comment;
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

Route::get('/', 'HomeController@index')->name('home');
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
Route::get('/test2', function(){
    $themes = Theme::all();
    foreach ($themes as $theme) {
        echo $theme->channel->id;
      }
    $comments = Comment::all();
    foreach ($comments as $comment) {
        echo $comment->owner->name;
      } 
 });
Route::post('profiles/{user}/avatar', 'UserAvatarController@avatar')->name('avatar')->middleware('auth');
Route::post('/channels/{channel}/{theme}/createcomment', 'CommentsController@store')->name('create-comment')->middleware('auth');
Route::post('comment/{comment}', 'CommentsController@delete')->name('delete-comment')->middleware('auth');
Route::post('theme/{theme}', 'ThemesController@delete')->name('delete-theme')->middleware('auth');
Route::post('message/{user}', 'MessagesController@store')->name('send-message')->middleware('auth');
Route::get('profiles/{user}/readmessage', 'MessagesController@showDialog')->name('read-message')->middleware('auth');
Route::get('profiles/{user}/readmessage/{with_user}', "MessagesController@showCurrent")->name('current-message')->middleware('checkuser');
Route::get('/test2', function(){
    $str = "Hello world!";
    $str = str_split($str);
    for($i=count($str)-1; $i>=0; $i--)
    {
        echo $str[$i];
    }
  });
Auth::routes();


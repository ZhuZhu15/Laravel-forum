<?php
use app\Theme;
use app\Comment;
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
   return view('avatar');
});
Route::post('profiles/{user}/avatar', 'UserAvatarController@avatar')->name('avatar')->middleware('auth');
Route::post('/channels/{channel}/{theme}/createcomment', 'CommentsController@store')->name('create-comment')->middleware('auth');

Auth::routes();


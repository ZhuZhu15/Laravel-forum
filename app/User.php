<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }
    public function comments()
    {
      return $this->HasMany('App\Comment');
    }
    public function comments_to_user() {
        return $this->hasMany('App\Message', 'user_id_to', 'id');
    }
    public function comments_from_user() {
        return $this->hasMany('App\Message', 'user_id_from', 'id');
    }
    

}

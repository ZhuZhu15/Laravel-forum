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
        return $this->hasMany(Theme::class)->latest();
    }

}

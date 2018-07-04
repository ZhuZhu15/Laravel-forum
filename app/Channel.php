<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $guarded = [];
        
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function themes()
    {
        return $this->hasMany('App\Theme');
    }
}
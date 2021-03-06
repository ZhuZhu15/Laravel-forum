<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function channel()
    {
      return $this->belongsTo('App\Channel');
    }

    public function comments()
    {
      return $this->HasMany('App\Comment');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }

    protected $guarded = [];
}

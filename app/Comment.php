<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function theme()
    {
      return $this->belongsTo('App\Theme', 'theme_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    protected $guarded = [];
}

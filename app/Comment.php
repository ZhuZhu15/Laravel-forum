<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function theme()
    {
      return $this->belongsTo('App\Theme');
    }

    public function user()
    {
      return $this->belongTo('App\User');
    }
}

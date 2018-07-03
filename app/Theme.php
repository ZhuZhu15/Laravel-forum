<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function channels()
    {
      return $this->belongsTo('App\Channel');
    }
    protected $guarded = [];
}

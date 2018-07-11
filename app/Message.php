<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user_comment_to() {
        return $this->belongsTo('App\User', 'user_id_to', 'id');
    }
    public function user_comment_from() {
        return $this->belongsTo('App\User', 'user_id_from', 'id');
    }
    protected $guarded = [];
}

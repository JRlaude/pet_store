<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heart extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 
     ];
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_id', 'receiver_id', 'message',
     ];
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}

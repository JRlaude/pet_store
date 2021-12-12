<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'image', 'captions',
     ];
     public function hearts(){
        return $this->hasMany(Heart::class);
       }
       public function comments(){
        return $this->hasMany(Comment::class);
       }
       public function user()
       {
           return $this->belongsTo(User::class);
       }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',  'pet_id', 'status','date'
     ];

     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function pet()
     {
         return $this->belongsTo(Pet::class);
     }
}

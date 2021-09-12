<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'pet_category_id','img' , 'name',  'description', 'price', 
     ];
     public function reservations(){
         return $this->hasOne(Reservation::class);
        }
}

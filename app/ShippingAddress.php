<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = [
         'user_id', 'houseNumber', 'street', 'brgy', 'city', 'province', 'country', 
    ];
}

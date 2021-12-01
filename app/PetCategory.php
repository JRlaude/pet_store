<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public function pets(){
        return $this->hasMany(Pet::class);
       }
       
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
       'category_id','img' , 'name',  'description', 'price','quantity',
    ];
    public function carts(){
        return $this->hasMany(Cart::class);
       }
       public function order_details(){
        return $this->hasMany(OrderDetails::class);
       }
       public function category(){
        return $this->belongsTo(Category::class);
       }
}

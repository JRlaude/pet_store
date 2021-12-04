<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',  'shipping_address','packing_time','delivery_time','arrival_time','status','date'
     ];

     public function order_details(){
        return $this->hasMany(OrderDetails::class);
       }
       public function user(){
        return $this->belongsTo(User::class);
 }
}

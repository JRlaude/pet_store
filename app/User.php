<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'email', 'password', 'first_name','last_name','contact_number','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getName()
    {
      return "{$this->first_name} {$this->last_name}";
    }
    //    public function getRouteKeyName(){
    //     return 'first_name';
    // }
    public function carts(){
        return $this->hasMany(Cart::class);
       }
       public function orders(){
        return $this->hasMany(Order::class);
       }
       public function reservations(){
        return $this->hasMany(Reservation::class);
       }
       public function shipping_addresses(){
        return $this->hasMany(ShippingAddress::class);
       }
       public function posts(){
        return $this->hasMany(Post::class);
       }
       public function hearts(){
        return $this->hasMany(Heart::class);
       }
       public function comments(){
        return $this->hasMany(Comment::class);
       }
       public function messages(){
        return $this->hasMany(Message::class);
       }
}

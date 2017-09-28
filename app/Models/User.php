<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Cart as Cart;
use App\Models\Order as Order;

class User extends Authenticatable
{
   /* protected $fillable = [
        'name', 'email', 'password',
    ]; */
    
   /* protected $hidden = [
        'password', 'remember_token',
    ]; */
  
    public function cart(){
      return $this->hasMany(Cart::class, 'id_user');
    }
    
    public function order(){
      return $this->hasMany(Order::class, 'id_user');
    }
    
}
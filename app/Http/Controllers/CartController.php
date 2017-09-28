<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }  
  
    public function index()
    {
      
      $id = Auth::User()->id;
      $categories = Category::all();
      $carts = Cart::where('id_user', $id)->get();
      return view('cart', compact('carts','categories'));
    }

    public function addCart($id)
    {
     
      $user = Auth::User()->id;    
      $product = Product::find($id);
      $cart_existent = Cart::where('id_product',$product->id)->get()->first();
          
      if($cart_existent){
        $cart_existent->quantity += 1;
        $cart_existent->save();
        
        
        
        return redirect()->back();
      }else{ 
        
        $cart = new Cart();
        $cart->name = $product->name;
        $cart->price = $product->price;
        $cart->quantity = 1;
        $cart->total = $product->price; 
        $cart->id_product = $product->id;
        $cart->product_imagePath = $product->imagePath;
        $cart->id_user = $user;
        $cart->save();
        
        return redirect()->back();
       }
        
    } 
    
    public function incrementProductCart($id){
      
      
      $user = Auth::User()->id;    
      $product = Product::find($id);
      $cart_increment = Cart::where('id_user',$user)
                            ->where('id_product',$product->id)
                            ->get()->first();
      
      $cart_increment->quantity += 1;
      $qtt = intval($cart_increment->quantity);
      $cart_increment->total = ($qtt * $product->price);
      $cart_increment->save();
      
      
         
      return redirect()->back();
    }
  
    public function decrementProductCart($id){
      $user = Auth::User()->id;
      $product = Product::find($id);
      $cart_decrement = Cart::where('id_user',$user)
                            ->where('id_product',$product->id)
                            ->get()->first();
      
      $price = $cart_decrement->price;
      
      $cart_decrement->quantity -= 1;
      if($price == $cart_decrement->total){
        
      }else{
        $cart_decrement->total -= $price;
      }
      $cart_decrement->save();
         
      return redirect()->back();
    }
  
    public function deleteCart($id){
      $user = Auth::User()->id;    
      $cart_delete = Cart::where('id_user',$user)
                            ->where('id', $id)
                            ->get()->first();
      
      
      $cart_delete->destroy($id);
      return redirect()->back();
    }
  
}

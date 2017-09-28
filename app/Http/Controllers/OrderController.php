<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Freight;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    
    public function index()
    {
        $categories = Category::all();
        $orders = Order::where('id_user', Auth::User()->id)->get();
      
        return view('order',compact('orders','categories'));
    }

    public function buyFinish($id)
    {
        $user = Auth::User()->id;
      
        $checkout = Checkout::where('id_user',$user)
                            ->where('id',$id)
                            ->get()->first();  
      
        $freight = Freight::where('id_checkout',$id)
                          ->get()->first();  
      
        $order = new Order();
        $order->name = $checkout->name;
        $order->price = $checkout->price;
        $order->quantity = $checkout->quantity;
        $order->total =  $checkout->total;
        $order->zipcode = $freight->zipcode;
        $order->type_freight =$freight->type_freight;
        $order->value_freight = $freight->value;
        $order->delivery = $freight->delivery;
        $order->id_product = $checkout->id;
        $order->product_imagePath = $checkout->product_imagePath;
        $order->id_user = $user;
      
        $order->save();
        
        $cart = Cart::where('id_user',$user)
                            ->where('id_product',$checkout->id_product)
                            ->get()->first();  
        
        if($cart){
    
          $id = $cart->id;
          $cart->destroy($id);
        }
      
        if($checkout){
    
          $id = $checkout->id;
          $checkout->destroy($id);
        }
      
        if($freight){
    
          $id = $freight->id;
          $freight->destroy($id);
        }
      
        return redirect('order');
    }
  
    public function canceleOrder($id)
    {
      $user = Auth::User()->id;
      $cancele = Order::where('id',$id)
                       ->where('id_user', $user)
                       ->get()
                       ->first();
      
      $cancele->destroy($id);
      
      return redirect('order');
    }
}
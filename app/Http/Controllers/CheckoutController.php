<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Cart;
use App\Models\Product;
use App\Models\user;
use App\Models\Checkout;
use App\Models\Category;
use App\Models\Freight;
use Auth;

class CheckoutController extends Controller
{
    
    public function __construct()
    {
      $this->middleware('auth');
    }
  
    public function index(){
      
      $user = Auth::User()->id;    
      $categories = Category::all();
      $checkouts = Checkout::where('id_user',$user)->get();
      $freights = Freight::all();
      return view('checkout', compact('checkouts', 'categories','freights'));
    }  
  
    public function store($id, $zipcode, $type_freight, $id_cart = 0)
    {
      
      $product = Product::find($id); 
      
      if(empty($zipcode) && empty($type_zipcode)){
        

        $weight = floatval($product->weight);
        $length = intval($product->length);
        $width = intval($product->width);
        $height = intval($product->height);
        $diameter = intval($product->diameter);
        
        //$user_zip = Auth::User()->zipcode;
        $user_zip = 58302165;
        $type_freight = 40010; //41106;
        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?StrRetorno=xml&nCdServico=$type_freight&nVlPeso=$weight&sCepOrigem=58300970&sCepDestino=$user_zip&nCdFormato=1&nVlComprimento=32&nVlAltura=$width&nVlLargura=$height&nVlDiametro=$diameter&sCdAvisoRecebimento=s&sCdMaoPropria=n";
        $xml = simplexml_load_file($url);
        $bruto = $xml->cServico;

        $value = strval($bruto->Valor);
        $delivery = strval($bruto->PrazoEntrega);
        
     }else{
        $weight = floatval($product->weight);
        $length = intval($product->length);
        $width = intval($product->width);
        $height = intval($product->height);
        $diameter = intval($product->diameter);
        
        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?StrRetorno=xml&nCdServico=$type_freight&nVlPeso=$weight&sCepOrigem=58300970&sCepDestino=$zipcode&nCdFormato=1&nVlComprimento=32&nVlAltura=$width&nVlLargura=$height&nVlDiametro=$diameter&sCdAvisoRecebimento=s&sCdMaoPropria=n";
        $xml = simplexml_load_file($url);
        $bruto = $xml->cServico;

        $value = strval($bruto->Valor);
        $delivery = strval($bruto->PrazoEntrega);
      }
           
      $user = Auth::User()->id;    
      $product = Product::find($id);
      $checkout_existent = Checkout::where('id_product',$product->id)->get()->first();
          
      if($checkout_existent){
        
        $fgt = Freight::where('id_checkout', $checkout_existent->id)->get()->first();
        
        $checkout_existent->quantity += 1;
        $qtt = intval($checkout_existent->quantity);
        $checkout_existent->total = ($qtt * $checkout_existent->price) + ($qtt * $fgt->value);
        $checkout_existent->save();
        
        return redirect('checkout');
      }else{ 
        
        $checkout = new Checkout();
        $checkout->name = $product->name;
        $checkout->price = $product->price;
        if($id_cart != 0){
          $cart = Cart::find($id_cart);
          //return $cart->quantity;
          $checkout->quantity = $cart->quantity;
        }else{
          $checkout->quantity = 1;  
        }
        $checkout->total = ($product->price * $checkout->quantity) + ($value + $checkout->quantity);
        $checkout->id_product = $product->id;
        $checkout->product_imagePath = $product->imagePath;
        $checkout->id_user = $user;
        $checkout->save();
        
        return redirect()->action(
          'FreightController@store', [
                                        
          'id_checkout' => $checkout->id,
          'user_zip'=> $user_zip,
          'zipcode' => $zipcode,
          'type_freight' => $type_freight,
          'value' => $value,
          'delivery' => $delivery
                                     ]
        );
        
      }
      
    }
  
    public function incrementProductCheckout($id){
      $user = Auth::User()->id;    
      $product = Product::find($id);
      $checkout_increment = Checkout::where('id_user',$user)
                            ->where('id_product',$product->id)
                            ->get()->first();
      
      $fgt = Freight::where('id_checkout', $checkout_increment->id)->get()->first();
      
      $checkout_increment->quantity += 1;
      $qtt = intval($checkout_increment->quantity);
      $checkout_increment->total = ($qtt * $product->price) + ($qtt * $fgt->value);
      $checkout_increment->save();
      
      
         
      return redirect()->back();
    }
  
    public function decrementProductCheckout($id){
      $user = Auth::User()->id;
      $product = Product::find($id);
      $checkout_decrement = Checkout::where('id_user',$user)
                            ->where('id_product',$product->id)
                            ->get()->first();
     
      $fgt = Freight::where('id_checkout', $checkout_decrement->id)->get()->first();
      
      $price = $checkout_decrement->price;
      $checkout_decrement->quantity -= 1;
      
      if($price == $checkout_decrement->total){
        
      }else{
        $checkout_decrement->total -= $price+$fgt->value;
      }
      
      $checkout_decrement->save();
         
      return redirect()->back();
    }
  
    public function deleteCheckout($id){
      
      $user = Auth::User()->id;
      $cancele = Checkout::where('id',$id)
                         ->where('id_user', $user)
                         ->get()
                         ->first();
      
      $freght_cancele = Freight::where('id_checkout', $id )
                               ->get()
                               ->first();
      
      $cancele->destroy($id);
      
      if($freght_cancele){
        $id = $freght_cancele->id;
        $freght_cancele->destroy($id);
      }
      
      return redirect('checkout');
    }
}

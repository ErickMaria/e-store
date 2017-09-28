<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Product;
use App\Models\Freight;
use App\Models\Checkout;

class FreightController extends Controller
{
  
  public function __construct()
    {
      $this->middleware('auth');
    }
  
  public function freight(Request $request){
    
    $product = Product::find($request->id_product);    
    $this->validate($request, [
      'zipcode_freight'=>'required|min:8|max:9'
    ]);

    //$request->zipcode_freight = str_replace('_','',$request->zipcode_freight);
    
    $weight = floatval($product->weight);
    $length = intval($product->length);
    $width = intval($product->width);
    $height = intval($product->height);
    $diameter = intval($product->diameter);
    
    $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?StrRetorno=xml&nCdServico=$request->type_freight&nVlPeso=$weight&sCepOrigem=58300970&sCepDestino=$request->zipcode_freight&nCdFormato=1&nVlComprimento=32&nVlAltura=$width&nVlLargura=$height&nVlDiametro=$diameter&sCdAvisoRecebimento=s&sCdMaoPropria=n";
    $xml = simplexml_load_file($url);
    $bruto = $xml->cServico;
    $freight = [
      'value'=>strval($bruto->Valor),
      'delivery'=>strval($bruto->PrazoEntrega),
      'type_freight'=>$request->type_freight,
      'zipcode_freight'=>$request->zipcode_freight
    ];
    
    return redirect('details_product/'.$product->id)->with(compact('freight',$freight));
    
  }
  
  public function store($id_checkout,  $user_zip,  $zipcode, $type_freight, $value, $delivery){
    
    $checkout = Checkout::find($id_checkout);
    
    $freght = new Freight();
    
    if(isset($user_zip)){
      $freght->zipcode = $user_zip;
    }else{
      $freght->zipcode = $zipcode;
    }
    $freght->type_freight = $type_freight;
    $freght->value = $value;
    $freght->delivery = $delivery;
    $freght->id_checkout = $id_checkout;
    $freght->save();
      
    $checkout->total += $freght->value;
    $checkout->save();
     
    return redirect('checkout');
      
  }
  
}

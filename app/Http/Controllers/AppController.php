<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;

class AppController extends Controller
{
  
    public function __construct()
    {
      $this->middleware('auth');
    }

    
    
    // method for calculate freigth price, without action yet
    public function freight(Request $request){
      
      $this->validate($request,[
        'zip' => 'required|min:8|max:9'
      ]);
      
      return redirect()->back();
    }
    
    
    
    // Logout 
    public function logout(){
      
      Auth::logout();
      
      return redirect('login');
    }
  
          
    
}
 
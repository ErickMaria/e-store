<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Faker\Factory as Faker;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function index(){
      
      $categories = Category::all();
      $products = Product::paginate(16);
      $faker = Faker::create();
      
      return view('home', compact('products','faker','categories'));
      
    }
    
    //Page displayed when user selects a product
    public function show($id)
    {
      
      $categories = Category::all();
      $details_product = Product::find($id);
  
      return view('product_page' , compact('details_product','categories'));
    }
    
  
    // Search for product name
    public function search(Request $request){
      
      $search = $request->search_for;
      
      if(empty($search)){
        return redirect('/');
      }
      
      $categories = Category::all();
      $result_search = Product::where('name','LIKE', '%'.$search.'%')->get();
      
      return view('search',compact('result_search','categories'));
    }
    
}

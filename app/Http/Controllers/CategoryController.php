<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    // Filter product by category type
    public function filterCategoryByPoduct($id)
    {
      
      $categories = Category::all();
      $product_filted = Product::where('id_category', $id)->get();
      $category_filted = Category::find($id);
      
      return view('filter_category', compact('product_filted','category_filted','categories'));
    }
}

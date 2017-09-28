<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }  
  
    public function index()
    {
        //
    }
    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
}

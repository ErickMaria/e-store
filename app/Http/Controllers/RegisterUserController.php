<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Models\User;

class RegisterUserController extends Controller
{
    // Stores and validates data sent by the registration page
    function store(Request $request){
      
      $this->validate($request,[
        'name'=>'required|between:10,50',
        'email'=>'required',
        'password'=>'required|between:8,15',
        'check_password'=>'required|between:8,15|same:password',
        'birthdate'=>'required',
        'phone'=>'required',
        'zipcode'=>'required',
        'address'=>'required',
        'address_number'=>'required',
        'neighborhood'=>'required',
        'city'=>'required',
        'state'=>'required'
      ]);
      
     $data = User::where('email', '=', $request->email)->get()->first();
      
     if(count($data) != 0){
        $errordb = 'This email is already used';
        return view('register_page', compact('errordb'));
      } 
      
     $newUser = new User();
     
     $newUser->name = $request->name;
     $newUser->email = $request->email;
     $newUser->password = Hash::make($request->password);
     $newUser->birthdate = $request->birthdate;
     $newUser->phone = $request->phone;
     $newUser->zipcode = $request->zipcode;
     $newUser->address = $request->address;
     $newUser->address_number = $request->address_number;
     $newUser->neighborhood = $request->neighborhood;
     $newUser->city = $request->city;
     $newUser->state = $request->state;
     
     $newUser->save();
      
      return redirect('/');
    }
}

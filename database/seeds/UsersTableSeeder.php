<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Faker\Provider\Address;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
      
        User::truncate();
       
        $faker = Faker::create();
      
          User::create([
            'name'=>'Account Test',
            'email'=>'test@gmail.com',
            'password'=>Hash::make('test'),
            'birthdate'=>$faker->date('Y-m-d'),
            'phone'=>$faker->phoneNumber,
            'zipcode'=>'58302-165',
            'address'=>$faker->address,
            'address_number'=>46,
            'complement'=>$faker->text,
            'city'=>$faker->city,
            'state'=>$faker->state
          ]);
      
    }
}

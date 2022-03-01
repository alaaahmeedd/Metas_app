<?php

namespace App\Http\Controllers;

use App\Models\Person;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request){

        $fields = $request->validate([
            'name' =>'required|string',
            'email' =>'required|string||unique:users,email',
            'nationality' =>'required|string',
            'password' =>'required|string',
            'phone' => ' required|digits:10',
            'gender' =>'required|string'

            // 'password' =>'required|string|confirmed'
        ]);

        $user = Person::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'nationality' => $fields['nationality'],
            'password' => bcrypt($fields['password']),
            'phone' => $fields['phone'],
            'gender' => $fields['gender'],
            
        ]);

    }

    public function login(Request $request){

        $fields = $request->validate([
            'email' =>'required|string',
            // 'email' =>'required|string||unique:users,email',
            'password' =>'required|string',
            // 'password' =>'required|string|confirmed'
        ]);

        // Check email
        $user = Person::where('email', $fields['email'])->first();

        // Check password
        if(Hash::check($fields['password'], $user->password)) {
            return response()->json(['message'=> Person::where('email', $fields['email'],200)->first(), 
        ]);
    }

        // Check password
        if(!Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        
            
        }

   
        }
        
    }

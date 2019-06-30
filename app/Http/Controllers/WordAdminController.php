<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use Illuminate\Support\Facades\Hash;

class WordAdminController extends Controller
{
    public function registerPatient(Request $request){
    	// return $request;
    		$request->validate([
    			'name' => ['required', 'string', 'max:255'],
    			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    			'password' => ['required', 'string', 'min:8', 'confirmed'],
    			'age' => ['required', 'integer'],
    			'phone' => ['required', 'string','max:255'],
    			'bed' => ['required'],
    			'address' => ['required','string'],
    		]);
    		$user_id=User::create([
    	        'name' => $request->input('name'),
    	        'email' => $request->input('email'),
    	        'password' => Hash::make($request->input('password')),
    	        'type' => 2,
    	    ])->id;

    	    $patient =Patient::create([
    	    	'user_id' => $user_id,
    	    	'age' => $request->input('age'),
    	    	'phone' => $request->input('phone'),
    	    	'address' => $request->input('address'),
    	    	'attendants_name' => $request->input('attendants_name') ,
    	    	'attendants_phone' => $request->input('attendants_phone') ,
    	    	'word_id' => $request->input('word'),
    	    	'bed' => $request->input('bed'),
    	    ]);

    	    // $user = User::find($user_id);
    	    // $user->patient()->save($user);
    	    return redirect()->back()->with('success', 'Patient Account created successfully!');
    }
}

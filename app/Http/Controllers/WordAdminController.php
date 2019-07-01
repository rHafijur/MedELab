<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Patient;
use App\WordAdmin;
use App\Doctor;
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

    public function patients(){
        $patients= Auth::user()->wordAdmin->word->patients;

        return view('wordadmin.patients',compact('patients'));
    }
    public function patient($id){
        $patient= Patient::find($id);
        if ($patient==null) {
            return abort(404);
        }
        return view('wordadmin.patient',compact('patient'));
    }
    public function assignDoctor(Request $request){
        $doctor=Doctor::find($request->input('doctor'));
        try{

        $doctor->patients()->attach($request->input('patient'));
    }catch(QueryException $e){

        return redirect()->back()->with('success', 'Doctor Assigned successfully!');
    }

       

        return redirect()->back()->with('faild', 'Something went wrong! please try again.');
        

    }
}

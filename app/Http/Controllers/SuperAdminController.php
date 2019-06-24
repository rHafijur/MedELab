<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\WordAdmin;
use Illuminate\Support\Facades\Hash;
use PDF;

class SuperAdminController extends Controller
{
    public function index(Request $request){
    	return view('superadmin.home');
    }
    public function generatelabel(){
    	return view('superadmin.generatelabel');
    }
    public function showGeneratedLabel(Request $request){
    	// return view('superadmin.labels');
    	$number=$request->input('number');
    	$pdf = PDF::loadView('superadmin.labels',compact("number"));
    	return $pdf->download("Labels".date("d-m-y").".pdf");
    }
    public function registerUser(Request $request){
    	$request->validate([
    		'name' => ['required', 'string', 'max:255'],
    		'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    		'password' => ['required', 'string', 'min:8', 'confirmed'],
    		'type' => ['required', 'integer'],
    	]);
    	$user_id=User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('type'),
        ])->id;
    	if ($request->input('word')!=null) {
    		WordAdmin::create([
    			'user_id'=>$user_id,
    			'word_id'=>$request->input('word'),
    		]);
    	}
    	return "Success";
    }
}

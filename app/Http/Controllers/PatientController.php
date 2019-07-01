<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use PDF;

class PatientController extends Controller
{
    public function generateIdCard($id){
    	$patient=Patient::find($id);
    	// return view('patient.generate_id_card',compact('patient'));
    	return PDF::loadView('patient.generate_id_card',compact("patient"))->stream();
    }
}

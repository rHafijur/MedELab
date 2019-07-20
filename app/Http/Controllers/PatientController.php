<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Doctor;
use App\Prescription;
use PDF;

class PatientController extends Controller
{
    public function index(){
        $id = Auth::id();
        $patient= Auth::user()->patient;
        // dd($patient);
        return view('patient.patient',compact('patient')); 
    }

    public function generateIdCard($id){
    	$patient=Patient::find($id);
    	// return view('patient.generate_id_card',compact('patient'));
    	return PDF::loadView('patient.generate_id_card',compact("patient"))->stream();
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

    public function addPrescription(Request $request){
        // dd($request);
        $pId=Prescription::create(['patient_id'=>$request->patient,'doctor_id'=>$request->doctor])->id;
        $i=0;
        foreach($request->medicine as $medicine){
            $morning=isset($request->morning[$i])?1:0;
            $afternoon=isset($request->afternoon[$i])?1:0;
            $night=isset($request->night[$i])?1:0;
            Prescription::find($pId)->medicines()->attach($medicine,['morning'=>$morning,'afternoon'=>$afternoon,'night'=>$night]);
            $i++;
        }
        $j=0;
        foreach ($request->tests as $test) {
            Prescription::find($pId)->tests()->attach($test);
        }
        return redirect()->back()->with('success', 'Prescription saved successfully!');

    }


}

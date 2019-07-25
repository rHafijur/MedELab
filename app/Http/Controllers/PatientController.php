<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Doctor;
use App\TestOrder;
use App\Prescription;
use PDF;

class PatientController extends Controller
{
    public function index(){
        $id = Auth::id();
        $patient= Auth::user()->patient;
        // dd($id); 
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

    
    public function setTubeId(Request $request){
        $testOrder= TestOrder::find($request->test_order_id);
        $testOrder->sample_id=$request->sample_id;
        $testOrder->save();
        return redirect()->back()->with('success','Updated successfully');
    }


}

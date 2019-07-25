<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Patient;
use App\Prescription;

class DoctorController extends Controller
{
    public function index(){
        return view('doctor.index');
    }
    public function searchPatient(Request $request){
        $patient=Patient::findOrFail($request->id);
        $doctor=auth()->user()->doctor;
        $assigned=$patient->doctors->where('id',"$doctor->id")->count();
        // dd($assigned);
        return view('doctor.patient',compact('patient','doctor','assigned'));
    }
    public function assignPatient(Request $request){
        $doctor=auth()->user()->doctor;
        $doctor->patients()->attach($request->patient_id);
        return redirect()->back();
    }
    public function removePatient(Request $request){
        $doctor=auth()->user()->doctor;
        // dd($doctor->patients());
        $doctor->patients()->detach($request->patient_id);
        return redirect()->back();
    }
    public function addPrescription(Request $request){
        // dd($request);
        $pId=Prescription::create(['patient_id'=>$request->patient,'doctor_id'=>auth()->user()->doctor->id])->id;
        $i=0;
        foreach($request->medicine as $medicine){
            $morning=isset($request->morning[$i])?1:0;
            $afternoon=isset($request->afternoon[$i])?1:0;
            $night=isset($request->night[$i])?1:0;
            if($medicine==""){
                continue;
            }
            Prescription::find($pId)->medicines()->attach($medicine,['morning'=>$morning,'afternoon'=>$afternoon,'night'=>$night]);
            $i++;
        }
        $j=0;
        foreach ($request->tests as $test) {
            if($test==""){
                continue;
            }
            Prescription::find($pId)->tests()->attach($test);
        }
        return redirect()->back()->with('success', 'Prescription saved successfully!');

    }
}

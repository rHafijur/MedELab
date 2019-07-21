<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;

class CounterAdminController extends Controller
{
    public function index(){
        return view('counter_admin.index');
    }
    public function patientPrescriptions(Request $request){
        $patient_id=$request->patient_id;
        if($patient_id==null){
            return redirect()->back();
        }
        $patient=Patient::find($patient_id);
        if($patient==null){
            return redirect()->back();
        }
        return view('counter_admin.prescriptions',compact('patient'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prescription;

class PrescriptionController extends Controller
{
    public function show($id){
        $prescription=Prescription::find($id);
        return view('prescription',compact('prescription'));
    }
}

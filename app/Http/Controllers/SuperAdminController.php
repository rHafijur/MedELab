<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class SuperAdminController extends Controller
{
    public function index(){
    	return view('superadmin.home');
    }
    public function generatelabel(){
    	return view('superadmin.generatelabel');
    }
    public function showGeneratedLabel(){
    	// return view('superadmin.labels');
    	$pdf = PDF::loadView('superadmin.labels');
    	return $pdf->stream();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RemotePatient;

class RemotePatientController extends Controller
{
    public function index(){
        $orders=auth()->user()->remotePatient->remoteTestOrders()->latest()->get();
        // dd($orders);
        return view('remote_patient.index',compact('orders'));
    }
}

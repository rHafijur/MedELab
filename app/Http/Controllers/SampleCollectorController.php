<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RemoteTestOrder;

class SampleCollectorController extends Controller
{
    public function index(){
        $orders=RemoteTestOrder::latest()->get();
        // dd($orders);
        return view('sample_collector.index',compact('orders'));
    }
    // public function 
}

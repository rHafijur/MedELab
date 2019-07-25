<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestOrder;

class LabAdminController extends Controller
{
    public function index(){
        return view('lab_admin.index');
    }
    public function searchOrders(Request $request){
        $orders=TestOrder::where('sample_id',$request->tube_id)->get();
        // dd($orders);
        return view('lab_admin.search_orders',compact('orders'));
    }
}

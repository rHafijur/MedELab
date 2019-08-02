<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\PharmacyMedicine;
use App\OrderMedicine;

class OrderController extends Controller
{
    public function viewOrderForm(){
        return view('patient.order_medicine');
    }
    public function createOrder(Request $request){
        // dd($request);
        $total=0;
        $i=0;
        foreach($request->medicine_id as $id){
            $total+=PharmacyMedicine::find($id)->price * $request->quantity[$i++];
        }
        // echo $total;
        // dd($total);
        $order_id=Order::create([
            'patient_id'=>auth()->user()->patient->id,
            'total_price'=>$total,
        ])->id;
        $i=0;
        foreach($request->medicine_id as $id){
            OrderMedicine::create([
                'order_id'=>$order_id,
                'pharmacy_medicine_id'=>$id,
                'quantity'=>$request->quantity[$i++],
                'unit_price'=>PharmacyMedicine::find($id)->price,
            ]);
        }
        return "Success";

    }
    public function orders(){
        return auth()->user()->patient->orders;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prescription;
use App\Payment;
use App\TestPayment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function make_payment($prescription_id){
        $prescription= Prescription::findOrFail($prescription_id);
        return view('counter_admin.payment',compact('prescription'));
    }
    public function save_payment(Request $request){
        $prescription_id=$request->prescription_id;
        $counter_admin_id=Auth::user()->counter_admin->id;
        $prescription= Prescription::findOrFail($prescription_id);
        $patient_id=$prescription->patient->id;
        $sum=0;
        $testPayments=[];
        foreach($prescription->tests as $test){
            array_push($testPayments,
                new TestPayment([
                    'test_id'=>$test->id,
                    'price'=>$test->price,
                ])
            );
            $sum+=$test->price;
        }
        $payment= $prescription->payment()->create([
            'patient_id'=> $patient_id,
            'counter_admin_id'=> $counter_admin_id,
            'total_price'=>$sum,
        ]);
        foreach($testPayments as $testPayment){
            $payment->testPayments()->save($testPayment);
        }
        return redirect('couter_admin/invoice/'.$payment->id);
    }
    public function invoice($payment_id){
        $payment=Payment::findOrFail($payment_id);
        $prescription=$payment->prescription;
        // dd();
        return view('counter_admin.invoice',compact('payment','prescription'));
    }
}

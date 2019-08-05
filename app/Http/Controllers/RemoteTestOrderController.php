<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RemoteTestOrder;
use App\RemoteTestOrderTest;
use App\Test;

class RemoteTestOrderController extends Controller
{
    public function viewOrderForm(){
        return view('remote_patient.test_order_form');
    }
    public function view($id){
        $order=RemoteTestOrder::find($id);
        // dd($order->tests[0]->pivot);
        return view('remote_patient.test_order',compact('order'));
    }
    public function collectorView($id){
        $order=RemoteTestOrder::find($id);
        // dd($order->tests[0]->pivot);
        return view('sample_collector.test_order',compact('order'));
    }
    public function createOrder(Request $request){
        // dd($request);
        $total=0;
        foreach($request->test_id as $test_id){
            $total+=Test::find($test_id)->price;
        }
        $order= RemoteTestOrder::create([
            'remote_patient_id'=>auth()->user()->remotePatient->id,
            'total_price'=>$total,
        ]);
        foreach($request->test_id as $test_id){
            $test=Test::find($test_id);
            $order->remoteTestOrderTests()->create(['test_id'=>$test->id,'price'=>$test->price, 'pathology_department_id'=>$test->pathology_department_id]);
        }

    }
    public function setTubeId(Request $request){
        $remoteTestOrderTest=RemoteTestOrderTest::find($request->test_order_id);
        $remoteTestOrderTest->sample_id=$request->sample_id;
        $remoteTestOrderTest->save();
        return redirect()->back();
    }
}

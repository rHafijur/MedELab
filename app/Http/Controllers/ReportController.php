<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TestOrder;
use App\Report;
use App\ReportSubtest;

class ReportController extends Controller
{
    public function make($order_id){
        $order=TestOrder::find($order_id);
        // dd($order->test->subtests);
        return view('lab_admin.make_report',compact('order'));
    }
    public function create(Request $request){
        $order_id=$request->order_id;
        $report_id= Report::create([
            'test_order_id'=>$order_id,
            'lab_admin_id'=>auth()->user()->labAdmin->id
        ])->id;
        $i=0;
        foreach($request->subtest_id as $subtest_id){
            ReportSubtest::create([
                'report_id'=>$report_id,
                'subtest_id'=>$subtest_id,
                'value'=>$request->value[$i]
            ]);
        $i++;
        }
    }
}

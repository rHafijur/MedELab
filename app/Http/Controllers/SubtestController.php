<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subtest;

class SubtestController extends Controller
{
    public function create(Request $request){
        $stest=new Subtest();
        $stest->test_id =$request->test_id;
        $stest->title =$request->title;
        $stest->reference_values =$request->reference_values;
        $stest->unit =$request->unit;
        // dd($request);
        $stest->save();
        return redirect()->back();
    }
    public function update(Request $request){
        $stest=Subtest::find($request->id);
        $stest->title =$request->title;
        $stest->reference_values =$request->reference_values;
        $stest->unit =$request->unit;
        // dd($request);
        $stest->save();
        return redirect()->back();
    }
}

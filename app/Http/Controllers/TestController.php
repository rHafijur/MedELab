<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;

class TestController extends Controller
{
    public function index(){
        $tests= Test::all();
        return view('tests',compact('tests'));
    }
    public function show($id){
        $test=Test::find($id);
        return view('test',compact('test'));
    }
    public function create(Request $request){
        $test=new Test();
        // dd($test->title);
        $test->title=$request->title;
        $test->pathology_department_id=$request->pathology_department_id;
        $test->sample_type=$request->sample_type;
        $test->price=$request->price;
        $test->save();
        return redirect()->back();
    }
    public function update(Request $request){
        $test=Test::find($request->id);
        // dd($test->title);
        $test->title=$request->title;
        $test->pathology_department_id=$request->pathology_department_id;
        $test->sample_type=$request->sample_type;
        $test->price=$request->price;
        $test->save();
        return redirect()->back();
    }
    public function delete($id){
        
    }
}

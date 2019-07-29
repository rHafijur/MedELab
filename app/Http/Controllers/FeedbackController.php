<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;

class FeedbackController extends Controller
{
    public function create(Request $request){
        Feedback::create([
            'report_id'=>$request->report_id,
            'doctor_id'=>auth()->user()->doctor->id,
            'details'=>$request->details,
        ]);
        return redirect()->back();
    }
}

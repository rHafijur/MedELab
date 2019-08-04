<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class PharmacyAdminController extends Controller
{
    public function index(){
        $orders=Order::latest()->get();
        return view('pharmacy_admin.index',compact('orders'));
    }
}

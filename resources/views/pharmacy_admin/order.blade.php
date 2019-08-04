@extends('layouts.master')
@section('title','Medicine Orders')
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Order Details
                    </div>
                    <table class="table">
                        <tbody>
                            @php
                                $dt=Carbon\Carbon::parse($order->created_at);
                                $grant_total=0;
                            @endphp
                                <tr>
                                    <td><strong>Invoice: </strong>{{$order->id}}</td>
                                    <td><strong>Customer:</strong>{{$order->patient->user->name}}</td>
                                    <td><strong>Date: </strong>{{$dt->toFormattedDateString()}}</td>
                                    <td><strong>Time: </strong>{{$dt->toTimeString()}}</td>
                                    <td><strong>Delivered: </strong>{{($order->delivered==1)?"Yes":"No"}}</td>
                                    <td><strong>Grand Total: </strong>{{$order->total_price}} Taka</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Medicine</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Toatal(Taka)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderMedicines as $orderMedicine)
                                <tr>
                                    <td>{{$orderMedicine->pharmacyMedicine->title}}</td>
                                    <td>{{$orderMedicine->unit_price}}</td>
                                    <td>{{$orderMedicine->quantity}}</td>
                                    @php
                                        $total=$orderMedicine->quantity * $orderMedicine->unit_price;
                                        $grant_total+=$total;
                                    @endphp
                                    <td>{{$total}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Grant Total</th>
                                <th>{{$grant_total}}</th>
                            </tr>
                        </tfoot>
                    </table>
                    @if ($order->delivered==0)
                    <div class="row">
                        <form action="{{url('pharmacy_admin/delivered')}}" method="POST">
                            @csrf
                            <input type="hidden" name="order" value="{{$order->id}}">
                            <button class="btn btn-success">Mark as delivered</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.master')
@section('title','Dashboard')
@section('body')
<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Test Orders
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                        <tr>
                                <th>Id</th>
                                <th>Patient</th>
                                <th>Street</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Total Price</th>
                                <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    @php
                        $dt=Carbon\Carbon::parse($order->created_at);
                    @endphp
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->remotePatient->user->name}}</td>
                            <td>{{$order->remotePatient->street}}</td>
                            <td>{{$order->remotePatient->city}}</td>
                            <td>{{$dt->toFormattedDateString()}}</td>
                            <td>{{$dt->toTimeString()}}</td>
                            <td>{{$order->total_price}}</td>
                            <td><a href="{{url("sample_collector/remote_test_order/".$order->id)}}"><button class="btn btn-secondary">View</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('layouts.master')
@section('title','Test Orders')
@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                    <div class="card-title">
                            Orders
                        </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Test</th>
                        <th scope="col">Tube ID</th>
                        <th scope="col">Patient</th>
                        <th scope="col">Department</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                        <th scope="row">{{$order->id}}</th>
                            <td>{{$order->test->title}}</td>
                            <td>{{$order->sample_id}}</td>
                            <td>{{$order->patient->user->name}}</td>
                            <td>{{$order->pathologyDepartment->title}}</td>
                            <td>
                                @if ($order->pathology_department_id==auth()->user()->labAdmin->pathology_department_id)
                                <a href="{{url("make_report/order=".$order->id)}}"><button class="btn btn-secondary">Make Report</button></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

@endsection
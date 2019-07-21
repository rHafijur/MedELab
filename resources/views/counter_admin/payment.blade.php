@extends('layouts.master')
@section('title','Word Admin')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Counter Admin Home page</h1>
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Patient Info</div>
                @php
                    $patient=$prescription->patient
                @endphp
                <ul class="list-group">
                    <li class="list-group-item"><strong>Name:</strong> {{$patient->user->name}} </li>
                    <li class="list-group-item"><strong>Bed:</strong> {{$patient->bed}} </li>
                    <li class="list-group-item"><strong>Word:</strong> {{$patient->word->title}} </li>
                    <li class="list-group-item"><strong>Department:</strong> {{$patient->word->department}} </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-8">
            <div class="card">
                    <div class="card-body">
                        <div class="card-title">Tests</div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tests</th>
                                    <th>Price (BDT)</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $sum=0;
                             @endphp
                                @foreach ($prescription->tests as $test)
                                <tr>
                                    <td>{{$test->title}}</td>
                                    <td>
                                        {{$test->price}}
                                    </td>
                                </tr>
                                @php
                                    $sum+=$test->price;
                                @endphp
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td>
                                            <strong>Total</strong>
                                        </td>
                                        <td>
                                            <strong>{{$sum}}</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </tbody>
                        </table>
                    <form action="{{url('counter_admin/save_payment')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$prescription->id}}" name="prescription_id">
                        <button class="btn btn-info">Confirm Payment</button>
                        </form>
                    </div>
            </div>
    </div>
</div>
@endsection
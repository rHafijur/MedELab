@extends('layouts.master')
@section('title','Test Orders')
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
                                    <td><strong>Customer:</strong>{{$order->remotePatient->user->name}}</td>
                                    <td><strong>Date: </strong>{{$dt->toFormattedDateString()}}</td>
                                    <td><strong>Time: </strong>{{$dt->toTimeString()}}</td>
                                    <td><strong>Grand Total: </strong>{{$order->total_price}} Taka</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Test</th>
                                <th>Price</th>
                                <th>Sample ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->remoteTestOrderTests as $test)
                                <tr>
                                    <td>{{$test->test->title}}</td>
                                    <td>{{$test->price}}</td>
                                    <td>
                                            @if ($test->sample_id==null)
                                            <form action="{{url('sample_collector/set_tube_id')}}" method="POST">
                                              @csrf
                                          <input type="hidden" value="{{$test->id}}" name="test_order_id">
                                          <div class="form-group">
                                              <input type="text" class="form-control" name="sample_id" placeholder="Tube Id">
                                          </div>
                                          <button type="submit" class="btn btn-sm btn-secondary">Submit</button>
                                          </form>
                                              @else
                                              {{$test->sample_id}}
                                            @endif
                                    </td>
                                    @php
                                        $grant_total+=$test->price;
                                    @endphp
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Grant Total</th>
                                <th>{{$grant_total}}</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
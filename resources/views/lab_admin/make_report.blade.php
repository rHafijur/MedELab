@extends('layouts.master')
@section('title','Create Report - '.$order->test->title)
@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                    <div class="card-title">
                            Create Report: {{$order->test->title}} <br>
                            Patient: {{$order->patient->user->name}} <br>
                            Tube ID: {{$order->sample_id}}
                        </div>
            </div>
            <div class="card-body">
                <form action="{{url('/lab_admin/create_report')}}" method="POST">
                    @csrf
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Subtest</th>
                            <th scope="col">Reference values</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Value</th>
                          </tr>
                        </thead>
                        <input type="hidden" value="{{$order->id}}" name="order_id" required>
                        <tbody>
                            @foreach ($order->test->subtests as $subtest)
                            <tr>
                                <td>{{$subtest->title}}</td>
                                <td>{{$subtest->reference_values}}</td>
                                <td>{{$subtest->unit}}</td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" value="{{$subtest->id}}" name="subtest_id[]" required>
                                        <input type="text" class="form-control" name="value[]" required>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                        <div class="d-flex justify-content-end">
                          <button class="btn btn-secondary">Create</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
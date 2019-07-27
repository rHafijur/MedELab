@extends('layouts.master')
@section('title','Test Report - '.$report->testOrder->test->title)
@section('body')
<div id="printableArea">
    <h2>Test Report - {{$report->testOrder->test->title}} </h2>
        <div class="card">
                <div class="card-header">
                        <div class="row">
                                <div class="col-md-6">
                                        <h4 class="card-title"><strong>Patient Info:</strong></h4>
                                        <h5 class="card-title"><strong>Name:</strong> {{$patient->user->name}}</h5>
                                        <h5 class="card-title"><strong>Age: </strong>{{$patient->age}}</h5>
                                        <h5 class="card-title"><strong>Address: </strong>{{$patient->address}}</h5>
                                        {{-- <h5 class="card-title">Sex: {{$prescription->patient->sex}}</h5> --}}
                                    
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title"><strong>Report id: </strong>{{$report->id}}</h5>
                                    <h5 class="card-title"><strong>Test : </strong>{{$report->testOrder->test->title}}</h5>
                                    <h5 class="card-title"><strong>Referred by: </strong>{{$report->testOrder->prescription->doctor->user->name}}</h5>
                                    <h5 class="card-title"><strong>Prepared by: </strong>{{$report->labAdmin->user->name}}</h5>
                                    <h5 class="card-title"><strong>Date: </strong>{{Carbon\Carbon::parse($report->created_at)->toFormattedDateString()}}</h5>
                                </div>
                        </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Parameter</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Reference</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($report->reportSubtests as $subtest)
                                        
                                    <tr>
                                      <td>{{$subtest->subtest->title}}</td>
                                        <td>{{$subtest->value}} {{$subtest->subtest->unit}}</td>
                                      <td>{{$subtest->subtest->reference_values}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                  {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                  {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
              </div>
  </div>
  
  <button class="btn btn-info" onclick="printDiv('printableArea')"/>Print</button>

  <script>
      function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
@endsection
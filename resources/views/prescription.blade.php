@extends('layouts.master')
@section('title','Word Admin')
@section('body')
<!-- Page Heading -->
<div id="printableArea">
    <h2>Prescription</h2>
        <div class="card">
                <div class="card-header">
                        <div class="row">
                                <div class="col-md-6">
                                        <h5 class="card-title"><strong>Name:</strong> {{$prescription->patient->user->name}}</h5>
                                        <h5 class="card-title"><strong>Age: </strong>{{$prescription->patient->age}}</h5>
                                        <h5 class="card-title"><strong>Address: </strong>{{$prescription->patient->address}}</h5>
                                        {{-- <h5 class="card-title">Sex: {{$prescription->patient->sex}}</h5> --}}
                                    
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title"><strong>Prescription id: </strong>{{$prescription->id}}</h5>
                                    <h5 class="card-title"><strong>Prescribed by: </strong>{{$prescription->doctor->user->name}}</h5>
                                    <h5 class="card-title"><strong>Date: </strong>{{Carbon\Carbon::parse($prescription->created_at)->toFormattedDateString()}}</h5>
                                </div>
                        </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Medicines</h5>
                            @foreach ($prescription->medicines as $medicine)
                                {{$medicine->title}} ({{$medicine->power}}) ({{$medicine->pivot->morning}} + {{$medicine->pivot->afternoon}} + {{$medicine->pivot->night}})<br>
                            @endforeach
                        
                        </div>
                        <div class="col-md-6">
                                <h5 class="card-title">Tests</h5>
                                @foreach ($prescription->tests as $test)
                                    {{$test->title}} <br>
                                @endforeach
                        </div>
                    </div>
                  {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                  {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
              </div>
  </div>
  
  <button class="btn btn-info" onclick="printDiv('printableArea')"/>Print</button>

  <div class="row">
      <div class="col-md-6">
          <div class="cord">
              <div class="card-header">
                  <div class="card-title">Test Report(s)</div>
              </div>
              <div class="card-body">
                  <table class="table">
                      <thead>
                          <tr>
                                <th>Test</th>
                                <th></th>
                          </tr>
                      </thead>
                      <tbody>
                            @foreach ($prescription->testOrders as $testOrder)
                                <tr>
                                    <td>
                                        {{$testOrder->test->title}}
                                    </td>
                                    <td>
                                        @if ($testOrder->report)
                                            <a href="{{url('test_report/'.$testOrder->report->id)}}"><button class="btn btn-secondary">View Report</button></a>
                                        @else
                                            <button class="btn btn-danger" disabled>Report Pending</button>
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
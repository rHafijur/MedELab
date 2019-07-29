@extends('layouts.master')
@section('title','Test Report - '.$report->testOrder->test->title)
@section('body')
<div class="row" style="margin-bottom:30px">
  <div class="col-12">
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
  </div>
</div>
  <button class="btn btn-info" onclick="printDiv('printableArea')">Print</button>
@if (auth()->user()->role_id==3)
    
<button class="btn btn-secondary" data-toggle="modal" data-target="#feedback_id">Give Feedback</button>


<!-- Modal -->
<div class="modal fade" id="feedback_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Create Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{url('/doctor/create_feedback')}}">
        <div class="modal-body">
          @csrf
          <div class="form-group">
            <label for="patient">Feedback</label>
            <textarea name="details" class="form-control" cols="30" rows="10"></textarea>
            <input type="hidden"  name="report_id" value="{{$report->id}}">
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif

<div class="row" style="margin-top:30px;">
    <div class="col">
      <div class="h5">
          Doctor's Feedback(s)
      </div>
      @foreach ($report->feedbacks as $feedback)
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            {{$feedback->doctor->user->name}} - {{Carbon\Carbon::parse($feedback->created_at)->diffForHumans(['options' => Carbon\Carbon::JUST_NOW])}}
          </div>
        </div>
        <div class="card-body">
          {{$feedback->details}}
        </div>
      </div>
      @endforeach
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
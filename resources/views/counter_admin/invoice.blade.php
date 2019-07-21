@extends('layouts.master')
@section('title','Word Admin')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Word Admin Home page</h1>
<div id="printableArea">
    <h2>Invoice</h2>
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
                                    <h5 class="card-title"><strong>Payment id: </strong>{{$payment->id}}</h5>
                                    <h5 class="card-title"><strong>Reffered by: </strong>{{$prescription->doctor->user->name}}</h5>
                                    @php
                                        use Carbon\Carbon;
                                        $dt= new Carbon($payment->created_at);
                                    @endphp
                                    <h5 class="card-title"><strong>Date: </strong>{{$dt->format('j F Y ')}}</h5>
                                </div>
                        </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-12">
                                <h5 class="card-title">Tests</h5>
                                <table class="table">
                                    <thead>
                                            <tr>
                                                    <th>Test</th>
                                                    <th>Price</th>
                                                </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($payment->testPayments as $testPayment)
                                        <tr>
                                            <td> {{$testPayment->test->title}} </td>
                                            <td>{{$testPayment->price}}</td>
                                        </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Total</strong></td>
                                            <td><strong>{{$payment->total_price}}</strong></td>
                                        </tr>
                                    </tfoot>
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
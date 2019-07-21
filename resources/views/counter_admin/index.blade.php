@extends('layouts.master')
@section('title','Word Admin')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Counter Admin Home page</h1>
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Prescription</h5>
              {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
              <form method="POST" action="counter_admin/prescriptions">
                @csrf
                <div class="form-group">
                    <label for="patientIdField">Patient Id</label>
                    <input type="text" name="patient_id" id="patientIdField" class="form-control">
                </div>
                <button class="btn btn-info">View</button>
            </form>
            </div>
          </div>
    </div>
    <div class="col-4"></div>
    <div class="col-4"></div>
</div>
@endsection
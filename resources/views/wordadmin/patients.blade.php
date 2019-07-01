@extends('layouts.master')
@section('title','Word Admin')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Word Admin Home page</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Patients</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Bed</th>
            <th>Age</th>
            <th>Address</th>
            <th>Attendant</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Bed</th>
            <th>Age</th>
            <th>Address</th>
            <th>Attendant</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
        @foreach($patients as $patient)
          <tr>
            <td>{{$patient->user->name}}</td>
            <td>{{$patient->phone}}</td>
            <td>{{$patient->bed}}</td>
            <td>{{$patient->age}}</td>
            <td>{{$patient->address}}</td>
            <td>{{$patient->attendants_name}}</td>
            <td><a class="btn btn-info" href="{{'word_admin/patient/'.$patient->id}}">View</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
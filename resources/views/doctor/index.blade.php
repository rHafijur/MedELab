@extends('layouts.master')
@section('title','Dashboard')
@section('body')
<div class="row">
    <div class="col-md-2">
        <div class="card">
            <div class="card-header">
                    <div class="card-title">
                            Search Patient
                        </div>
            </div>
            <div class="card-body">
            <form action="{{url('doctor/search_patient')}}" method="GET">
                    <div class="row">
                      <div class="col-7">
                        <input type="text" class="form-control" name="id" placeholder="Patient ID">
                      </div>
                      <div class="col-3">
                        <button type="submit" class="btn btn-info">Search</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection
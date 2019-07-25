@extends('layouts.master')
@section('title','Dashboard')
@section('body')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                    <div class="card-title">
                            Search orders
                        </div>
            </div>
            <div class="card-body">
            <form action="{{url('lab_admin/search_orders')}}" method="GET">
                    <div class="row">
                      <div class="col-7">
                        <input type="text" class="form-control" name="tube_id" placeholder="Tube ID">
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
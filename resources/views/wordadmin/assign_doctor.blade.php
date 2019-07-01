@extends('layouts.master')
@section('title','Word Admin')
@section('body')
<form>
  <div class="form-group">
    <label for="patient">Email address</label>
    <input type="text" class="form-control" id="patient" value="{{$data['patient']->user->name}}" aria-describedby="emailHelp" disabled>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
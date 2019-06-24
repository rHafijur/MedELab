@extends('layouts.master')
@section('title','Generate Label - Super admin')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Generate Labels</h1>
<form method="post" action="{{url('superadmin/generatelabel')}}">
	@csrf
	<div class="form-row">
	  <div class="form-group col-md-3">
	    <label for="number">Number of pages of label</label>
	    <input type="number" class="form-control" name="number" id="number" placeholder="MAX: 30 pages">
	  </div>
	</div>
    <button type="submit" class="btn btn-primary">Generate & Download</button>
</form>

@endsection
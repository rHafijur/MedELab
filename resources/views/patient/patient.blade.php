@extends('layouts.master')
@section('title','Word Admin')
@section('body')
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark ">
    <ul class="navbar-nav">
      <li class="nav-item active">
        {{-- <a class="nav-link" href="{{url('/word_admin/assign_doctor/'.$patient->id)}}">Assign doctor</a> --}}
       
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('patient_id_card/'.$patient->id)}}">ID card</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>

</nav>
@if (session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@endif
@if (session('failed'))
<div class="alert alert-danger">
	{{ session('failed') }}
</div>
@endif
<div class="card">
	<div class="card-header">
	  Patient's info
	</div>
  <div class="card-body">
<div class="row">
	<div class="col-md-6">
		<ul class="list-group list-group-flush">
		  <li class="list-group-item"><strong>ID: </strong>{{$patient->id}} </li>
		  <li class="list-group-item"><strong>Name: </strong>{{$patient->user->name}} </li>
		  <li class="list-group-item"><strong>Phone: </strong>{{$patient->phone}} </li>
		  <li class="list-group-item"><strong>Email: </strong>{{$patient->user->email}} </li>
		  <li class="list-group-item"><strong>Address:</strong> {{$patient->address}}</li>
		</ul>
	</div>
	<div class="col-md-6">
		<ul class="list-group list-group-flush">
		  <li class="list-group-item"><strong>Word: </strong>{{$patient->word->title}} - {{$patient->word->department}} </li>
		  <li class="list-group-item"><strong>Bed: </strong>{{$patient->bed}} </li>
		  <li class="list-group-item"><strong>Age:</strong> {{$patient->age}}</li>
		  <li class="list-group-item"><strong>Attendant's name: </strong>{{$patient->attendants_name}} </li>
		  <li class="list-group-item"><strong>Attendant's phone: </strong>{{$patient->attendants_phone}} </li>
		</ul>
	</div>
</div>
  </div>
</div>

<div class="row">
	<div class="col-md-2">
		<div class="card">
			<div class="card-header">
			  Assigned Doctor(s)
			</div>
		  <div class="card-body">
		<ol class="list-group list-group-flush">
			@php
				$i=0;
			@endphp
		@foreach($patient->doctors as $doctor)
		  <li class="list-group-item"><strong>{{++$i}}. </strong>{{$doctor->user->name}} </li>
		@endforeach
		  
		</ol>
		  </div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
			  Assign tube id
			</div>
		  <div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>Test</th>
					<th>Sample</th>
					<th>Tube Id</th>
				</tr>
			</thead>
			<tbody>
			@php
				$pathologyDepartments=App\PathologyDepartment::all();
			@endphp
		@foreach($pathologyDepartments as $pathologyDepartment)
			@php
				$testOrders= $pathologyDepartment->testOrders()->where('patient_id',$patient->id)->where('completed',0)->get();
				if(count($testOrders)<1){
					continue;
				}
			@endphp
			<tr class="table-secondary">
				<td></td>
			<td><strong>{{$pathologyDepartment->title}} Test(s)</strong></td>
			<td>
			</td>
			</tr>

		  @foreach ($testOrders as $testOrder)
			  <tr>
				  <td>
					  {{$testOrder->test->title}}
				  </td>
				  <td>
					  {{$testOrder->test->sample_type}}
				  </td>
				  <td>
					  @if ($testOrder->sample_id==null)
					  <form action="{{url('patient/set_tube_id')}}" method="POST">
						@csrf
					<input type="hidden" value="{{$testOrder->id}}" name="test_order_id">
					<div class="form-group">
						<input type="text" class="form-control" name="sample_id" placeholder="Tube Id">
					</div>
					<button type="submit" class="btn btn-sm btn-secondary">Submit</button>
					</form>
						@else
						{{$testOrder->sample_id}}
					  @endif
						
				  </td>
			  </tr>
		  @endforeach
		@endforeach
		  
				</tbody>
			</table>
		  </div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
			  Prescriptions
			</div>
		  <div class="card-body">
		<ul class="list-group list-group-flush">
			@php
				use Carbon\Carbon;
			@endphp
			@foreach (App\Patient::find($patient->id)->prescriptions()->orderBy('id','desc')->get() as $prescription)
			@php
				$dt=new Carbon($prescription->created_at);
			@endphp
			<li class="list-group-item"><a href="{{url('prescription/'.$prescription->id)}}">{{$dt->format('l jS \\of F Y h:i:s A')}} referred by {{$prescription->doctor->user->name}}</a> </li>
			@endforeach
		 
		</ul>
		  </div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="asssign_doctor_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Assign doctor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="{{url('/word_admin/assign_doctor')}}">
      <div class="modal-body">
      	@csrf
          <div class="form-group">
            <label for="patient">Patient</label>
            <input type="text" class="form-control" id="patient" value="{{$patient->user->name}}"  disabled>
            <input type="hidden"  name="patient" value="{{$patient->id}}">
            
          </div>
          <div class="form-group">
            <label for="doctor">Doctor</label>
            <select class="form-control" id="doctor" name="doctor">
            	<option>select</option>
            	@foreach(App\Doctor::all() as $doctor)
            	<option value="{{$doctor->id}}">{{$doctor->user->name}}</option>
            	@endforeach
            </select>
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Assign</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- New prescription Modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->

<div class="modal fade bd-example-modal-xl" id='new_prescription_modal' tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="new_prescription_modal_title">New Prescription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="{{url('/word_admin/add_prescription')}}">
      <div class="modal-body">
      	@csrf
          <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="patient">Patient</label>
					<input type="text" class="form-control" id="patient" value="{{$patient->user->name}}"  disabled>
					<input type="hidden"  name="patient" value="{{$patient->id}}">
					
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="doctor">Referer</label>
					<select class="form-control" id="doctor" name="doctor">
						<option>select</option>
						@foreach(App\Doctor::all() as $doctor)
						<option value="{{$doctor->id}}">{{$doctor->user->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
		  </div>
		  <div class="row">
			<div class="col-md-8">
				<label>Medicines</label>
				<div class="form-group">
					<div class="row">
						<div class="col-md-5">
								<select class="form-control" id="medicine" name="medicine[]">
										<option>select</option>
										@foreach (App\Medicine::all() as $medicine)
										<option value="{{$medicine->id}}">{{$medicine->title}}</option>
										@endforeach
									</select>
						</div>
						<div class="col-md-7">
								<div class="form-check">
									<div class="row">
										<div class="col-md-4">
												<input class="form-check-input" name="morning[]" type="checkbox" id="morningCheck">
												<label class="form-check-label" for="morningCheck">Morning</label>	
										</div>	
										<div class="col-md-4">
												<input class="form-check-input" name="afternoon[]" type="checkbox" id="morningCheck">
												<label class="form-check-label" for="afternoonCheck">Afternoon</label>	
										</div>	
										<div class="col-md-4">
												<input class="form-check-input" name="night[]" type="checkbox" id="morningCheck">
												<label class="form-check-label" for="nightCheck">Night</label>	
										</div>	
									</div>		
								</div>
						</div>
					</div>
				</div>
				<div id="extraMedicines">

				</div>
				<button class="btn btn-success" onclick="return addMedicine()" >+</button>
			</div>
			<div class="col-md-4">
				<label for="doctor">Tests</label>
				<div class="form-group">
					<select class="form-control" name="tests[]" >
						<option>select</option>
						@foreach (App\Test::all() as $test)
					<option value="{{$test->id}}">{{$test->title}}</option>
						@endforeach
					</select>
				</div>
				<div id="extraTests"></div>
				<button class="btn btn-success" onclick="return addTest()" >+</button>
			</div>
		  </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
      </div>
        </form>
    </div>
  </div>
</div>

<script>
	function addMedicine(){
		var med=`
		<div class="form-group">
					<div class="row">
						<div class="col-md-5">
								<select class="form-control" id="medicine" name="medicine[]">
										<option>select</option>
										@foreach (App\Medicine::all() as $medicine)
										<option value="{{$medicine->id}}">{{$medicine->title}}</option>
										@endforeach
									</select>
						</div>
						<div class="col-md-7">
								<div class="form-check">
									<div class="row">
										<div class="col-md-4">
												<input class="form-check-input" name="morning[]" type="checkbox" id="morningCheck">
												<label class="form-check-label" for="morningCheck">Morning</label>	
										</div>	
										<div class="col-md-4">
												<input class="form-check-input" name="afternoon[]" type="checkbox" id="morningCheck">
												<label class="form-check-label" for="afternoonCheck">Afternoon</label>	
										</div>	
										<div class="col-md-4">
												<input class="form-check-input" name="night[]" type="checkbox" id="morningCheck">
												<label class="form-check-label" for="nightCheck">Night</label>	
										</div>	
									</div>		
								</div>
						</div>
					</div>
				</div>
		`;
		$("#extraMedicines").append(med);
		return false;
	}
	function addTest(){
		var tests=`
		<div class="form-group">
					<select class="form-control" name="tests[]" >
						<option>select</option>
						@foreach (App\Test::all() as $test)
					<option value="{{$test->id}}">{{$test->title}}</option>
						@endforeach
					</select>
				</div>
		`;
		$("#extraTests").append(tests);
		return false;
	}
</script>

@endsection
@extends('layouts.master')
@section('title','Word Admin')
@section('body')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Counter Admin Home page</h1>
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Patient Info</div>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Name:</strong> {{$patient->user->name}} </li>
                    <li class="list-group-item"><strong>Bed:</strong> {{$patient->bed}} </li>
                    <li class="list-group-item"><strong>Word:</strong> {{$patient->word->title}} </li>
                    <li class="list-group-item"><strong>Department:</strong> {{$patient->word->department}} </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-8">
            <div class="card">
                    <div class="card-body">
                        <div class="card-title">Prescriptions</div>
                        <table class="table table-striped">
                            <tbody>
                            @php
                                    use Carbon\Carbon;
                                    @endphp
                                @foreach (App\Patient::find($patient->id)->prescriptions()->orderBy('id','desc')->get() as $prescription)
                                @php
                                    $dt=new Carbon($prescription->created_at);
                                    @endphp
                                <tr>
                                        <td>{{$dt->format('l jS \\of F Y h:i:s A')}} referred by {{$prescription->doctor->user->name}} </td>
                                        <td>
                                            <a href="{{url('counter_admin/prescriptions/make_payment/'.$prescription->id)}}">
                                                <button type="button" {!!($prescription->payment!=null)?'title="Already Paid" data-toggle="tooltip" data-placement="top" disabled':''!!} class="btn btn-secondary">Add to payment</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
    </div>
</div>
@endsection
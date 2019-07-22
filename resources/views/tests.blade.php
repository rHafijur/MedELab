@extends('layouts.master')
@section('title','Tests')
@section('body')
<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tests</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end">

            <button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#createTest">
                <li class="fa fa-plus-circle"></li>
            </button>
        </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Test</th>
              <th>Department</th>
              <th>Sample Type</th>
              <th>Price</th>
              <th>Action</th>
             
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Test</th>
                <th>Department</th>
                <th>Sample Type</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($tests as $test)
            <tr>
              <td>{{$test->title}}</td>
              <td>{{$test->pathology_department->title}}</td>
              <td>{{$test->sample_type}}</td>
              <td>{{$test->price}}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a class="btn btn-secondary" href="{{'test/'.$test->id}}"><li class="fa fa-eye"></li></a>
                  <a class="btn btn-danger" href="{{'delete_test/'.$test->id}}"><li class="fa fa-trash-alt"></li></a>
                </div>
                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
<!-- Modal -->
<div class="modal fade" id="createTest" tabindex="-1" role="dialog" aria-labelledby="createTestTitle" aria-hidden="true">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createTestTitle">Create New Test</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="create_test" method="POST">
                @csrf
                    <div class="modal-body">
                            <div class="form-group">
                                    <label for="test_title">Title</label>
                                        <input type="text" class="form-control" name="title"  id="test_title">
                                  </div>
                            <div class="form-group">
                                <label for="test_department">Department</label>
                                    <select class="form-control" name="pathology_department_id"  id="test_department">
                                        @foreach (App\PathologyDepartment::all() as $department)
                                            <option value="{{$department->id}}">{{$department->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group">
                                    <label for="test_sample">Sample</label>
                                        <input type="text" class="form-control" name="sample_type"  id="test_sample">
                                    </div>
                            <div class="form-group">
                                    <label for="test_price">Price</label>
                                        <input type="text" class="form-control" name="price" id="test_price">
                                    </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
            </form>
          </div>
        </div>
      </div>
@endsection
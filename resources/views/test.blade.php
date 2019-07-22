@extends('layouts.master')
@section('title',$test->title)
@section('body')
<div class="card">
    <div class="card-header">
        <div id="test">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <td>Title</td>
                        <td>Department</td>
                        <td>Sample</td>
                        <td>Price</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{$test->title}}
                        </td>
                        <td>
                                {{$test->pathology_department->title}}
                        </td>
                        <td>
                                {{$test->sample_type}}
                        </td>
                        <td>
                                {{$test->price}}
                        </td>
                        <td>
                            <button class="btn btn-secondary" onclick="edit_test()">
                                <li class="fa fa-edit"></li>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body">
        <span class="card-title">Sub-tests</span>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Reference Values</th>
                    <th>Unit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($test->subtests as $subtest)
                    <tr>
                    <td>{{$subtest->title}}</td>
                    <td>{{$subtest->reference_values}}</td>
                    <td>{{$subtest->unit}}</td>
                    <td>
                        <button class="btn btn-secondary" onclick="edit_subtest(this,{{$subtest->id}},'{{$subtest->title}}','{{$subtest->reference_values}}','{{$subtest->unit}}')">
                            <li class="fa fa-edit"></li>
                        </button>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <div id="new_subtest">

        </div>
        <button id="new_subtest_button" class="btn btn-secondary" onclick="create_subtest()">
            <li class="fa fa-plus-circle"></li>
        </button>
    </div>
</div>
<script>
        function edit_subtest(obj,id,title,reference,unit){
        var form=`
        <form action="{{url('update_subtest')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="`+id+`">
    <div class="form-row">
            <div class="form-group col-md-3">
                    <label for="subtest_title">Title</label>
                        <input type="text" class="form-control" name="title" value="`+title+`" id="subtest_title">
                  </div>
            <div class="form-group col-md-3">
                <label for="subtest_reference">Reference Values</label>
                    <input type="text" class="form-control" name="reference_values" value="`+reference+`" id="subtest_reference">
                </div>
            <div class="form-group col-md-3">
                    <label for="subtest_unit">Price</label>
                        <input type="text" class="form-control" name="unit" value="`+unit+`" id="subtest_unit">
                    </div>
            <div class="form-group col-md-3">
                    <label>Action</label>
                    <button type="submit" class="form-control btn btn-secondary">
                        <li class="fa fa-save"></li>
                    </button>
                    </div>
    </div>
</form>
        `;
    var parent=$(obj).parent().parent();
    parent.empty();
    parent.append("<td colspan='6'>"+form+"</td>");
    // parent.append(form);
    }
    
    var form=`
    <form action="{{url('update_test')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$test->id}}">
    <div class="form-row">
            <div class="form-group col-md-2">
                    <label for="test_title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$test->title}}" id="test_title">
                  </div>
            <div class="form-group col-md-2">
                    <label for="test_department">Department</label>
                        <select class="form-control" name="pathology_department_id"  id="test_department">
                            @foreach (App\PathologyDepartment::all() as $department)
                                <option value="{{$department->id}}" {{($department->id==$test->pathology_department_id)?'selected':''}}>{{$department->title}}</option>
                            @endforeach
                        </select>
                  </div>
            <div class="form-group col-md-2">
                <label for="test_sample">Sample</label>
                    <input type="text" class="form-control" name="sample_type" value="{{$test->sample_type}}" id="test_sample">
                </div>
            <div class="form-group col-md-2">
                    <label for="test_price">Price</label>
                        <input type="text" class="form-control" name="price" value="{{$test->price}}" id="test_price">
                    </div>
            <div class="form-group col-md-2">
                    <label>Action</label>
                    <button type="submit" class="form-control btn btn-secondary">
                        <li class="fa fa-save"></li>
                    </button>
                    </div>
    </div>
</form>
    `;
    function edit_test(){
        $("#test").empty();
        $("#test").append(form);
    }
    function create_subtest(){
        var subtest_form=`
        <form action="{{url('create_subtest')}}" method="POST">
    @csrf
    <input type="hidden" name="test_id" value="{{$test->id}}">
    <div class="form-row">
            <div class="form-group col-md-3">
                    <label for="add_subtest_title">Title</label>
                        <input type="text" class="form-control" name="title"  id="add_subtest_title">
                  </div>
            <div class="form-group col-md-3">
                <label for="add_subtest_reference">Reference Values</label>
                    <input type="text" class="form-control" name="reference_values"  id="add_subtest_reference">
                </div>
            <div class="form-group col-md-3">
                    <label for="add_subtest_unit">Price</label>
                        <input type="text" class="form-control" name="unit"  id="add_subtest_unit">
                    </div>
            <div class="form-group col-md-3">
                    <label>Action</label>
                    <button type="submit" class="form-control btn btn-secondary">
                        <li class="fa fa-save"></li>
                    </button>
                    </div>
    </div>
</form> `;
        $("#new_subtest").append(subtest_form);
        $("#new_subtest_button").remove();
    }
</script>
@endsection
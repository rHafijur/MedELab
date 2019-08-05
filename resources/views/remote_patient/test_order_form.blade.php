@extends('layouts.master')
@section('title','Order Test')
@section('body')
    <div class="row">
        <div class="col-md-12">
        <form action="{{url('remote_patient/test_order')}}" method="POST">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Create new order
                    </div>
                </div>
                <div class="card-body">
                    @csrf
                    <table class="table">
                        <thead>
                                <tr>
                                        <th>Tests</th>
                                        <th>Price (BDT)</th>
                                </tr>
                        </thead>
                        <tbody id="test">
                            
                                <tr class="test_row">
                                    <td>
                                            <select name="test_id[]" class="form-control test" onchange="update_price(this)">
                                                    <option value="">Selet</option>
                                                    @foreach (App\Test::all() as $test)
                                                        <option value="{{$test->id}}">{{$test->title}}</option>
                                                    @endforeach
                                            </select>
                                    </td>
                                    <td class="price">0</td>
                                </tr>
                              
                                
                        </tbody>
                        <tfoot>   
                                <tr>
                                    <td>
                                        <button type="button" onclick="add_test()" class="btn btn-secondary">+</button>
                                    </td>
                                </tr>
                                <tr>
                                        <th>Grand Total</th>
                                        <th id="grand_total">0</th>
                                </tr>
                                    
                        </tfoot>
                    </table>
                </div>  
                <div class="card-footer">
                    <div class="row d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Confirm Order</button>
                    </div>
                </div> 
            </div>
        </form>
        </div>
    </div>
    
    <script>
        var tests={!!json_encode(App\Test::all())!!};
        function update_price(obj){
            $(document).ready(function(){
                var parent= $(obj).parentsUntil(".test_row").parent();
                var test=parent.find('.test');
                var price=parent.find(".price");
                // console.log(medicine.val());
                tests.forEach(element => {
                    if(test.val()==element.id){
                        // console.log(element.price);
                        price.text(element.price);
                    }
                });
                grand_total();
            });
        }
        function grand_total(){
            var totals=$(".price");
            var sum=0.0;
            totals.each(element => {
                // console.log(element);
                sum+=parseFloat($(totals[element]).text());
            });
            $("#grand_total").text(sum);
        }
        function add_test(){
            $("#test").append(`
            <tr class="test_row">
                <td>
                        <select name="test_id[]" class="form-control test" onchange="update_price(this)">
                                <option value="">Selet</option>
                                @foreach (App\Test::all() as $test)
                                    <option value="{{$test->id}}">{{$test->title}}</option>
                                @endforeach
                        </select>
                </td>
                <td class="price">0</td>
            </tr>
            `);
        }
    </script>
@endsection
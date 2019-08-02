@extends('layouts.master')
@section('title','Order Medicines')
@section('body')
    <div class="row">
        <div class="col-md-12">
        <form action="{{url('patient/order_medicine')}}" method="POST">
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
                                        <th>Medicine</th>
                                        <th>Unit Price (BDT)</th>
                                        <th>Quantity</th>
                                        <th>Total price (BDT)</th>
                                </tr>
                        </thead>
                        <tbody id="med">
                            
                                <tr class="med_row">
                                    <td>
                                            <select name="medicine_id[]" class="form-control medicine" onchange="update_price(this)">
                                                    <option value="">Selet</option>
                                                    @foreach (App\PharmacyMedicine::all() as $medicine)
                                                        <option value="{{$medicine->id}}">{{$medicine->title}} {{$medicine->power}}</option>
                                                    @endforeach
                                            </select>
                                    </td>
                                    <td class="unit_price">0</td>
                                    <td>
                                            <input type="number" class="form-control quantity" value="1" onchange="update_price(this)" placeholder="Quantity" name="quantity[]">
                                    </td>
                                    <td class="total">0</td>
                                </tr>
                              
                                
                        </tbody>
                        <tfoot>   
                                <tr>
                                    <td>
                                        <button type="button" onclick="add_med()" class="btn btn-secondary">+</button>
                                    </td>
                                </tr>
                                <tr>
                                        <th></th>
                                        <th></th>
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
        var medicines={!!json_encode(App\PharmacyMedicine::all())!!};
        function update_price(obj){
            $(document).ready(function(){
                var parent= $(obj).parentsUntil(".med_row").parent();
                var medicine=parent.find('.medicine');
                var quantity=parent.find('.quantity');
                var unit_price=parent.find('.unit_price');
                var total_price=parent.find(".total");
                // console.log(medicine.val());
                medicines.forEach(element => {
                    if(medicine.val()==element.id){
                        // console.log(element.price);
                        unit_price.text(element.price);
                        total_price.text(element.price * quantity.val());
                    }
                });
                grand_total();
            });
        }
        function grand_total(){
            var totals=$(".total");
            var sum=0.0;
            totals.each(element => {
                // console.log(element);
                sum+=parseFloat($(totals[element]).text());
            });
            $("#grand_total").text(sum);
        }
        function add_med(){
            $("#med").append(`
            <tr class="med_row">
                                            <td>
                                                    <select name="medicine_id[]" class="form-control medicine" onchange="update_price(this)">
                                                            <option value="">Selet</option>
                                                            @foreach (App\PharmacyMedicine::all() as $medicine)
                                                              <option value="{{$medicine->id}}">{{$medicine->title}} {{$medicine->power}}</option>
                                                            @endforeach
                                                    </select>
                                            </td>
                                            <td class="unit_price">0</td>
                                            <td>
                                                    <input type="number" class="form-control quantity" value="1" onchange="update_price(this)" placeholder="Quantity" name="quantity[]">
                                            </td>
                                            <td class="total">0</td>
                                        </tr>
            `);
        }
    </script>
@endsection
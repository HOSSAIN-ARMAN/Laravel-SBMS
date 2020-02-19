{{--@extends('admin.master')--}}
{{--@section('body')--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <div class="container">
        <form action="{{ route('testCnfrm') }}" method="post">
{{--            {{ csrf_field() }}--}}
            @csrf
            <section>
                <div class="panel panel-header">
                    <div class="row">
                        <div class="form-group">
                            <input type="text" name="customer_name" class="form-control" placeholder="Customer name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <input type="text" name="customer_address" class="form-control" placeholder="Customer Address">
                        </div>
                    </div>
                </div>
                <div class="panel panel-footer">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Budget</th>
                            <th>Amount</th>
                            <th><a href="#" class="add-row"><i class="glyphicon glyphicon-plus"></i></a></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="text" name="product_name[]" class="form-control" required></td>
                            <td><input type="text" name="brand[]" class="form-control" required></td>
                            <td><input type="text" name="quantity[]" class="form-control quantity" required></td>
                            <td><input type="text" name="budget[]" class="form-control budget" required></td>
                            <td><input type="text" name="amount[]" class="form-control amount" required></td>
                            <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td style="border: none"></td>
                            <td style="border: none"></td>
                            <td style="border: none"></td>
                            <td>Total</td>
                            <td><b class="total"></b></td>
                            <td><input type="submit" name="btn" class="btn btn-info" value="submit"></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
        </form>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
           $('.add-row').on('click', function () {
             addRow();
           });

           $('tbody').delegate('.quantity, .budget, .amount', 'keyup', function () {
               var tr = $(this).parent().parent();
               var quantity = tr.find('.quantity').val();
               var budget  = tr.find('.budget').val();
               var amount = (quantity*budget);
               tr.find('.amount').val(amount);
               total();
           });

           function total() {
               var total = 0;
               $('.amount').each(function (i, e) {
                   var ammount = $(this).val()-0;
                   total +=ammount;
               });
               $('.total').html(total+ ".00 tk");
           }

           function addRow() {
               var tr = '<tr>'+
                   '<td> <input type="text" name="product_name[]" class="form-control" required></td>'+
                   '<td> <input type="text" name="brand[]" class="form-control" required></td> '+
                   '<td> <input type="text" name="quantity[]" class="form-control" required></td>'+
                   '<td> <input type="text" name="budget[]" class="form-control" required></td>'+
                   '<td> <input type="text" name="amount[]" class="form-control" required></td>'+
                   '<td> <a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'
                   '</tr>';
               $('tbody').append(tr);
           };
           $('.remove').live('click',function () {
               var lastRow = $('tbody tr').length;
               if(lastRow == 1){
                   alert('Sorry Last Row Can not be delete!!!');
               }else{
                   $(this).parent().parent().remove();
               }

           });
        });
    </script>
{{--    @endsection--}}


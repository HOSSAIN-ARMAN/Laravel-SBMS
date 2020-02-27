@extends('admin.master')
@section('body')
    <div class="col-md-12">
        <h4 class="text-success">{{ Session::get('message') }}</h4>
        <form action="{{ route('new-sale') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Customer</label>
                                <select name="customer_id" id="customerId" class="form-control col-md-9">
                                    <option value="-1">---Select---</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Date</label>
                                <input type="date" name="date" class="col-md-9  form-control">
                                <span class="text-danger">{{$errors->has('date') ? $errors->first() : ''}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Loyalty Points</label>
                                <input type="number" class="col-md-9  form-control loyalty_point">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-header">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Category</label>
                                <select class="form-control col-md-9" id="categoryId">
                                    <option value="-1">---Select---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Product</label>
                                <select id="getProductById" class="form-control col-md-9"></select>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Available Quantity</label>
                                <input type="text" class="col-md-9  form-control" id="avaliableQuantity">
                                <input type="hidden" class="col-md-9 from-control" id="unit_price">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Quantity</label>
                                <input type="text" class="col-md-9  form-control" id="quantity">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">MRP</label>
                                <input type="number"  class="col-md-9  form-control" id="mrp">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Total MRP</label>
                                <input type="number" class="col-md-9  form-control" id="totalMrp">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"></label>
                                <button type="button" class="col-md-4  form-control btn-outline-github" id="addProduct">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <table class="table table table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>MRP</th>
                                <th>Total MRP</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                {{--                    the table contains here by jQuery--}}
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <br>
                        <hr>
                    </div>
                    <div class="grid-header">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Grand Total</label>
                                <input type="text"  class="col-md-9  form-control" id="grandTotal">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Discount</label>
                                <input type="text"  class="col-md-9  form-control" id="discount">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Discount Amount</label>
                                <input type="text" class="col-md-9  form-control" id="discountAmount">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Payable Amount</label>
                                <input type="text" class="col-md-9  form-control" id="payableAmount">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"></label>
                                <button type="submit" class="form-control col-md-4  btn-outline-twitter">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
{{--    ========================== get loyalty-point=====================--}}
    <script>
        $(document).ready(function () {
           $('#customerId').change(function () {
               var customerId = $(this).val();
               var jsonData = {customerId:customerId};
               $.ajax({
                   url:'http://localhost/treePlanet/public/sales/getCustomerLoyaltyPoint/'+customerId,
                   method:'GET',
                   date: jsonData,
                   dataType: "json",
                   cache:false,
                   success:function (date) {
                       $('.loyalty_point').val(date);
                   }
               });
           });
        });
    </script>
{{--    ===================================get product-by-categoryId==========================--}}
    <script>
        $(document).ready(function () {
            $('#categoryId').change(function () {
                var categoryId = $(this).val();
                var jsonData = {categoryId:categoryId};
                $.ajax({
                    url:'http://localhost/treePlanet/public/sales/getProductByCategory/'+categoryId,
                    method:'GET',
                    date: jsonData,
                    dataType: "json",
                    cache:false,
                    success:function (products) {
                        $('#getProductById').empty();
                        $('#getProductById').append('<option value="'+ -1+'">' +" --select--" +'</option>')
                        $.each(products, function (key, value) {
                            $('#getProductById').append('<option value="'+ value.id+'">'+ value.product_name+'</option>');
                        });
                    }
                });
            });
        });
    </script>
{{--========================================get avalable-quantity-By-ProductId=================================--}}
    <script>
        $(document).ready(function(){
           $('#getProductById').change(function(){
              var productId = $(this).val();
              var jsondata = {productId:productId};
              $.ajax({
                 url        :'http://localhost/treePlanet/public/sales/getProductInfoBYId/'+productId,
                 method     :'GET',
                 dataType   :'json',
                  data      : jsondata,
                 cache      :false,
                 success:function(data){
                     $('#avaliableQuantity').val(data);
                 }
              });
           });
        });
    </script>
{{--    ====================================== get unit-price==============================--}}
    <script>
        $(document).ready(function(){
            $('#getProductById').change(function(){
                var productId = $(this).val();
                var jsondata = {productId:productId};
                $.ajax({
                    url        :'http://localhost/treePlanet/public/sales/getProductUnitPriceBYId/'+productId,
                    method     :'GET',
                    dataType   :'json',
                    data      : jsondata,
                    cache      :false,
                    success:function(data){
                         $('#unit_price').val(data);
                    }
                });
            });
        });
    </script>
{{--    =======================get-product-mrp========================--}}
    <script>
        $(document).ready(function () {
            $('#getProductById').change(function(){
                var productId = $(this).val();
                var jsondata = {productId:productId};

                $.ajax({
                    url        :'http://localhost/treePlanet/public/sales/getProductMrpBYId/'+productId,
                    method     :'GET',
                    dataType   :'json',
                    data      : jsondata,
                    cache      :false,
                    success:function(data){
                        $('#mrp').val(data);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#quantity').keyup(function () {
                $('#totalMrp').val(TotalMrp());
            });

            function TotalMrp() {
                var mrp = $('#mrp').val();
                var quantity = $('#quantity').val();
                return quantity * mrp;
            }
        });
    </script>

{{--    ============================= add to table =======================--}}
    <script>
        $(document).ready(function () {
           $('#addProduct').click(function () {
              addRow();
              $('#grandTotal').val(GrandTotal());
              $('#discount').val(Discount());
              $('#discountAmount').val(DiscountAmount());
              $('#payableAmount').val(PayableAmount());

           });
           function addRow(){
               var productId = $('#getProductById').val();
               var quantity = $('#quantity').val();
               var mrp = $('#mrp').val();
               var totalMrp = $('#totalMrp').val();
               var unitPrice =  $('#unit_price').val();
               var tr = '<tr>'+
                               '<td><input type="hidden" name="product_id[]" value="'+ productId+'">'+ productId+ '</td>'+
                               '<td><input type="hidden" name="quantity[]" value="'+ quantity+'">'+ quantity+ '</td>'+
                               '<td><input type="hidden" name="mrp[]" value="'+ mrp+'">'+ mrp+ '</td>'+
                               '<td><input type="hidden" name="total_mrp[]" value="'+ totalMrp+'">'+ totalMrp+ '</td>'+
                               '<td  style="display:none;" ><input type="hidden" name="unit_price[]" value="'+ unitPrice+'"> </td>'
                        +'</tr>';

               $('tbody').append(tr);
           }

           function GrandTotal(){
               var grandTotal = 0;
               if (!IsNullOrEmpty($('#grandTotal').val())) {
                   grandTotal += parseFloat($('#grandTotal').val());
               }
               var totalMrp = parseFloat($('#totalMrp').val());
               grandTotal += totalMrp;
               return grandTotal;
           }
           function Discount(){
               var loyaltyPoint = $('.loyalty_point').val();
               var discount = loyaltyPoint/10;
               return discount;
           }
           function DiscountAmount() {
               var discount = parseFloat($('#discount').val());
               var grandTotal = parseFloat($('#grandTotal').val());
               var discountAmount = grandTotal *(discount/100);
               return discountAmount;
           }

           function PayableAmount(){
               var grandTotal = $('#grandTotal').val();
               var discountAmount = $('#discountAmount').val();
               var payableAmount = grandTotal - discountAmount;
               return payableAmount;
           }
            function IsNullOrEmpty(data) {
                if (data === undefined || data === "" || isNaN(data)) {
                    return true;
                }
                return false;
            }
        });
    </script>
    @endsection

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
                                <select name="customer_id" id="customerId" class="form-control col-md-9" autocomplete="off">
                                    <option value="-1">---Select---</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Date</label>
                                <input type="date" name="date" class="col-md-9  form-control" autocomplete="off">
                                <span class="text-danger">{{$errors->has('date') ? $errors->first() : ''}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Loyalty Points</label>
                                <input type="text" class="col-md-9  form-control loyalty_point" readonly autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-header">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Category</label>
                                <select class="form-control col-md-9" id="categoryId" autocomplete="off">
                                    <option value="-1">---Select---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="productName">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Product</label>
                                <select id="getProductById" class="form-control col-md-9"></select>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Available Quantity</label>
                                <input type="text" class="col-md-9  form-control" id="avaliableQuantity" readonly autocomplete="off">
                                <input type="hidden" class="col-md-9 from-control" id="unit_price">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Quantity</label>
                                <input type="text" class="col-md-9  form-control" id="quantity" autocomplete="off">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">MRP</label>
                                <input type="text"  class="col-md-9  form-control" id="mrp" readonly autocomplete="off">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Total MRP</label>
                                <input type="text" class="col-md-9  form-control" id="totalMrp" readonly autocomplete="off">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"></label>
                                <button type="button" class="col-md-4  form-control btn-info"  id="addProduct">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <span class="text-danger">{{ $errors->has('product_id') ? 'Add Product to the table before submit ' : '' }}</span>
                        <table class="table table table-bordered">
                            <thead class="thead-dark">
                            <tr>
{{--                                <th>SL</th>--}}
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>MRP</th>
                                <th>Total MRP</th>
{{--                                <th>Action</th>--}}
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
                                <input type="text"  class="col-md-9  form-control" id="grandTotal" readonly autocomplete="off">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Discount</label>
                                <input type="text"  class="col-md-9  form-control" id="discount" readonly autocomplete="off">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Discount Amount</label>
                                <input type="text" class="col-md-9  form-control" id="discountAmount" readonly autocomplete="off">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Payable Amount</label>
                                <input type="text" class="col-md-9  form-control" id="payableAmount" readonly autocomplete="off">
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"></label>
                                <button type="submit" class="form-control col-md-4  btn-outline-success" id="submitButton">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

{{--    ============================================== submit button validation =====================--}}
    <script>
        $(document).ready(function () {
            $('#submitButton').click(function () {

                var quantity = $('#quantity').val();
                var inputVal = new Array(quantity);
                if (inputVal[0] == ""){
                    alert('Table can not be empty');
                }
            });

        });
    </script>
{{--    ============================================ Jquery-from-validatio-part===========================--}}
    <script>
        $(document).ready(function () {
            // var quantity = 0;
            $('#quantity').keyup(function () {
                var productId = $('#getProductById').val();
                var jsonData = {productId:productId};
                if (IsNullOrEmpty($('#quantity').val())){
                    $.ajax({
                        url      :'http://localhost/treePlanet/public/sale/validation-data/'+productId,
                        method   :'GET',
                        dataType :'json',
                        data     :jsonData,
                        cache    :false,
                        success:function (data) {
                            $('#avaliableQuantity').val(data);
                        }
                    });
                }
                if (!IsNullOrEmpty($('#quantity').val())){
                    $.ajax({
                        url      :'http://localhost/treePlanet/public/sale/validation-data/'+productId,
                        method   :'GET',
                        dataType :'json',
                        data     :jsonData,
                        cache    :false,
                        success:function (data) {
                            $('#avaliableQuantity').val(data - quantity);
                        }
                    });
                }
                var avalblqty = parseInt($('#avaliableQuantity').val());
                var quantity  = parseInt($('#quantity').val());
                if (avalblqty == '' || isNaN(avalblqty) || avalblqty === undefined){
                    alert('Sorry This product not in stock.. Please Select Products another one');
                    $('button').attr("disabled", true);
                    return;
                }
                if (quantity > avalblqty){
                    alert('Quantity can not be more the available quantity!!!');
                    $('button').attr("disabled", true);
                    return;
                }else{
                    if(!IsNullOrEmpty($('#quantity').val())){
                        quantity = parseInt($("#quantity").val());
                        $('#avaliableQuantity').val(avalblqty - quantity);
                    }
                    $('button').attr("disabled", false);
                    return;
                }

            });
            // $('#quantity').keyup(function () {
            //     var avalblqty = parseInt($('#avaliableQuantity').val());
            //     var quantity  = parseInt($('#quantity').val());
            //     if (avalblqty == '' || isNaN(avalblqty) || avalblqty === undefined){
            //         alert('Sorry This product not in stock.. Please Select Products another one');
            //         $('button').attr("disabled", true);
            //         return;
            //     }
            //     if (quantity > avalblqty){
            //         alert('Quantity can not be more the available quantity!!!');
            //         $('button').attr("disabled", true);
            //         return;
            //     }else{
            //         $('button').attr("disabled", false);
            //         return;
            //     }
            //
            // });

            function IsNullOrEmpty(data){
                if (data === "" || data === undefined || isNaN(data)){
                    return true;
                }
                return false;
            }

        });
    </script>
    <script>
        $(document).ready(function () {
           $('#addProduct').click(function () {
               var productId = $('#getProductById').val();
               var jsonData = {productId:productId};
               $.ajax({
                   url      :'http://localhost/treePlanet/public/sale/validation-data/'+productId,
                   method   :'GET',
                   dataType :'json',
                   data     :jsonData,
                   cache    :false,
                   success:function (data) {




                       // ======================================grand-total===================================================
                      //  var grandTotal = 0;
                      //  $('.table').each(function () {
                      //      $(this).find('tr').each(function() {
                      //          $(this).find('.tableTotalMrp').each(function() {
                      //              var tableTotalMrp = $(this).text();
                      //              if (!isNaN(tableTotalMrp) && tableTotalMrp.length !== 0) {
                      //                  grandTotal += parseInt(tableTotalMrp);
                      //              }
                      //          });
                      //      });
                      //  })
                      // //alert(grandTotal);
                      //  $('#grandTotal').val(grandTotal);

                       // ===============================================-----------===========================================
                       // $('.table').each(function() {
                       //     var sum = 0;
                       //     $(this).find('tr').each(function() {
                       //         $(this).find('.quantity').each(function() {
                       //             var quantity = $(this).text();
                       //             if (!isNaN(quantity) && quantity.length !== 0) {
                       //                 sum += parseInt(quantity);
                       //                 if(sum > data){
                       //                     alert('THis product is not enough in stock');
                       //                     $('button').attr("disabled", true);
                       //                     return;
                       //                 }else{
                       //                     $('#avaliableQuantity').val(data - sum);
                       //                 }
                       //
                       //             }
                       //         });
                       //     });
                       // });
                       // ==========================================================------------------===============================
                   }
               });
           });
        });
    </script>


{{--    ================================= get-product-name========================--}}
<script>
    $(document).ready(function () {
        $('#getProductById').change(function(){
            var productId = $(this).val();
            var jsondata = {productId:productId};
            $.ajax({
                url        :'http://localhost/treePlanet/public/sales/product-name/'+productId,
                method     :'GET',
                dataType   :'json',
                data      : jsondata,
                cache      :false,
                success:function(data){
                    $('#productName').val(data);
                }
            });
        });
    });
</script>

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
                    data       : jsondata,
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
              //addRow();
              // $('#grandTotal').val(GrandTotal());
              // $('#discount').val(Discount());
              // $('#discountAmount').val(DiscountAmount());
              // $('#payableAmount').val(PayableAmount());

              // jquery -----------basic---------- from-------------- validation
               var quantity = $('#quantity').val();
               var loyaltyPoint = $('.loyalty_point').val();
               var productId = $('#getProductById').val();
               var inputVal = new Array(loyaltyPoint, productId, quantity);
               var inputMessage = new Array("loyaltyPoint","productId","quantity");

               if (inputVal[0] == ""){
                   alert(inputMessage[0] + '  field can not be empty');
               }else if(inputVal[1] == ""){
                   alert(inputMessage[1] + '  field can not be empty');
               }else if(inputVal[2] == ""){
                   alert(inputMessage[2] + '  field can not be empty');
               }
               else {
                   addRow();
               }
           });

        });
           function addRow(){
               var productId = $('#getProductById').val();
               var productName = $('#productName').val();
               var quantity = $('#quantity').val();
               var mrp = $('#mrp').val();
               var totalMrp = $('#totalMrp').val();
               var unitPrice =  $('#unit_price').val();

               var tr = '<tr>'+
                               '<td class="name"><input class="pId" type="hidden" name="product_id[]" value="'+ productId+'">'+ productName+ '</td>'+
                               '<td class="quantity"><input type="hidden" name="quantity[]" value="'+ quantity+'">'+ quantity+ '</td>'+
                               '<td><input type="hidden" name="mrp[]" value="'+ mrp+'">'+ mrp+ '</td>'+
                               '<td class="tableTotalMrp"><input type="hidden" name="total_mrp[]" value="'+ totalMrp+'">'+ totalMrp+ '</td>'+
                               '<td  style="display:none;" ><input type="hidden" name="unit_price[]" value="'+ unitPrice+'"> </td>'+
                               '<td style="display:none;"> <button type="button" class="deletebtn btn-danger" title="Remove row">Delete</button></td>'
                        +'</tr>';

               // ================================ easy way to remove table row ===============================================
               $(document).on('click', 'button.deletebtn', function () {
                   $(this).closest('tr').remove();
                   return false;
               });
               // ============================== if -exits -same -name -product ===============

               $('.table').each(function() {
                    var nm = [];
                    var i = 0;
                    var check = 'exits';
                    var exits = '';

                   $(this).find('tr').each(function() {
                       $(this).find('.name').each(function() {
                           var name = $(this).text();
                           nm[i++] = name;
                       });
                   });

                   for(let j = 0; j<nm.length; j++){
                       if (nm[j] == productName){
                            exits = 'exits';
                       }
                   }

                   if (check == exits){
                       alert('This product already have in table if You want to increase quantity delete it at first and then add again how much want ');
                   }else {
                       $('#grandTotal').val(GrandTotal());
                       $('#discount').val(Discount());
                       $('#discountAmount').val(DiscountAmount());
                       $('#payableAmount').val(PayableAmount());
                       $('tbody').append(tr);
                   }
               });
               //$('tbody').append(tr);
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

         function deleteTableRow(){
            $('#deleteRow').remove();
         }
            function IsNullOrEmpty(data) {
                if (data === undefined || data === "" || isNaN(data)) {
                    return true;
                }
                return false;
            }


    </script>
    @endsection

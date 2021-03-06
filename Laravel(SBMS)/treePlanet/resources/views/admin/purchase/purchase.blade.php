@extends('admin.master')
@section('body')

    <div class="col-sm-12 row">
        <div>
           <h2 class="text-info"> {{ Session::get('message') }}</h2>
            <form action="{{ route('new-purchase') }}" method="post">
                @csrf
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body  btn btn-outline-linkedin">
                            <h4 class="card-title text-dark">SUPPLIER</h4>
                            <hr>
                            <div class="form-group">
                                <label>Date </label>
                                <input type="date" class="form-control" name="purchase_date" placeholder="Date" autocomplete="off">
                                <span class="text-danger">{{ $errors->has('purchase_date') ? $errors->first() : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label>Invoice No </label>
                                <input type="number" class="form-control" name="purchase_invoice" placeholder="In-voice Number" autocomplete="off">
                                <span class="text-danger">{{ $errors->has('purchase_invoice') ? $errors->first() : ''}}</span>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Supplier</label>
                                <select class="form-control form-control-sm" name="supplier_id" id="exampleFormControlSelect3" autocomplete="off">
                                    <option value="-1">---select---</option>
                                    <span class="text-danger">{{ $errors->has('supplier_id') ? $errors->first() : ''}}</span>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Poducts</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control btn btn-outline-dark" id="categoryId" autocomplete="off">
                                                <option value="-1">--Select--</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="quantity" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Product</label>
                                        <div class="col-sm-9">
                                            <select class="form-control btn btn-outline-dark" id="getProductBycategoryId" autocomplete="off">
                                                {{--                                            @foreach($products as $product)--}}
                                                {{--                                            <option>{{$product->product_name}}</option>--}}
                                                {{--                                           @endforeach--}}
                                            </select>
                                            <input type="hidden" id="productName" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Unit Price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="unitPrice" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Code</label>
                                        <div class="col-sm-9" >
                                            <input type="text" class="form-control" id="productCode" value="" autocomplete="off" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Total Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="totalPrice" autocomplete="off" readonly/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Available Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="availableQuatity" autocomplete="off" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Previous UnitPrice</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"  id="previousUnitPrices" autocomplete="off" readonly/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Manufracture Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="manufractureDate" autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Previous MRP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="previousMrp" autocomplete="off" readonly/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Expire Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="expireDate" autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> MRP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="MRP" autocomplete="off" readonly/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> </label>
                                        <div class="col-sm-9">
                                            <button type="button" class="form-control btn-outline-dark addPurchase" >Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <br>

                    <input type="submit" id="saveBtn" class="form-control btn-info col-sm-3" value="Submit-Purchase">

                        <input type="hidden" class="text-danger" id="newId" value="{{ $errors->has('product_id') ? '': 'Product-Name'}}">

                    <h3 class="text-uppercase text-danger" id="mgs"></h3>
                    <table class="table table-bordered" id="purchaseTable">
                        <thead class=thead-dark>
                        <tr>
                            {{--                    <th>SL</th>--}}
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Manufracture Date</th>
                            <th>Expire Date</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>MRP</th>
{{--                            <th>Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            {{--                    the table contains here by jQuery--}}
                        </tr>
                        </tbody>
                    </table>
                </div>

            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
           $('#saveBtn').click(function () {
               var newId = $('#newId').val();

               var inputArray = new Array(newId);
               if(inputArray[0] == "Product-Name"){
                   //alert('Add Data to the table accurately');
                   $('#mgs').text('');
               }
           });
        });
    </script>
    <script>
        $(document).ready(function () {
           $('#categoryId').change(function () {
               var categoryId = $(this).val();
               var jsonData = {categoryId:categoryId};
              $.ajax({
                 url       :'http://localhost/treePlanet/public/purchase/getProductByCategoryId/'+categoryId,
                 method    :'GET',
                 data      : jsonData,
                 dataType  :'JSON',
                 success   :function(product){
                     $("#getProductBycategoryId").empty();
                     $("#getProductBycategoryId").append('<Option value="' + -1 + '">' + "--select--" + '</Option>');
                     $.each(product, function (key, value) {
                          $("#getProductBycategoryId").append('<option value="' + value.id + '">' + value.product_name + '</option>');
                     });
                 }
              });
           });
        });
    </script>

    {{--    ================================= get-product-name========================--}}
    <script>
        $(document).ready(function () {
            $('#getProductBycategoryId').change(function(){
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

{{--    ============================= get product-code==================--}}
    <script>
        $(document).ready(function () {
            $('#getProductBycategoryId').change(function () {
                var productId = $(this).val();
                var jsonData  = {productId:productId};
                $.ajax({
                    url    :'http://localhost/treePlanet/public/purchase/getProductCode/'+productId,
                    method :'GET',
                    data   :jsonData,
                    dataType   :'JSON',
                    success: function (data) {
                          $('#productCode').val(data);
                        // $('#productCode').empty();
                        // if(data){
                        //     $('#productCode').append('<input name="product_code" value="'+ data +'" class="form-control btn-dark">');
                        // }

                    }
                });
            });
        });
    </script>

{{--    ====================================== get-previous-unit-price ========================--}}
    <script>
        $(document).ready(function () {
            $('#getProductBycategoryId').change(function () {
                var productId = $(this).val();
                var jsonData  = {productId:productId};
                $.ajax({
                    url    :'http://localhost/treePlanet/public/purchase/getProductPrevoisuInfo/'+productId,
                    method :'GET',
                    data   :jsonData,
                    dataType   :'JSON',
                    cache: false,
                    success: function (data) {
                        $('#previousUnitPrices').val(data);
                        // $.each(data ,function (key, value) {
                        //    alert(value.unit_price);
                        // });
                    }
                });
            });
        });
    </script>
{{--    ================================ get-prevoius-MRP =============--}}
    <script>
        $(document).ready(function () {
            $('#getProductBycategoryId').change(function () {
                var productId = $(this).val();
                var jsonData  = {productId:productId};
                $.ajax({
                    url    :'http://localhost/treePlanet/public/purchase/getProductPreviousMrp/'+productId,
                    method :'GET',
                    data   :jsonData,
                    dataType   :'JSON',
                    cache: false,
                    success: function (data) {
                        $('#previousMrp').val(data+" Tk");

                    }
                });
            });
        });
    </script>
{{--    ============================ get-availabel-quantity ======================--}}
 <script>
     $(document).ready(function () {
         $('#getProductBycategoryId').change(function () {
             var productId = $(this).val();
             var jsonData  = {productId:productId};
             $.ajax({
                 url    :'http://localhost/treePlanet/public/purchase/getAvailableQuantity/'+productId,
                 method :'GET',
                 data   :jsonData,
                 dataType   :'JSON',
                 cache: false,
                 success: function (data) {
                     $('#availableQuatity').val(data);
                 }
             });
         });
     });
 </script>

{{--    =============================== calculate Unit-Price & Quantity ==================================--}}

    <script>
        //calculate total price
        $(document).ready(function () {
            var quantity = 0;
            var unitPrice = 0;
            // var totalPrice = 0;

            $("#quantity").keyup(function () {
                if (!IsNullOrEmpty($("#quantity").val())) {
                    quantity = parseInt($("#quantity").val());
                }
                if (!IsNullOrEmpty($("#unitPrice").val())) {
                    unitPrice = parseInt($("#unitPrice").val());
                }
                if (!IsNullOrEmpty($("#unitPrice").val()) && !IsNullOrEmpty($("#quantity").val())) {
                    $("#totalPrice").val(unitPrice * quantity);
                    $("#MRP").val(unitPrice + (unitPrice * (25 / 100)));
                }


            });
            $("#unitPrice").keyup(function () {
                if (!IsNullOrEmpty($("#quantity").val())) {
                    quantity = parseInt($("#quantity").val());
                }
                if (!IsNullOrEmpty($("#unitPrice").val())) {
                    unitPrice = parseInt($("#unitPrice").val());
                }

                if (!IsNullOrEmpty($("#unitPrice").val()) && !IsNullOrEmpty($("#quantity").val())) {
                    $("#totalPrice").val(unitPrice * quantity);
                    $("#MRP").val(unitPrice + (unitPrice * (25 / 100))); //Mrp include 25% amount of money after calculate the Total price
                }
            });

            function IsNullOrEmpty(data) {
                if (data === undefined || data === "" || isNaN(data)) {
                    return true;
                }
                return false;
            }
        });
    </script>

{{--    ========================== Add-purchase ==============--}}

    <script>
        $(document).ready(function () {
             $('.addPurchase').click(function () {
                 // jquery -----------basic---------- from-------------- validation
                 var productName = $('#productName').val();
                 var productCode = $('#productCode').val();
                 var manufractureDate = $('#manufractureDate').val();
                 var expireDate = $('#expireDate').val();
                 var quantity = $('#quantity').val();
                 var unitPrice = $('#unitPrice').val();
                 var totalPrice = $('#totalPrice').val();
                 var mrp = $('#MRP').val();

                 var inputVal = new Array(productName, productCode, manufractureDate, expireDate, quantity, unitPrice, totalPrice, mrp);
                 var inputMessage = new Array("productName","productCode","manufractureDate", "expireDate", "quantity", "unitPrice", "totalPrice", "mrp");

                 if (inputVal[0] == ""){
                     alert(inputMessage[0] + '  field can not be empty');
                 }else if(inputVal[1] == ""){
                     alert(inputMessage[1] + '  field can not be empty');
                 }else if(inputVal[2] == ""){
                     alert(inputMessage[2] + '  field can not be empty');
                 }else if(inputVal[3] == ""){
                     alert(inputMessage[3] + '  field can not be empty');
                 }else if(inputVal[4] == ""){
                     alert(inputMessage[4] + '  field can not be empty');
                 }else if(inputVal[5] == ""){
                     alert(inputMessage[5] + '  field can not be empty');
                 }else if(inputVal[6] == ""){
                     alert(inputMessage[6] + '  field can not be empty');
                 }else if(inputVal[7] == ""){
                     alert(inputMessage[7] + '  field can not be empty');
                 }else if(inputVal[8] == ""){
                     alert(inputMessage[8] + '  field can not be empty');
                 }
                 else {
                     addRow();
                 }
                //addRow();
             });

             function addRow() {
                 var productId = $('#getProductBycategoryId').val();
                 var productName = $('#productName').val();
                 var productCode = $('#productCode').val();
                 var manufractureDate = $('#manufractureDate').val();
                 var expireDate = $('#expireDate').val();
                 var quantity = $('#quantity').val();
                 var unitPrice = $('#unitPrice').val();
                 var totalPrice = $('#totalPrice').val();
                 var mrp = $('#MRP').val();

                 var tr = '<tr>' +
                     '<td class="name"><input  type="hidden" name="product_id[]" value="'+ productId +'">' +productName + '</td>'+
                     '<td><input  type="hidden" name="product_code[]" value="'+ productCode+'">'+productCode + '</td>'+
                     '<td><input  type="hidden" name="manufracture_date[]" value="'+ manufractureDate+'">'+ manufractureDate+'</td>'+
                     '<td><input  type="hidden" name="expire_date[]" value="'+ expireDate+'">'+expireDate +'</td>'+
                     '<td><input  type="hidden" name="quantity[]" value="'+ quantity+'">'+quantity +'</td>'+
                     '<td><input  type="hidden" name="unit_price[]" value="'+ unitPrice+'">'+unitPrice + '</td>'+
                     '<td><input type="hidden" name="total_price[]" value="'+ totalPrice+'">'+totalPrice + '</td>'+
                     '<td><input type="hidden" name="mrp[]" value="'+ mrp+'">'+mrp + '</td>'+
                     '<td style="visibility: hidden"><a href="#">Delete</a></td>'+
                     '</tr>';

                 // =========

                 // ============================== if -exits -same -name -product ===============

                 $('.table').each(function() {
                     var nm = [];
                     var i = 0;
                     var check = 'exits';
                     var exits = '';
                     $(this).find('tr').each(function () {
                         $(this).find('.name').each(function () {
                             var name = $(this).text();
                             nm[i++] = name;
                         });
                         for (let j = 0; j < nm.length; j++) {
                             if (nm[j] == productName) {
                                 exits = 'exits';
                             }
                         }

                     });
                     if (check == exits) {
                         alert('This product already in table!!!');
                         return;
                     } else {
                         $('tbody').append(tr);
                         return;
                     }

                 });

                 //$('tbody').append(tr);

             }
        });
    </script>





{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            var index = 0;--}}
{{--            $('#addPurchase').click(function () {--}}

{{--                var getInputData = GetInputData();--}}
{{--                var getInputDataRow = GetInputDataRow(getInputData);--}}
{{--                $('#purchaseTable').append(getInputDataRow);--}}
{{--                $('#purchaseForm').submit(getInputDataRow);--}}
{{--                index++;--}}

{{--            });--}}

{{--            function GetInputData() {--}}
{{--                var productId = $('#getProductBycategoryId').val();--}}
{{--                var code = $('#productCode').val();--}}
{{--                var manufractureDate = $('#manufractureDate').val();--}}
{{--                var expireDate = $('#expireDate').val();--}}
{{--                var quantity = $('#quantity').val();--}}
{{--                var unitPrice = $('#unitPrice').val();--}}
{{--                var TotalPrice = $('#totalPrice').val();--}}
{{--                var MRP = $('#MRP').val();--}}
{{--                return {--}}
{{--                    productId:productId,--}}
{{--                    code:code,--}}
{{--                    manufractureDate:manufractureDate,--}}
{{--                    expireDate:expireDate,--}}
{{--                    quantity:quantity,--}}
{{--                    unitPrice:unitPrice,--}}
{{--                    TotalPrice:TotalPrice,--}}
{{--                    MRP:MRP--}}
{{--                }--}}
{{--            }--}}

{{--            var sl = index;--}}
{{--            function GetInputDataRow(getInputData) {--}}
{{--                var codeHidden = "<input type='hidden' name='code' value='"+ getInputData.code +"'></div>";--}}
{{--                var manufractureDateHidden = "<input type='hidden' name='manufractureDate' value='"+ getInputData.manufractureDate +"'></div>"--}}
{{--                var expireDateHidden = "<input type='hidden' name='expireDate' value='"+ getInputData.expireDate+"'></div>";--}}
{{--                var quantityHidden = "<input type='hidden' name='quantity' value='"+ getInputData.quantity+"'></div>";--}}
{{--                var unitPriceHidden = "<input type='hidden' name='unit_Price' value='"+ getInputData.unitPrice+"'></div>";--}}
{{--                var TotalPriceHidden = "<input type='hidden' name='total_price' value='"+ getInputData.TotalPrice+"'></div>";--}}
{{--                var MRPHidden = "<input type='hidden' name='mrp' value='"+ getInputData.MRP+"'></div>";--}}
{{--                var productIdHidden = "<input type='hidden'  name='product_id' value='"+ getInputData.productId+"'></div>";--}}
{{--                //--}}
{{--                // var startCell = "<tr>";--}}
{{--                // var slCell = "<td class='text-success'>" + (++sl) + "</td>";--}}
{{--                // var coedCell = "<td class='text-success'>"+codeHidden+getInputData.code+"</td>";--}}
{{--                // var manufractureCell = "<td class='text-success'>" +manufractureDateHidden + getInputData.manufractureDate+ "</td>";--}}
{{--                // var expireDateCell = "<td class='text-success'>" + expireDateHidden+ getInputData.expireDate + "</td>";--}}
{{--                // var quantityCell = "<td class='text-success'>" +quantityHidden + getInputData.quantity + "</td>";--}}
{{--                // var unitPriceCell = "<td class='text-success'>" +unitPriceHidden + getInputData.unitPrice+ "</td>";--}}
{{--                // var totalPriceCell = "<td class='text-success'>" + TotalPriceHidden + getInputData.TotalPrice+ "</td>";--}}
{{--                // var mrpCell = "<td  class='text-success'>" +MRPHidden + getInputData.MRP+ "</td>";--}}
{{--                // var productCell = "<td class='text-success' style='visibility: hidden'>" +productIdHidden +getInputData.productId + "</td>";--}}
{{--                // var endCell = "</tr>";--}}

{{--                var startCell = "<tr>";--}}
{{--                var slCell = "<td class='text-success'>" + (++sl) + "</td>";--}}
{{--                var coedCell = "<td class='text-success'>"+codeHidden+getInputData.code+"<input type='hidden' name='code' value='"+ getInputData.code +"'>"+"</td>";--}}
{{--                var manufractureCell = "<td class='text-success'>" +manufractureDateHidden + getInputData.manufractureDate + "<input type='hidden' name='manufractureDate' value='"+ getInputData.manufractureDate +"'>"+ "</td>";--}}
{{--                var expireDateCell = "<td class='text-success'>" + expireDateHidden+ getInputData.expireDate + "<input type='hidden' name='expireDate' value='"+ getInputData.expireDate+"'>" + "</td>";--}}
{{--                var quantityCell = "<td class='text-success'>" +quantityHidden + getInputData.quantity +"<input type='hidden' name='quantity' value='"+ getInputData.quantity+"'>"+ "</td>";--}}
{{--                var unitPriceCell = "<td class='text-success'>" +unitPriceHidden + getInputData.unitPrice +"<input type='hidden' name='unit_Price' value='"+ getInputData.unitPrice+"'>"+ "</td>";--}}
{{--                var totalPriceCell = "<td class='text-success'>" + TotalPriceHidden + getInputData.TotalPrice + "<input type='hidden' name='total_price' value='"+ getInputData.TotalPrice+"'> "+ "</td>";--}}
{{--                var mrpCell = "<td  class='text-success'>"+MRPHidden + getInputData.MRP +"<input type='hidden' name='mrp' value='"+ getInputData.MRP+"'>"+ "</td>";--}}
{{--                var productCell = "<td class='text-success' style='visibility: hidden'>" +productIdHidden +getInputData.productId +"<input type='hidden'  name='product_id' value='"+ getInputData.productId+"'>"+ "</td>";--}}
{{--                var endCell = "</tr>";--}}


{{--                return (startCell + slCell + coedCell + manufractureCell + expireDateCell + quantityCell + unitPriceCell + totalPriceCell + mrpCell + productCell+  endCell);--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
    @endsection

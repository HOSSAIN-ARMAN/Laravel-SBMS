@extends('admin.master')

@section('body')
    <div class="container">
        <div class="card border-dark mb-12" style="max-width: 120rem;">
            <div class="card-header bg-transparent border-dark"><h2>______Sales Report_________</h2></div>
            <div class="card-body text-success">
                <div class="col-md-12 row">
                    <div class="col-md-6">
                        <div class="col-md-12 row">
                            <label class="col-md-3 col-form-label">Start-date</label>
                            <input type="date" class="col-md-7 form-control" id="from_date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 row">
                            <label class="col-md-3 col-form-label">End-Date</label>
                            <input type="date" class="col-md-7 form-control" id="to_date">
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-12 row">
                    <div class="col-md-6"> </div>
                    <div class="col-md-6">
                        <div class="col-md-12 row">
                            <label class="col-md-7 col-form-label"></label>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-outline-reddit" id="searchBtn" value="Search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-transparent border-success">
            <div class="card-footer bg-transparent border-success">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
{{--                        <th scope="col">SL</th>--}}
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
{{--                        <th scope="col">Category</th>--}}
                        <th scope="col">Sold Quantity</th>
                        <th scope="col">Unit-Price</th>
                        <th scope="col">Sales-Price/MRP</th>
                        <th scope="col">Profit</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
           $('#searchBtn').click(function(){
               var fromDate = $('#from_date').val();
               var toDate    = $('#to_date').val();
               var jsonData  = {fromDate:fromDate, toDate:toDate};
               $.ajax({
                    url      :'http://localhost/treePlanet/public/report/displaySaleReport/'+fromDate+'/'+toDate,
                    method   :'GET',
                    dataType :'json',
                    data     :jsonData,
                    cache    :false,
                    success  :function (data) {
                        $('tbody').empty();
                      $.each(data, function (key,value) {
                          var tr = '<tr>'+
                                   '<td>'+ value.product_code +'</td>'+
                                   '<td>'+ value.product_name+'</td>'+
                                   '<td>'+ value.quantity +'</td>'+
                                   '<td>'+ value.unit_price +'</td>'+
                                   '<td>'+ value.mrp +'</td>'+
                                   '<td>'+ (value.mrp - value.unit_price) +'</td>'
                                   +'</tr>';
                          $('tbody').append(tr);
                      })
                    }
               });
           });
        });
    </script>
@endsection



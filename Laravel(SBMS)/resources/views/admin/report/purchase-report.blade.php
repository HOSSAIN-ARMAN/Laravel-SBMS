@extends('admin.master')
@section('search')
    @endsection
@section('body')
    <div class="container">
        <div class="card border-success mb-12" style="max-width: 120rem;">
            <div class="card-header bg-transparent border-success"><h2>______Purchase Report_________</h2></div>
            <div class="card-body text-success">
                <div class="col-md-12 row">
                    <div class="col-md-6">
                        <div class="col-md-12 row">
                            <label class="col-md-3 col-form-label">Start-date</label>
                            <input type="date" class="col-md-7 form-control" name="from_date" id="from_date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 row">
                            <label class="col-md-3 col-form-label">End-Date</label>
                            <input type="date" class="col-md-7 form-control" name="to_date" id="to_date">
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
                                <input type="submit" class="btn btn-outline-reddit" id="searchId" value="Search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-transparent border-success">
            <div class="card-footer bg-transparent border-success">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Available Quantity</th>
                        <th scope="col">Unit-Price</th>
                        <th scope="col">MRP</th>
                        <th scope="col">Profit(amount)</th>
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
            $('#searchId').click(function () {
               var from_date = $('#from_date').val();
               var to_date   = $('#to_date').val();
               var jsonData  = {from_date:from_date, to_date:to_date};
               $.ajax({
                  url:'http://localhost/treePlanet/public/report/filterByDate/'+from_date+'/'+to_date,
                  method:'GET',
                  dataType:'json',
                  data:jsonData,
                  cache:false,
                  success:function (data) {
                      $('tbody').empty();
                      $.each(data ,function (key, value) {
                          var tr = '<tr>'+
                                    '<td>'+ value.product_code+'</td>'+
                                    '<td>'+ value.product_name+'</td>'+
                                    '<td>'+ value.quantity+'</td>'+
                                    '<td>'+ value.unit_price+' (Tk)'+'</td>'+
                                    '<td>'+ value.mrp+' (Tk)'+'</td>'+
                                    '<td>'+ (value.mrp - value.unit_price)+' (Tk)'+'</td>'
                                   +'</tr>'
                          $('tbody').append(tr);
                      })
                  }

               });
            });
        });
    </script>
    @endsection

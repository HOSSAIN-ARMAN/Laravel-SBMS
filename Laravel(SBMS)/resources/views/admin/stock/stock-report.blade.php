@extends('admin.master')
@section('body')
    <div class="container">
            <div class="card border-dark md-12" style="max-width: 80rem;">
                <div class="card-header">Periodical Stock Report </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="categoryId">
                                            <option value="-1">--Select--</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Product</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="productId" ></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Start-Date</label>
                                    <div class="col-sm-4">
                                        <input type="date"  class="form-control" id="start-date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">End-Date</label>
                                    <div class="col-sm-4">
                                        <input type="date"  class="form-control" id="end-date" >
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-outline-behance" id="searchBtn">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="card-footer">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
{{--                            <th scope="col">SL</th>--}}
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Catgory</th>
                            <th scope="col">Re-Order Level</th>
                            <th scope="col">Available(Quantity)</th>
                            <th scope="col">Expire Date</th>

{{--                            <th scope="col">Opening Balance</th>--}}
{{--                            <th scope="col">In</th>--}}
{{--                            <th scope="col">Out</th>--}}
{{--                            <th scope="col">Closing Blance</th>--}}
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
           $('#categoryId').click(function () {
               var categoryId = $('#categoryId').val();
               var jsonData = {categoryId: categoryId};
               $.ajax({
                   url     :'http://localhost/treePlanet/public/stack/categoryId/'+categoryId,
                   method  : 'GET',
                   dataType:'json',
                   data    :jsonData,
                   cache   :false,
                   success :function (data) {
                       $('#productId').empty();
                      $('#productId').append('<option value="'+ -1 +'" >' + "--select--" + '</option>');
                      $.each(data, function (key, value) {
                          $('#productId').append('<option value="'+ value.id +'" >' + value.product_name + '</option>');
                      })
                   }
               });
           });
        });
    </script>
    <script>
        $(document).ready(function () {
           $('#searchBtn').click(function () {
              var startDate = $('#start-date').val();
              var endDate   = $('#end-date').val();
              var productId = $('#productId').val();
              var jsonData = {productId:productId, startDate: startDate, endDate:endDate};
              $.ajax({
                 url     :'http://localhost/treePlanet/public/stack/report/'+productId+'/'+startDate+'/'+endDate,
                 method  :'GET',
                 data    : jsonData,
                 dataType: 'JSON',
                 cache   : false,
                 success :function (data) {
                     $('tbody').empty();
                     $.each(data, function (key, value) {
                         var tr = '<tr>' +
                             '<td>'+value.product_code +'</td>'+
                             '<td>'+ value.product_name+'</td>'+
                             '<td>'+ value.category_name+'</td>'+
                             '<td>'+ value.reorder_lavel+'</td>'+
                             '<td>'+ value.quantity+'</td>'+
                             '<td>'+ value.expire_date+'</td>'
                             + '</tr>'
                         $('tbody').append(tr);
                     })
                 }
              });
           });
        });
    </script>
    @endsection

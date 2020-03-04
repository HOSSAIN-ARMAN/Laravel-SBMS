<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
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
            <a href="{{ route('sales-report-pdf') }}" class="btn btn-inverse-info">PDF</a>
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
                <tfoot>
                <th colspan="3" class="text-center">Closing-Blance</th>
                <th class="close-blance"></th>
                <th colspan="1" class="text-center">Total-Profit</th>
                <th class="total-profit"></th>

                </tfoot>
            </table>
        </div>

    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
                            '<td class="unitPrice">'+ value.unit_price +'</td>'+
                            '<td >'+ value.mrp +'</td>'+
                            '<td class="mrp">'+ (value.mrp - value.unit_price) +'</td>'
                            +'</tr>';
                        $('tbody').append(tr);
                    });

                    $('.table').each(function() {
                        var unitP = 0;
                        var sum = 0;
                        $(this).find('tr').each(function() {
                            $(this).find('.unitPrice').each(function() {
                                var unitPrice = $(this).text();
                                if (!isNaN(unitPrice) && unitPrice.length !== 0) {
                                    unitP += parseInt(unitPrice);
                                }
                            });
                            $(this).find('.mrp').each(function() {
                                var mrp = $(this).text();
                                if (!isNaN(mrp) && mrp.length !== 0) {
                                    sum += parseInt(mrp);
                                }
                            });
                        });
                        $('.total-profit').text("= "+ sum + " TK");
                        $('.close-blance').text("= "+ unitP + " TK");

                    });
                }
            });

        });
    });
</script>

</body>
</html>

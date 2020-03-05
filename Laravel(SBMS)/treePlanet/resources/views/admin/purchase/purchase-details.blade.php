@extends('admin.master')

@section('search')
    <li class="nav-item nav-search d-none d-lg-block w-100">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"  id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
            </div>
            <input type="text" id="myInput" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
        </div>
    </li>

@endsection
@section('body')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">-------Purchase Details---------</h4>
                <p class="card-description text-danger">

                </p>
                <p class="card-description text-info">

                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="table">
                        <thead class="mdi-arrow-down-thick thead-dark">
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Manufracture Date</th>
                            <th>Expire-Date</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>MRP</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($purchaseDetails as $purchaseDetail)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$purchaseDetail->product_name}}</td>
                                <td>{{$purchaseDetail->product_code}}</td>
                                <td>{{ $purchaseDetail->manufracture_date }}</td>
                                <td>{{ $purchaseDetail->expire_date }}</td>
                                <td>{{ $purchaseDetail->quantity }}</td>
                                <td>{{ $purchaseDetail->unit_price }}</td>
                                <td>{{ $purchaseDetail->total_price }}</td>
                                <td>{{ $purchaseDetail->mrp }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection



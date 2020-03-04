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
                <h4 class="card-title">Purchase table</h4>
                <p class="card-description text-danger">

                </p>
                <p class="card-description text-info">

                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Supplier Name</th>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>Purchase-Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($purchases as $purchase)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$purchase->supplier_name}}</td>
                                <td>{{$purchase->purchase_invoice}}</td>
                                <td>{{ $purchase->purchase_date }}</td>
                                <td>
                                    <a href="{{ route('view-purchase-details', ['id' => $purchase->id]) }}">views</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


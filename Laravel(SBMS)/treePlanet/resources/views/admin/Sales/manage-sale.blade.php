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
                <h4 class="card-title">Sales table</h4>
                <p class="card-description text-danger">

                </p>
                <p class="card-description text-info">

                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="table">
                        <thead  class="thead-dark">
                        <tr>
                            <th>SL</th>
                            <th>Customer Name</th>
                            <th>Purchase Date</th>
                            <th>Sale-Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$sale->name}}</td>
                                <td>{{$sale->date}}</td>
                                <td><a href="{{ route('Sales-info', ['id'=>$sale->id]) }}">View-Details</a></td>
{{--                                <td>--}}
{{--                                    <a href="{{ route('view-purchase-details', ['id' => $sale->id]) }}">views</a>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


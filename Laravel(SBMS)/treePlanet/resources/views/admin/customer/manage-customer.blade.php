@extends('admin.master')
@section('search')
    <li class="nav-item nav-search d-none d-lg-block w-100">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="search">
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
                <h4 class="card-title">Customer table</h4>
                <p class="card-description text-success">
                    Manage class <code>.table</code>
                    {{ Session::get('message') }}
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Email </th>
                            <th>Contact </th>
                            <th>Loyalty-Point</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->code}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->contact}}</td>
                                <td>{{$customer->loyalty_point}}</td>
                                <td>
                                    <a href="{{ route('edit-customer', ['id' => $customer->id]) }}">Edit</a>
{{--                                    <a href="#" id="{{$supplier->id}}" class="deleteSupplierById">Delete</a>--}}
{{--                                    <form id="supplierdeleteForm{{$supplier->id}}" action="{{ route('delete-supplier-info') }}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="id" value="{{$supplier->id}}">--}}
{{--                                    </form>--}}
                                    <a href="#" id="{{$customer->id}}" class="deleteCustomerById">Delete</a>
                                    <form id="customerDeleteForm{{$customer->id}}" action="{{ route('delete-customer-info') }}" method="post">
                                     @csrf
                                        <input type="hidden" name="id" value="{{$customer->id}}">
                                    </form>
                                </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.deleteCustomerById').click(function () {
                var customerId = $(this).attr('id');
                event.preventDefault();
                var check = confirm('Are you Confirm to delete this !!!');
                if(check){
                    $('#customerDeleteForm'+customerId).submit();
                }

            });
        });
    </script>

@endsection


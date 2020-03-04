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
                <h4 class="card-title">Product table</h4>
                <p class="card-description text-success">
                    Manage class <code>.table</code>
                   {{ Session::get('message') }}
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Suppiler Name</th>
                            <th>Supplier Code</th>
                            <th>Contact </th>
                            <th>Contact person</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$supplier->supplier_name}}</td>
                                <td>{{$supplier->supplier_code}}</td>
                                <td>{{$supplier->contact}}</td>
                                <td>{{$supplier->contact_person}}</td>
                                <td>{{$supplier->publication_status == 1 ? 'Published' : 'Un-Published'}}</td>
                                <td>
                                    <a href="{{ route('edit-supplier', ['id' => $supplier->id]) }}">Edit</a>
                                    <a href="#" id="{{$supplier->id}}" class="deleteSupplierById">Delete</a>
                                    <form id="supplierdeleteForm{{$supplier->id}}" action="{{ route('delete-supplier-info') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$supplier->id}}">
                                    </form>
                                </td>
{{--                                <td>--}}
{{--                                    <a href="{{ route('edit-product', ['id' =>$product->id]) }}">Edit</a>--}}
{{--                                    <a href="#" id="{{ $product->id }}" class="deleteProductById">Delete</a>--}}
{{--                                    <form action="{{ route('delete-product') }}" method="post" id="deleteProductFrom{{$product->id}}">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="id" value="{{$product->id}}">--}}
{{--                                    </form>--}}

{{--                                </td>--}}
                            </tr>
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
           $('.deleteSupplierById').click(function () {
               var supplierId = $(this).attr('id');
               event.preventDefault();
               var check = confirm('Are you Confirm to delete this !!!');
               if(check){
                   $('#supplierdeleteForm'+supplierId).submit();
               }

           });
        });
    </script>

@endsection

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
                <p class="card-description">
                    Manage class <code>.table</code>

                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Re-Order Level</th>
                            <th>Product Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($products as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_code}}</td>
                                <td>{{$product->reorder_lavel}}</td>
                                <td><img src="{{asset($product->product_img)}}"></td>
                                <td>{{$product->publication_status == 1 ? 'Published' : 'Un-Published'}}</td>
                                <td>
                                    <a href="{{ route('edit-product', ['id' =>$product->id]) }}">Edit</a>
                                    <a href="#" id="{{ $product->id }}" class="deleteProductById">Delete</a>
                                    <form action="{{ route('delete-product') }}" method="post" id="deleteProductFrom{{$product->id}}">
                                        @csrf
                                         <input type="hidden" name="id" value="{{$product->id}}">
                                    </form>
{{--                                    <a href="{{ route('edit-category', ['id' => $category->id]) }}">Edit</a>--}}
{{--                                    <a href="#" id="{{$category->id}}" class="delete-categoryById">Delete</a>--}}
{{--                                    <form id="deleteCategoryForm{{$category->id}}" action="{{ route('delete-category') }}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" value="{{$category->id}}" name="id">--}}
{{--                                    </form>--}}
                                </td>
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
           $('.deleteProductById').click(function () {
               var id = $(this).attr('id');
               $('#deleteProductFrom'+id).submit();
           });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#myInput').on("keyup", function () {
               var value = $(this).val().toLowerCase();
               $('#table tr').filter(function () {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
               });
            });
        });
    </script>
    @endsection

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
                <h4 class="card-title">Category table</h4>
                <p class="card-description text-danger">
                   {{Session::get('message')}}
                </p>
                <p class="card-description text-info">
                    {{Session::get('message2')}}
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Code</th>
                            <th>Category Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{1}}</td>
                            <td>{{$category->category_code}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->publication_status == 1 ? 'Published' : 'Un-Published'}}</td>
                            <td>
                                <a href="{{ route('edit-category', ['id' => $category->id]) }}">Edit</a>
                                <a href="#" id="{{$category->id}}" class="delete-categoryById">Delete</a>
                                <form id="deleteCategoryForm{{$category->id}}" action="{{ route('delete-category') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$category->id}}" name="id">
                                </form>
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
        $(document).ready(function(){
            $('.delete-categoryById').click(function () {
               var categoryId = $(this).attr('id');
               event.preventDefault();
               var check = confirm("Are you sure to delete this category!!");
               if (check){
                   $('#deleteCategoryForm'+categoryId).submit();
               }
            });
        });
    </script>
{{--   ===this part for searching or filtering by jquery==================== --}}
    <script>
        $(document).ready(function(){
            $('#myInput').on("keyup", function(){
               var value = $(this).val().toLowerCase();
               $('#table tr').filter(function(){
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
               });
            });
        });
    </script>
{{--=========================================--}}
    @endsection

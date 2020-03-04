@extends('admin.master')
@section('body')
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Category</h4>
                <form class="forms-sample" action="{{ route('update-category') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input id="categoryCodeCheck" type="number" name="category_code" class="form-control" value="{{ $category->category_code }}" placeholder="Code">
                            <input type="hidden" name="id" class="form-control" value="{{ $category->id }}" placeholder="Code">
                            <span id="checkMessage" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}" placeholder="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Publication Status</label>
                        <div class="col-sm-9">
                            <br>
                            <input type="radio" name="publication_status" {{$category->publication_status == 1? 'checked' : ''}} value="1"> Published
                            <input type="radio" name="publication_status" {{$category->publication_status == 0? 'checked' : ''}} value="0"> Un-Published
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <input type="submit" class="btn btn-info" value="Update Category"  id="categoryBtn">
                        </div>
                    </div>
                </form>
                <p class="text-info"> {{ Session::get('message') }}</p>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#categoryCodeCheck').blur(function () {
                var code = $('#categoryCodeCheck').val();
                if(code.length != 4){
                    $('#checkMessage').text('code must be in 4 charecter!!');
                    $('#categoryBtn').attr("disabled", true);
                    return;
                }else{
                    $('#checkMessage').text(' ');
                    $('#categoryBtn').attr("disabled", false);
                }
                $.ajax({
                    url     :'http://localhost/treePlanet/public/category/isCodeExits/'+code,
                    method  :'GET',
                    data    : {code:code},
                    dataType:'JSON',
                    success:function(data) {
                        if(data == 'this code already Exits'){
                            $('#checkMessage').text('This Code Exits!!');
                            $('#categoryBtn').attr("disabled", true)
                        }else{
                            $('#checkMessage').text(' ');
                            $('#categoryBtn').attr("disabled", false)
                        }
                    }
                });
            });

        });
    </script>
@endsection


@extends('admin.master')
@section('body')
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Category</h4>
                <form class="forms-sample" action="{{ route('new-category') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input type="number" name="category_code" class="form-control" placeholder="Code" id="categoryCodeCheck">
                            <span class="text-danger" id="checkMessage">{{ $errors->has('category_code') ? $errors->first('category_code') :' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="category_name" class="form-control"  placeholder="name">
                            <span class="text-danger"> {{ $errors->has('category_name') ? $errors->first('category_name') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Publication Status</label>
                        <div class="col-sm-9">
                            <br>
                            <input type="radio" name="publication_status" value="1"> Published
                            <input type="radio" name="publication_status" value="0"> Un-Published
                            <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                           <input type="submit" class="btn btn-info" value="Submit" id="categoryBtn">
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
                           $('#categoryBtn').attr("disabled", true);
                       }else{
                           $('#checkMessage').text(' ');
                           $('#categoryBtn').attr("disabled", false);
                       }
                   }
               });
            });

        });
    </script>
@endsection

@extends('admin.master')
@section('body')
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Product Form</h4>
                <p class="card-description text-info">
                    {{Session::get('message')}}
                </p>
                <form class="forms-sample" action="{{ route('new-product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <div>
                            <select class="form-control" name="category_id" >
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Code</label>
                        <input type="number" class="form-control" id="isProductCodeExits" name="product_code" placeholder="Code">
                        <span class="text-danger" id="exitsMessage">{{ $errors->has('product_code') ?  $errors->first('product_code') : ' ' }}</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">name</label>
                        <input type="text" class="form-control" name="product_name"  placeholder="Product name">
                        <span class="text-danger">{{ $errors->has('product_name') ?  $errors->first('product_name') : ' ' }}</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Re-order lavel</label>
                        <input type="number" class="form-control" name="reorder_lavel" placeholder="Re-Order Lavel">
                        <span class="text-danger">{{ $errors->has('reorder_lavel') ?  $errors->first('reorder_lavel') : ' ' }}</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" name="product_discription" rows="4"></textarea>
                        <span class="text-danger">{{ $errors->has('product_discription') ?  $errors->first('product_discription') : ' ' }}</span>
                    </div>

                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="product_img" accept="image/*" >
                        <span class="text-danger">{{ $errors->has('product_img') ?  $errors->first('product_img') : ' ' }}</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3"> publication Status    </label>

                        <input type="radio" name="publication_status" value="1"> Published
                        <input type="radio" name="publication_status" value="0"> Un-Published
                        <span class="text-danger">{{ $errors->has('publication_status') ?  $errors->first('publication_status') : ' ' }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" id="productBtn">Save</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#isProductCodeExits').blur(function () {
                var code = $('#isProductCodeExits').val();
                if(code.length != 4){
                    $('#exitsMessage').text('code must be in 4 charecter!!');
                    $('#productBtn').attr("disabled", true);
                    return;
                }else{
                    $('#exitsMessage').text(' ');
                    $('#productBtn').attr("disabled", false);
                }
                $.ajax({
                    url      :'http://localhost/treePlanet/public/product/code-exits/'+code,
                    method   :'GET',
                    data     :{code:code},
                    dataType :'JSON',
                    success:function (data) {
                        if(data == 'This code Already Exits!!'){
                            $('#exitsMessage').text('this code alreadyExits!!');
                            $('#productBtn').attr("disabled", true);
                        }else{
                            $('#exitsMessage').text('this code availavle!!');
                            $('#productBtn').attr("disabled", false);
                        }
                     }
                });
            });
        });
    </script>
    @endsection

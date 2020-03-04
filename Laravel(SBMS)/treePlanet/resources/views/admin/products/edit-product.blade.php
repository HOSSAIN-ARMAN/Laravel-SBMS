@extends('admin.master')
@section('body')
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Product Form</h4>
                <p class="card-description text-info">
{{--                    {{Session::get('message')}}--}}
                </p>
                <form class="forms-sample" name="produtEditForm" action="{{ route('update-product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <div>
                            <select class="form-control text-info" name="category_id" id="selectCategoryById">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Code</label>
                        <input type="number" class="form-control text-info" name="product_code" value="{{ $product->product_code}}" placeholder="Cpde">
                        <input type="hidden" class="form-control text-info" name="id" value="{{ $product->id}}" placeholder="Cpde">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">name</label>
                        <input type="text" class="form-control text-info" name="product_name" value="{{ $product->product_name}}"  placeholder="Product name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Re-order lavel</label>
                        <input type="number" class="form-control text-info" name="reorder_lavel" value="{{ $product->reorder_lavel}}" placeholder="Re-Order Lavel">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control text-info" name="product_discription" rows="4">
                            {{ $product->product_discription}}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="product_img" accept="image/*" >
                        <span><img src="{{ asset($product->product_img) }}" alt="" width="120" height="120"></span>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3"> publication Status    </label>

                        <input type="radio" name="publication_status" {{ $product->publication_status == 1 ? 'checked' : '' }} value="1"> Published
                        <input type="radio" name="publication_status" {{ $product->publication_status == 0 ? 'checked' : '' }} value="0"> Un-Published
                    </div>
                    <button type="submit" class="btn btn-outline-dark mr-2">Update-Product-Info</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#selectCategoryById').val('{{ $product->category_id }}');
        });
    </script>


{{--    ============= here is row javascript to show categoryById--}}
{{--    <script>--}}
{{--        document.forms['produtEditForm'].elements['category_id'].value = '{{$product->category_id}}';--}}
{{--    </script>--}}
{{--    =================================--}}
@endsection

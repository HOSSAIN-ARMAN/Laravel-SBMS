
@extends('admin.master')
@section('body')
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-uppercase text-center text-info">Supplier Form</h4>
                <p class="card-description text-info">
                    {{Session::get('message')}}
                </p>
                <form class="forms-sample" action="{{ route('new-supplier') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail3">Code</label>
                        <input type="number" class="form-control" id="isProductCodeExits" name="supplier_code" placeholder="Code">
                        <span class="text-danger" id="exitsMessage">{{ $errors->has('supplier_code') ?  $errors->first('supplier_code') : ' ' }}</span>
                        <span class="text-danger">{{ Session::get('code') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">name</label>
                        <input type="text" class="form-control" name="supplier_name"  placeholder="Supplier name">
                        <span class="text-danger">{{ $errors->has('supplier_name') ?  $errors->first('supplier_name') : ' ' }}</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Address</label>
                        <textarea class="form-control" name="supplier_address" rows="4"></textarea>
                        <span class="text-danger">{{ $errors->has('supplier_address') ?  $errors->first('supplier_address') : ' ' }}</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail3">Contact</label>
                        <input type="number" class="form-control" name="contact" placeholder="Contact">
                        <span class="text-danger">{{ $errors->has('contact') ?  $errors->first('contact') : ' ' }}</span>
                        <span class="text-danger">{{ Session::get('contact') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail3">Contact person</label>
                        <input type="text" class="form-control" name="contact_person" placeholder="Contact person">
                        <span class="text-danger">{{ $errors->has('contact_person') ?  $errors->first('contact_person') : ' ' }}</span>
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


@endsection

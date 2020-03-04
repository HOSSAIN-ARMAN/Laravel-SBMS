@extends('admin.master')
@section('body')
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer Form</h4>
                <p class="text-success">{{ Session::get('message') }}</p>
                <hr>
                <form class="forms-sample" action="{{ route('update-customer') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input type="text" name="code" class="form-control"  value="{{ $customer->code }}">
                            <input type="hidden" name="id" class="form-control"  value="{{ $customer->id }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control"  value="{{ $customer->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control"  value="{{ $customer->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Contact</label>
                        <div class="col-sm-9">
                            <input type="number" name="contact" class="form-control" value="{{$customer->contact}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Loyalty Point</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="loyalty_point"  value="{{ $customer->loyalty_point }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-inverse-info mr-2">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

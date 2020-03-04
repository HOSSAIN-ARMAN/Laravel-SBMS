@extends('admin.master')
@section('body')
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer Form</h4>
                <p class="text-success">{{ Session::get('message') }}</p>
                <hr>
                <form class="forms-sample" action="{{ route('new-customer') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Code</label>
                        <div class="col-sm-9">
                            <input type="text" name="code" class="form-control"  placeholder="Code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control"  placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control"  placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Contact</label>
                        <div class="col-sm-9">
                            <input type="number" name="contact" class="form-control" placeholder="Contact">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Loyalty Point</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="loyalty_point"  placeholder="Loyalty Point">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endsection

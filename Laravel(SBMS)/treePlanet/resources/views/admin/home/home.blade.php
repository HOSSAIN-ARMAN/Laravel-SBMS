@extends('admin.master')
@section('body')
    <div class="card mb-3">
        <img src="{{ asset('/') }}admin/assets/images/sbms.jpg" class="card-img-top" alt="..." height="500px" width="500px">
        <div class="card-body">
            <h5 class="card-title">Simple Business Management System</h5>
            <p class="card-text">
                Description of Project:
                ABC Company is a small retail company, they purchase their products and sale the products
                with a profit margin. Currently they are managing their business manually, for that reason
                ABC Company is suffering to manage their stocks and sale management information, also the
                purchase information’s on their products as they needed more time to summarize the result.
                So, ABC wants an automation system which will manage their small business, and they will be
                able to manage their products, purchases, stocks and sales, with which they could have right
                data on time and with less effort.
            </p>
            <p class="card-text"><small class="text-muted">Some updated coming soon</small></p>
        </div>
    </div>

    @endsection

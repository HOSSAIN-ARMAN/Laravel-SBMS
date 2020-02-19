<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function addCustomer(){
        return view('admin.customer.add-customer');
    }
    public function newCustomer(Request $request){
        Customer::newCustomer($request);
        return redirect('/customer/add-customer')->with('message', 'Customer Save Successfully');
    }

}

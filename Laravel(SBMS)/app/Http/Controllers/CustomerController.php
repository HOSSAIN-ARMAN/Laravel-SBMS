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
    public function manageCustomer(){
        return view('admin.customer.manage-customer',[
            'customers' => Customer::all()
        ]);
    }
    public function editCustomer($id){
        return view('admin.customer.edit-customer',[
            'customer' => Customer::where('id', $id)->first()
        ]);
    }
    public function updateCustomer(Request $request){
        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->code = $request->code;
        $customer->email = $request->email;
        $customer->contact = $request->contact;
        $customer->loyalty_point = $request->loyalty_point;
        $customer->update();
        return redirect('customer/manage-customer')->with('message', 'Customer Info Update Successfully Done');
    }
    public function deleteCustomerInfo(Request $request){
        $customer =Customer::where('id', $request->id);
        $customer->delete();
        return redirect('customer/manage-customer');
    }

}

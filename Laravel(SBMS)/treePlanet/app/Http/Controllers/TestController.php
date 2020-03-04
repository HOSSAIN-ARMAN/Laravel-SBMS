<?php

namespace App\Http\Controllers;

use App\TestCustomer;
use App\TestOrder;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        return view('admin.test.test');
    }
    public function testCnfrm(Request $request){
         $data = $request->all();
         $customerId = TestCustomer::create($data)->id;
         if(count($request->product_name) > 0){
             foreach ($request->product_name as $item=>$value){
                 $data2 = array(
                     'customer_id' => $customerId,
                     'product_name' => $request->product_name[$item],
                     'brand' => $request->brand[$item],
                     'quantity' => $request->quantity[$item],
                     'budget'   => $request->budget[$item],
                     'amount'   => $request->amount[$item]
                 );
                 TestOrder::insert($data2);
             }
             return 'success';
         }
    }
}

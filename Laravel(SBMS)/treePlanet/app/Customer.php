<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Customer extends Model
{
    protected $fillable = ['code', 'name', 'email', 'contact', 'loyalty_point'];

    public static function newCustomer($request){
       $customer = new Customer();
       $customer->code = $request->code;
       $customer->name = $request->name;
       $customer->email = $request->email;
       $customer->contact = $request->contact;
       $customer->loyalty_point = $request->loyalty_point;
       $customer->save();
    }

//    public static function resetLoyaltyPoint($saleId, $customerId){
//        $total = DB::table('sale_details')->where('sale_id', '=', $saleId)->get()->sum('total_mrp');
//        $grandTotal = $total/1000;
//        $customer = Customer::find($customerId);
//        $loyaltyPoint = $customer->loyalty_point/10;
//        $lPoint= $grandTotal - $loyaltyPoint;
//        $resetLoyaltyPoint = $loyaltyPoint + $lPoint;
//        $customer->loyalty_point = $resetLoyaltyPoint;
//        $customer->update();
//    }
}

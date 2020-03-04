<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class SaleDetail extends Model
{
    protected $fillable=['sale_id', 'product_id', 'quantity', 'mrp', 'total_mrp', 'unit_price'];

    public static function saleProducts($request){
        $sale = new Sale();
        $sale->customer_id   = $request->customer_id;
        $sale->date          = $request->date;
        $sale->save();

        if(count( $request->product_id)>0 ){
            foreach ($request->product_id as $item=>$value){
                $saleDetails = array(
                    'sale_id'     => $sale->id,
                    'product_id'  => $request->product_id[$item],
                    'quantity'    => $request->quantity[$item],
                    'mrp'         => $request->mrp[$item],
                    'total_mrp'   => $request->total_mrp[$item],
                    'unit_price'  => $request->unit_price[$item]
                );
                SaleDetail::insert($saleDetails);
            }
        }
        //ResetLoyaltyPoint
        $customer = new Customer();
        $customer->loyalty_point = self::updateCustomerLoyaltyPoint($soldId = $sale->id, $customerId = $sale->customer_id);
        // update quantity of the products after selling
        $purchaseDetails = new PurchaseDetails();
        $purchaseDetails->quantity = self::UpdatePrdctQanttyAftrSold($request);
        return;
    }

    public static function updateCustomerLoyaltyPoint($soldId, $customerId){
        $total = DB::table('sale_details')->where('sale_id', '=', $soldId)->get()->sum('total_mrp');
        $grandTotal = $total/1000;
        $customer = Customer::where('id', $customerId)->first();
        $loyaltyPoint = $customer->loyalty_point/10;
        $getLoyaltyPoint= $grandTotal - $loyaltyPoint;
        $resetLoyaltyPoint = $customer->loyalty_point + $getLoyaltyPoint;
        $customer->loyalty_point = $resetLoyaltyPoint;
        $customer->update();
        return;
    }

    public static function UpdatePrdctQanttyAftrSold($request){
        if(count($request->product_id)>0 ){
            foreach ($request->product_id as $item=>$value){
                $saleDetails = array(
                    'product_id'  => $request->product_id[$item],
                );
                foreach ($saleDetails as $key=>$value){
                    $purchaseDetails = PurchaseDetails::where('product_id', $value)->first();
                    $salQty = SaleDetail::select('quantity')->where('product_id', $value)->orderBy('id', 'desc')->first();
                    $updateQuantity = $purchaseDetails->quantity - $salQty->quantity;
                    $purchaseDetails->quantity = $updateQuantity;
                    $purchaseDetails->update();
                }
            }
        }
    }
}

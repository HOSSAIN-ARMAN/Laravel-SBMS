<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Product;
use App\PurchaseDetails;
use App\SaleDetail;
use DB;
use Illuminate\Http\Request;



class SalesController extends Controller
{
    public function addSales(){
        return view('admin.Sales.sales',[
            'customers' => Customer::all(),
            'categories' => Category::where('publication_status', 1)->get()
        ]);
    }

    public function getLoyaltyPointByCustomerId($customerId){
        $customers = Customer::where('id', $customerId)->get();
        foreach ($customers as $customer){
            return json_encode($customer->loyalty_point);
        }

    }

    public function getProductByCategory($categoryId){
        $products = Product::where('category_id', $categoryId)->get();
        return json_encode($products);
    }

    public function getProductInfoBYId($productId){
        $getProductsInfo = DB::table('purchase_details')->where('product_id', '=', $productId)->get()->sum('quantity');
        return json_encode($getProductsInfo);
    }

    public function getProductMrpBYId($productId){
        $products = PurchaseDetails::where('product_id', $productId)->get();
        foreach ($products as $productMrp){
            return json_encode($productMrp->mrp);
        }
    }

    public function saleProducts(Request $request){
        SaleDetail::saleProducts($request);
        return redirect('sales/add-sales')->with('message', 'Sales Product Successfully!!');
    }



}

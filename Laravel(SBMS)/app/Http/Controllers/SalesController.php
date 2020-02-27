<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Product;
use App\PurchaseDetails;
use App\Sale;
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
        $this->validate($request,[
           'customer_id' => 'required',
           'date' => 'required',

        ]);
        SaleDetail::saleProducts($request);
        return redirect('sales/add-sales')->with('message', 'Sales Product Successfully!!');
    }

    public function getProductUnitPrice($productId){
        $purchaseDetails = PurchaseDetails::where('product_id', $productId)->orderBy('id', 'desc')->get();
        foreach ($purchaseDetails as $detail){
            return json_encode($detail->unit_price);
        }

    }

    public function manageSales(){

        return view('admin.Sales.manage-sale',[
            'sales' =>DB::table('sales')
                          ->join('customers', 'sales.customer_id', '=', 'customers.id')
                          ->select('sales.*', 'customers.name')->get()
        ]);
    }

    public function salesInfo($id){
        $saleDetails = DB::table('sale_details')
                            ->join('products', 'sale_details.product_id', '=', 'products.id')
                            ->where('sale_details.sale_id', '=', $id)
                            ->select('sale_details.*', 'products.product_name', 'products.product_code')->get();
        return view('admin.Sales.sale-details', [
            'saleDetails' => $saleDetails
        ]);
    }



}

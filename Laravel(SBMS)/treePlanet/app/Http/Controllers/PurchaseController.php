<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Purchase;
use App\PurchaseDetails;
use App\Supplier;
use Illuminate\Http\Request;
use DB;

class PurchaseController extends Controller
{
    public function addPurchase(){
        $category = Category::where('publication_status', 1)->get();
        $supplier = Supplier::where('publication_status', 1)->get();
        return view('admin.purchase.purchase',[
            'categories' => $category,
            'suppliers'  => $supplier
        ]);
    }
    public function getProductByCategoryId($categoryId){
        $product  = Product::where('category_id', '=',  $categoryId)->where('publication_status', '=', 1)->get();
//        $product  = Product::where('category_id', $categoryId)->get();
        return json_encode($product);
    }
    public function getProductCode($productId){
        $products = Product::where('id', $productId)->get();
        foreach ($products as $product){
            return json_encode($product->product_code);
        }
    }

    public function addPurchaseInfo(Request $request){
          $this->validate($request,[
              'purchase_date' => 'required',
              'purchase_invoice' => 'required',
              'supplier_id' => 'required',
              'product_id' => 'required',
              'product_code' => 'required',
              'manufracture_date' => 'required',
              'expire_date' => 'required',
              'quantity' => 'required',
              'unit_price' => 'required',
              'total_price' => 'required',
              'mrp' => 'required',
          ]);

          $data = $request->all();
          $purchaseId = Purchase::create($data)->id;
          if(count($request->product_id) > 0){
              foreach ($request->product_id  as $item=>$value){
                  $purchaseDetails = array(
                                  'purchase_id'  => $purchaseId,
                                  'product_id' => $request->product_id[$item],
                                  'product_code' => $request->product_code[$item],
                                  'manufracture_date' => $request->manufracture_date[$item],
                                  'expire_date' => $request->expire_date[$item],
                                  'quantity' => $request->quantity[$item],
                                  'unit_price' => $request->unit_price[$item],
                                  'total_price' => $request->total_price[$item],
                                  'mrp' => $request->mrp[$item]
                  );
                  PurchaseDetails::insert($purchaseDetails);
              }
              return redirect('/purchase/add-purchase')->with('message', 'Purchase Successfully');
          }
    }

    public function managePurchase(){
        return view('admin.purchase.manage-purchase',[
            'purchases' => DB::table('purchases')
                           ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
                           ->select('purchases.*', 'suppliers.supplier_name')
                           ->orderBy('purchases.id', 'desc')->get()
        ]);
    }

    public function purchaseDetails($id){

//        $purchaseDetails = PurchaseDetails::where('purchase_id', $id)->get();

        $purchaseDetails = DB::table('purchase_details')
                                ->join('products', function ($join) {
                                    $join->on('purchase_details.product_id', '=', 'products.id')->select('products.product_name');
                                })
                                ->where('purchase_id', $id)
                                ->get();

        return view('admin.purchase.purchase-details',[
              'purchaseDetails' => $purchaseDetails
        ]);
    }

    public function getProductPrevoisuInfo($productId){
//        $getQuantities = DB::table('purchase_details')->where('product_id', '=', $productId)->get()->sum('quantity');
        $getPreviousUnitPrices =PurchaseDetails::where('product_id', $productId)->orderBy('purchase_details.id', 'desc')->get();
        foreach ($getPreviousUnitPrices as $getPreviousUnitPrice){
            return json_encode($getPreviousUnitPrice->unit_price);
        }

    }

    public function getProductPreviousMrp($productId){
        $getPreviousinfo = PurchaseDetails::where('product_id', $productId)->orderBy('purchase_details.id', 'desc')->get();
        foreach ($getPreviousinfo  as $getPreviousMrp){
            return json_encode($getPreviousMrp->mrp);
        }

    }

    public function getAvailableQuantity($productId){
        $getAvailableQuantity = DB::table('purchase_details')->where('product_id', '=', $productId)->get()->sum('quantity');
        return json_encode($getAvailableQuantity);
    }

}

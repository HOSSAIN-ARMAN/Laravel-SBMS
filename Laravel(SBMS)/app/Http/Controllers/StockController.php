<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\PurchaseDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function displayStockReport(){
        return view('admin.stock.stock-report',[
            'categories' => Category::where('publication_status', 1)->get()
        ]);
    }
    public function getProductByCategoryId($categoryId){
        $products = Product::where('category_id', $categoryId)->get();
        return json_encode($products);
    }
    public function searchStockReprotByIdandDate($productId, $startDate, $endDate){
           $purchaseDetails = DB::table('purchase_details')
                                        ->where('product_id', '=', $productId)
                                        ->whereBetween('manufracture_date', [$startDate, $endDate])
                                        ->join('products', 'purchase_details.product_id', '=', 'products.id')
                                        ->join('categories', 'products.category_id', '=', 'categories.id')
                                        ->select('purchase_details.*','categories.category_name','products.product_name', 'products.reorder_lavel')
                                        ->get();

            return json_encode($purchaseDetails);

        //                                        ->join('categories', 'products.category_id', '=', 'categories.id')



//
//           $saleDetails   = DB::table('sales')
//                                      ->whereBetween('date', [$request->start_date, $request->end_date])
//                                      ->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
//                                      ->where('sale_details.product_id', '=', $request->product_id)
//                                      ->select('sale_details.*')->get();



    }

}

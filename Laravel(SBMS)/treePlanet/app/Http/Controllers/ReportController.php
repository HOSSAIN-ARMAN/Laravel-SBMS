<?php

namespace App\Http\Controllers;

use PDF;
use DB;
use phpDocumentor\Reflection\Types\This;

class ReportController extends Controller
{
    public function purchaseReport(){
        return view('admin.report.purchase-report');
    }
    public function salesReport(){
//        //$data = ['title' => 'Welcome to HDTuto.com'];
//        //$pdf = PDF::loadView('admin.report.sales-report', $data);
//        $pdf = PDF::loadView('admin.report.sales-report');
//        return $pdf->download('sales_report.pdf');
        return view('admin.report.sales-report');
    }

    public function purchaseReportFilterByDate($from_date, $to_date){
//        $purchaseDetails = DB::table('purchase_details')
//                                        ->whereBetween('manufracture_date', [$from_date, $to_date])
//                                        ->join('products', 'purchase_details.product_id', '=', 'products.id')
//                                        ->select('purchase_details.*', 'products.product_name')
//                                        ->get();
        $purchaseDetails = DB::table('purchases')
                                        ->whereBetween('purchase_date', [$from_date, $to_date])
                                        ->join('purchase_details', 'purchases.id', '=', 'purchase_details.purchase_id')
                                        ->join('products', 'purchase_details.product_id', '=', 'products.id')
                                        ->select('purchase_details.*', 'products.product_name')
                                        ->get();
        return json_encode($purchaseDetails);

    }
    public function salesReportFilterByDate($fromDate, $toDate){

        $saleDetails   = DB::table('sales')
                                      ->whereBetween('date', [$fromDate, $toDate])
                                      ->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
                                      ->Join('products', 'sale_details.product_id', '=', 'products.id')
                                      ->select('sale_details.*','products.product_name', 'products.product_code')
                                      ->get();


        return json_encode($saleDetails);

    }

    public function salesReportPdf(){
        $pdf = PDF::loadView('admin.report.sales-report-pdf');
        return $pdf->stream('sales_report.pdf');
    }

}

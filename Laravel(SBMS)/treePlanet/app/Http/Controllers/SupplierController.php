<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function addSupplier(){
        return view('admin.supplier.add-supplier');
    }
    public function newSupplier(Request $request){
        $this->validate($request,[
            'supplier_code' => 'required|min:4|max:4',
            'supplier_name' => 'required|regex:/(^([a-zA-Z ]+)(\d+)?$)/u|min:3|max:15',
            'supplier_address' => 'required|min:5|max:250',
            'contact' => 'required|min:11|max:11',
            'contact_person' => 'required|regex:/(^([a-zA-Z ]+)(\d+)?$)/u|min:3|max:15',
            'publication_status' => 'required'
        ]);
        $code = Supplier::where('supplier_code', $request->supplier_code)->first();
        $contact = Supplier::where('contact', $request->contact)->first();
        if ($contact){
            return redirect('supplier/add-supplier')->with('Contact', 'this Contact already Exits');
        }
        if ($code){
            return redirect('supplier/add-supplier')->with('code', 'this code already Exits');
        }else{
            Supplier::newSupplier($request);
            return redirect('supplier/add-supplier')->with('message', 'Supplier Save Successfully');
        }

    }
    public function manageSupplier(){
        return view('admin.supplier.manage-supplier',[
           'suppliers' => Supplier::all()
        ]);
    }
    public function editSupplier($id){

        return view('admin.supplier.edit-supplier',[
            'supplier' => Supplier::find($id)
        ]);
    }
    public function updateSupplierInfoSupplier(Request $request){
        Supplier::updateSupplierInfoSupplier($request);
        return redirect('supplier/manage-supplier')->with('message', 'Update Successfully');
    }
    public function deleteSupplierInfoSupplier(Request $request){
          $supplier = Supplier::deleteSupplierInfoSupplier($request);
          return redirect('supplier/manage-supplier');
    }
}

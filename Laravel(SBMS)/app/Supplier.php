<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Supplier extends Model
{
    protected $fillable = ['supplier_code', 'supplier_name', 'supplier_address', 'contact', 'contact_person', 'publication_status'];

    public static function newSupplier($request){
        Supplier::create($request->all());
    }
    public static function updateSupplierInfoSupplier($request){
        $supplier = Supplier::find($request->id);
        $supplier->supplier_code      = $request->supplier_code;
        $supplier->supplier_name      = $request->supplier_name;
        $supplier->supplier_address   = $request->supplier_address;
        $supplier->contact            = $request->contact;
        $supplier->contact_person     = $request->contact_person;
        $supplier->publication_status = $request->publication_status;
        $supplier->update();

    }
    public static function deleteSupplierInfoSupplier($request){
        $supplier = Supplier::find($request->id)->first();
        $supplier->delete();
    }
}

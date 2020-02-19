<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function addProduct(){
        return view('admin.products.add-product',[
            'categories' => Category::where('publication_status', 1)->get()
        ]);
    }
    public function newProduct(Request $request){
        $this->validate($request,[
           'product_code' => 'required|min:4|max:4',
            'product_name' => 'required|alpha|regex:/(^([a-zA-Z]+)(\d+)?$)/u|min:4|max:30',
            'reorder_lavel' => 'required',
            'product_discription' => 'required',
            'product_img' => [
                'required',
                'image',
                'mimes:jpeg,bmp,png',
//                'dimensions:max_width=300,max_height=200'
            ],
            'publication_status' => 'required'
        ]);
        Product::newProduct($request);
        return redirect('product/add-product')->with('message', 'Product Save Successfully!!!');
    }
    public function manageProduct(){
        return view('admin.products.manage-product',[
            'products' => Product::manageProduct()
        ]);
    }
    public function editProduct($id){
        return view('admin.products.edit-product', [
            'product' => Product::find($id),
            'categories' => Category::where('publication_status', 1)->get()
        ]);
    }
    public function updateProduct(Request $request){
        Product::updateProduct($request);
        return redirect('product/manage-product');
    }
    public function deleteProduct(Request $request){
        Product::deleteProduct($request);
        return redirect('product/manage-product');
    }

    // validation function

    public function productValidationByAjax($code){
        $productCodeExits = Product::where('product_code', $code)->first();
        if($productCodeExits){
            return json_encode('This code Already Exits!!');
        }
        else{
            $msg = 'This code available';
            return json_encode('this code are available');
        }
    }
}

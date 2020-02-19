<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    protected $fillable = ['category_id', 'product_code', 'product_name', 'reorder_lavel', 'product_discription', 'product_img', 'publication_status'];

    private static function uploadImage($image){
        $imageName = $image->getClientOriginalName();
        $directory = "Product-img/";
        $image->move($directory, $imageName);
        return $directory.$imageName;
    }
    public static function newProduct($request){

        $image = $request->file('product_img');
        $imageName = $image->getClientOriginalName();
        $directory = "Product-img/";
        $image->move($directory, $imageName);

        $product = new Product();
        $product->category_id  = $request->category_id;
        $product->product_code  = $request->product_code;
        $product->product_name  = $request->product_name;
        $product->reorder_lavel  = $request->reorder_lavel;
        $product->product_discription  = $request->product_discription;
        $product->product_img  = $directory.$imageName;
        $product->publication_status  = $request->publication_status;
        $product->save();

    }
    public static function manageProduct(){
        $products = DB::table('products')
                         ->join('categories', 'products.category_id', '=', 'categories.id')
                         ->select('products.*', 'categories.category_name')
                         ->orderby('products.id', 'desc')->get();
        return $products;
    }

    public static function updateProduct($request){
        $image = $request->file('product_img');
        $product = Product::find($request->id);
        if(isset($image)){
            if (file_exists($product->product_img)){
                unlink($product->product_img);
            }
            $imagePath = Product::uploadImage($image);
        }
        $product->category_id = $request->category_id;
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->reorder_lavel = $request->reorder_lavel;
        $product->product_discription = $request->product_discription;
        if ($image){
            $product->product_img = $imagePath;
        }
        $product->publication_status = $request->publication_status;
        $product->save();
    }

    public static function deleteProduct($request){
        $product = Product::find($request->id);
        $product->delete();
    }
}

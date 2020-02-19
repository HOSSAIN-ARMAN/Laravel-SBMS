<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }
    public function newCategory(Request $request){
        $this->validate($request, [
           'category_code' => 'required|min:4|max:4',
            'category_name' => 'required|alpha|regex:/(^([a-zA-Z_ ]+)(\d+)?$)/u|min:4|max:30',
            'publication_status' => 'required'
        ]);
        if (Category::newCategory($request) == 'this code already Exits'){
            return 'true';
        }

        return redirect('/category/add-category')->with('message', 'Category Added Successfully Added');
    }
    public function isCodeExits($code){
        $categoryCode = Category::where('category_code', $code)->first();
        if($categoryCode){
            return json_encode('this code already Exits');
        }else{
            return json_encode('this code availabe');
        }
    }
    public function manageCategory(){
        return view('admin.category.manage-category');
    }
    public function editCategory($id){
        return view('admin.category.edit-category',[
            'category' => Category::find($id)
        ]);
    }
    public function updateCategory(Request $request){
        $category = Category::find($request->id);
        $category->category_code      = $request->category_code;
        $category->category_name      = $request->category_name;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('category/manage-category')->with('message', 'category update successfully');
    }
    public function deleteCategory(Request $request){

        $products = Product::where('category_id', $request->id)->first();
        if($products){
            return redirect('category/manage-category')->with('message', 'Please Delete at first of this Category Products');
        }else{
            $category = Category::find($request->id);
            $category->delete();
            return redirect('category/manage-category')->with('message2', 'Delete Successfully');
        }

    }
}

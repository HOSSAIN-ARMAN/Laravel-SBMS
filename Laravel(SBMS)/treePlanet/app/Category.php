<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    protected $fillable = ['category_code', 'category_name', 'publication_status'];

    public static function newCategory($request){
        $category = new Category();
        $category->category_code      = $request->category_code;
        $category->category_name      = $request->category_name;
        $category->publication_status = $request->publication_status;
        $category->save();
    }

}

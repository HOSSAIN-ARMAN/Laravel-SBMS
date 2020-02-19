<?php

///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
//Route::get('/', function () {
//    return view('welcome');
//});




Route::get('/',[
    'uses' => 'IndexController@index',
    'as'  =>'/'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'categoryMiddleware'], function (){

    Route::get('/category/add-category',[
        'uses' => 'CategoryController@addCategory',
        'as'  =>'add-category'
    ]);

    Route::post('/category/new-category',[
        'uses' => 'CategoryController@newCategory',
        'as'  =>'new-category'
    ]);

    Route::get('/category/manage-category', [
        'uses' => 'CategoryController@manageCategory',
        'as'  =>'manage-category'
    ]);

    Route::get('/category/edit-category/{id}', [
        'uses' => 'CategoryController@editCategory',
        'as'  =>'edit-category'
    ]);
    Route::post('/category/update-category', [
        'uses' => 'CategoryController@updateCategory',
        'as'  =>'update-category'
    ]);

    Route::post('/category/delete-category', [
        'uses' => 'CategoryController@deleteCategory',
        'as'  =>'delete-category'
    ]);

//    category validation
    Route::get('/category/isCodeExits/{code}',[
       'uses' => 'CategoryController@isCodeExits',
       'as'   => 'category/isCodeExits'
    ]);

});

Route::group(['middleware' => 'productMiddleware'], function (){

    Route::get('/product/add-product',[
        'uses' => 'ProductController@addProduct',
        'as'   => 'add-product'
    ]);
    Route::post('/product/new-product',[
        'uses' => 'ProductController@newProduct',
        'as'   => 'new-product'
    ]);
    Route::get('/product/manage-product',[
        'uses' => 'ProductController@manageProduct',
        'as'   => 'manage-product'
    ]);
    Route::get('/product/edit-product/{id}',[
        'uses' => 'ProductController@editProduct',
        'as'   => 'edit-product'
    ]);
    Route::post('/product/update-product',[
        'uses' => 'ProductController@updateProduct',
        'as'   => 'update-product'
    ]);

    Route::post('/product/delete-product',[
        'uses' => 'ProductController@deleteProduct',
        'as'   => 'delete-product'
    ]);

    //validation

    Route::get('/product/code-exits/{code}',[
        'uses' => 'ProductController@productValidationByAjax',
        'as'   => 'product/code-exits'
    ]);


});


Route::group(['middleware' => 'customerMiddleware'], function (){

   Route::get('/customer/add-customer',[
      'uses' => 'CustomerController@addCustomer',
       'as'  => 'add-customer'
   ]);

   Route::post('/customer/new-customer',[
      'uses' => 'CustomerController@newCustomer',
       'as'  => 'new-customer'
   ]);

});


Route::group(['middleware' => 'supplierMiddleware'], function (){
     Route::get('/supplier/add-supplier',[
        'uses' => 'SupplierController@addSupplier',
         'as' => 'add-supplier'
     ]);
    Route::post('/supplier/add-supplier',[
        'uses' => 'SupplierController@newSupplier',
        'as' => 'new-supplier'
    ]);
    Route::get('/supplier/manage-supplier',[
        'uses' => 'SupplierController@manageSupplier',
        'as' => 'manage-supplier'
    ]);
    Route::get('/supplier/edit-supplier/{id}',[
        'uses' => 'SupplierController@editSupplier',
        'as' => 'edit-supplier'
    ]);

    Route::post('/supplier/update-supplier-info',[
        'uses' => 'SupplierController@updateSupplierInfoSupplier',
        'as' => 'update-supplier-info'
    ]);

    Route::post('/supplier/delete-supplier-info',[
            'uses' => 'SupplierController@deleteSupplierInfoSupplier',
            'as' => 'delete-supplier-info'
    ]);

});

Route::group(['middleware' => 'purchaseMiddleWare'], function (){

    Route::get('/purchase/add-purchase',[
        'uses' => 'PurchaseController@addPurchase',
        'as' => 'add-purchase'
    ]);
    Route::get('/purchase/getProductByCategoryId/{categoryId}',[
        'uses' => 'PurchaseController@getProductByCategoryId',
        'as' => 'purchase/getProductByCategoryId'
    ]);

    Route::get('/purchase/getProductCode/{productId}',[
        'uses' => 'PurchaseController@getProductCode',
        'as' => 'purchase/getProductCode'
    ]);

    Route::post('/purchase/new-purchase',[
        'uses' => 'PurchaseController@addPurchaseInfo',
        'as' => 'new-purchase'
    ]);
    Route::get('/purchase/manage-purchase',[
        'uses' => 'PurchaseController@managePurchase',
        'as' => 'manage-purchase'
    ]);
    Route::get('/purchase/view-purchase-details/{id}',[
        'uses' => 'PurchaseController@purchaseDetails',
        'as' => 'view-purchase-details'
    ]);
    Route::get('/purchase/getProductPrevoisuInfo/{productId}',[
        'uses' => 'PurchaseController@getProductPrevoisuInfo',
        'as' => 'purchase/getProductPrevoisuInfo'
    ]);

    Route::get('/purchase/getProductPreviousMrp/{productId}',[
        'uses' => 'PurchaseController@getProductPreviousMrp',
        'as' => 'purchase/getProductPreviousMrp'
    ]);

    Route::get('/purchase/getAvailableQuantity/{productId}',[
        'uses' => 'PurchaseController@getAvailableQuantity',
        'as' => 'purchase/getAvailableQuantity'
    ]);

});

Route::group(['middleware' => 'salesMiddleware'], function (){

     Route::get('/sales/add-sales',[
         'uses' => 'SalesController@addSales',
         'as'   => 'add-sales'
     ]);


    Route::get('/sales/getCustomerLoyaltyPoint/{customerId}',[
        'uses' => 'SalesController@getLoyaltyPointByCustomerId',
        'as'  => 'sales/getCustomerLoyaltyPoint'
    ]);

    Route::get('/sales/getProductByCategory/{categoryId}',[
        'uses' => 'SalesController@getProductByCategory',
        'as'  => 'sales/getProductByCategory'
    ]);

    Route::get('/sales/getProductInfoBYId/{productId}',[
        'uses' => 'SalesController@getProductInfoBYId',
        'as'  => 'sales/getProductInfoBYId'
    ]);

    Route::get('/sales/getProductMrpBYId/{productId}',[
        'uses' => 'SalesController@getProductMrpBYId',
        'as'  => 'sales/getProductMrpBYId'
    ]);

    Route::post('/sales/new-sale',[
        'uses' => 'SalesController@saleProducts',
        'as'  => 'new-sale'
    ]);

});






Route::get('/test',[
   'uses' => 'TestController@test',
    'as'  => 'test'
]);

Route::post('/testCnfrm',[
    'uses' => 'TestController@testCnfrm',
    'as'  => 'testCnfrm'
]);



<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//for home
Route::get('/front-product-image/{img_name}',[
    'uses'=>'HomeController@getProductImage',
    'as'=>'front.product.image'
]);

Route::get('/',[
    'uses'=>'HomeController@getWelcome',
    'as'=>'/'
]);
Route::post('/contact/message',[
    'uses'=>'HomeController@postMessage',
    'as'=>'post.message'
]);

Route::get('/product/cat/{id}',[
    'uses'=>'HomeController@getProductCategory',
    'as'=>'product.cat'
]);

Route::get('/search',[
    'uses'=>'HomeController@getSearch',
    'as'=>'search.product'
]);

Route::get('/add/cart/{id}',[
    'uses'=>'HomeController@getAddCart',
    'as'=>'add.cart'
]);

Route::get('/shopping/cart',[
    'uses'=>'HomeController@getCart',
    'as'=>'cart.show'
]);

Route::get('/Increase/cart/{id}', [
    'uses'=>'HomeController@getIncreaseCart',
    'as'=>'increase.cart'
]);

Route::get('/Decrease/cart/{id}', [
    'uses'=>'HomeController@getDecreaseCart',
    'as'=>'decrease.cart'
]);

Route::get('/Cart/Cancel',[
    'uses'=>'HomeController@getCancelCart',
    'as'=>'cancel.cart'
]);

Auth::routes(['verify' => true]);

Route::group(['middleware'=>'verified'],function(){

    Route::get('/home', [
        'uses'=>'HomeController@index',
        'as'=>'home'
    ]);



    //For Categories

    Route::get('/categories',[
        'uses'=>'ProductController@getCategory',
        'as'=>'categories'
    ]);

    Route::post('/category/new',[
        'uses'=>'ProductController@postNewCategory',
        'as'=>'new.category'
    ]);

    Route::get('/category/remove/{id}',[
        'uses'=>'ProductController@getDeleteCategory',
        'as'=>'remove.category'
    ]);
    Route::get('/categories',[
        'uses'=>'ProductController@getCategory',
        'as'=>'categories'
    ]);

    Route::post('/category/update',[
        'uses'=>'ProductController@postUpdateCategory',
        'as'=>'update.category'
    ]);

    //For Products
    Route::get('/products',[
        'uses'=>'ProductController@getProducts',
        'as'=>'products'
    ]);

    Route::post('/products/new',[
        'uses'=>'ProductController@postNewProduct',
        'as'=>'new.product'
    ]);
});

Route::get('/products-image/{img_name}', [
    'uses'=>'ProductController@getProductImage',
    'as'=>'product.image'
]);

Route::get('/products/delete',[
    'uses'=>'ProductController@getDeleteProduct',
    'as'=>'delete.product'
]);

Route::post('/products/update',[
    'uses'=>'ProductController@postUpdateProduct',
    'as'=>'update.product'
]);

Route::get('/products/{id}/edit',[
    "uses"=>'ProductController@getEditProduct',
    "as"=>'edit.product'
]);


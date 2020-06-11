<?php

use Illuminate\Support\Facades\Route;

// front-end
Route::get('/', 'HomeController@index');
Route::post('/search', 'HomeController@search');

// category home
Route::get('/category-product/{cate_id}', 'CateGoryProduct@show_category_home');
Route::get('/brand-product/{brand_id}', 'BrandsProduct@show_brand_home');

//detail
Route::get('/details/{product_id}', 'ControllerProduct@show_detail_product');

// back-end
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard','AdminController@renderAdminLayout');
Route::get('/logout','AdminController@Logout');
Route::post('/admin-dashboard', 'AdminController@Dashboard');
Route::post('/search-product', 'AdminController@Search');


// category-product
Route::get('/add-category-product', 'CateGoryProduct@add_category_product');
Route::get('/all-category-product', 'CateGoryProduct@all_category_product');


Route::get('/active-category-product/{category_id}', 'CateGoryProduct@active_category_product');
Route::get('/unactive-category-product/{category_id}', 'CateGoryProduct@unactive_category_product');

Route::get('/edit-category-product/{category_id}','CateGoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_id}','CateGoryProduct@delete_category_product');

Route::post('/save-category-product', 'CateGoryProduct@save_category_product');
Route::post('/update-category-product/{category_id}', 'CateGoryProduct@update_category_product');

// brands-product
Route::get('/add-brand-product', 'BrandsProduct@add_brand_product');
Route::get('/all-brand-product', 'BrandsProduct@all_brand_product');


Route::get('/active-brand-product/{brand_id}', 'BrandsProduct@active_brand_product');
Route::get('/unactive-brand-product/{brand_id}', 'BrandsProduct@unactive_brand_product');

Route::get('/edit-brand-product/{brand_id}','BrandsProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_id}','BrandsProduct@delete_brand_product');

Route::post('/save-brand-product', 'BrandsProduct@save_brand_product');
Route::post('/update-brand-product/{brand_id}', 'BrandsProduct@update_brand_product');

// products
Route::get('/add-product', 'ControllerProduct@add_product');
Route::get('/all-product', 'ControllerProduct@all_product');


Route::get('/active-product/{product_id}', 'ControllerProduct@active_product');
Route::get('/unactive-product/{product_id}', 'ControllerProduct@unactive_product');

Route::get('/edit-product/{product_id}','ControllerProduct@edit_product');
Route::get('/delete-product/{product_id}','ControllerProduct@delete_product');

Route::post('/save-product', 'ControllerProduct@save_product');
Route::post('/update-product/{product_id}', 'ControllerProduct@update_product');

// cart
Route::post('/save-cart', 'ControllerCart@save_cart');
Route::get('/show-cart', 'ControllerCart@show_cart');
Route::get('/delete-to-cart/{rowId}', 'ControllerCart@delete_cart');
Route::post('/update-cart-quatity', 'ControllerCart@update_cart_quatity');

// check-out
Route::get('/login-checkout', 'ControllerCheckOut@login_checkout');
Route::get('/logout-checkout', 'ControllerCheckOut@logout_checkout');
Route::post('/login-customer', 'ControllerCheckOut@login_customer');
Route::post('/add-customer', 'ControllerCheckOut@add_customer');
Route::get('/checkout', 'ControllerCheckOut@check_out');
Route::post('/save-checkout-customer', 'ControllerCheckOut@save_checkout_customer');
Route::get('/payment', 'ControllerCheckOut@payment');
Route::post('/order-place', 'ControllerCheckOut@order_place');

// order
Route::get('/manage-order', 'ControllerCheckOut@manage_order');
Route::get('/view-order/{orderId}', 'ControllerCheckOut@view_order');

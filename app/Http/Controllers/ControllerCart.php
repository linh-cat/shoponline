<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class ControllerCart extends Controller
{
    public function save_cart(Request $request){
        $product_id = $request->product_id_hidden;
        $quantity = $request->qty;

        $product_infor = DB::table('tbl_product')->where('product_id', $product_id)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99);
        // Cart::destroy();

        $data['id'] = $product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_infor->product_name;
        $data['price'] = $product_infor->product_price;
        $data['option'] = $product_infor->product_image;
        Cart::add($data);

        return Redirect::to('/show-cart');


    }
    public function show_cart(){
        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        return view('pages.cart.show_cart')->with('category', $category_product)->with('brand', $brand_product);
    }
    public function delete_cart($rowId){
        Cart::update($rowId, 0); // Will update the quantity
        return Redirect::to('/show-cart');

    }
    public function update_cart_quatity(Request $request) {
         $rowId = $request->rowId_cart;
         $quantity = $request->quantity_cart;
         Cart::update($rowId, $quantity);

         return Redirect::to('/show-cart');
    }
}

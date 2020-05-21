<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ControllerCheckOut extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id', '=', 'tbl_customer.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
        ->join('tbl_order_detail','tbl_order.order_id', '=', 'tbl_order_detail.order_id')
        ->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*', 'tbl_order_detail.*')->first();

        $manager_order_by_id = view('admin.view_order')->with('view_order', $order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
    }
    public function login_checkout(){
        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        return view('pages.checkout.login_checkout')->with('category', $category_product)->with('brand', $brand_product);
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect('/login-checkout');
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return Redirect('/checkout');

    }
    public function check_out(){
        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        return view('pages.checkout.show_checkout')->with('category', $category_product)->with('brand', $brand_product);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipipng_phone;
        $data['shipping_notes'] = $request->shipipng_notes;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('Shipping_id', $shipping_id);

        return Redirect('/payment');
    }
    public function payment(){
        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        return view('pages.checkout.payment')->with('category', $category_product)->with('brand', $brand_product);;
    }
    public function login_customer(Request $request){
        $email = $request->customer_email;
        $password = md5($request->customer_password);

        $result = DB::table('tbl_customer')->where('customer_email', $email)->where('customer_password', $password)->first();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            return Redirect('/checkout');
        }else{
            return Redirect('/login-checkout');
        }
    }
    public function order_place(Request $request){
        $content = Cart::content();

        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = "Dang cho xu li";

        $payment_id = DB::table('tbl_payment')->insertGetId($data);


        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('Shipping_id');
        $order_data['order_status'] = 'dang cho xu li';
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();

        $order_id = DB::table('tbl_order')->insertGetId($order_data);



        foreach ($content as $v_value) {

            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_value->id;
            $order_d_data['product_name'] = $v_value->name;
            $order_d_data['product_price'] = $v_value->price;
            $order_d_data['product_sales_quantity'] = $v_value->qty;

            $order_d_id = DB::table('tbl_order_detail')->insertGetId($order_d_data);
        }
        if ($data['payment_method'] == 1) {
            echo 'Direct Bank Transfer np Support';
        }elseif ($data['payment_method'] == 2) {
            Cart::destroy();
            $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

            return view('pages.checkout.hand_cash')->with('category', $category_product)->with('brand', $brand_product);
        }
    }
    public function manage_order(){
        $this->AuthLogin();

        $all_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id', '=', 'tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->orderby('tbl_order.order_id', 'desc')->get();

        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);

    }
}

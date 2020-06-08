<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
        return view('admin_login');
    }
    public function renderAdminLayout(){
        $this->AuthLogin();
        return view('admin.admin_home');
    }
    public function Dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

        if($result){
           Session::put('admin_name', $result->admin_name);
           Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message', 'PassWord or Acount wrong, Please field again!');
            return Redirect::to('/admin');
        }
    }
    public function Logout(){
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }
    public function Search(Request $request){
        $keywords = $request->search_product;
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')->orderby('tbl_product.product_id', 'desc')->where('product_name', 'like', '%' .$keywords.'%')->get();

        $manager_product = view('admin.show_search_product')->with('search_product', $all_product);
        return view('admin_layout')->with('admin.show_search_product', $manager_product);
    }
}

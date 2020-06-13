<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CateGoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->paginate(5);
        $manager_categor_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_categor_product);
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->insert($data);

        Session::put('message', 'Add Successfull!');
        return Redirect::to('add-category-product');
    }
    public function active_category_product($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->update(['category_status' => 1]);
        Session::put('message', 'Update status successfull!');
        return Redirect::to('all-category-product');
    }
    public function unactive_category_product($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->update(['category_status' => 0]);
        Session::put('message', 'Update status successfull!');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_id)->get();
        $manager_categor_product = view('admin.edit_category_product')->with('edit_cactegory_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_categor_product);
    }
    public function update_category_product(Request $request, $category_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
        Session::put('message', 'Update successfull!');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->delete();
        Session::put('message', 'Delete successfull!');
        return Redirect::to('all-category-product');
    }
    //end admin page
    public function show_category_home($cate_id){
        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        $cate_by_id = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id', '=',
        'tbl_category_product.category_id')->where('tbl_product.category_id', $cate_id)->paginate(5);

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $cate_id)->get();

        return view('pages.category.show_category_home')->with('category', $category_product)->with('brand', $brand_product)
        ->with('category_by_id', $cate_by_id)->with('category_name', $category_name);
    }
}

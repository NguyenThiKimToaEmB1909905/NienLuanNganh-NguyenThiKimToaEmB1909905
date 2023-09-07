<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

// trả về trang j đó khi thành công or thất bại
session_start();
class HomeController extends Controller
{
    public function index()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

        // $all_product = DB::table('tbl_product')
        //     ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
        //     ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')->orderBy('tbl_product.product_id', 'desc') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_brand
        //     ->get();
        $all_product = DB::table('tbl_product')->where('product_status', '0')->orderBy('brand_id', 'desc')->paginate(6);//limit(4) là lấy 4 sảm phẩm

        return view('pages.home.home_main')->with('category_home', $cate_product)->with('brand_home', $brand_product)->with('product_home',$all_product);
        
    }

    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
        
        
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.details.search')
        ->with('category_home', $cate_product)
        ->with('brand_home', $brand_product)
        ->with('search_product',$search_product);

    }
}

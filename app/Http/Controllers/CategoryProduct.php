<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

// trả về trang j đó khi thành công or thất bại
session_start();
class CategoryProduct extends Controller
{

    /* start Function admin page */

    /* Bảo mật các trang trong admin, phải có mật khẩu đăng nhập vào mới được */
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_category_product()
    {
        $this->AuthLogin(); // trỏ đến hàm AuthLogin
        return view('admin.add_category_product');
    }

    public function all_category_product()
    {
        $this->AuthLogin(); // trỏ đến hàm AuthLogin
        $all_category_product = DB::table('tbl_category_product')->paginate(6);
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request)
    {
        $this->AuthLogin(); // trỏ đến hàm AuthLogin

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }
    public function unactive_category_product($category_product_id)
    {
        $this->AuthLogin(); // trỏ đến hàm AuthLogin

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 1]);
        Session::put('message', 'Hiển thị danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }
    public function active_category_product($category_product_id)
    {
        $this->AuthLogin(); // trỏ đến hàm AuthLogin

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 0]);
        Session::put('message', 'không hiển thị danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }
    public function edit_category_product($category_product_id)
    {
        $this->AuthLogin(); // trỏ đến hàm AuthLogin 

        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('/edit-category-product', $manager_category_product);
    }
    public function update_category_product(Request $request, $category_product_id)
    {
        $this->AuthLogin(); // trỏ đến hàm AuthLogin

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }
    public function delete_category_product($category_product_id)
    {
        $this->AuthLogin(); // trỏ đến hàm AuthLogin

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }

    /* end Function admin page */

    /* home */
    //home_danhmuc.blade.php
    public function show_category_home($category_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id',$category_id)->paginate(6);

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        return view('pages.home.home_danhmuc')
        ->with('category_home',$cate_product)
        ->with('brand_home',$brand_product)
        ->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name);

    //     $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
    //     $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
    //     $cate_by_slug = CategoryProductModel::where('slug_category_product', $slug_category_product)->get();
    //     // $category_by_id = DB::table('tbl_product')
    //     // ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
    //     // ->where('tbl_product.category_id',$category_id)->get();
    //     $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $cate_by_slug)->get();

    //     foreach($cate_by_slug as $key => $cate){
    //         $category_id = $cate->category_id;
    //     }
    //     if(isset($_GET['sort_by'])){
    //         $sort_by = $_GET['sort_by'];
    //         if($sort_by == 'giamdan'){
    //             $category_by_id = Product::with('category')
    //             ->where('category_id',$category_id)
    //             ->orderBy('product_price','desc')
    //             ->paginate(6);
    //         //     ->appends(request()->query());
    //         }
    //         elseif($sort_by == 'tang_dan'){
    //             $category_by_id = Product::with('category')
    //             ->where('category_id',$category_id)
    //             ->orderBy('product_price','asc')
    //             ->paginate(6);
            
    //         }
    //         elseif($sort_by == 'kytu_za'){
    //             $category_by_id = Product::with('category')
    //             ->where('category_id',$category_id)
    //             ->orderBy('product_name','desc')
    //             ->paginate(6);
            
    //         }
    //         elseif($sort_by == 'kytu_az'){
    //             $category_by_id = Product::with('category')
    //             ->where('category_id',$category_id)
    //             ->orderBy('product_name','asc')
    //             ->paginate(6);
            
    //         }
    //     }else{
    //         $category_by_id = Product::with('category')
    //         ->where('category_id',$category_id)
    //         ->orderBy('product_name','desc')
    //         ->paginate(6);
        
    //     }
    //     foreach($category_name as $key => $val){
    //         //seo 
    //         $meta_desc = $val->category_desc; 
    //         $meta_title = $val->category_name;
    //         $url_canonical = $request->url();
    //         //--seo
    //         }


        

    //     return view('pages.home.home_danhmuc')
    //     ->with('category_home',$cate_product)
    //     ->with('brand_home',$brand_product)
    //     ->with('category_by_id',$category_by_id)
    //     ->with('category_name',$category_name)
    //     ->with('meta_desc',$meta_desc)
    //     ->with('meta_title',$meta_title)
    //     ->with('url_canonical',$url_canonical);
    // }
    }

    

}

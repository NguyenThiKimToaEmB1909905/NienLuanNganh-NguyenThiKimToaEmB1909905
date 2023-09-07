<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

// trả về trang j đó khi thành công or thất bại
session_start();
class ProductController extends Controller
{
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

    public function add_product()
    {
        $this->AuthLogin(); // trỏ đến AuthLogin

        /* thêm danh mục và thương hiệu cho từng sản phẩm */
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function all_product()
    {
        $this->AuthLogin(); // trỏ đến AuthLogin


        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')// liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_brand
            ->orderBy('tbl_product.product_id', 'asc') 
            ->paginate(10);

        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request)
    {
        $this->AuthLogin(); // trỏ đến AuthLogin

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_status'] = $request->product_status;
        $data['product_content'] = $request->product_content;
        $data['brand_id'] = $request->product_brand;
        $data['category_id'] = $request->product_cate; // tên cột trong bảng data =....->tên đặt lại để đặt vào name="..."

        $get_image = $request->file('product_image');
        if ($get_image) { // kiểm tra có phải ảnh hk or up vs điều kiện dung lượng là bao nhiêu 
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); //getClientOriginalExtension là lấy đuôi mở rộng
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('/all-product');
        }

        $data['product_image'] = ''; //nếu hk chọn thì hk uploads, = rong

        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('/add-product');
    }
    public function unactive_product($product_id)
    {
        $this->AuthLogin(); // trỏ đến AuthLogin

        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Hiển thị thương hiệu sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    public function active_product($product_id)
    {
        $this->AuthLogin(); // trỏ đến AuthLogin

        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Hiển thị thương hiệu sản phẩm không thành công');
        return Redirect::to('/all-product');
    }
    public function edit_product($product_id)
    {
        $this->AuthLogin(); // trỏ đến AuthLogin

        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')
            ->with('edit_product', $edit_product)
            ->with('cate_product', $cate_product)
            ->with('brand_product', $brand_product);
        return view('admin_layout')->with('/edit-product', $manager_product);
    }
    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin(); // trỏ đến AuthLogin

        $data = array();

        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_status'] = $request->product_status;
        $data['product_content'] = $request->product_content;
        $data['brand_id'] = $request->product_brand;
        $data['category_id'] = $request->product_cate; // tên cột trong bảng data =....->tên đặt lại để đặt vào name="..."
        $get_image = $request->file('product_image');

        if ($get_image) { // kiểm tra có phải ảnh hk or up vs điều kiện dung lượng là bao nhiêu 
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); //getClientOriginalExtension là lấy đuôi mở rộng
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'câp nhật sản phẩm thành công');
            return Redirect::to('/all-product');
        }

        $data['product_image'] = ''; //nếu hk chọn thì hk uploads, = rong

        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    public function delete_product($product_id)
    {
        $this->AuthLogin(); // trỏ đến AuthLogin

        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('/all-product');
    }

    //end function admin pages

    //home
    /* trang chi tiết sản phẩm */
    public function details_product($product_id)
    {

        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
        
        

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')// liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_brand
        ->orderBy('tbl_product.product_id', 'desc') 
        ->where('tbl_product.product_id',$product_id)
        ->get();

        foreach($details_product as $key => $detail){
            $category_id = $detail->category_id;
        }

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')->orderBy('tbl_product.product_id', 'desc') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_brand
        ->where('tbl_category_product.category_id',$category_id)
        // ->andwhere('tbl_category_product.category_id','=','3')
        ->whereNotIn('tbl_product.product_id',[$product_id])//lấy nhưng sp thuộc danh mục đó nhưng trừ cái sp hiện tại trong tràn chi tiết
        ->get();

        return view('pages.details.show_detail')
            ->with('category_home', $cate_product)
            ->with('brand_home', $brand_product)
             ->with('product_details', $details_product)
             ->with('related', $related_product);
            
            // ->with('brand_name', $brand_name);
    }
}

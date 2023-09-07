<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Session;

use Cart;
// trả về trang j đó khi thành công or thất bại
session_start();
class CartController extends Controller
{
    //thêm sp vào giỏ hàng
    public function save_cart(Request $request){

        $productId =$request->productid_hidden;
        $quality = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();
       
        // Cart::add(['id' => $product_info->product_id, 'name' => $product_info->product_name, 'qty' => $quantily, 'price' =>$product_info->product_price, 'options' => ['size' => 'large']]);
        $data['id'] = $product_info->product_id; 
        $data['qty'] = $quality;
        $data['name'] = $product_info->product_name; 
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;

        $data['options']['image'] = $product_info->product_image; 
         Cart::add($data);
         
        // Cart::destroy();
       return Redirect::to('/show_cart');
    }
    public function show_cart(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

        return view('pages.cart.show_cart')
        ->with('category_home', $cate_product)
        ->with('brand_home', $brand_product);
    }
    // xóa sản phẩm đẫ thêm vào giỏ hàng
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show_cart');

    }
    // cập nhật số lượng trong giỏ hàng
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show_cart');

    }
}

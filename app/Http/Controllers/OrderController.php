<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Auth;
use Cart;
// trả về trang j đó khi thành công or thất bại
session_start();

class OrderController extends Controller
{


    public function view_myorder()
    {
        
        $order_by_id = DB::table('tbl_order')
            ->join('tbl_clients', 'tbl_order.client_id', '=', 'tbl_clients.client_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
            ->select('tbl_order.*', 'tbl_clients.*', 'tbl_shipping.*', 'tbl_order_details.*')
            ->first();

        // echo'<pre>';
        // print_r($order_by_id);
        // echo'</pre>';

        
        return view('pages.orders.view_myorder')->with('order_by_id',$order_by_id );
    }
    public function myorder()
    {
        //đăng nhập mới được vào xem đơn hàng
        if (!Session::get('client_id')) {
            return redirect('login_client')->with('error', 'vui lòng đăng nhập');
        } else {
            $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

            $all_order = Order::where('client_id', Session::get('client_id'))->orderby('order_id', 'desc')->get();

            return view('pages.orders.myorder')->with('all_order', $all_order)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
        }
    }
}

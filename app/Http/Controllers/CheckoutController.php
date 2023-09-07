<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\SocialClient;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Auth;
use Cart;
// trả về trang j đó khi thành công or thất bại
session_start();

class CheckoutController extends Controller
{
    // Đăng nhập khi thanh toán đơn hàng
    public function login_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

        return view('pages.checkout.login_checkout')->with('category_home', $cate_product)->with('brand_home', $brand_product);
    }
    // đăng kí khi thanh toán
    public function register_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

        return view('pages.checkout.register_checkout')->with('category_home', $cate_product)->with('brand_home', $brand_product);
    }

    // Đăng kí khi chưa có tài khoản
    public function add_client(Request $request)
    {
        $data = array(); // kiểu mảng
        $data['client_name'] = $request->client_name;
        $data['client_email'] = $request->client_email;
        $data['client_sdt'] = $request->client_sdt;
        $data['client_password'] = md5($request->client_password);

        $client_id = DB::table('tbl_clients')->insertGetId($data); //insertGetId() lấy id

        Session::put('client_id', $client_id);
        Session::put('client_name', $request->client_name);

        return Redirect::to('/show_checkout');
    }
    // đăng nhập khi đã đăng kí tài khoản
    public function show_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

        return view('pages.checkout.show_checkout')->with('category_home', $cate_product)->with('brand_home', $brand_product);
    }
    public function save_checkout_client(Request $request)
    {

        $data = array(); // kiểu mảng
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_sdt'] = $request->shipping_sdt;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data); //insertGetId() lấy id

        Session::put('shipping_id', $shipping_id);

        return Redirect::to('/payment');
    }






    public function payment()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

        return view('pages.checkout.payment')->with('category_home', $cate_product)->with('brand_home', $brand_product);
    }



    //đăng xuất tài khoản 
    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login_checkout');
    }



    //đăng nhập bằng google của khách hàng
    public function login_client_google()
    {
        config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
        return Socialite::driver('google')->redirect();
    }
    public function callback_client_google()
    {
        config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);

        $users = Socialite::driver('google')->stateless()->user();
        // return $users->id;
        $authUser = $this->findOrCreateClient($users, 'google');
        if ($authUser) {
            $account_name = Client::where('client_id', $authUser->user)->first();
            Session::put('client_id', $account_name->client_id);
            Session::put('client_name', $account_name->client_name);
            Session::put('client_picture', $account_name->client_picture);
        }
        // elseif($client_new){
        // $account_name = Client::where('client_id',$authUser->user)->first();
        // Session::put('client_id',$account_name->client_id);
        // Session::put('client_name',$account_name->client_name);
        // Session::put('client_picture',$account_name->client_picture);

        // }
        return redirect('/trang-chu')->with('message', 'Đăng nhập Taài Khoản thành công');
    }

    public function findOrCreateClient($users, $provider)
    {
        $authUser = SocialClient::where('provider_user_id', $users->id)->first();
        if ($authUser) {

            return $authUser;
        } else {
            $client_new = new SocialClient([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider) //strtoupper nghĩa là tất cả các kí tự điều viết hoa hết
            ]);

            $client = Client::where('client_email', $users->email)->first();

            if (!$client) {
                $client = Client::create([
                    'client_name' => $users->name,
                    'client_email' => $users->email,
                    'client_picture' => $users->avatar,
                    'client_password' => '',
                    'client_sdt' => ''


                ]);
            }
            $client_new->client()->associate($client);
            $client_new->save();
            return $client_new;
        }
    }
    // đăng nhập bằng facebook của khách hàng
    public function login_client_facebook1()
    {
        return Socialite::driver('facebook')->redirect();
        // tới đường link facebook 
        //+nếu đã đăng nhập facbook r thì sẽ dùng đến hàm callback_facebook 
        //+nếu facebook chưa đăng nhập thì sẽ trả về trang đặng nhập của facebook 
    }
    public function callback_client_facebook1()
    {
        $provider = Socialite::driver('facebook')->user();
        $account = SocialClient::where('provider', 'facebook') // điều kiện cột provider trong bảng tbl_social = facebook
            ->where('provider_user_id', $provider->getId()) //điều kiện cột provider_user_id trong bảng tbl_social = id trong app https://developers.facebook.com/ thì sẽ getId của tbl_social đó
            ->first();
        if ($account) { // trường hợp đã đăng nhập rồi
            //Login lúc này là cái model/Login
            
            $account_name = Client::where('client_id', $account->user)->first();
            Session::put('client_id', $account_name->client_id);
            Session::put('client_name', $account_name->client_name);
            Session::put('client_picture', $account_name->client_picture);
            

            return redirect('/trang-chu')->with('message', 'Đăng nhập  Khoản thành công');
        } else { // trường hợp chưa đăng nhập bên trang facebook

            $toa = new SocialClient([
                'provider_user_id' => $provider->getId(),
                'provider_user_email' => $provider->getEmail(),
                'provider' => 'facebook'
            ]);

            $orang = Client::where('client_email', $provider->getEmail())->first(); // điều kiện email của 2 bảng tbl_admin và tbl_social phải giống nhau

            if (!$orang) {
                $orang = Client::create([
                    'client_name' => $provider->getName(),
                    'client_email' => $provider->getEmail(),
                    'client_password' => '', // login bằng facebook nên không cần password
                    'client_picture' => $provider->avatar,
                    'client_sdt' => ''
                    


                ]);
            }
            $toa->client()->associate($orang);
            $toa->save();

            $account_name = Client::where('client_id', $toa->user)->first();

            Session::put('client_name', $account_name->client_name);
            Session::put('client_id', $account_name->client_id);

            return redirect('/trang-chu')->with('message', 'Đăng nhập tài khoản thành công');
        }
    }







    // đăng nhập tài khoản của khách hàng
    public function login_client(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_clients')
            ->where('client_email', $email)
            ->where('client_password', $password)->first();

        // $credentials = [
        //     'email' => $request->email_account,
        //     'password' => ($request->password_account),
        // ];
        // echo'<pre>';
        // print_r($result);
        // echo '</pre>';

        // if (Auth::attempt($credentials)) {
        //     return 1;
        //     // return Redirect::to('/show_checkout');
        //     // return redirect()->route('dashboard');
        // } else return 0;


        // if(auth::check()){
        //     return 1;
        // }else{
        //     return 0;
        // }



        if ($result) {

            Session::put('client_id', $request->client_id);
            //    return  
            // print_r($result);

            return Redirect::to('/show_checkout');
        } else {

            return Redirect::to('/login_checkout');
        }
        Session::save();
    }



    //thanh toán xong 
    public function order_place(Request $request)
    {
        /* $content=Cart::content();
        echo $content; */
        //insert payment_method

        $data = array(); // kiểu mảng
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lí';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array(); // kiểu mảng
        $order_data['client_id'] = Session::get('client_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::subtotal();
        $order_data['order_status'] = 'Đang chờ xử lí';

        $checkout_code = substr(md5(microtime()),rand(0,26),5);
        $order_data['order_code'] = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order_data['created_at'] = now();
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_d_data = array(); // kiểu mảng
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            $checkout_code = substr(md5(microtime()),rand(0,26),5);
        $order_d_data['order_code'] = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order_d_data['created_at'] = now();
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if ($data['payment_method'] == 1) {
            echo 'Thanh toans the ATM';
        } else {
            cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

            return view('pages.checkout.cash_payment')->with('category_home', $cate_product)->with('brand_home', $brand_product);
        }


        // return Redirect::to('/payment');



    }
    //quản lí đơn hàng trong admin
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function manage_order()
    {
        $this->AuthLogin(); // trỏ đến AuthLogin

        $all_order = DB::table('tbl_order')
            ->join('tbl_clients', 'tbl_order.client_id', '=', 'tbl_clients.client_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
            ->select('tbl_order.*', 'tbl_clients.client_name')
            ->orderBy('tbl_order.order_id', 'desc') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_brand
            ->get();
        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        return view('Admin_layout')->with('admin.manager_order', $manager_order);
    }

    public function view_order($orderId)
    {
        $this->AuthLogin(); // trỏ đến AuthLogin
        $order_by_id = DB::table('tbl_order')
            ->join('tbl_clients', 'tbl_order.client_id', '=', 'tbl_clients.client_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
            ->select('tbl_order.*', 'tbl_clients.*', 'tbl_shipping.*', 'tbl_order_details.*')
            ->first();

        // echo'<pre>';
        // print_r($order_by_id);
        // echo'</pre>';

        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('Admin_layout')->with('admin.view_order', $manager_order_by_id);
    }
    public function delete_order($order_id)
    {
        $this->AuthLogin(); // trỏ đến AuthLogin

        DB::table('tbl_order')->where('order_id', $order_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('/manage_order');
    }
}

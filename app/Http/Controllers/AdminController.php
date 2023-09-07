<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Login;
use App\Models\Social;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Session;

// trả về trang j đó khi thành công or thất bại
session_start();

class AdminController extends Controller
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
    public function index()
    {
        return view('Admin_login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    //đăng nhập admin
    
    public function dashboard(Request $request){
        //$data = $request->all();
        $data = $request->all();


        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($login){
            $login_count = $login->count();
            if($login_count>0){
                Session::put('admin_name',$login->admin_name);
                Session::put('admin_id',$login->admin_id);
                
                return Redirect::to('/dashboard');
            }
        }else{
                Session::put('message','Mật khẩu hoặc tên đăng nhập sai. Vui lòng nhập lại!!!');
                return Redirect::to('/admin');
        }
       

    }


    //đăng nhập admin bằng facebook

    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
        // tới đường link facebook 
        //+nếu đã đăng nhập facbook r thì sẽ dùng đến hàm callback_facebook 
        //+nếu facebook chưa đăng nhập thì sẽ trả về trang đặng nhập của facebook 
    }
    public function callback_facebook()
    {
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider', 'facebook') // điều kiện cột provider trong bảng tbl_social = facebook
            ->where('provider_user_id', $provider->getId()) //điều kiện cột provider_user_id trong bảng tbl_social = id trong app https://developers.facebook.com/ thì sẽ getId của tbl_social đó
            ->first();
        if ($account) { // trường hợp đã đăng nhập rồi
            //Login lúc này là cái model/Login
            $account_name = Login::where('admin_id', $account->user)->first();

            Session::put('admin_name', $account_name->admin_name);
            Session::put('admin_id', $account_name->admin_id);

            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } else { // trường hợp chưa đăng nhập bên trang facebook

            $toa = new Social([
                'provider_user_id' => $provider->getId(),
                'provider_user_email' => $provider->getEmail(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email', $provider->getEmail())->first(); // điều kiện email của 2 bảng tbl_admin và tbl_social phải giống nhau

            if (!$orang) {
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '', // login bằng facebook nên không cần password
                    'admin_phone' => '',
                    


                ]);
            }
            $toa->login()->associate($orang);
            $toa->save();

            $account_name = Login::where('admin_id', $toa->user)->first();

            Session::put('admin_name', $account_name->admin_name);
            Session::put('admin_id', $account_name->admin_id);

            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }
    }
    //đăng nhập admin bằng GOOGLE
    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        if($authUser){
        $account_name = Login::where('admin_id',$authUser->user)->first();
        Session::put('admin_name',$account_name->admin_name);
        Session::put('admin_id',$account_name->admin_id);
        Session::put('admin_picture', $account_name->admin_picture);
        }
        // elseif($client_new){
        //     $account_name = Login::where('admin_id',$authUser->user)->first();
        //     Session::put('admin_name',$account_name->admin_name);
        //     Session::put('admin_id',$account_name->admin_id);
        // }
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
      
       
    }

    public function findOrCreateUser($users, $provider)
    {
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if ($authUser) {

            return $authUser;
        }
        else{
        $client_new = new Social([
            'provider_user_id' => $users->id,
            'provider_user_email' => $users->email,
            'provider' => strtoupper($provider),
            
        ]);

        $orang = Login::where('admin_email', $users->email)->first();

        if (!$orang) {
            $orang = Login::create([
                'admin_name' => $users->name,
                'admin_email' => $users->email,
                'admin_picture' => $users->avatar,
                'admin_password' => '',
                'admin_phone' => '',
                'admin_status' => 1
            ]);
        }
        $client_new->login()->associate($orang);
        $client_new->save();
        return $client_new;
    }
        // $account_name = Login::where('admin_id', $toa->user)->first();
        // Session::put('admin_name', $account_name->admin_name);
        // Session::put('admin_id', $account_name->admin_id);
        // return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    }




    //đăng xuất admin
    public function logout()
    {
        $this->AuthLogin(); // trỏ đến hàm AuthLogin
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin'); // đúng sẽ trả về trang dashboard
    }
    public function search_product_admin(Request $request){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
        
        
        $search_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id') // liên kết khóa ngoại giữa bảng tbl_product với bẳng tbl_category_product
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->where('product_name','like','%'.$keywords.'%' )
        
        
        ->get();

        return view('admin.search_product_admin')
        ->with('category_home', $cate_product)
        ->with('brand_home', $brand_product)
        ->with('search_product',$search_product);

    }
}

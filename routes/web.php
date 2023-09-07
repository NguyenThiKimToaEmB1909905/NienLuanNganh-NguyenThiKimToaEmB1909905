<!-- đều khiển mọi hoạt động trong controller và views -->
<?php

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// nếu về thư mục gốc thì trả+ở lại trang welcom

// gọi trang home vào trang layout

//fontend
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index');
Route::post('/search', 'App\Http\Controllers\HomeController@search');
Route::get('/search_product_admin', 'App\Http\Controllers\AdminController@search_product_admin');

//trang chủ vào danh mục từng sản phẩm
Route::get('/home_danhmuc/{category_id}', 'App\Http\Controllers\CategoryProduct@show_category_home');
Route::get('/home_thuonghieu/{brand_id}', 'App\Http\Controllers\BrandProduct@show_brand_home');
Route::get('/Chi-tiet-sp/{product_id}', 'App\Http\Controllers\ProductController@details_product');


/* backend */
//đăng nhập admin
Route::get('/admin', 'App\Http\Controllers\AdminController@index');

// đã vào được trang admin
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');

Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');
//Login facebook(admin)
Route::get('/login-facebook','App\Http\Controllers\AdminController@login_facebook');
Route::get('/admin/callback','App\Http\Controllers\AdminController@callback_facebook');




//Login google(admin)
Route::get('/login-google','App\Http\Controllers\AdminController@login_google');
Route::get('/google/callback','App\Http\Controllers\AdminController@callback_google');

//Login google(client)
Route::get('/login-client-google','App\Http\Controllers\CheckoutController@login_client_google');
Route::get('client/google/callback','App\Http\Controllers\CheckoutController@callback_client_google');
//Login facebook(client)
Route::get('/login-client-facebook','App\Http\Controllers\CheckoutController@login_client_facebook1');
Route::get('client/facebook/callback','App\Http\Controllers\CheckoutController@callback_client_facebook1');

//trang giới thiệu và tin tức
Route::get('/introduce', 'App\Http\Controllers\ContactController@introduce');
Route::get('/news', 'App\Http\Controllers\ContactController@news');







//Category-products(danh mục sản phẩm)
Route::get('/add-category-product', 'App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/all-category-product', 'App\Http\Controllers\CategoryProduct@all_category_product');
Route::get('/edit-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@delete_category_product');

Route::get('/unactive-category-product/{category_product_id} ', 'App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@active_category_product');

Route::post('/save-category-product', 'App\Http\Controllers\CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@update_category_product');


//Brand-products(thương hiệu sản phẩm)
Route::get('/add-brand-product', 'App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/all-brand-product', 'App\Http\Controllers\BrandProduct@all_brand_product');
Route::get('/edit-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@delete_brand_product');

Route::get('/unactive-brand-product/{brand_product_id} ', 'App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@active_brand_product');

Route::post('/save-brand-product', 'App\Http\Controllers\BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@update_brand_product');


//ProductController(them sản phẩm)
Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
Route::get('/all-product', 'App\Http\Controllers\ProductController@all_product');
Route::get('/edit-product/{product_id}', 'App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'App\Http\Controllers\ProductController@delete_product');

Route::get('/unactive-product/{product_id} ', 'App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'App\Http\Controllers\ProductController@active_product');

Route::post('/save-product', 'App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{product_id}', 'App\Http\Controllers\ProductController@update_product');


//cart(giỏ hàng)
Route::post('/save_cart', 'App\Http\Controllers\CartController@save_cart');
Route::get('/delete_to_cart/{rowId}', 'App\Http\Controllers\CartController@delete_to_cart');
Route::post('/update_cart_quantity', 'App\Http\Controllers\CartController@update_cart_quantity');
Route::get('/show_cart', 'App\Http\Controllers\CartController@show_cart');


//Checkout(thủ tục thanh toán)
//đăng nhập
Route::get('/login_checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/login_client', 'App\Http\Controllers\CheckoutController@login_client');
//đăng ký(client)
Route::get('/register_checkout', 'App\Http\Controllers\CheckoutController@register_checkout');
Route::post('/add_client', 'App\Http\Controllers\CheckoutController@add_client');

Route::get('/logout_checkout', 'App\Http\Controllers\CheckoutController@logout_checkout');

Route::get('/show_checkout', 'App\Http\Controllers\CheckoutController@show_checkout');

Route::post('/save_checkout_client', 'App\Http\Controllers\CheckoutController@save_checkout_client');
    /* thanh toán khi đã có tk đăng nhâp và có gửi thông tin vận chuyển thì sẽ chuyển đến trang thanh toán */
Route::get('/payment', 'App\Http\Controllers\CheckoutController@payment');

    ///////// order(đặt hàng)
Route::post('/order_place', 'App\Http\Controllers\CheckoutController@order_place');
// quản lí đơn hàng ở admin được viết trong checkcontroller
Route::get('/manage_order', 'App\Http\Controllers\CheckoutController@manage_order');

// xem đơn hàng tại trang admin.quản lí đơn hàng
Route::get('/view_order/{orderId}', 'App\Http\Controllers\CheckoutController@view_order');
Route::get('/delete_order/{orderId}', 'App\Http\Controllers\CheckoutController@delete_order');

//đơn hàng của tôi
Route::get('/myorder', 'App\Http\Controllers\OrderController@myorder');
Route::get('/view_myorder/{orderId}', 'App\Http\Controllers\OrderController@view_myorder');


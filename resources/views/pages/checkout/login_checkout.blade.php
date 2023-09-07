@extends('layout')
@section('content')
    <?php
    
    echo Session::get('client_id');
    echo Session::get('shipping_id');
    ?>
    {{-- <section id="form"><!--form-->
    <div class="container">
        <div class="row container" >
            <div class="col-sm-12 container " >
                <div class="login-form" class="col-sm-8 "><!--login form-->
                    <h2><b>Đăng nhập vào tài khoản</b></h2>

                    <form action="{{ URL::to('/login_client/')}}" class="col-sm-5 " method="POST">
                        {{ csrf_field() }}
                        <input type="email" name="email_account" placeholder="Tài khoản" />
                        <input type="password" name="password_account" placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Ghi nhớ đăng nhập
                            <a href="{{ URL::to('/register_checkout/') }}" class="btn">đăng ký tài khoản</a>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </span>
                        
                    </form>
                </div><!--/login form-->
            </div>
            
            
        </div>
    </div>
</section><!--/form--> --}}
    <section id="form" style="margin-top: 50px">
        <div class="w2">
            <div class="w3" style="width: 550px">
                <h3>Đăng Nhập Vào Tài Khoản</h3>
                <?php
                $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
                if ($message) {
                    /* nếu có tồn tại thì */
                    echo '<span class="text-alert">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                    Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
                }
                ?>
                <form action="{{ URL::to('/login_client/') }}"  >
                    {{ csrf_field() }}
                    <input type="email" class="gggg" name="email_account" placeholder="Tài khoản" required=""/>
                        <input type="password" class="gggg" name="password_account" placeholder="Password" required=""/>
                    <h6><a href="{{ URL::to('/register_checkout/') }}">Đăng ký tài khoản</a></h6>
                    <h5><a href="#">Quên mật khẩu?</a></h5>
                    <input type="submit" class="  btn w5 btn-warning" value="Đăng nhập" name="login"
                        style=" background: #ed7919;margin-top: 0%;margin-bottom: 10px;color: white;">
                    


                </form>
                <div class="container">
                        <div class="row">
                            <div class="col-sm-6 w4 btn btn-info">
                                <div class=""><a href="{{ URL('/login-client-facebook/') }}">
                                        <i class="bi bi-facebook"></i> Login bằng facebook
                                    </a></div>
                            </div>
                            <div class="col-sm-6 w4 btn btn-danger">

                                <div class=""><a href="{{ URL('/login-client-google/') }}"><i class="bi bi-google"></i> Login
                                        bằng Google</div>
                            </div>
                        </div>
                    </div>



            </div>
        </div>
    </section>
@endsection

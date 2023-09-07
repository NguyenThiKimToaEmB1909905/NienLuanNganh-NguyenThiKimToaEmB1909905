@extends('layout')
@section('content')
    {{-- <section id="form"><!--form-->
    <div class="container">
        <div class="row container" >
            <div class="col-sm-12 container " >
                <div class="login-form" class="col-sm-8 "><!--login form-->
                    <h2><b>Đăng nhập vào tài khoản</b></h2>
                    <form action="{{ URL::to('/add_client/') }}" class="col-sm-5 " method="POST">
                        {{ csrf_field() }}
                        <input type="name" name="client_name" placeholder="Họ và Tên" />
                        <input type="email" name="client_email" placeholder="email" />
                        <input type="sdt" name="client_sdt" placeholder="Số điện thoại" />
                        <input type="password" name="client_password" placeholder="Password" />
                        <button type="submit" class="btn btn-default">Đăng ký</button>

                    </form>
                </div><!--/login form-->
            </div>
            
            
        </div>
    </div>
</section><!--/form--> --}}
    <section id="form" style="margin-top: 50px">
        <div class="w2">
            <div class="w3" style="width: 550px">
                <h3>Đăng Ký Tài Khoản</h3>
                <?php
                $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
                if ($message) {
                    /* nếu có tồn tại thì */
                    echo '<span class="text-alert">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                    Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
                }
                ?>
                <form action="{{ URL::to('/add_client/') }}"  method="POST">
                    {{ csrf_field() }}
                    <input type="name" class="gggg" name="client_name" placeholder="Họ và Tên"required="" />
                    <input type="email"class="gggg" name="client_email" placeholder="email" required=""/>
                    <input type="sdt"class="gggg" name="client_sdt" placeholder="Số điện thoại"required="" />
                    <input type="password"class="gggg" name="client_password" placeholder="Password"required="" />
                    
                    
                    <input type="submit" class="  btn w5 btn-warning" value="Đăng Ký" name="login"
                        style=" background: #ed7919;margin-top: 20px;margin-bottom: 10px;color: white;">
                    


                </form>



            </div>
        </div>
    </section>
@endsection

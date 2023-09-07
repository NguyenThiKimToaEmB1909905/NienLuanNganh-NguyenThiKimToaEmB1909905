<!DOCTYPE html>

<head>
    <title>Trang admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('public/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/backend/css/text.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/backend/css/style-responsive.css') }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/font.css') }}" type="text/css" />
    <link href="{{ asset('public/backend/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
</head>

<body >
    <div class="">
        <div class="w3layouts-main" style="width: 550px">
            <h2 style="color: #ed7919">Đăng Nhập Admin</h2>
            <?php
            $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
            if ($message) {
                /* nếu có tồn tại thì */
                echo '<span class="text-alert tb" style="color: red;width: auto; font-size:20px">', $message, '</span >'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
            }
            ?>
            <form  action="{{ URL::to('/admin-dashboard') }}" method="post">
                {{ csrf_field() }}
                <input style="font-size: 20px" type="text" class="ggg" name="admin_email" placeholder="Điền Email vào" required="">
                <input style="font-size: 20px" type="password" class="ggg" name="admin_password" placeholder="Mật khẩu" required="">

                <h6><a href="#">Quên mật khẩu?</a></h6>

                <input type="submit" class="  btn btn-warning" value="Đăng nhập" name="login"
                    style=" background: #ed7919;
                color: white;">
                {{-- <div class="container">
                    <div class="row">
                        <div class="col-sm-6  btn btn-info" style="height: 50px; font-size:20px">
                            <div class=""><a href="{{ URL('/login-facebook/') }}">
                                    <i class="bi bi-facebook"></i> Login bằng facebook
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6  btn btn-danger" style="height: 50px; font-size:20px">

                            <div class=""><a href="{{ URL('/login-google/') }}"><i class="bi bi-google"></i> Login
                                    bằng Google </a>
                            </div>
                        </div>
                    </div>
                </div> --}}


            </form>
            <style>
                html,
                body {
                    font-family: 'Roboto', sans-serif;
                    font-size: 100%;
                    overflow-x: hidden;
                    background-image: linear-gradient(-60deg, rgb(248, 217, 79), #ffff, rgb(237, 154, 91));
                    bottom: 0;
                    left: -50%;
                    /* opacity: .5; */
                    position: fixed;
                    right: -50%;
                    top: 0;
                    z-index: -1;
                    /* background: url(../images/bg.jpg) no-repeat 0px 0px; */
                    background-size: cover;
                }
            </style>
        </div>
    </div>
    <script src="{{ asset('public/bakend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/bakend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('public/bakend/js/scripts.js') }}"></script>
    <script src="{{ asset('public/bakend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('public/bakend/js/jquery.nicescroll.js') }}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
    <script src="{{ asset('public/bakend/js/jquery.scrollTo.js') }}"></script>
</body>

</html>
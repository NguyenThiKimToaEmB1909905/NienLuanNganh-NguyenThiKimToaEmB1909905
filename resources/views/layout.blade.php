<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | TheGioiSach</title>
    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/css/text.css') }}" rel='stylesheet' type='text/css' />

    <link href="{{ asset('public/frontend/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ 'public/frontend/images/ico/favicon.ico' }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->


<body>

    <?php
    
    // echo Session::get('client_id');
    //echo Session::get('shipping_id');
    ?>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +0393439883</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> thegioisach@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-truck"></i>Ship COD Trên Toàn Quốc</a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i>Free Ship Đơn Hàng Trên 300k</a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="logo pull-left">
                            <a href="{{ URL::to('/trang-chu/') }}"><img
                                    src="{{ URL::to('public/frontend/images/logo.jpg') }}"
                                    style="width:80px; height:80px" alt="" /></a>
                        </div>

                    </div>
                    <div class="col-sm-10">
                        <div class="shop-menu " style="margin-left: 20%">
                            <ul class="nav navbar-nav col-sm-12">
                                <li><a href="{{ URL::to('/myorder/') }}"><i class="fa fa-star"></i> Đơn hàng của
                                        tôi</a></li>

                                <?php
                                    $client_id = Session::get('client_id');
                                    $shipping_id = Session::get('shipping_id');

                                    if($client_id!=NULL && $shipping_id==NULL){
                                ?>
                                <li><a href="{{ URL::to('/show_checkout/') }}"><i class="bi bi-cash-coin"></i> Thanh
                                        Toán</a></li>
                                <?php
                                    }elseif ($client_id!=NULL && $shipping_id!=NULL) {
                                ?>
                                <li><a href="{{ URL::to('/payment/') }}"><i class="bi bi-cash-coin"></i> Thanh
                                        Toán</a></li>

                                <?php
                                    }else{
                                ?>
                                <li><a href="{{ URL::to('/login_checkout/') }}"><i class="bi bi-cash-coin"></i> Thanh
                                        Toán</a></li>
                                <?php
                                    }
                                ?>
                                <li><a href="{{ URL::to('/show_cart/') }}"><i class="fa fa-shopping-cart"></i> Giỏ
                                        hàng</a></li>


                                <?php
                                    $client_id = Session::get('client_id');
                                    if($client_id!=NULL){
                                ?>

                                <li class="dropdown col-sm-4">
                                    <a data-toggle="dropdown" class="dropdown-toggle .rounded-circle" href="">
                                        <img class=".rounded-circle" width="15%"
                                            src="{{ Session::get('client_picture') }}">
                                        {{ Session::get('client_name') }}
                                        <b class="caret"></b>

                                    </a>

                                    <ul class="dropdown-menu extended logout">
                                        {{-- <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> --}}
                                        <li><a href="{{ URL::to('/logout_checkout/') }}"><i class="fa fa-key"></i>
                                                Đăng xuất</a></li>
                                    </ul>
                                </li>
                                <?php
                                    }else{
                                ?>
                                <li ><a href="{{ URL::to('/login_checkout/') }}"><i class="bi bi-box-arrow-left"></i>
                                        Đăng nhập</a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">

                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                {{-- khi lick lick vào home sẽ ra cái đường dẫn /trang-chu --}}
                                <li><a href="{{ URL::to('/trang-chu/') }}" class="active">Trang chủ</a></li>

                                <li><a href="{{ URL::to('/news/') }}">Tin Tức</a></li>
                                <li><a href="{{ URL::to('/introduce/') }}">Giới Thiệu</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5 ">
                        <form action="{{ URL::to('/search/') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="search_box pull-right" style=" width:100%">
                                <input type="text" name="keywords_submit" placeholder="Search"
                                    style=" width:50%" />
                                <button type="submit" class="btn "
                                    style="margin-top:1; color:#FFF ; font-size:16px; background:rgb(255, 129, 50)"
                                    name="search-items">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--/header-bottom-->


    </header>
    <main class="main-content">
        @yield('content')
    </main>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <!-- Import thư viện JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // kéo xuống khoảng cách 200px thì xuất hiện nút Top-up
        var offset = 200;
        // thời gian di trượt 0.75s ( 1000 = 1s )
        var duration = 750;
        $(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > offset)
                    $('#top-up').fadeIn(duration);
                else
                    $('#top-up').fadeOut(duration);
            });
            $('#top-up').click(function() {
                $('body,html').animate({
                    scrollTop: 0
                }, duration);
            });
        });
    </script>
    <div title="Về đầu trang" id="top-up">
        <i class="fas fa-arrow-circle-up"></i>
    </div>
    <style>
        #top-up {
            font-size: 5rem;
            cursor: pointer;
            position: fixed;
            z-index: 9999;
            color: #ffa10a;
            bottom: 50px;
            right: 30px;
            display: none;
        }

        #top-up:hover {

            color: #b8b6b3;
        }
    </style>




    {{-- nhắn tin bằng mess --}}

    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "108356962100573");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v15.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    {{-- /nhắn tin bằng mess --}}



    <footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="companyinfo">
                            <h2><span>THEGIOISACH</span>.COM </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>HỖ TRỢ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> Chính sách đổi - trả - hoàn tiền</a></li>
                                <li><a href="#">Chính sách bảo hành - bồi hoàn</a></li>
                                <li><a href="#">Chính sách vận chuyển</a></li>
                                <li><a href="#">Chính sách khách sỉ</a></li>
                                <li><a href="#">Phương thức thanh toán và xuất HĐ</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>TÀI KHOẢN CỦA TÔI
                            </h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Đăng nhập/Tạo mới tài khoản</a></li>
                                <li><a href="#">Thay đổi địa chỉ khách hàng</a></li>
                                <li><a href="#"> Chi tiết tài khoản</a></li>
                                <li><a href="{{ URL::to('/myorder/') }}">Lịch sử mua hàng</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>ĐỊA CHỈ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62860.63914868921!2d105.72255072784505!3d10.034185113828485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0629f6de3edb7%3A0x527f09dbfb20b659!2zQ-G6p24gVGjGoSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1669875841504!5m2!1svi!2s"
                                        width="400" height="150" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </li>
                                {{-- <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách bảo mật thông tin cá nhân</a></li>
                                <li><a href="#">Chính sách bảo mật thanh toán</a></li>
                                <li><a href="#">Giới thiệu THEGIOISACH</a></li>
                                <li><a href="#">Hệ thống trung tâm - nhà sách</a></li> --}}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="footer-bottom" style="background: #FE980F">
            <div class="container">
                <div class="row">
                    <p style="margin-left: 500px">Copyright © 2022 THEGIOISACH Inc. All rights reserved.</p>

                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="{{ asset('public/frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @yield('page-js-script')

</body>

</html>




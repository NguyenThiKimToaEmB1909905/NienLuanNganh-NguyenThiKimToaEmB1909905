<!-- nội dung bên phải -->
@extends('layout')
@section('content')
    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span ><img src="{{ URL::to('public/frontend/images/logo.jpg') }}"
                                                style="width:80px; height:80px" alt="" />THEGIOISACH</span>.COM</h1>
                                    <h2>Tổng Hợp Những Bộ Sách Giáo Khoa Mới Nhất</h2>
                                    <p>Được nhận rất nhiều ưu đãi khi mua bộ sách lớp 1 mới nhất, kèm theo những quà tặng hấp dẫn dành cho bé...</p>
                                    {{-- <button type="button" class="btn btn-default get">Đến ngay</button> --}}
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ URL::to('public/frontend/images/td1.jpg') }}" class="girl img-responsive"
                                        alt="" />
                                    <img src="images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span><img src="{{ URL::to('public/frontend/images/logo.jpg') }}"
                                                style="width:80px; height:80px" alt="" />THEGIOISACH</span>.COM</h1>
                                    <h2>Tổng Hợp Những Cuốn Sách Nổi Tiếng Của JIM ROHN</h2>
                                    <p>Được giảm 30% khi mua tại TheGioiSach...</p>
                                    {{-- <button type="button" class="btn btn-default get">Đến ngay</button> --}}
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ URL::to('public/frontend/images/td2.jpg') }}" class="girl img-responsive"
                                        alt="" />
                                    <img src="images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item ">
                                <div class="col-sm-6">
                                    <h1><span><img src="{{ URL::to('public/frontend/images/logo.jpg') }}"
                                                style="width:80px; height:80px" alt="" />THEGIOISACH</span>.COM</h1>
                                    <h2>Những Cuốn Tiểu Thuyết Hay</h2>
                                <p>Săn SALE Ngay Để Tặng Được Nhiều Quà Tặng Hấp Dẫn...</p>
                                    {{-- <button type="button" class="btn btn-default get">Đến ngay</button> --}}
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ URL::to('public/frontend/images/td3.jpg') }}" class="girl img-responsive"
                                        alt="" />
                                    <img src="images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh Mục Sản Phẩm</h2>
                        <!--category-productsr-->

                        <div class="panel-group category-products" id="accordian">
                            @foreach ($category_home as $key => $cate)
                                <div class="panel panel-default">

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a
                                                href="{{ URL::to('/home_danhmuc/' . $cate->category_id) }}">{{ $cate->category_name }}</a>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!--/category-products-->

                        <!--brands_products-->

                        <div class="brands_products">

                            <h2>Thương Hiệu Sản Phẩm</h2>

                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($brand_home as $key => $brand)
                                        <li><a href="{{ URL::to('/home_thuonghieu/' . $brand->brand_id) }}"> <span
                                                    class="pull-right"></span>{{ $brand->brand_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <!--/brands_products-->

                        

                    </div>
                </div>

                <!-- Phần bên phải nd trang web -->
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Sách mới nhất</h2>
                        @foreach ($product_home as $key => $product)
                            <a href="{{ URL::to('Chi-tiet-sp/' . $product->product_id) }}">

                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center" style="height: 400px">
                                                <img src="{{ URL::to('public/uploads/product/' . $product->product_image) }}"
                                                    style="height: 270px">
                                                <h4>{{ $product->product_name }}</h4>
                                                <h4 style="color: rgb(239, 3, 3)">Giá:
                                                    {{ number_format($product->product_price) . ' ' . 'VNĐ' }}</h4>

                                                <p></p>
                                                <button type="submit" class="btn btn-fefault cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Xem thêm
                                                </button>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="row ">
                        <div class="pull-right " style="height: 100px;font-size:18px">
                            {{ $product_home->render() }}
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </section>
@endsection

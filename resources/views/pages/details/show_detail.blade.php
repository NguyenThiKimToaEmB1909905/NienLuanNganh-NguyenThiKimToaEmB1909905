@extends('layout')
@section('content')
<section id="slider">
{{--     <!--slider-->
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
                                <h1><span><img src="{{ URL::to('public/frontend/images/logo.jpg') }}"
                                            style="width:80px; height:80px" alt="" />THEGIOISACH</span>.COM</h1>
                                <h2>Tổng Hợp Những Bộ Sách Giáo Khoa Mới Nhất</h2>
                                <p>Được nhận rất nhiều ưu đãi khi mua bộ sách lớp 1 mới nhất, kèm theo những quà tặng hấp dẫn dành cho bé...</p>
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
    </div> --}}
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
                                    <h3 class="panel-title"><a href="{{ URL::to('/home_danhmuc/'.$cate->category_id) }}">{{ $cate->category_name }}</a></h3>
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
                                    <li><a href="{{ URL::to('/home_thuonghieu/'.$brand->brand_id) }}"> <span class="pull-right"></span>{{ $brand->brand_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    
                </div>
            </div>
            
            <!-- Phần bên phải nd trang web -->
            <div class="col-sm-9 padding-right">
                @foreach ($product_details as $key => $detail)
                <div class="product-details">
        
                    <!--product-details-->
        
        
        
                    <div class="col-sm-6">
                        <div class="view-product">
                            <img src="{{ URL::to('public/uploads/product/' . $detail->product_image) }}" alt="" />
                            {{-- <h3>ZOOM</h3> --}}
                        </div>
                        
        
                    </div>
                    <div class="col-sm-6">
                        <div class="product-information">
                            <!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{ $detail->product_name }}</h2>
                            <p>Mã sản phẩm : {{ $detail->product_id }}</p>
                            <img src="images/product-details/rating.png" alt="" />
                            <form action="{{ URL::to('/save_cart/') }}" method="POST">
                                {{ csrf_field() }}
                            <span class="">
                                <span>Giá: {{ number_format($detail->product_price) . ' ' . 'VNĐ' }}</span>
                                <label>Số lượng:</label>
                                <input name="qty" type="number" min="1" value="1" />
                                <input name="productid_hidden" type="hidden" value="{{ $detail->product_id }}" />
                                <button type="submit" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Thêm vào giỏ hàng
                                </button>
                            </span>
                            </form>
                            <p><b>Tình Trạng:</b> Còn hàng</p>
                            <p><b>Danh mục: </b>{{ $detail->category_name }}</p>
                            <p><b>Thương hiệu: </b> {{ $detail->brand_name }}</p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"
                                    alt="" /></a>
                        </div>
                        <!--/product-information-->
                    </div>
        
                </div>
        
                <!--/product-details-->
        
        
                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Thông tin Chi Tiết</a></li>
                            <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
        
        
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details">
                            
                            <p><b> {{ $detail->product_name }}</b></p>
                            <p> {{ $detail->product_desc }}</p>
                            <p> {{ $detail->product_content  }}</p>
                            
        
        
        
                        </div>
                        <div class="tab-pane fade " id="reviews">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Đánh giá sản phẩm .</p>
                                <p><b>Write Your Review</b></p>
        
                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Họ và Tên" />
                                        <input type="email" placeholder="Địa chỉ Email" />
                                    </span>
                                    <textarea name="" placeholder="Góp ý kiến"></textarea>
                                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
        
                    </div>
                </div>
                <!--/category-tab-->
            @endforeach
            <div class="recommended_items">
                <!--sản phẩm liên quan cùng chung 1 danh mục!-->
                <h2 class="title text-center">Sản Phẩm Liên quan</h2>
        
                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach ( $related as $key => $lienquan)
                                
                            <a href="{{ URL::to('Chi-tiet-sp/' . $lienquan->product_id) }}">
 
                            <div class="col-sm-4 ">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center" style="height: 400px">
                                            <img src="{{ URL::to('public/uploads/product/' . $lienquan->product_image) }}" style="height: 250px" >
                                            <h4>{{ $lienquan->product_name }}</h4>
                                            <h4  style="color: rgb(239, 3, 3)">Giá: {{number_format($lienquan->product_price).' '.'VNĐ'}}</h4>
                                            <p></p>
                                            <button type="submit" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Xem thêm
                                            </button>                                 
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            @endforeach
                            </a>
                        </div>
                    
                         
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection

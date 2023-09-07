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
                                <h1><span><img src="{{ URL::to('public/frontend/images/logo.jpg') }}"
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

                    <!--/brands_products-->

                    {{-- <div class="price-range">
                        <!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>
                    <!--/price-range-->

                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping--> --}}

                </div>
            </div>
            
            <!-- Phần bên phải nd trang web -->
            <div class="col-sm-9 padding-right">

                <div class="features_items">
                    <!--features_items-->
                
                    <div class="row ">
                        <div class="col-md-4 ">
                            <label for="amount" >Sắp xếp theo</label>
                            <form>
                                {{ @csrf_field() }}
                                <select name="sort" id="myfunc" class="form-control">
                                    
                                    <option value="{{Request::url()}}?sort_by=none">---Lọc---</option>
                                    <option value="{{Request::url()}}?sort_by=tang_dan">---Tăng dần---</option>
                                    <option value="{{Request::url()}}?sort_by=giam_dan">---Giảm dần---</option>
                                    <option value="{{Request::url()}}?sort_by=kytu_az">---Sắp xếp từ a đến z---</option>
                                    <option value="{{Request::url()}}?sort_by=kytu_za">---Sắp xếp từ z đến a---</option>
                                
                                
                                </select>
                                

                            </form>
                            
                        </div>
                        
                    </div> 
                    
                    <br>
                    @foreach ($category_name as $key => $category_name )
                        <h2 class="title text-center">{{ $category_name->category_name }}</h2>
                    @endforeach
                    @foreach ($category_by_id as $key => $product )
                    <a href="{{ URL::to('Chi-tiet-sp/' . $product->product_id) }}">
                    <div class="col-sm-4 ">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center" style="height: 450px">
                                    <img src="{{ URL::to('public/uploads/product/' . $product->product_image) }}" style="height: 250px" >
                                    <h4>{{ $product->product_name }}</h4>
                                    <h4  style="color: rgb(239, 3, 3)">Giá: {{number_format($product->product_price).' '.'VNĐ'}}</h4>
                                    <p></p>
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Xem thêm
                                    </button>                                 </div>
                            </div>
                            {{-- <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    </a>
                   @endforeach 
                </div>
                <div class="row ">
                    <div class="pull-right " style="height: 100px;font-size:18px">
                        {{ $category_by_id->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</section>
 @section('page-js-script')

    <script type="text/javascript">

        $(function()
        {
            $('#myfunc').on('change',function ()
            {
                var filePath = $(this).val();
                
                if(filePath){
                window.location = filePath;
            }
            return false;
            });
        });
    
    </script>
@stop
@endsection 

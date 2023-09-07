<!-- nội dung bên phải -->
@extends('layout')
@section('content')
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
                        <div class="col-md-2 ">
                            <label for="amount" >Sắp xếp theo</label>
                            <form>
                                @csrf
                                <select name="sort" id="sort" class="form-control">
                                    <option value="{{ Request::url() }}?sort_by=none">---Lọc---</option>
                                    <option value="{{ Request::url() }}?sort_by=tang_dan">---Tăng dần---</option>
                                    <option value="{{ Request::url() }}?sort_by=giam_dan">---Giảm dần---</option>
                                    <option value="{{ Request::url() }}?sort_by=kytu_az">---Sắp xếp từ a đến z---</option>
                                    <option value="{{ Request::url() }}?sort_by=kytu_za">---Sắp xếp từ z đến a---</option>
                                </select>
                            </form>
                        </div>
                    </div> 
<br>
<h2 class="title text-center">Kết quả tìm kiếm</h2>
                        @foreach ($search_product as $key => $product )
                    <a href="{{ URL::to('Chi-tiet-sp/' . $product->product_id) }}">
                    <div class="col-sm-4 ">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    
                                    <img src="{{ URL::to('public/uploads/product/' . $product->product_image) }}" >
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


@endsection



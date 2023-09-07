@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="container ">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/trang-chu/') }}">Home</a></li>
                    <li class="active">Thanh Toán giỏ hàng</li>
                </ol>
            </div>
            <!--/breadcrums-->
            <!--/register-req-->
            <div class="col-sm-8">
                <div class=" row">
                    <h2 style="color: rgb(96, 92, 87); font-size:24px "><b>Xem lại & Thanh toán</b></h2>
                    <div class="table-responsive cart_info">
                        <?php
                        
                        $content = Cart::content(); // show nội dung của sách trong trang vỏ hàng
                        // echo '<pre>';
                        //     print_r($content);
                        //     echo'</pre>';
                        ?>
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image col-sm-2">Hình ảnh</td>
                                    <td class="description col-sm-3">Tên sản phẩm</td>
                                    <td class="price ">Giá</td>
                                    <td class="quantity ">Số Lượng</td>
                                    <td class="total ">Tổng</td>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $v_content)
                                    <tr>
                                        <td class="cart_product">
                                            <a href="#"><img
                                                    src="{{ URL::to('public/uploads/product/' . $v_content->options->image) }}"style=" width:100px; height=100px; "
                                                    alt=""></a>
                                        </td>
                                        <td class="cart_description">
                                            <p class="cart_total_price" style="font-size: 18px">{{ $v_content->name }}</p>
                                            <p>Web ID: {{ $v_content->id }}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p style="font-size: 20px;color:#787674;">
                                                {{ number_format($v_content->price) . ' ' . 'VNĐ' }}</p>
                                        </td>
                                        <td class="cart_quantity ">
                                            <p style="font-size: 20px;color:#787674;">{{ $v_content->qty }}</p>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price" style="font-size: 20px">

                                                <?php
                                                $subtotal = $v_content->price * $v_content->qty;
                                                echo number_format($subtotal) . ' ' . 'VNĐ';
                                                ?>
                                            </p>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>


                </div>



            </div>
            <div class=" col-sm-4" style="margin-top: 10px">
                <h2 style="color: rgb(96, 92, 87); font-size:24px "><b>Tổng Tiền Cần Thanh Toán</b></h2>
                <table class="col-sm-12" style="font-size:24px ">
                    <tbody>
                        <tr>
                            <td>Tiền sản phẩm</td>
                            <td class="pull-right">{{ Cart::subtotal() . ' ' . 'VNĐ' }}</td>
                        </tr>
                        <tr>
                            <td>Phí vận chuyển</td>
                            <td class="pull-right">
                                Free
                            </td>

                        </tr>
                        <tr style="color: rgb(255, 141, 1);font-weight:bolder ">
                            <td>Tổng</td>
                            <td class="pull-right">
                                {{ Cart::subtotal() . ' ' . 'VNĐ' }}
                            </td>

                        </tr>
                    </tbody>
                </table>
                <form action="{{ URL::to('/order_place/') }}" method="POST">
                    {{ csrf_field() }}
                    <div class=" col-sm-12 "style="margin-top: 20px;  ">
                        <h2 style="color: rgb(96, 92, 87); font-size:24px "><b>Hình Thức Thanh Toán</b></h2>
                        <span>
                            <label><input name="payment_option" value="1" type="checkbox">Trả bằng ATM</label>
                        </span>
                        <br>
                        <span>
                            <label><input name="payment_option" value="2" type="checkbox">Thanh toán tiền
                                mặt</label>
                        </span>
                        <div style="margin-bottom: 50%  ">
                            <input type="submit" name="send_order_place" class="btn btn-default check_out pull-right mb-6" value="Thanh toán ngay">

                        </div>

                    </div>
                </form>


            </div>

        </div>
    </section>

    <!--/#cart_items-->
@endsection

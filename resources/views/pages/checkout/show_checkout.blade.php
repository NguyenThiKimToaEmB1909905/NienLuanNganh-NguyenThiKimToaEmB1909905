@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/trang-chu/') }}">Home</a></li>
                    <li class="active">Thanh Toán giỏ hàng</li>
                </ol>
            </div>
            <?php
        
        //echo Session::get('client_id');
        
    ?>
            <!--/breadcrums-->
            <!--/register-req-->
            <div class="shopper-informations col-sm-12 ">
                <h1>Thanh Toán</h1>
                <div class="col-sm-4">

                    <div class="clearfix ">
                        <div class="bill-to col-sm-12">
                            <h2 style="color: rgb(96, 92, 87); font-size:24px "> Địa chỉ giao hàng</h2>
                            <div class="form-one" style="width:100%">
                                <form action="{{ URL::to('/save_checkout_client') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="email" name="shipping_email" placeholder="Email*" required="">
                                    <input type="text" name="shipping_name" placeholder="Họ và Tên *" required="">
                                    <input type="text" name="shipping_address" placeholder="Địa chỉ  *" required="">
                                    <input type="text" name="shipping_sdt" placeholder="Số điện thoại" required="">
                                    <textarea name="shipping_note" placeholder="Ghi chú đơn hàng" rows="3" required=""></textarea>
                                    <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class=" row col-sm-8">
                    <h2 style="color: rgb(96, 92, 87); font-size:24px "><b>Xem lại giỏ hàng</b></h2>
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

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="total_area ">
                                <ul>
                                    <li>
                                        <h4>Tiền sản phẩm <span>{{ Cart::subtotal() . ' ' . 'VNĐ' }}</span></h4>
                                    </li>
                                    <li>
                                        <h4>Phí vận chuyển <span>Free</span></h4>
                                    </li>
                                    <li>
                                        <h4 style="font-size: 20px;color:#f66f00;">Tổng thanh toán
                                            <span>{{ Cart::subtotal() . ' ' . 'VNĐ' }}</span></h4>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        </div>
    </section>
    <!--/#cart_items-->
@endsection

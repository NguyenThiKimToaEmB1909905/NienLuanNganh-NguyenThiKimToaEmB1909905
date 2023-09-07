@extends('layout')
@section('content')
    
    <section style="margin-bottom: 100px">
        <div class="container">
            <section id="cart_items">
                <div class="container col-sm-12 "style="height:50px">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="{{ URL::to('/trang-chu/') }}">Home</a></li>
                            <li class="active">Giới Thiệu</li>
                        </ol>
                    </div>
                </div>
                <div class="table-agile-info col-sm-12">
                    <div class="panel  col-sm-7">
                        <div class="panel-heading" style="background:  #FE980F">
                            Chi tiết đơn hàng
                        </div>
                        <div class="table-responsive">
            
                            <?php
                            $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
                            if ($message) {
                                /* nếu có tồn tại thì */
                                echo '<span class="text-alert">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                                Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
                            }
                            ?>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Tổng tiền</th>
                                    </tr>   
                                </thead>
                                <tbody>
                                    <tr>
                                         <td>{{ $order_by_id->product_name }}</td>
                                         <td>{{ $order_by_id->product_sales_quantity }}</td>
                                         <td>{{number_format($order_by_id->product_price).' '.'VNĐ'}}</td>
                                         <td>{{ ($order_by_id->order_total).' '.'VNĐ' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="panel  col-sm-5" >
                        <div class="panel-heading"style="background:  #FE980F">
                            Thông tin vận chuyển
                        </div>
                        <div class="table-responsive">
                            <?php
                            $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
                            if ($message) {
                                /* nếu có tồn tại thì */
                                echo '<span class="text-alert">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                                Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
                            }
                            ?>
            
                            <table class="table table-striped b-t b-light">
            
                                <thead>
                                    <tr>
                                        <th>Tên người nhận hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                    </tr>
                                </thead>
                                <tbody>
            
                                    <tr>
                                        <td>{{ $order_by_id->shipping_name }}</td>
                                        <td>{{ $order_by_id->shipping_address }}</td>
                                        <td>{{ $order_by_id->shipping_sdt }}</td>
                                    </tr>
            
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    
                </div>

            </section>

        </div>
    </section>
@endsection

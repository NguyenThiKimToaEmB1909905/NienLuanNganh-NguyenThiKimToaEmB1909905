@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info col-sm-12">
        <div class="panel panel-default col-sm-6">
            <div class="panel-heading">
                Thông tin khách hàng
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message'); 
                if ($message) {
                    /* nếu có tồn tại thì */
                    echo '<span class="text-alert" style="color: brown">', $message, '</span>'; 
                    Session::put('message', null); 
                }
                ?>

                <table class="table table-striped b-t b-light" >

                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            {{-- <td> {{ Session::get('client_name') }}</td>
                            <td> {{ Session::get('client_email') }}</td> --}}

                            <td>{{ $order_by_id->client_name }}</td>
                            <td>{{ $order_by_id->client_email }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default col-sm-6">
            <div class="panel-heading">
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
        <div class="panel panel-default col-sm-12">
            <div class="panel-heading">
                Chi Tiết đơn hàng
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
                            <th>Tên sách</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>



                        </tr>   
                    </thead>
                    <tbody>
                        
                        <tr>
                            {{-- @foreach($order_details as $key => $details)
                            
                            <td>{{ $details->product_name }}</td>
                            <td>{{ $details->product_sales_quantity }}</td>
                            <td>{{number_format($details->product_price).' '.'VNĐ'}}</td>
                            <td>{{ ($details->order_total).' '.'VNĐ' }}</td>

                             @endforeach --}}
                            
                            
                             <td>{{ $order_by_id->product_name }}</td>
                             <td>{{ $order_by_id->product_sales_quantity }}</td>
                             <td>{{number_format($order_by_id->product_price).' '.'VNĐ'}}</td>
                             <td>{{ ($order_by_id->order_total).' '.'VNĐ' }}</td>
 
                             
                        </tr>
                       
                    </tbody>
                </table>

            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    </div>
@endsection

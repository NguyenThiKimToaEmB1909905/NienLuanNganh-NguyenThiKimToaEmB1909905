@extends('layout')
@section('content')
    <section>
        <div class="container">
            <section id="cart_items">
                <div class="container col-sm-12">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="{{ URL::to('/trang-chu/') }}">Home</a></li>
                            <li class="active">Shopping Cart</li>
                        </ol>
                    </div>
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
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $v_content)
                                    <tr>
                                        <td class="cart_product">
                                            <a href=""><img
                                                    src="{{ URL::to('public/uploads/product/' . $v_content->options->image) }}"style=" width:50px; height=50px; "
                                                    alt=""></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href="">{{ $v_content->name }}</a></h4>
                                            <p>Web ID: {{ $v_content->id }}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>{{ number_format($v_content->price) . ' ' . 'VNĐ' }}</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <form action="{{ URL::to('/update_cart_quantity/') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input class="cart_quantity_input" type="text" name="cart_quantity"
                                                        value="{{ $v_content->qty }}" size="1">
                                                    <input type="hidden" name="rowId_cart" value="{{ $v_content->rowId }}"
                                                        class="form-control">
                                                    <input type="submit" value="cập nhật" name="update_qty"
                                                        class="btn btn_default btn-sm">
                                            </div>
                                            </form>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">

                                                <?php
                                                $subtotal = $v_content->price * $v_content->qty;
                                                echo number_format($subtotal) . ' ' . 'VNĐ';
                                                ?>
                                            </p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete"
                                                href="{{ URL::to('/delete_to_cart/' . $v_content->rowId) }}"><i
                                                    class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!--/#cart_items-->

            <section id="do_action">
                <div class="container col-sm-12">
                    <div class="heading">
                        <h3>Tổng Tiền</h3>

                    </div>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="total_area ">
                                <ul>
                                    <li>Tiền sản phẩm <span>{{ Cart::subtotal() . ' ' . 'VNĐ' }}</span></li>
                                    <li>Phí vận chuyển<span>Free</span></li>
                                    <li>Tổng thanh toán <span>{{ Cart::subtotal() . ' ' . 'VNĐ' }}</span></li>
                                </ul>
                                <div class="text-right">
                                    <?php
                                    $client_id = Session::get('client_id');
                                    $shipping_id = Session::get('shipping_id');

                                    if($client_id!=NULL && $shipping_id==NULL){
                                ?>
                                    <a class="btn btn-default check_out " href="{{ URL::to('/show_checkout/') }}">Thanh
                                        Toán</a>{{-- phải đăng nhập mới được thanh toán --}}

                                    <?php
                                    }elseif ($client_id!=NULL && $shipping_id!=NULL) {
                                ?>
                                    <a class="btn btn-default check_out " href="{{ URL::to('/payment/') }}">Thanh
                                        Toán</a>{{-- phải đăng nhập mới được thanh toán --}}

                                    <?php
                                    }else{
                                ?>
                                    <a class="btn btn-default check_out " href="{{ URL::to('/login_checkout/') }}">Thanh
                                        Toán</a>{{-- phải đăng nhập mới được thanh toán --}}
                                        <?php
                                    }
                                ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/#do_action-->
        </div>
    </section>
@endsection

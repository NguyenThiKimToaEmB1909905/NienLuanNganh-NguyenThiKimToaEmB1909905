@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm các thương hiệu sách
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
                    if ($message) {
                        /* nếu có tồn tại thì */
                        echo '<span class="text-alert" style="color: brown">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                        Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
                    }
                    ?>
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-brand-product') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên thương hiệu</label>
                                <input type="text" class="form-control" name="brand_product_name"
                                    id="exampleInputPassword1" placeholder="Tên thương hiệu" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize:none" rows="5" class="form-control" name="brand_product_desc"
                                    id="exampleInputPassword1" placeholder="Mô tả thương hiệu" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" name="brand_product_status">
                                    <option value="1">Ẩn</option>
                                    <option value="0">Hiện</option>

                                </select>
                            </div>

                            <button type="submit" name=" add_brand_product"class="btn btn-info">Thêm thể loại</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>



    </div>
    </div>
@endsection

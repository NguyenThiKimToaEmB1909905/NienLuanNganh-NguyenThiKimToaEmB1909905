@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sách
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
                    if ($message) {
                        /* nếu có tồn tại thì */
                        echo '<span class="text-alert" style="color: rgb(249, 1, 1); font-weight: 200px">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                        Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
                    }
                    ?>
                    @foreach ( $edit_brand_product as $key => $edit_value )
                        
                    
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/update-brand-product/'.$edit_value->brand_id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên danh mục</label>
                                <input type="text" value="{{ $edit_value->brand_name }}" class="form-control" name="brand_product_name"
                                    id="exampleInputPassword1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize:none"  rows="5" class="form-control" name="brand_product_desc"
                                    id="exampleInputPassword1" > {{ $edit_value->brand_desc }}</textarea>
                            </div>
                            <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật
                                ngay</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
    </div>
@endsection

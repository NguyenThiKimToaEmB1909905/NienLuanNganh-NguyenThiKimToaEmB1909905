@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sách
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
                    if ($message) {
                        /* nếu có tồn tại thì */
                        echo '<span class="text-alert">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                        Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
                    }
                    ?>
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-product') }}" method="post" enctype="multipart/form-data">{{-- thường để gửi ảnh lên csdl thì phải có trường enctype="multipart/form-data" --}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên sách</label>
                                <input type="text" class="form-control" name="product_name" id="exampleInputPassword1"
                                    placeholder="Tên danh mục" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh sách</label>
                                <input type="file" class="form-control" name="product_image" id="exampleInputPassword1" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá sách</label>
                                <input type="text" class="form-control" name="product_price" id="exampleInputPassword1" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sách</label>
                                <textarea style="resize:none" rows="5" class="form-control" name="product_desc" 
                                    placeholder="Mô tả sách" required=""></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sách</label>
                                <textarea style="resize:none" rows="10" class="form-control" name="product_content" 
                                    placeholder="Nội dung sách" required="">  </textarea>
                            </div>
                            {{-- <script>
                                CKEDITOR.replace('ckeditor1'); đặt id của mô tả sách là ckeditor1
                                CKEDITOR.replace('ckeditor2'); đặt id của nọi dung sp là ckeditor2
                            </script> --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thể loại</label>
                                <select class="form-control input-sm m-bot15" name="product_cate">
                                    @foreach ($cate_product as $key => $cate)
                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <select class="form-control input-sm m-bot15" name="product_brand">
                                    @foreach ($brand_product as $key => $brand)
                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" name="product_status">
                                    <option value="1">Ẩn</option>
                                    <option value="0">Hiện</option>

                                </select>
                            </div>

                            <button type="submit" name=" add_brand_product"class="btn btn-info">Thêm sách</button>

                        </form>
                    </div>

                </div>
            </section>

        </div>



    </div>
    </div>
@endsection

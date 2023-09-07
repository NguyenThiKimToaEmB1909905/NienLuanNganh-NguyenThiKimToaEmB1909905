@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê sách
            </div>
            <div class="row w3-res-tb">
                
                
                <div class="col-sm-5 pull-right">
                    <form action="{{ URL::to('/search_product_admin/') }}">
                        {{ csrf_field() }}
                        <div class="search_box pull-right" style=" width:100%">
                            <input type="text" name="keywords_submit" placeholder="Search"
                                style=" width:50%; color:rgb(0, 0, 0)" />
                            <button type="submit" class="btn "
                                style="margin-top:1; color:#FFF ; font-size:16px; background:rgb(255, 129, 50)"
                                name="search-items">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <body>
                <div class="table-responsive">
                    <?php
                    $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
                    if ($message) {
                        /* nếu có tồn tại thì */
                        echo '<span class="text-alert" style="color: rgb(249, 1, 1); font-weight: 200px">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                        Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
                    }
                    ?>
                    <table class="table table-striped b-t b-light  " style="margin-top: 30px">

                        <thead>
                            <tr>
                                {{-- <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th> --}}
                                <th>STT</th>
                                <th>Tên sách</th>
                                <th>Giá</th>
                                <th>Hình ảnh</th>
                                <th>Thể Loại</th>
                                <th>Thương hiệu</th>
                                <th>Hiển thị</th>


                                <th style="width:40px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($all_product as $key => $pro)
                                @php
                                    $i++;
                                @endphp
                                <tr>

                                    <td>{{ $i }}</td>
                                    <td>{{ $pro->product_name }}</td>
                                    <td>{{ $pro->product_price }}</td>
                                    <td><img src="public/uploads/product/{{ $pro->product_image }}" height="50"
                                            width="50"></td>
                                    <td>{{ $pro->brand_name }}</td>
                                    <td>{{ $pro->category_name }}</td>
                                    <td><span class="text-ellipsis">
                                            <?php
                                    if ($pro->product_status == 0) {
                                    ?>
                                            <a href="{{ URL::to('/unactive-product/' . $pro->product_id) }}"><span><i
                                                        class="bi bi-eye-fill"></i></span></a>
                                            <?php
                                    } else {
                                    ?>
                                            <a href="{{ URL::to('/active-product/' . $pro->product_id) }}"><span><i
                                                        class="bi bi-eye-slash-fill"></i></span></a>
                                            <?php
                                    }
                                    ?>
                                        </span></td>
                                    <td><span class="text-ellipsis"></span></td>
                                    <td>
                                        <a href="{{ URL::to('/edit-product/' . $pro->product_id) }}" class="active"
                                            ui-toggle-class="">
                                            <i class="bi bi-pen-fill text-success text-active"></i></a>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')"
                                            href="{{ URL::to('/delete-product/' . $pro->product_id) }}" class="active"
                                            ui-toggle-class="">
                                            <i class="bi bi-trash-fill text-danger text"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-5 text-center">
                        </div>
                        <div class="col-sm-7 text-right text-center-xs">
                            {{ $all_product->render() }}
                        </div>
                    </div>
                </footer>
        </div>
    </div>
@endsection

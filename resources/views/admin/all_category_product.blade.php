@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê thể loại sách
            </div>
            
            <div class="table-responsive">
                <?php
                $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
                if ($message) {
                    /* nếu có tồn tại thì */
                    echo '<span class="text-alert" style="color: rgb(249, 1, 1); font-weight: 200px">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                    Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
                }
                ?>
                <table class="table table-striped b-t b-light" >

                    <thead>
                        <tr>
                            {{-- <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th> --}}
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Hiển thị</th>

                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_category_product as $key => $cate_pro)
                            <tr>
                                {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td> --}}
                                <td>{{ $cate_pro->category_id }} </td>
                                <td>{{ $cate_pro->category_name }}</td>
                                <td><span class="text-ellipsis">
                                        <?php
                                    if ($cate_pro->category_status == 0) {
                                    ?>
                                        <a href="{{ URL::to('/unactive-category-product/' . $cate_pro->category_id) }}"><span><i
                                                    class="bi bi-eye-fill"></i></span></a>
                                        <?php
                                    } else {
                                    ?>
                                        <a href="{{ URL::to('/active-category-product/' . $cate_pro->category_id) }}"><span><i
                                                    class="bi bi-eye-slash-fill"></i></span></a>
                                        <?php
                                    }
                                    ?>
                                    </span></td>
                                <td><span class="text-ellipsis"></span></td>
                                <td>
                                    <a href="{{ URL::to('/edit-category-product/'.$cate_pro->category_id) }}" class="active" ui-toggle-class="">
                                        <i class="bi bi-pen-fill text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="{{ URL::to('/delete-category-product/'.$cate_pro->category_id) }}" class="active" ui-toggle-class="">
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
                        {{ $all_category_product->render() }}
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection

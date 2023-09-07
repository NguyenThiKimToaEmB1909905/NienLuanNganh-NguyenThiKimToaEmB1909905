@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê các thương hiệu sách
            </div>
            {{-- <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div> --}}
            <div class="table-responsive">
                <?php
                $message = Session::get('message'); /* lấy messages bên AdminContrller chổ đăng  nhập */
                if ($message) {
                    /* nếu có tồn tại thì */
                    echo '<span class="text-alert" style="color: rgb(249, 1, 1); font-weight: 200px">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                    Session::put('message', null); /* chỉ hiện thị đúng 1 lần không cho hiển thị nữa */
                }
                ?>
                <table class="table table-striped b-t b-light">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên thương hiệu</th>
                            <th>Hiển thị</th>

                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_brand_product as $key => $cate_pro)
                            <tr>
                                <td>{{ $cate_pro->brand_id }}</td>
                                <td>{{ $cate_pro->brand_name }}</td>
                                <td><span class="text-ellipsis">
                                        <?php
                                    if ($cate_pro->brand_status == 0) {
                                    ?>
                                        <a href="{{ URL::to('/unactive-brand-product/' . $cate_pro->brand_id) }}"><span><i
                                                    class="bi bi-eye-fill"></i></span></a>
                                        <?php
                                    } else {
                                    ?>
                                        <a href="{{ URL::to('/active-brand-product/' . $cate_pro->brand_id) }}"><span><i
                                                    class="bi bi-eye-slash-fill"></i></span></a>
                                        <?php
                                    }
                                    ?>
                                    </span></td>
                                <td><span class="text-ellipsis"></span></td>
                                <td>
                                    <a href="{{ URL::to('/edit-brand-product/'.$cate_pro->brand_id) }}" class="active" ui-toggle-class="">
                                        <i class="bi bi-pen-fill text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu này không?')" href="{{ URL::to('/delete-brand-product/'.$cate_pro->brand_id) }}" class="active" ui-toggle-class="">
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
                        {{ $all_brand_product->render() }}
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection

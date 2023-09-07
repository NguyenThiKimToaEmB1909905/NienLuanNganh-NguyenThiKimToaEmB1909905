@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Quản lí đơn hàng
            </div>
            
            <div class="table-responsive">
                <?php
                $message = Session::get('message'); 
                if ($message) {
                    /* nếu có tồn tại thì */
                    echo '<span class="text-alert" style="color: rgb(249, 1, 1); font-weight: 200px">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                    Session::put('message', null); 
                }
                ?>
                <table class="table table-striped b-t b-light">

                    <thead>
                        <tr>

                            <th>STT</th>
                            <th>Tên người đặt</th>
                            <th>Tổng tiền</th>
                            <th>Ngày tháng đặt hàng</th>
                            
                            <th>tình trạng</th>
                            <th>Hiển thị</th>



                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($all_order as $key => $order)
                            @php
                                $i++;
                            @endphp
                            
                                <tr>
                                    <td><i>{{$i}}</i></label></td>
                                    <td>{{ $order->client_name }}</td>
                                    <td>{{ $order->order_total }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>@if($order->order_status==1)
                                        Đơn hàng mới
                                    @else 
                                        Đã xử lý
                                    @endif
                                </td>


                                    <td>
                                        <a href="{{ URL::to('/view_order/' . $order->order_id) }}" class="active"
                                            ui-toggle-class="">
                                            <i class="bi bi-pen-fill text-success text-active"></i></a>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')"
                                            href="{{ URL::to('/delete_order/' . $order->order_id) }}" class="active"
                                            ui-toggle-class="">
                                            <i class="bi bi-trash-fill text-danger text"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection

@extends('layout')
@section('content')
    <section style="font-size: 18px ">
        <div class="container">
            <section id="cart_items">
                <div class="container col-sm-12">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="{{ URL::to('/trang-chu/') }}">Home</a></li>
                            <li class="active">Đơn hàng của tôi</li>
                        </ol>
                    </div>
                </div>
                <div class="shopper-informations col-sm-12 " >
                    {{-- <div class="col-sm-8">
                        <div class="right-home">
                            <div class="head-box"><a href="">Tin tổng hợp </a></div>
                            <div class="right-listnew">
                                <div class="new0 full-list">
                                    <ul>
                                        <li>
                                            <a class="img0" href="#">
                                                <img src="{{ URL::to('public/frontend/images/tintuc.jpg') }}" />
                                            </a>
                                            <div class="f1">
                                                <h2><a href="#">
                                                        Lễ khánh thành khuôn viên Trường Đại học Việt Đức
                                                    </a></h2>
                                                <div class="ques-infor">
                                                    11/11/2022
                                                </div>
                                                <div class="sapo">
                                                    Sáng 11/11, tại Bình Dương, Bộ Giáo dục và Đào tạo (GDĐT) tổ chức Lễ
                                                    khánh thành khuôn viên Trường Đại học Việt Đức. Đây là dự án xây dựng
                                                    trường đại học xuất sắc, trên cơ sở quan hệ hợp tác giữa Bộ GDĐT Việt
                                                    Nam....
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="img0" href="#">
                                                <img src="{{ URL::to('public/frontend/images/tintuc1.jpg') }}"> </a>
                                            <div class="f1">
                                                <h2><a href="#">
                                                        Đẩy mạnh hợp tác quốc tế để phòng chống bạo lực trẻ em
                                                    </a></h2>
                                                <div class="ques-infor">
                                                    10/11/2022
                                                </div>
                                                <div class="sapo">
                                                    Ngày 10/11, Thứ trưởng Bộ Giáo dục và Đào tạo (GDĐT) Ngô Thị Minh đã có
                                                    buổi làm việc với bà Najat Maalla M'jid, đại diện đặc biệt của Tổng thư
                                                    ký Liên Hợp quốc về vấn đề bạo lực đối với trẻ em.
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="img0" href="#">
                                                <img src="{{ URL::to('public/frontend/images/tintuc2.jpg') }}"> </a>
                                            <div class="f1">
                                                <h2><a href="#">
                                                        Đẩy mạnh hợp tác quốc tế để phòng chống bạo lực trẻ em
                                                    </a></h2>
                                                <div class="ques-infor">
                                                    10/11/2022
                                                </div>
                                                <div class="sapo">
                                                    Ngày 10/11, Thứ trưởng Bộ Giáo dục và Đào tạo (GDĐT) Ngô Thị Minh đã có
                                                    buổi làm việc với bà Najat Maalla M'jid, đại diện đặc biệt của Tổng thư
                                                    ký Liên Hợp quốc về vấn đề bạo lực đối với trẻ em.
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="img0" href="#">
                                                <img src="{{ URL::to('public/frontend/images/tintuc3.jpg') }}"> </a>
                                            </a>
                                            <div class="f1">
                                                <h2><a href="#">
                                                        Tăng cường hợp tác giáo dục Việt Nam - Australia
                                                    </a></h2>
                                                <div class="ques-infor">
                                                    10/11/2022
                                                </div>
                                                <div class="sapo">
                                                    Sáng 10/11, Thứ trưởng Hoàng Minh Sơn tiếp Thống đốc Bang Nam Australia,
                                                    bà Frances Adamson và đoàn đại biểu cấp cao nhân chuyến thăm làm việc
                                                    tại Việt Nam.
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="img0" href="#">
                                                <img src="{{ URL::to('public/frontend/images/tintuc4.jpg') }}"> </a>

                                            </a>
                                            <div class="f1">
                                                <h2><a href="#">
                                                        Chủ động, khoa học, nghiêm túc thực hiện kế hoạch năm học 2022-2023
                                                    </a></h2>
                                                <div class="ques-infor">
                                                    10/11/2022
                                                </div>
                                                <div class="sapo">
                                                    Ngày 10/11, Bộ Giáo dục và Đào tạo (GDĐT) tổ chức Hội nghị giao ban trực
                                                    tuyến với các Sở GDĐT về triển khai nhiệm vụ năm học 2022-2023. Thứ
                                                    trưởng Nguyễn Hữu Độ chủ trì hội nghị. Tham dự có đại diện lãnh đạo các
                                                    Vụ, Cục thuộc Bộ GDĐT; đại diện lãnh đạo các Sở GDĐT, Phòng GDĐT, nhà
                                                    trường…
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="img0" href="#">
                                                <img src="{{ URL::to('public/frontend/images/tintuc5.jpg') }}"> </a>
                                            </a>
                                            <div class="f1">
                                                <h2><a href="#">
                                                        Đẩy mạnh nghiên cứu khoa học, đổi mới sáng tạo trong cơ sở...
                                                    </a></h2>
                                                <div class="ques-infor">
                                                    09/11/2022
                                                </div>
                                                <div class="sapo">
                                                    Ngày 9/11, tại TPHCM, Bộ Giáo dục và Đào tạo (GDĐT) tổ chức Hội thảo đẩy
                                                    mạnh hoạt động nghiên cứu khoa học, đổi mới sáng tạo trong các cơ sở
                                                    giáo dục đại học. Thứ trưởng Nguyễn Văn Phúc dự và chủ trì hội thảo.
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="img0" href="#">
                                                <img src="{{ URL::to('public/frontend/images/tintuc6.jpg') }}"> </a>
                                            </a>
                                            <div class="f1">
                                                <h2><a href="#">
                                                        Lễ trao Giải báo chí toàn quốc “Vì sự nghiệp Giáo dục Việt...
                                                    </a></h2>
                                                <div class="ques-infor">
                                                    09/11/2022
                                                </div>
                                                <div class="sapo">
                                                    Lễ trao Giải báo chí toàn quốc “Vì sự nghiệp Giáo dục Việt Nam” năm 2022
                                                    được tổ chức vào sáng 09/11/2022 tại Hà Nội và truyền hình trực tiếp
                                                    trên VTV2.
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" row col-sm-4">
                        <!-- video hoạt động -->
                        <div class="right-home">
                            <div class="head-box"><a href="">Video hoạt động </a></div>
                            <div class="list-videoleft">
                                <ul>

                                    <li><a href="">
                                            <iframe width="260" height="200"
                                                src="https://www.youtube.com/embed/nM5Na7mZMgE" title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                            <span>Bộ Giáo dục và Đào tạo lên tiếng...</span></a>
                                    </li>

                                    <li><a href="">
                                            <iframe width="260" height="200"
                                                src="https://www.youtube.com/embed/i9AnvQSy32o" title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                            <span>SÁCH NÓI FULL- Đừng Làm Việc Chăm...</span></a>
                                    </li>

                                    <li><a href="">
                                            <iframe width="260" height="200"
                                                src="https://www.youtube.com/embed/9PZ4KrMzmes" title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>

                                            <span>Tin tức Nga – Ukraine mới nhất | Nga phá sập cầu chiến lược sau khi đã rút
                                                hết quân khỏi Kherson?</span></a>
                                    </li>

                                    <li><a href="">
                                            <iframe width="260" height="200"
                                                src="https://www.youtube.com/embed/FtpWu59bmW4" title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                            <span>Tin an ninh trật tự nóng mới nhất 24h sáng 12/11/2022 | Tin tức thời sự
                                                Việt Nam mới nhất | ANTV</span></a>
                                    </li>



                                </ul>
                            </div>




                            <div class="ms-clear"></div>
                        </div>
                    </div> --}}
                    <div class="table-responsive">
                        <?php
                        $message = Session::get('message'); 
                        if ($message) {
                            /* nếu có tồn tại thì */
                            echo '<span class="text-alert" style="color: rgb(249, 1, 1); font-weight: 200px">', $message, '</span>'; /* in ra cái dòng tin nhắn Mật khẩu hoăc Email sai..... */
                            Session::put('message', null); 
                        }
                        ?>
                        <table class="table table-striped  " style="border: 1px solid rgb(248, 246, 246)">
        
                            <thead >
                                <tr style="background:  #FE980F ">
        
                                    <th>STT</th>
                                   <th>Mã Đơn</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày tháng đặt hàng</th>
                                    <th></th>
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
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->order_total }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                <a href="{{ URL::to('/view_myorder/' . $order->order_code) }}" class="btn btn-primary" style="margin-top: -2px"
                                                    ui-toggle-class="">Xem Chi Tiết</a>
                                                    {{-- <i class="bi bi-pen-fill text-success text-active"></i> --}}
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>

        </div>
    </section>
    <style>
        
    </style>
@endsection

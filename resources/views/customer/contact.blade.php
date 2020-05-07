@extends('layouts.customer')
@section('title', 'Liên Hệ')

@section('content')
<!-- Nguồn Trang -->
<div class="page-section bg-gray small-section">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Trang Chính</a></li>
                        <li class="active">Liên Hệ</li>
                    </ol>
                </div>
                <div class="col-md-8 text-right">
                    <h1>Liên Hệ</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="main">
    <div class="page-section pad-bottom-60">
        <div class="container">
            
            <div class="googlemap mar-bottom-90">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657475611035!2d105.78126221445488!3d21.046386992553238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1579218899838!5m2!1svi!2s" width="100%" height="570" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="contact-details mar-bottom-90">
                        <p>+84 971 71 789 <br />238 Hoàng Quốc Việt, Cổ Nhuế, Cầu Giấy, Hà Nội, Việt Nam</p>
                        <ul class="social-nav">
                            <li><a target="_blank" href="#"><i class="fa fa-facebook"></i></a> </li>
                            <li><a target="_blank" href="#"><i class="fa fa-twitter"></i></a> </li>
                            <li><a target="_blank" href="#"><i class="fa fa-instagram"></i></a> </li>
                            <li><a target="_blank" href="#"><i class="fa fa-linkedin"></i></a> </li>
                        </ul>
                    </div>
                </div>

                <!-- Form Liên Hệ -->
                <div class="col-md-9">
                    <form class="contactform">
                        <h4 class="letter-spacing">Gửi tin nhắn cho chúng tôi</h4>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <p><input type="text" name="name" placeholder="Họ và Tên" /></p>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <p><input type="text" name="email" placeholder="Email" /></p>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <p><input type="text" name="website" placeholder="Số điện thoại" /></p>
                            </div>
                        </div>
                        <p><input type="text" name="title" placeholder="Tiêu đề" /></p>
                        <p><textarea name="message" placeholder="Đánh giá của bạn"></textarea></p>
                        <p><input type="submit" class="btn btn-dark-b btn-lg" value="Gửi" /></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- #main -->
@stop
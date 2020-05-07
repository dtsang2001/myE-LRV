<!DOCTYPE HTML>
<html>
<head>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Lỗi 404</title>

    <base href="{{asset('')}}">

    <link href='https://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic%7cRoboto+Slab:400,700%7cCrete+Round:400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Vollkorn:400,400italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="public/assets/libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/assets/fonts/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="public/assets/fonts/Lineicons/style.css" />
    <link rel="stylesheet" href="public/assets/css/plugins.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="public/assets/css/style.css" />
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="public/assets/css/responsive.css" />
    <!-- Common space -->
    <link rel="stylesheet" href="public/assets/css/common-space.css">

</head>
<body class="appear-animate">


<div class="page-loading-wrapper">
    <div class="progress-bar-loading">
        <div class="back-loading progress-bar-inner">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                <path d="M3.7,12h10.6l15.1,54.6c0.4,1.6,1.9,2.7,3.6,2.7h46.4c1.5,0,2.8-0.9,3.4-2.2l16.9-38.8c0.5-1.2,0.4-2.5-0.3-3.5
                    c-0.7-1-1.8-1.7-3.1-1.7H45c-2,0-3.7,1.7-3.7,3.7s1.7,3.7,3.7,3.7h45.6L76.9,62H35.8L20.7,7.3c-0.4-1.6-1.9-2.7-3.6-2.7H3.7
                    C1.7,4.6,0,6.3,0,8.3S1.7,12,3.7,12z"/>
                <path d="M29.5,95.4c4.6,0,8.4-3.8,8.4-8.4s-3.8-8.4-8.4-8.4s-8.4,3.8-8.4,8.4C21.1,91.6,24.8,95.4,29.5,95.4z"/>
                <path d="M81.9,95.4c0.2,0,0.4,0,0.6,0c2.2-0.2,4.3-1.2,5.7-2.9c1.5-1.7,2.2-3.8,2-6.1c-0.3-4.6-4.3-8.1-8.9-7.8s-8.1,4.4-7.8,8.9
                    C73.9,91.9,77.5,95.4,81.9,95.4z"/>
            </svg>
        </div>
        <div class="front-loading progress-bar-inner">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                <path d="M3.7,12h10.6l15.1,54.6c0.4,1.6,1.9,2.7,3.6,2.7h46.4c1.5,0,2.8-0.9,3.4-2.2l16.9-38.8c0.5-1.2,0.4-2.5-0.3-3.5
                    c-0.7-1-1.8-1.7-3.1-1.7H45c-2,0-3.7,1.7-3.7,3.7s1.7,3.7,3.7,3.7h45.6L76.9,62H35.8L20.7,7.3c-0.4-1.6-1.9-2.7-3.6-2.7H3.7
                    C1.7,4.6,0,6.3,0,8.3S1.7,12,3.7,12z"/>
                <path d="M29.5,95.4c4.6,0,8.4-3.8,8.4-8.4s-3.8-8.4-8.4-8.4s-8.4,3.8-8.4,8.4C21.1,91.6,24.8,95.4,29.5,95.4z"/>
                <path d="M81.9,95.4c0.2,0,0.4,0,0.6,0c2.2-0.2,4.3-1.2,5.7-2.9c1.5-1.7,2.2-3.8,2-6.1c-0.3-4.6-4.3-8.1-8.9-7.8s-8.1,4.4-7.8,8.9
                    C73.9,91.9,77.5,95.4,81.9,95.4z"/>
            </svg>
        </div>
        <div class="progress-bar-number">0%</div>
    </div>
</div>

<div id="page" >

    <div class="wrapper-404" style="background-color: #fff; background-image: url(uploads/404.gif);background-repeat:no-repeat; background-position: center;">
        <div id="error404">
            <h1 style="margin-bottom: 300px;">404</h1>
            <h4>Rất tiếc! Không tìm thấy Trang.</h4>
                <a class="btn btn-default btn-animation" href="{{ url()->previous() }}">
                    <span>Quay lại <i class="fa fa-long-arrow-right"></i></span>
                </a>

        </div><!-- #main -->
    </div>

</div><!-- #page -->

<!-- JS -->
<script type="text/javascript" src="public/assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="public/assets/js/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="public/assets/libs/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/assets/js/plugins.js"></script>

<!-- Javascript Main File -->
<script type="text/javascript" src="public/assets/js/main.js"></script>

</body>
</html>
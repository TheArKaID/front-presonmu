<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/adminres/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/adminres/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('/adminres/css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/main.css')}}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS - Bagian Atas, tempat Notification dan Message
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS - Bagiannya Side Bar
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('/adminres/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS - Bagian Atas, tempat Notification dan Message
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('/adminres/css/calendar/fullcalendar.print.min.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('/adminres/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    
    @yield('header')
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    
    {{-- Side bar --}}
        @include('admin.layouts._side')

    <!-- Start Welcome area -->
    <div class="all-content-wrapper" style="position: relative; padding-bottom: 50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="{{asset('/adminres/img/logo/logo.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Header --}}
        @include('admin.layouts._header')
        {{-- Content --}}
        @yield('content')
        {{-- Footer  --}}
        @include('admin.layouts._footer')
    </div>

    <!-- jquery
		============================================ -->
    <script src="{{asset('/adminres/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('/adminres/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('/adminres/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('/adminres/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('/adminres/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('/adminres/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('/adminres/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('/adminres/js/jquery.scrollUp.min.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{asset('/adminres/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/adminres/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('/adminres/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('/adminres/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('/adminres/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('/adminres/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('/adminres/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('/adminres/js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{asset('/adminres/js/morrisjs/morris.js')}}"></script>
    <script src="{{asset('/adminres/js/morrisjs/morris-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('/adminres/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('/adminres/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('/adminres/js/sparkline/sparkline-active.js')}}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{asset('/adminres/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('/adminres/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('/adminres/js/calendar/fullcalendar-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('/adminres/js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('/adminres/js/main.js')}}"></script>
    @yield('footer')
</body>

</html>
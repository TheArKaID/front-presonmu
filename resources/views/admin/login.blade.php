<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Presonmu Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/bootstrap.min.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/adminres/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('/adminres/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>ADMIN PRESONMU</h3>
				<p>Silahkan Login untuk melanjutkan</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
          <div class="panel-body">
              <form action="/proseslogin" id="loginForm" method="POST">
                {{ csrf_field() }}
                  <div class="form-group">
                      <label class="control-label" for="email">Email</label>
                      <input type="text" placeholder="example@gmail.com" title="Please enter you email" required="" value="" name="email" id="email" class="form-control">
                      <span class="help-block small">-</span>
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="password">Password</label>
                      <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                      <span class="help-block small">-</span>
                  </div>
                  <button class="btn btn-success btn-block">Login</button>
              </form>
          </div>
          <a class="btn-sm" style="padding: 5px 10px;" href="/">Kembali</a>
        </div>
			</div>
			<div class="text-center login-footer">
				<p>2020. All rights reserved.</p>
			</div>
		</div>   
    </div>
    <!-- jquery
		============================================ -->
    <script src="{{asset('/adminres/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('/adminres/js/bootstrap.min.js')}}"></script>
</body>

</html>
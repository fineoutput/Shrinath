<!DOCTYPE HTML>
<html lang="zxx">

<head>
  <title>Login | {{config('constants.options.SITE_NAME')}}</title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="icon" href="{{asset('admin/assets/images/favicon.png')}}">
  <meta name="keywords" content="" />
  <script>
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Meta tag Keywords -->
  <!-- css files -->
  <link rel="stylesheet" href="{{asset('admin/login/css/style.css')}}" type="text/css" media="all" />
  <!-- Style-CSS -->
  <link rel="stylesheet" href="{{asset('admin/login/css/font-awesome.css')}}">
  <!-- Font-Awesome-Icons-CSS -->
  <!-- //css files -->
  <!-- web-fonts -->
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <!-- //web-fonts -->
  <style>
    .pom-agile {
      display: flex;
    }

    span.fa {
      float: right;
      color: #FF5722;
      line-height: 1.5;
      margin-right: 10px;
    }

    .bg-gif {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: -1;
}

.sub-main-w3 {
    width: 30%;
    margin-top: 600px !important;
    margin: 111px auto;
    -webkit-box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
    padding: 0px 50px;
}
@media(max-width: 600px){
    .sub-main-w3 {
    width: 100%;
    }
}
.whas{
  height: 100vh;
}
  </style>
</head>

<body class="whas">
  <div class="video-w3l">
  <img src="{{asset('admin/assets/images/greenlogo_1.gif')}}" alt="Background" class="bg-gif">
    
    
    <!--//header-->
    <div class="main-content-agile">
      <div class="sub-main-w3" style="box-shadow: 0px 0px 20px 0px rgb(153 153 153 / 75%)">
        <h2 style="color: green"> Shreenath Login Here
          <i class="fa fa-hand-o-down" aria-hidden="true"></i>
        </h2>

        <!-- show success and error messages -->
        @if (session('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
          {{ session('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </div>
        @endif
        <!-- End show success and error messages -->

        <form action="{{route('admin_login_process')}}" method="post">
          @csrf
          <div class="pom-agile">
            <span class="fa fa-user-o" aria-hidden="true"></span>
            <input placeholder="Username" name="email" class="user" type="email" required="">
          </div>
          <div class="pom-agile">
            <span class="fa fa-key" aria-hidden="true"></span>
            <input placeholder="Password" name="password" class="pass" type="password" required="">
          </div>
          <div class="sub-w3l">
            <!-- <a href="#" id="butpas">Forgot Password?</a> -->
            <div class="clear"></div>
          </div>
          <div class="right-w3l">
            <input type="submit" value="Login">
          </div>
        </form>
        <br />
        <form action="{{route('admin_change_password')}}" method="post">
          @csrf
          <div id="passrst1" style="display:none;">
            <div class="pom-agile">
              <span class="fa fa-user-o" aria-hidden="true"></span>
              <input placeholder="Enter Email to reset password" name="email" class="user" type="email" required="">
            </div>
            <div class="right-w3l">
              <input type="submit" value="Reset">
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--//main-->
    <!--footer-->
    <!--//footer-->
  </div>

  <!-- js -->
  <script src="{{asset('admin/login/js/jquery-2.1.4.min.js')}}"></script>
  <!-- //js -->
</body>

</html>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="admin_asset/assets/css/normalize.css">
    <link rel="stylesheet" href="admin_asset/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_asset/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_asset/assets/css/themify-icons.css">
    <link rel="stylesheet" href="admin_asset/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin_asset/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="admin_asset/assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="admin_asset/images/logo.png" alt="">
                </a>
            </div>
            @if(count($errors)>0)
            @endif
            @if(session('alert'))
                <div class="alert  alert-warning alert-dismissible fade show">
                    <span class="badge badge-pill badge-warning">Notification</span> {{session('alert')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="login-form">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input name="username" type="text" class="form-control" >
                        <p class="help is-danger" style="color: red">{{ $errors->first('username')}}</p>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input name="password" type="password" class="form-control">
                        <p class="help is-danger" style="color: red">{{ $errors->first('password')}}</p>
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng nhập</button>
                    <div class="register-link m-t-15 text-center">
                        <p>Bạn chưa có tài khoản? Hãy click<a href="{{url('dang-ky')}}"> Sign Up Here</a> để tạo mới tài khoản</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="admin_asset/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="admin_asset/assets/js/popper.min.js"></script>
<script src="admin_asset/assets/js/plugins.js"></script>
<script src="admin_asset/assets/js/main.js"></script>


</body>
</html>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="../images/icons/favicon.png">
  <title>ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plugin/dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugin/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="plugin/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://kit.fontawesome.com/a9e605192a.css" crossorigin="anonymous">

  <style type="text/css">
    .login-box-body,
    .register-box-body {
      -webkit-border-radius: 5px;
      border-radius: 5px;
      /* -webkit-box-shadow: 0px 0px 5px 5px rgba(242, 238, 224, 1);
              box-shadow: 0px 0px 5px 5px rgba(242, 238, 224, 1);*/
    }
  </style>
</head>

<body class="hold-transition login-page" style="background-color: #b3a06dc9;">
  <div class="login-box" style="font-size:12px;">

    <div class="login-box-body">
      <div class="login-logo">
        <!-- <i class="fa-solid fa-user-shield"></i> -->
      </div>
      <p class="login-box-msg" style="margin-bottom:-15px; font-weight: bold; font-size: 16px; color: #474747;">ADMIN</p><br>
      <!--<p class="login-box-msg" style="margin-bottom:-15px; font-weight: bold; font-size: 16px; color: #fff;">Sign in</p>-->
      <form action="check_login.php" method="post" id="frmLogin" autocomplete="off">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username" value="<?php if (isset($_COOKIE["member_login"])) {
                                                                                                  echo $_COOKIE["member_login"];
                                                                                                } ?>">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div><br>

        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if (isset($_COOKIE["member_password"])) {
                                                                                                      echo $_COOKIE["member_password"];
                                                                                                    } ?>">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div><br>

        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember" id="remember" value="1" <?php if (isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
                <font style="margin-left:5px; color: #474747; font-weight: bold;">Remember Me?</font>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" name="login" value="Login" class="btn btn-login btn-block btn-flat" style="border-radius: 3px;">Sign in</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.3 -->
  <script src="plugin/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="plugin/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugin/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>

</body>

</html>
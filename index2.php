<!DOCTYPE html>
<html><?php session_Start(); session_destroy ();?>
<script type="text/javascript">
  
  paceOptions = {
   startOnPageLoad: false,
   minTime: 112501,
}
</script>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PRISM | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="assets/js/sweetalert2.all.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="include/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="include/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="include/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- custom style -->
  <link rel="stylesheet" type="text/css" href="assets/css/index-style.css">

</head>
<body class="hold-transition login-page body-style pace-primary">
<div class="login-box">
    <img class="logoimg" src="assets/imgs/pphlogohq.png">
  <div class="login-logo">
    <a href="#"><b class="brand-name">Pre-Registration Information SysteM</b> PRISM</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form  method="post" action="verification.php">
        <div class="input-group mb-3">
          <input required type="text" class="form-control" data-inputmask='"mask": "99999999999 "' data-mask name="mobileno" placeholder="Mobile Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password-submit" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input name=icheckbox type="checkbox" id="remember" required>
              <label for="remember" class='lbl-datapolicy'>
                Agreed to our <a href="datapolicy.php" class="lbl-datause">Data use</a> 
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="btn-submit" name="login-submit" class="btn btn-primary btn-block btn-flat ">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <?php


if (isset($_REQUEST['wrongPassword'])) {
    echo 
    ' 
    <div class="alert alert-danger notification-login swing" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-heading">Error</h4><p><b> User </b> does not exist or <b>Password</b> is incorrect</p><hr><p class="mb-0">Please Try Again</p></div>
    
    ';
  }

  else if (isset($_REQUEST['noUserExist'])){
    echo 
    ' 
    <div class="alert alert-danger notification-login swing" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p>The Mobile Number you’ve entered doesn’t match any account or Password is incorrect</div>

    ';
  }

  ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<!-- jQuery -->
<script src="include/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="include/dist/js/adminlte.min.js"></script>
<!-- InputMask -->
<script src="include/plugins/moment/moment.min.js"></script>
<script src="include/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- pace-progress -->
<script src="include/plugins/pace-progress/pace.min.js"></script>

<script type="text/javascript">
  $('[data-mask]').inputmask()

var ischecked = false;

    $(document).ready(function(){
      $('#remember').change(function() {
        if($(this).is(":checked")) {
          ischecked = true;
        }
        else {
          ischecked = false;
        }
      })
    });

  $(document).on('click','#btn-submit', function(e){ 
    if ($("input[name=mobileno]").val() && $("input[name=password-submit]").val() && ischecked) {
    Pace.restart(); 
    }
    else{

    }
  });

</script>


</body>



</html>



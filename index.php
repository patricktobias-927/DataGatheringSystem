<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php 
    require 'include/schoolConfig.php';
    require 'include/config.php';
    include 'include/fonts.php';
    require 'assets/phpfunctions.php';
    session_start();
    ob_start();
  ?>

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
        <link rel="stylesheet" type="text/css" href="assets/css/home-style.css">

        <title>
            <?php echo SCHOOL_NAME?>
        </title>

</head>

<body>
	<div class=" main">

		<div class="row navbar" style="margin-top: -10px;">
			<div class="col-sm-8" style="padding-left: 30px;">
			<img class="img-school-logo " src="assets/imgs/PPH LOGO.png" style="width: 55px; height: 70px; margin-bottom: 10px">
			<span class="lbl-school-name"><b>PRISM</b></span>
			</div>
			<div class="col-sm-4">
				<form  action="index.php" method="post">
          <div class="row">
              <div class="col-sm-5">
                <label for="log-number" class="log-label">Mobile Number</label>
                <input type="number" name="number" <?php if(isset($_POST['number'])) echo " value='".$_POST['number']."' ";?> class="form-control" id="txtf-lrn"  id="log-number">
              </div>
              <div class="col-sm-5">
                <label for="input-password" class="log-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" id="input-password">
                <a href="#" class="fPassword">Forgot Password ?</a>
              </div>
              <div class="col-sm-2">
                <label for="loginbtn" class="log-label" style="visibility: hidden;">jxrn</label>
                <button  type="submit" name="login" value="submit" id="loginbtn" name="login" class="btn btn-primary" >Login</button>
              </div>
            </div>
        </form>
			</div>
		</div>

<!-- 		<div class="row">
			<div class="container home-main-body ">
				<div class="row d-flex justify-content-center"><div class="lbl-home-main">Enroll now</div></div>
				<div class="row d-flex justify-content-center"><div class="lbl-home-sub">Enrollment is now more easier and more secure.</div></div>
				<div class="row d-flex justify-content-center" data-toggle="modal" data-target="#exampleModalCenter">
					<button type="button" class="btn btn-primary btn-getstarted">Get Started</button>
				</div>
			</div>
		</div> -->

<!--     <div class="row">
      <div class="col-lg-7">
        <div class="row">Welcome to Prism,</div>
        <div class="row">
        <div class="row">
          <div class="col-sm-1">
          </div>

            <div class="col-sm-11"><b>Data Entry. </b>Add, Edit and View student and parent information.</div>
        </div>
        <div class="row">
          <div class="col-sm-1">
          </div>

            <div class="col-sm-11"><b>View List. </b>View Student and parent information registered in the system.</div>
        </div>
        <div class="row">
          <div class="col-sm-1">
          </div>

            <div class="col-sm-11"><b>Export Excel. </b>Export student and parent information into CSV file.</div>
        </div>
      </div>
      </div>
      <div class="col-lg-5">asdsad</div>
    </div> -->
  <div class="row">
    <div class="col-lg-7 feature ">
      <div class="col-lg-8 feature-box">        
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-11"><b class="featureTitle">Welcome to Prism,</b></div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12 fLabel">
          <img class="fLogo" src="assets/imgs/file.png">&nbsp&nbsp&nbsp
            <b>Data Entry. </b><span>Add, Edit and View student and parent information.</span>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12 fLabel">
          <img class="fLogo " src="assets/imgs/view.png" >&nbsp&nbsp&nbsp
            <b>View List. </b><span>View Student and parent information registered in the system.</span>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12 fLabel" >
          <img class="fLogo " src="assets/imgs/exel.png">&nbsp&nbsp&nbsp
           <b>Export Excel. </b><span>Export student and parent information into CSV file.</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-5 main-reg-form">
<form  action="index.php" method="post">
      <div class="container col-lg-10 reg-form"> 

        <div class="row">
          <div class="col-lg-10 signup-label" >Sign UP</div>
          <div class="col-lg-10 signup-sublabel">Sign up to start your session</div>
        </div>
<br>
        <div class="row">
          <div class="col-lg-5">
            <div class="form-group">
              <input value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>"
                name="first-name"required type="text" class="form-control" placeholder="First Name">
            </div>
          </div>
            
          <div class="col-lg-5">
            <div class="form-group">
              <input value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>"
                name="last-name"required type="text" class="form-control" placeholder="Last Name">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-10">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fas fa-mobile" style="width: 14px;"> </i></span>
                </div>
                <input <?php if(isset($_POST['number']))echo "value='".$_POST['number']."'"; ?>
                name="number"  type="text" class="input thisNumber form-control" placeholder="Mobile Number" required="true" data-inputmask='"mask": "9999-999-9999    "' data-mask>
              </div>
            </div>
          </div> 
        </div>

        <div class="row">
          <div class="col-lg-10">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-envelope" style="width: 14px;"></i></span>
                </div>
                <input <?php if(isset($_POST[ 'email']))echo "value='".$_POST[ 'email']. "'"; ?> name="email" type="email" class="input thisNumber form-control" id="exampleInputEmail1" placeholder="Email Address" required="true">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-10">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                </div>
                <input name="pass1" <?php if(isset($_POST['pass1']))echo "value='".$_POST['pass1']."'"; ?>type="password" class="input form-control" required="true" placeholder="Password">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-10">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                   <span class="input-group-text"> <i class="fa fa-lock" ></i></span>
                </div>
                <input name="pass2" <?php if(isset($_POST['pass2']))echo "value='".$_POST['pass2']."'"; ?>type="password" class="input form-control" required="true" placeholder="Re-Type Password">
              </div>
            </div>  
          </div>
        </div>

        <div class="row">
          <div class="col-lg-10">
            <div class="form-group clearfix" > 
              <label class="genderform">Gender</label><br>
      
              <div class="icheck-primary d-inline">
                  <input <?php if(isset($_POST['r1']) && $_POST['r1']=="female") echo 'checked'; ?>
                  value="female" type="radio" id="radioPrimary2" name="r1" checked>
                  <label for="radioPrimary2">Female
                  </label>
              </div>&nbsp
      
              <div class="icheck-primary d-inline">
                 <input <?php if(isset($_POST['r1']) && $_POST['r1']=="male") echo 'checked'; ?>
                 value="male" type="radio" id="radioPrimary1" name="r1" >
                 <label for="radioPrimary1">Male
                 </label>
              </div>
      
            </div> 
          </div>
        </div>

        <div class="row">
          <div class="col-sm-10">
            <div class="icheck-primary">
              <input name=icheckbox type="checkbox" id="remember" required <?php if(isset($_POST['remember'])){echo " checked";} ?>>
              <label for="remember" class='lbl-datapolicy' style="font-family: sans-serif; font-weight: normal;">
                I acknowledge that I have read and understood PPH Inc. privacy notice and gives consent that the personal data I provided will be collected, stored, used, and processed for the purpose of enrollment
              </label>
            </div>
          </div>
        </div>

        <div class="row">
              <div class="col-sm-4" >
                  <br>
                  <button type="Sign Up" value ="Signup" name="Signup" class="btn btn-info btn-block" style="float: left;">Submit</button>
</form>
              </div>
              
        </div>

      </div>

    </div>

  </div>

</div>
</body>


<!--  
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form action="index.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number</label>
    <input type="number" name="number" <?php if(isset($_POST['number'])) echo " value='".$_POST['number']."' ";?> class="form-control" id="txtf-lrn" placeholder="Enter Mobile Number">
    <small  class="form-text text-muted">We'll never share your information with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
    <a href="#" >I forgot my Password</a>

      </div>
      <div class="modal-footer">
        <a href="register-parent.php" type="button"  class="btn btn-info" title="click here" >Register</a>
        <button type="submit" name="btn-submit" class="btn btn-success">Login</button>
       </form>
      </div>
    </div>
  </div> -->

 <!-- jQuery -->
<script src="include/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>




</html>
<?php
  if (isset($_REQUEST['insertsuccess'])){
    $message = "You\'re now register";
    displayMessage("success","Success",$message);

  }

  if (isset($_POST['login'])) {
    if (strlen($_POST['number'])<10 || strlen($_POST['number'])>13) {
      displayMessage("warning","Invalid Mobile Number","Please try again ");

    }
    else{
      $_POST['number']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['number'] )));   
      $_POST['password']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['password'] )));  
      
      $sql = "select a.* from tbl_parentuser as a where mobile='".$_POST['number']."'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

      if ($pass_row = mysqli_fetch_assoc($result)) {

          $chkpass = $_POST['password'] ==$pass_row['password'];

          if (!$chkpass) {
            displayMessage("warning","Wrong Password","Please try again ");
          }

          elseif ($chkpass == true) {

            $_SESSION['userID'] = $pass_row['userID'];
            $_SESSION['first-name'] = $pass_row['fname'];
            $_SESSION['middle-name'] = $pass_row['mname'];
            $_SESSION['last-name'] = $pass_row['lname'];
            $_SESSION['lvl'] = $pass_row['mobile'];
            $_SESSION['userEmail'] = $pass_row['sex'];
            $_SESSION['schoolID'] = $pass_row['email'];
            $_SESSION['userType'] = $pass_row['userType'];

            // $timeStamp = date("Y-m-d H:i:s");
            // $token = generateNumericOTP(6);
            // $accID = $_SESSION['id']; 
            // $sql = "Insert into tbl_token (token, accountID, timeGen) 
            // values ('$token','$accID','$timeStamp')";
            // mysqli_query($conn, $sql);

            // $_SESSION['token'] = $token;
            
            if ($_SESSION['userType']=='A') {
              header('Location: u/index.php');
              exit();
            }
            else{
              header('Location: u/home.php');
              exit();
            }

          }
       }

      else {
      header('Location: index2.php?tryagain');
      exit();
      }
    }
    else{
      displayMessage("warning","This phone number is not register","Please try again");
    }

    }
  }
  if (isset($_POST['Signup'])) {
    if (strlen(cleanThis($_POST['number']))<11) {
      $message="Mobile number is invalid";
      displayMessage("error","Invalid Entry",$message);
    }
    elseif ($_POST['pass1'] != $_POST['pass2']){
      $message="Password mismatch";
      displayMessage("error","Invalid Entry",$message);
    }
    elseif (strlen($_POST['pass1']) <5){
      $message="Password is too weak";
      displayMessage("error","Invalid Entry",$message);
    }

    else{

     $_POST['first-name']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['first-name'])));
     $_POST['last-name']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['last-name'])));
     $_POST['email']               = mysqli_real_escape_string($conn, stripcslashes($_POST['email']));
     $_POST['number']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['number'])));
     $_POST['pass1']               = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['pass1'])));
    if (isset($_POST['r1'])) {
      if ($_POST['r1']=="male") {
        $gender="Male";;
      }
      else{
        $gender="Female";
      }

    }
    $sql = "select a.* from tbl_parentuser as a where mobile='".$_POST['number']."'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

      $message="This mobile number is already registered";
      displayMessage("error","Invalid Entry",$message);

    }
    else{


     $insertQuery = "Insert into tbl_parentuser
(
fname,
lname,
mobile,
sex,
email,
password,
isEnabled,
userType


) 
VALUES 
(

'".$_POST['first-name']."',
'".$_POST['last-name']."',
'".$_POST['number']."',
'$gender',
'".$_POST['email']."',
'".$_POST['pass1']."',
'1',
'P'

)";      

mysqli_query($conn, $insertQuery);
header('Location: index.php?registered');

    }


    }
  }

  if (isset($_REQUEST['registered'])) {
  echo "<script>";
    echo "Swal.fire({";
      echo "html: 'Registration Success you can login now',";
      echo "type: 'success',";
      echo "title: 'Success',";
      echo "showConfirmButton: false,";
      echo "timer: 2700,";
      echo "customClass: 'swal-sm'";
    echo "});";
  echo "$('#exampleModalCenter').modal('show');</script>";

  }

  if (isset($_REQUEST['logout'])) {
    session_destroy();
  echo "<script>";
    echo "Swal.fire({";
      echo "html: 'Logged out',";
      echo "type: 'info',";
      echo "title: 'Information',";
      echo "showConfirmButton: false,";
      echo "timer: 2700,";
      echo "customClass: 'swal-sm'";
    echo "});";
  echo "</script>";

  }


?>

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

		<div class="row navbar">

			<div class="col-sm-10">
			<img class="img-school-logo " src="<?php echo SCHOOL_LOGO_PATH?>">
			<span class="lbl-school-name"><?php echo SCHOOL_NAME?></span>
			</div>
			<div class="col-sm-2 cont-btn ">
				<button type="button" class="btn btn-link btn-home-login">Admin</button>
			</div>
		</div>

		<div class="row">
			<div class="container home-main-body ">
				<div class="row d-flex justify-content-center"><div class="lbl-home-main">Enroll now</div></div>
				<div class="row d-flex justify-content-center"><div class="lbl-home-sub">Enrollment is now more easier and more secure.</div></div>
				<div class="row d-flex justify-content-center" data-toggle="modal" data-target="#exampleModalCenter">
					<button type="button" class="btn btn-primary btn-getstarted">Get Started</button>
				</div>
			</div>
		</div>

	</div>
</body>


<!-- Modal -->
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
    <input type="number" <?php if(isset($_POST['number'])) echo " value='".$_POST['number']."' ";?> class="form-control" id="txtf-lrn" placeholder="Enter Mobile Number">
    <small  class="form-text text-muted">We'll never share your information with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
    <a href="#" >I forgot my Password</a>

      </div>
      <div class="modal-footer">
        <a href="NewStudent.php" type="button"  class="btn btn-info" title="click here" >New student ?</a>
        <button type="submit" class="btn btn-success">Login</button>
       </form>
      </div>
    </div>
  </div>

 <!-- jQuery -->
<script src="include/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>     $(window).load(function(){
                $('#exampleModalCenter').modal('show');
            });
</script>


</html>
<?php
  if (isset($_REQUEST['insertsuccess'])){
    $message = "You\'re now register";
    displayMessage("success","Success",$message);

  }

  if (isset($_POST['submit'])) {
    if (strlen($_POST['number'])<10 || strlen($_POST['number'])>13) {
      displayMessage("warning","Invalid Mobile Number","Please try again");
    }
    else{
      $_POST['number']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['number'] )));   
      $_POST['password']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['password'] )));  
      
      $sql = "select a.* from tbl_parentuser as a where mobile='".$_POST['number']."' and $";
      
      
      
      $result = mysqli_query($conn, $sql);
      $pass_row = mysqli_fetch_assoc($result);
      $studentID = $pass_row['studentID'];

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

      if ($pass_row = mysqli_fetch_assoc($result)) {

          $chkpass = $_POST['password'] ==$pass_row['Password'];

          if ($chkpass == false) {
            header('Location: index.php?noUserExist');
            exit();
          }

          elseif ($chkpass == true) {
            $_SESSION['id'] = $pass_row['accountID'];
            $_SESSION['lname'] = $pass_row['Lastname'];
            $_SESSION['fname'] = $pass_row['Firstname'];
            $_SESSION['mobileno'] = $pass_row['Mobileno'];
            $_SESSION['lvl'] = $pass_row['Level'];
            $_SESSION['userEmail'] = $pass_row['userEmail'];
            $_SESSION['schoolID'] = $pass_row['schoolID'];
            $_SESSION['Schoolname'] = $pass_row['Schoolname'];
            $_SESSION['Schooladdress'] = $pass_row['Schooladdress'];
            $_SESSION['pictureFileName'] = $pass_row['pictureFileName'];
            $_SESSION['CurrentSchoolYear'] = $pass_row['CurrentSchoolYear'];

            
            $timeStamp = date("Y-m-d H:i:s");
            $token = generateNumericOTP(6);
            $accID = $_SESSION['id']; 
            $sql = "Insert into tbl_token (token, accountID, timeGen) 
            values ('$token','$accID','$timeStamp')";
            mysqli_query($conn, $sql);

            $_SESSION['token'] = $token;
           
          }
       }

      else {
      header('Location: index2.php?tryagain');
      exit();
      }
    }
    else{
      //
    }

    }
  }

  if (isset($_REQUEST['noUserExist'])){
    echo 
    ' 
    <div class="alert alert-danger notification-login swing" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p>The Mobile Number you’ve entered doesn’t match any account or Password is incorrect</div>

    ';
  }
  
?>

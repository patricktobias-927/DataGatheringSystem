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
    ob_start();
  ?>

        <!-- Sweetalert -->
        <script src="assets/js/sweetalert2.all.min.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="include/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="include/dist/css/adminlte.min.css">
        <!-- Jquery -->
        <script src="include/plugins/jquery/jquery.min.js"></script>
        <!-- Adminlte -->
        <script src="include/dist/js/adminlte.min.js"></script>

        <script src="include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- custom style -->
        <link rel="stylesheet" type="text/css" href="assets/css/register-parent.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="include/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="include/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="include/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="include/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="include/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="include/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="include/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="include/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



        <title>
            <?php echo SCHOOL_NAME?>
        </title>

</head>

<body>
  <div class=" main">

    <div class="row navbar">

      <div class="col-sm-12">
        <a href="index.php">
      <img class="img-school-logo " src="<?php echo SCHOOL_LOGO_PATH?>">
      <span class="lbl-school-name"><?php echo SCHOOL_NAME?></span>
      </a>
      </div>

    </div>

    <div class="row">
      <div class="container home-main-body ">

      <div class="container col-lg-8" style="border: solid">
        <a class="modal-myheading">Registration</a>
        <br><br>
        <form action="register-parent.php" method="post">

        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="required-field">Given Name</label>
                              <input value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>"
                              name="first-name"required type="text" class="form-control" placeholder="Enter First Name">
                            </div>
                          </div>
      
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="unrequired-field">Middle Name</label>
                              <input value="<?php echo isset($_POST['middle-name']) ? $_POST['middle-name'] : '' ?>"
                              name="middle-name"type="text" class="form-control" placeholder="Enter Middle Name">
                            </div>
                          </div>
      
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="required-field">Surname/Last Name</label>
                              <input value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>"
                              name="last-name"required type="text" class="form-control" placeholder="Enter Last Name">
                            </div>
                          </div>

        </div>


        <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="unrequired-field">Cellphone Number</label><br>
                <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                   </div>
                  <input <?php if(isset($_POST['number']))echo "value='".$_POST['number']."'"; ?>
                  name="number" " type="text" class="input thisNumber form-control" required="true" data-inputmask='"mask": "9999-999-9999    "' data-mask>

                 </div>
               </div>
              </div>    

            <div class="col-lg-6">
                         <div class="form-group">
                           <label class="unrequired-field" for="exampleInputEmail1">Email address</label>
                                           <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                   </div>
                           <input <?php if(isset($_POST['email']))echo "value='".$_POST['email']."'"; ?>
                           name="email" type="email" class="input thisNumber form-control" id="exampleInputEmail1" placeholder="Enter email" required="true"> 
                         </div>
                         </div> 
              </div> 
            </div>

        <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="unrequired-field">Password</label><br>
                <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-lock"></i></span>
                   </div>
                  <input name="pass1" <?php if(isset($_POST['pass1']))echo "value='".$_POST['pass1']."'"; ?>type="password" class="input form-control" required="true">
                 </div>
               </div>
              </div>    

            <div class="col-lg-6">
              <div class="form-group">
                <label class="unrequired-field">Retype Password</label><br>
                <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-lock" ></i></span>
                   </div>
                  <input name="pass2" <?php if(isset($_POST['pass2']))echo "value='".$_POST['pass2']."'"; ?>type="password" class="input form-control" required="true">
                 </div>
               </div>  
              </div> 
            </div>

                    <div class="row ">
                                      <div class="col-lg-12 " >
      
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

            <div class="row" >
              <div class="col-sm-12" >
                <div class="btn-cont" style="float: right;">
                  <a href="index.php" type="button" class="btn btn-secondary" data-dilgiss="modal">Cancel</a>
                  <button type="submit" name="btn-submit" class="btn btn-primary pull-right">Submit</button>
                </div>
</form>
              </div>
            </div>



        </div>

      </div>

      </div>
    </div>

  </div>
</body>


<!-- jQuery -->
<script src="include/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="include/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="include/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="include/plugins/moment/moment.min.js"></script>
<script src="include/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="include/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="include/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="include/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="include/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="include/dist/js/adminlte.min.js"></script>

<script>

      //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.select2bs4').select2()


    $('[data-mask]').inputmask()


$(document).ready(function() {
    $('.yearselect').select2();
});


</script>


</html>

<?php
  if (isset($_POST['btn-submit'])) {
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
     $_POST['middle-name']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['middle-name'])));
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
mname,
lname,
mobile,
sex,
email,
password,
isEnabled


) 
VALUES 
(

'".$_POST['first-name']."',
'".$_POST['middle-name']."',
'".$_POST['last-name']."',
'".$_POST['number']."',
'$gender',
'".$_POST['email']."',
'".$_POST['pass1']."',
'1'

)";      

mysqli_query($conn, $insertQuery);
header('Location: index.php?registered');

    }


    }
  }
?>


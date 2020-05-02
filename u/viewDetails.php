<!DOCTYPE html>

<?php
  require '../include/config.php';
  $page = "studentEntry";
    require 'assets/adminlte.php';
      require 'assets/fonts.php';
  $haveAccess;
  require 'assets/scipts/phpfunctions.php';
  require '../include/schoolConfig.php';
  session_start();
  ob_start();


  if (!isset($_SESSION['userID'])) {
  header('Location: index.php?insertsuccess');  
  exit();
}


  elseif (isset($_GET['page'])) {
  $studentID = $_GET['page'];
    $sql = "sELECT a.* FROM tbl_student AS a WHERE a.studentID = '".$studentID."'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
  
        if ($pass_row = mysqli_fetch_array ($result)) {
          if (trim($pass_row['userID'])==trim($_SESSION['userID'])) {
            $haveAccess='1';

            $studentCode      = $pass_row['3'];
            $LRN              = $pass_row['4'];
            $Prefix           = $pass_row['5'];
            $Lastname         = $pass_row['6'];
            $Firstname        = $pass_row['7'];
            $Middlename       = $pass_row['8'];
            $Suffix           = $pass_row['9'];
            $Birthdate        = $pass_row['10'];
            $Birthplace       = $pass_row['11'];
            $Address          = $pass_row['12'];
            $Telno            = $pass_row['13'];
            $Cellphone        = $pass_row['14'];
            $IsEldest         = $pass_row['15'];
            $familyPlace      = $pass_row['16'];
            $dateTimeEnrolled = $pass_row['17'];
            

          }
          else{
            $haveAccess='0';
          }
        }
      }
                else{
      $haveAccess='2';
    }
    }
          else{
      $haveAccess='2';
    }


  }
      else{
      $haveAccess='2';
    }


  $userID = $_SESSION['userID'];
  $userFname = $_SESSION['first-name'];
  $userMname = $_SESSION['middle-name'];
  $userLname = $_SESSION['last-name'];
  $userLvl = $_SESSION['lvl'];
  $userEmail = $_SESSION['userEmail'];
  $schoolID = $_SESSION['schoolID'];


?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Details | PRISM</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/css-studentinfo.css">
  <link rel="stylesheet" type="text/css" href="includes/viewDetails.css">



</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

<!-- nav bar & side bar -->
<?php 
require 'includes/navAndSide2.php';
if ($haveAccess=='2') {
  require 'includes/404.php';
}
else if($haveAccess=='1'){
  require 'includes/viewdetails.inc.php';
}
else if ($haveAccess=='0'){
  require 'includes/noAccess.php';
}
?>
<!-- nav bar & side bar -->





<?php 

require 'assets/scripts.php';

if (isset($_REQUEST['print'])){
    echo '<script>$(".card-body").removeClass("collapse");</script>';
    echo '<script type="text/javascript"> window.addEventListener("load", window.print());</script>';
  }

?>
<!-- jQuery -->
<script src=" ../include/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=" ../include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../include/dist/js/adminlte.min.js"></script>



</body>

</html>


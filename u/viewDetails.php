<!DOCTYPE html>

<?php
  require '../include/config.php';
  $page = "studentEntry";
      require 'assets/fonts.php';
  $haveAccess;
  require 'assets/scipts/phpfunctions.php';
  require '../include/schoolConfig.php';
  require '../include/getschoolyear.php';


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
            $studentCode       = $pass_row['3'];
            $LRN               = $pass_row['4'];
            $Prefix            = $pass_row['5'];
            $Lastname          = $pass_row['6'];
            $Firstname         = $pass_row['7'];
            $Middlename        = $pass_row['8'];
            $Suffix            = $pass_row['9'];
            $Birthdate         = $pass_row['10'];
            $Birthplace        = $pass_row['11'];
            $Address           = $pass_row['12'];
            $Telno             = $pass_row['13'];
            $Cellphone         = $pass_row['14'];
            $IsEldest          = $pass_row['15'];
            $familyPlace       = $pass_row['16'];
            $dateTimeSubmitted = $pass_row['17'];
            $isSubmitted       = $pass_row['18'];
            $isExported        = $pass_row['19'];
            $studentSchoolYearID      = $pass_row['2'];


            

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
  <link rel="stylesheet" type="text/css" href="assets/css/hideAndNext.css">

  <script type="text/javascript" src="../include/plugins/sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../include/plugins/sweetalert2/sweetalert2.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="../include/dist/css/adminlte.min.css">

    <!-- daterange picker -->
  <link rel="stylesheet" href="../include/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../include/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../include/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../include/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" type="text/css" href="../include/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../include/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../include/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">





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
  require 'includes/modal_studentinfo.inc.php';

}
else if ($haveAccess=='0'){
  require 'includes/noAccess.php';
}


require 'assets/scripts.php';

if (isset($_REQUEST['print'])){
    echo '<script>$(".collapse").collapse("show");</script>';
    echo '<script type="text/javascript"> window.addEventListener("load", window.print());</script>';
  }
if (isset($_REQUEST['EditSuccess'])){
    $message = "Information is updated";
    displayMessage("success","Success",$message);
  }




?>
<script src="../include/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../include/dist/js/adminlte.min.js"></script>

<script src="../include/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../include/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../include/plugins/moment/moment.min.js"></script>
<script src="../include/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../include/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../include/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../include/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../include/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" type="text/css" href="../include/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<script>



      //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.select2bs4').select2()

    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

    $('[data-mask]').inputmask()


$(document).ready(function() {
    $('.yearselect').select2();
});





</script>


<script type="text/javascript">

$(document).on("click", "#submitBTN", function() {
    var x = $(this).attr('value');
    var badge = $(this).attr('badgeIdentifier');
    var ctr = $(this).attr('ctrIdentifier');

Swal.fire({
  title: 'Are you sure?',
  text: "After submission you can't revert or edit your form",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Submit my registration!'
}).then((result) => {
  if (result.value) {
        $.ajax({
            url: "submit.php",
            type: "POST",
            cache: false,
            "data": 
                {"studentidx" : x},
            dataType: "html",
            success: function () {
                $("#submitBTN").delay( 100 ).animate({ opacity: "hide" }, "slow");
                $("#deleteBTN").delay( 100 ).animate({ opacity: "hide" }, "slow");
                $("#submitBadge").addClass('badge-info').removeClass('badge-danger').text('Submitted') ;


                swal.fire("Submitted", "It was succesfully stored to the database!", "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal.fire("Error submitting!", "Please try again", "error");
            }
        });
  }
})
});

$(document).on("click", "#deleteBTN", function() {
    var x = $(this).attr('value');

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
        $.ajax({
            url: "remove.php",
            type: "POST",
            cache: false,
            "data": 
                {"studentidx" : x},
            dataType: "html",
            success: function () {
                swal.fire("Done!", "It was succesfully deleted!", "success").then(function() {
    window.location = "studentEntry.php";})
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal.fire("Error deleting!", "Please try again", "error");
            }
        });
  }
})
});  
</script>
<script type="text/javascript" src="assets/scipts/hideAndNext.js"></script>
</body>

</html>


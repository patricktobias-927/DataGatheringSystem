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
if (isset($_REQUEST['insertsuccess'])) {
  echo '<script>$(".collapse").collapse("show");
  Swal.fire(
  "Input Save Successfully!",
  "Review Information then submit to finalize your submission!",
  "success"
)</script>';
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

<?php 
if (isset($_POST["btn-submit"])) { 
      $_POST['student-lrn'] = cleanThis($_POST['student-lrn']);

      //if lrn is not equal to 12
      if (strlen($_POST['student-lrn'])!=12 && strlen($_POST['student-lrn'])!=0){
        displayMessage("warning","LRN is Invalid","Please try again");
        }

      //bday is in future
      else if (substr($_POST['birthdate'],6)>date('Y') && $_POST['birthdate']!="" && $_POST['birthdate']!=" ") {
        displayMessage("warning","Birthdate Invalid","Please try again");
        echo "<script> console.log('bday'); </script>";
        }


       //contact person mobile validation 
      elseif (strlen(cleanThis($_POST['contact-person-mobile']))!=11) {
        displayMessage("warning","Invalid Mobile Number","Contact Person Mobile Number");
        echo "<script> console.log('contact Monile invalid'); </script>";
      }
      else{
        $lrn=cleanThis($_POST['student-lrn']);
       // $code=$_POST['student-code'];
        $isLRNMatch=false;
        $isCodeMatch=false;
        $gender;
        $genderprefix;
        $noLRN=false;

        if (isset($code)) {  
          $sql = "select studentCODE as matchedCODE, Lastname, Firstname, Middlename  from `tbl_student` where studentCODE = '".$code."'";
          $result1 = mysqli_query($conn, $sql);
          $rowcount=mysqli_num_rows($result1);
          //check if theres a result
          if ($result1) {
            $query1 = mysqli_fetch_assoc($result1);
            
            if ($rowcount>0) {
            $CODEName = combineName($query1['Firstname'],$query1['Lastname'],$query1['Middlename']);
            $isCODEMatch=true;
            $message="There is existing record <br> CODE:".$code."<br> Name: ".$CODEName;
            displayMessage("error","Duplicate Entry",$message);
            }
      
          else{
              $isCODEMatch=false;
            }
          }

        }
        else{
          $isCODEMatch=false;
        }

        //check length
        if (strlen(cleanThis($_POST['student-lrn']))> 8) {  
          $sql = "select lrn as matchedLRN, Lastname, Firstname, Middlename  from `tbl_student` where lrn = '".  $lrn."'";
          $result1 = mysqli_query($conn, $sql);
          $rowcount=mysqli_num_rows($result1);
          //check if theres a result
          if ($result1) {
            $query1 = mysqli_fetch_assoc($result1);
            
            if ($rowcount>0) {
              echo '<script>console.log("duplicate");</script>';
            $LRNName = combineName($query1['Firstname'],$query1['Lastname'],$query1['Middlename']);
            $isLRNMatch=true;
            $message="There is existing record <br> LRN:".$lrn."<br> Name: ".$LRNName;
            displayMessage("error","Duplicate Entry",$message);
            }
      
          else{
              $isLRNMatch=false;
            }
          }

        }
        else{
          $isLRNMatch=false;
        }

      
           if (!$isLRNMatch && !$isCodeMatch) {

              $isEldest;
              $hasMother;
              $hasFather;
              $hasGuardian;
              $hasSibling1;
              $hasSibling2;
              $hasSibling3;
              $hasSchoolAttended;
              $numberOfSiblings=0;
          
              if ($_POST['school-last-attended']==''||$_POST['school-last-attended']==' ') {
                $_POST['last-school-attended-year']='';
                $_POST['inComingLevel']='';
                $_POST['last-school-attended-grade']='';
                $_POST['last-school-attended-address']='';
                $hasSchoolAttended = false;
              }
              else{
                $hasSchoolAttended = true;
              }
              if ($_POST['mother-name']==''|| $_POST['mother-name']==' ' ) {
                $_POST['mother-employer-name']='';
                $_POST['mother-mobile']='';
                $hasMother = false;
              }
              else{
                $_POST['mother-mobile']=cleanThis($_POST['mother-mobile']);
                $hasMother = true;
              }
              if ($_POST['father-name']==''|| $_POST['father-name']==' ' ) {
                $_POST['father-employer-name']='';
                $_POST['father-mobile']='';
                $hasFather = false;
              }
              else{
                $_POST['father-mobile']=cleanThis($_POST['father-mobile']);
                $hasFather = true;
              }
              if ($_POST['guardian-name']==''|| $_POST['guardian-name']==' ' ) {
                $_POST['guardian-relationship']='';
                $_POST['guardian-phone']='';
                $_POST['guardian-mobile']='';
                $hasGuardian = false;
              }
              else{
                $_POST['guardian-phone'] =cleanThis($_POST['guardian-phone'] );
                $_POST['guardian-mobile']=cleanThis($_POST['guardian-mobile']);
                $hasGuardian = true;
              }
              if ($_POST['sibling1-name']==''|| $_POST['sibling1-name']==' ' ) {
                $_POST['sibling1-level']='';
                $hasSibling1 = false;
              }
              else{
                $numberOfSiblings++;
                $hasSibling1 = true;
              }
              if ($_POST['sibling2-name']==''|| $_POST['sibling2-name']==' ' ) {
                $_POST['sibling2-level']='';
                $hasSibling2 = false;
              }
              else{
                $numberOfSiblings++;
                $hasSibling2 = true;
              }
              if ($_POST['sibling3-name']==''|| $_POST['sibling3-name']==' ' ) {
                $_POST['sibling3-level']='';
                $hasSibling3 = false;
              }
              else{
                $numberOfSiblings++;
                $hasSibling3 = true;

              }
              if (!isset($_POST['siblings-order'])) {
                $_POST['siblings-order']= '';
              }
              else{
                $_POST['siblings-order']= cleanThis($_POST['siblings-order']);
              }
              if (isset($_POST['isEldest'])) {
                $isEldest="Yes";
              }
              else{
                $isEldest="No";
              }
              if (isset($_POST['r1'])) {
                if ($_POST['r1']=="male") {
                  $gender="M";;
                  $genderprefix="Mr.";
                }
                else{
                  $gender="F";
                  $genderprefix="Ms."; 
                }
              }
              $formatedBirthdate = $_POST['birthdate'];
              $date = str_replace('/', '-', $formatedBirthdate);
              $_POST['birthdate'] = date('Y-m-d', strtotime($date));
     // $_POST['student-phone']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['student-mobile'])));                   
     // $_POST['student-mobile']               = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['student-mobile'])));        
     $_POST['address']                      = mysqli_real_escape_string($conn, stripcslashes($_POST['address']));
     $_POST['siblings-order']               = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['siblings-order'])));
     $_POST['student-lrn']                  = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['student-lrn'])));
     $_POST['first-name']                   = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['first-name'])));
     $_POST['middle-name']                  = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['middle-name'])));
     $_POST['last-name']                    = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['last-name'])));
     $_POST['suffix']                       = mysqli_real_escape_string($conn, stripcslashes($_POST['suffix']));
     //$_POST['student-code']                 = mysqli_real_escape_string($conn, stripcslashes($_POST['student-code']));
     $_POST['r1']                           = mysqli_real_escape_string($conn, stripcslashes($_POST['r1']));
     $_POST['birthdate']                    = mysqli_real_escape_string($conn, stripcslashes($_POST['birthdate']));
     $_POST['birthplace']                   = mysqli_real_escape_string($conn, stripcslashes($_POST['birthplace']));
     $_POST['school-last-attended']         = mysqli_real_escape_string($conn, stripcslashes($_POST['school-last-attended']));
     $_POST['last-school-attended-year']    = mysqli_real_escape_string($conn, stripcslashes($_POST['last-school-attended-year']));
     $_POST['inComingLevel']               = mysqli_real_escape_string($conn, stripcslashes($_POST['inComingLevel']));
     $_POST['last-school-attended-grade']   = mysqli_real_escape_string($conn, stripcslashes($_POST['last-school-attended-grade']));
     $_POST['last-school-attended-address'] = mysqli_real_escape_string($conn, stripcslashes($_POST['last-school-attended-address']));
     $_POST['contact-person-name']          = mysqli_real_escape_string($conn, stripcslashes($_POST['contact-person-name']));
     $_POST['contact-person-phone']         = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['contact-person-phone'])));
     $_POST['contact-person-mobile']        = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['contact-person-mobile'])));
     $_POST['contact-person-email']         = mysqli_real_escape_string($conn, stripcslashes($_POST['contact-person-email']));
     $_POST['mother-name']                  = mysqli_real_escape_string($conn, stripcslashes($_POST['mother-name']));
     $_POST['mother-employer-name']         = mysqli_real_escape_string($conn, stripcslashes($_POST['mother-employer-name']));
     $_POST['mother-mobile']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['mother-mobile'])));
     $_POST['father-name']                  = mysqli_real_escape_string($conn, stripcslashes($_POST['father-name']));
     $_POST['father-employer-name']         = mysqli_real_escape_string($conn, stripcslashes($_POST['father-employer-name']));
     $_POST['father-mobile']                = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['father-mobile'])));
     $_POST['guardian-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['guardian-name']));
     $_POST['guardian-relationship']        = mysqli_real_escape_string($conn, stripcslashes($_POST['guardian-relationship']));
     $_POST['guardian-phone']               = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['guardian-phone'])));
     $_POST['guardian-mobile']              = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['guardian-mobile'])));
     $_POST['sibling1-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling1-name']));
     $_POST['sibling1-level']               = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling1-level']));
     $_POST['sibling2-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling2-name']));
     $_POST['sibling2-level']               = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling2-level']));
     $_POST['sibling3-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling3-name']));
     $_POST['sibling3-level']               = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling3-level']));

      $randomToken = generateNumericOTP(10);
      $nowtime = date("Y-m-d H:i:s");


$insertQuery = "update tbl_student
set
userID   =  '".$userID."',
LRN   =  '".$_POST['student-lrn']."',
Prefix   =  '".$gender."',
Lastname   =  '".$_POST['last-name']."',
Firstname   =  '".$_POST['first-name']."',
Middlename   =  '".$_POST['middle-name']."',
Suffix   =  '".$_POST['suffix']."',
Birthdate   =  '".$_POST['birthdate']."',
Birthplace   =  '".$_POST['birthplace']."',
Address   =  '".$_POST['address'] ."',
IsEldest   =  '".$isEldest."'
where studentID = '".$studentID."'";      
mysqli_query($conn, $insertQuery);






 $insertQuery2 = "update tbl_contact
set
userID  = '".$userID."',
studentID  = '".$studentID."',
fullName  = '".$_POST['contact-person-name']."',
phone  = '".$_POST['contact-person-phone']."',
mobile  = '".$_POST['contact-person-mobile']."',
email  = '".$_POST['contact-person-email']."'
where studentID = '".$studentID."'";       
 
mysqli_query($conn, $insertQuery2);



if ($hasMother) {
 $insertQuery2 = "update tbl_parents 
set
userID  = '".$userID."',
studentID  = '".$studentID."',
fullName  = '".$_POST['mother-name']."',
employerName  = '".$_POST['mother-employer-name']."',
mobileNumber  = '".$_POST['mother-mobile']."',
isFather  = '0'
where studentID = '".$studentID."'"; 
 
mysqli_query($conn, $insertQuery2);
}


if ($hasFather) {
 $insertQuery2 = "update tbl_parents 
set
userID  = '".$userID."',
studentID  = '".$studentID."',
fullName  = '".$_POST['father-name']."',
employerName  = '".$_POST['father-employer-name']."',
mobileNumber  = '".$_POST['father-mobile']."',
isFather  = '1'
where studentID = '".$studentID."'"; 

 
mysqli_query($conn, $insertQuery2);
}

if ($hasGuardian) {
 $insertQuery2 = "Insert into tbl_guardian
(
userID,
studentID,
fullName,
relationship,
guardianPhone,
guardianMobile
) 
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['guardian-name']."',
'".$_POST['guardian-relationship']."',
'".$_POST['guardian-phone']."',
'".$_POST['guardian-mobile']."'
)";
 
mysqli_query($conn, $insertQuery2);
}

if ($hasSchoolAttended) {
 $insertQuery2 = "Insert into tbl_schoolinfo
(
userID,
studentID,
schoolLastAttended,
schoolYear,
schoolAddress,
inComingLevel,
averageGrade
)     
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['school-last-attended'] ."',
'".$_POST['last-school-attended-year'] ."',
'".$_POST['last-school-attended-address']."',
'".$_POST['inComingLevel'] ."',
'".$_POST['last-school-attended-grade']."'
)";
 
mysqli_query($conn, $insertQuery2);
}

if ($hasSibling1) {
 $insertQuery2 = "Insert into tbl_siblings
(
userID,
studentID,
fullName,
level,
siblingNo
)     
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['sibling1-name'] ."',
'".$_POST['sibling1-level']."',
'1'
)";
 
 mysqli_query($conn, $insertQuery2);
}

if ($hasSibling2) {
 $insertQuery2 = "Insert into tbl_siblings
(
userID,
studentID,
fullName,
level,
siblingNo
)     
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['sibling2-name'] ."',
'".$_POST['sibling2-level']."',
'2'
)";
 
 mysqli_query($conn, $insertQuery2);
}


if ($hasSibling3) {
 $insertQuery2 = "Insert into tbl_siblings
(
userID,
studentID,
fullName,
level,
siblingNo
)     
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['sibling3-name'] ."',
'".$_POST['sibling3-level']."',
'3'
)";
 
mysqli_query($conn, $insertQuery2);
}

// header('Location: index.php?insertsuccess');

   }
  }
            
}
  if (isset($_REQUEST['insertsuccess'])){
  // $message = "You\'re now register";
 // displayMessage("success","Success",$message);

  }
?>
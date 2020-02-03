<!DOCTYPE html>
<html>
<script type="text/javascript">
paceOptions = {startOnPageLoad: false,
minTime: 12321,}
</script>
<div style="display: none;">
<?php 
  session_start();
  date_default_timezone_set("Asia/Bangkok");
  require 'include/config.php';
  require 'u/assets/scipts/phpfunctions.php';
  require 'vendor/autoload.php';
  require 'include/PHPMailerAutoload.php';
  require 'include/credentials.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;



  if (isset($_POST['login-submit'])) {
    $mobileno = $_POST['mobileno'];
    $password = $_POST['password-submit'];
    $mobileno = stripcslashes($mobileno);
    $password = stripcslashes($password);
    $mobileno = mysqli_real_escape_string($conn, $mobileno);
    $password = mysqli_real_escape_string($conn, $password);
    
    $sql = "select a.accountID, a.Password, a.Lastname, a.Firstname, a.Mobileno, a.Level, a.userEmail, a.schoolID, b.CurrentSchoolYear, b.Schoolname, b.Schooladdress, b.pictureFileName from tbl_user a inner join tbl_school b where a.schoolID = b.schoolID and a.Mobileno = ".$mobileno;

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

      if ($pass_row = mysqli_fetch_assoc($result)) {

          $chkpass = $password==$pass_row['Password'];

          if ($chkpass == false) {
            header('Location: index2.php?noUserExist');
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
if (isItGoodToSend($_SESSION['token'], $_SESSION['id'])) {

  include 'include/htmlEmailTemplate.php';

 $mail = new PHPMailer(true);

  $sql = "select * from settings";
  $result2 = mysqli_query($conn, $sql);
  $resRow= mysqli_fetch_assoc($result2);
  echo $resRow['isBodySimple'];
  if ($resRow['isBodySimple']) {

    $emailBody = $simpleBody;
  }

  else{
    $emailBody = $Body;
  }

  try {
    $mail->isSMTP();   
    $mail->Host       = 'smtp.gmail.com';    
    $mail->SMTPAuth   = true;
    $mail->Username   = uEMAIL;
    $mail->Password   = ePASSWORD;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->setFrom(uEMAIL, 'PPH');
    $mail->isHTML(true);
    $mail->Subject = 'Verification ( OTP )';

    $mail->addAddress($_SESSION['userEmail'],$_SESSION['lname']); 
    $mail->Body    = $emailBody;
    
    $mail->send();
  } 

  catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

}
        
    }

    else {
      header('Location: index2.php?noUserExist');
      exit();
    }
  }

  else if (!isset($_SESSION['id'])){
  header('Location: index2.php'); 
  exit(); 
  }


?>

</div>
<head>
  <title>PPH DGS | Verification</title>
  <!-- Sweet Alert -->
  <script src="include/plugins/sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="include/plugins/sweetalert2/sweetalert2.min.css">
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
  <link rel="stylesheet" type="text/css" href="assets/css/verification-style.css">


</head>

<body class="hold-transition sidebar-mini  lockscreen body-style pace-primary">

<div class="lockscreen-wrapper hidden">
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b><?php  echo $_SESSION['Schoolname']; ?></b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo combineName( $_SESSION['fname'], $_SESSION['lname'],'') ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <?php 
      $imgSchoolLogo;
      if (isset($_SESSION["pictureFileName"]) && $_SESSION["pictureFileName"]!=""){
        $imgSchoolLogo = 'assets/imgs/schoollogos/'.$_SESSION["pictureFileName"];
      }
      else{ 
        $imgSchoolLogo = 'assets/imgs/schoollogos/school1logo.png';
      }
      echo '<img src="'.$imgSchoolLogo.'" alt="IMG">' ; 
        
      ?>

    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action="verification.php" method="post">
      <div class="input-group">

        <input type="text" name="otpcode" class="form-control otpform" placeholder="OTP CODE" data-inputmask='"mask": "   * * * * * * "' 
        data-mask >

        <div class="input-group-append">
          <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
      </div>

    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Please enter the code we've sent to your email  <?php echo obfuscate_email($_SESSION["userEmail"]); ?>
  </div>
  <div class="text-center">
    <a href="index2.php">Or sign in as a different user</a>
  </div><br>
  <div class="lockscreen-footer text-center">
<a href="?resendCode" >Resend Code</a><br>
  &#x26A0<b><a class="text-black">Please Check Spam Mails</a></b><br>
  </div>
</div>

</body>

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

$(document).ready(function () {
    $('div.hidden').fadeIn(1200).removeClass('hidden');
});
  $('[data-mask]').inputmask()

</script>

</html>

<?php

  function isStillValid($td,$isUsed) {

    //more than 30 min ago (expired)
    if ($td >= 1800) {return false;}

    //less than 30 min ago
    else if ($td < 1800){
      //if used
      if ($isUsed == 1) {return false;}
      else{
        return true;
      }
    }


  }

 if (isset($_POST['otpcode'])) {
    submitCode($_POST['otpcode'],"submit");
  }

  if (isset($_REQUEST['resendCode'])){
    submitCode("NAN","resend");
  }
    if (isset($_REQUEST['cooldown'])){
    submitCode("NAN","cooldown");
  }

  if (isset($_REQUEST['resendSuccess'])){
    submitCode("NAN","resendSuccess");
  }



  function submitCode($otpCode,$action) {

      include 'include/config.php';
      $otpCode= preg_replace('/\s+/', '', $otpCode);
      $otpCode = strtoupper($otpCode);
      $accountID = $_SESSION['id'];  
  
      $sql = "sELECT * FROM tbl_token WHERE accountID = '$accountID' ORDER BY timeGen DESC  LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $pass_row = mysqli_fetch_assoc($result);
      $time1 = strtotime("now");
      $time2 = strtotime($pass_row['timeGen']);
      $timeDiff = $time1 - $time2;
      
      if ($action == "submit") {
              
      //more than 5 min ago (expired)
      if ($timeDiff >= 300) {
          echo "<script>";
            echo "Swal.fire({";
              echo "position: 'bottom-end',";
              echo "type: 'warning',";
              echo "title: 'Verification Failed',";
              echo "text: 'Code expired',";
              echo "showConfirmButton: false,";
              echo "timer: 2500,";
              echo "customClass: 'swal-sm'";
            echo "})";
          echo "</script>";
      }



      //less than 30 min ago
      else if ($timeDiff <= 300){ 
        //if used
        if ($pass_row['used'] == 1) {
          echo "<script>";
            echo "Swal.fire({";
              echo "position: 'bottom-end',";
              echo "type: 'warning',";
              echo "title: 'Verification Failed',";
              echo "text: 'Code Expired',";
              echo "showConfirmButton: false,";
              echo "timer: 1700,";
              echo "customClass: 'swal-sm'";
            echo "})";
          echo "</script>";
        }

        //equal and not used
        else if ($otpCode==$pass_row['token'] && $pass_row['used'] != 1) {

        $tokenID = $pass_row['tokenID'];
        $sql = "uPDATE tbl_token set used = '1' where tokenID =  $tokenID ";
        mysqli_query($conn, $sql);

          echo "<script>";
            echo "Swal.fire({";
              echo "position: 'bottom-end',";
              echo "type: 'success',";
              echo "title: 'nice',";
              echo "showConfirmButton: false,";
              echo "timer: 1700,";
              echo "customClass: 'swal-sm'";
            echo "})";
          echo "</script>";
       }
        else{
          echo "<script>";
            echo "Swal.fire({";
              echo "position: 'bottom-end',";
              echo "type: 'warning',";
              echo "title: 'Verification Failed',";
              echo "text: 'Code don\'t match',";
              echo "showConfirmButton: false,";
              echo "timer: 1700,";
              echo "customClass: 'swal-sm'";
            echo "})";
          echo "</script>";
        }
      }
    }

    else if ($action == "resend") {

      if ($timeDiff >= 180 || $pass_row['used'] > 0) {
        unset($_SESSION["token"]);
        $_SESSION["token"] = generateNumericOTP(6);

        $timeStamp = date("Y-m-d H:i:s");
        $accID = $_SESSION['id'];
        $token  = $_SESSION['token'];
        $sql = "Insert into tbl_token (token, accountID, timeGen) 
        values ('$token','$accID','$timeStamp')";
        mysqli_query($conn, $sql);

        echo "<script>";
          echo "Swal.fire({";
            echo "position: 'bottom-end',";
            echo "type: 'success',";
            echo "title: 'resent',";
            echo "showConfirmButton: false,";
            echo "timer: 1700,";
            echo "customClass: 'swal-sm'";
          echo "})";


        echo "</script>";




  include 'include/htmlEmailTemplate.php';

  $mail = new PHPMailer(true);

  $sql = "select * from settings";
  $result2 = mysqli_query($conn, $sql);
  $resRow= mysqli_fetch_assoc($result2);

  if ($resRow['isBodySimple']) {
    $emailBody = $simpleBody;
  }

  else{
    $emailBody = $Body;
  }

  try {
    $mail->isSMTP();   
    $mail->Host       = 'smtp.gmail.com';    
    $mail->SMTPAuth   = true;
    $mail->Username   = uEMAIL;
    $mail->Password   = ePASSWORD;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->setFrom(uEMAIL, 'PPH');
    $mail->isHTML(true);
    $mail->Subject = 'Verification ( OTP )';

    $mail->addAddress($_SESSION['userEmail'],$_SESSION['lname']); 
    $mail->Body    = $emailBody;
    
    $mail->send();
            header('Location: verification.php?resendSuccess');
        exit();
  } 

  catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }


      }

      else if ($timeDiff < 180){ 
        header('Location: verification.php?cooldown');
      }
    }
        else if ($action == "cooldown") {
      $formatedTimeDiff=date("i:s",(180-$timeDiff));
        echo "<script>";
          echo "Swal.fire({";
            echo "position: 'bottom-end',";
            echo "type: 'warning',";
            echo "title: 'Please try again after $formatedTimeDiff',";
            echo "showConfirmButton: false,";
            echo "timer: 1200,";
            echo "customClass: 'swal-sm'";
          echo "})";
        echo "</script>";
    }
    else if ($action == "resendSuccess") {
      echo "<script>";
          echo "Swal.fire({";
            echo "position: 'bottom-end',";
            echo "type: 'success',";
            echo "title: 'Success',";
            echo "text: 'Code Resent',";
            echo "showConfirmButton: false,";
            echo "timer: 1700,";
            echo "customClass: 'swal-sm'";
          echo "})";
        echo "</script>";
    }


  }  
 
function isItGoodToSend($token,$id)
{
    include 'include/config.php';
    $token = strtoupper($token);
    $accountID = $_SESSION['id'];  
    
    $sql = "sELECT * FROM tbl_token WHERE accountID = '$accountID' ORDER BY timeGen DESC  LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $pass_row = mysqli_fetch_assoc($result);
    $time1 = strtotime("now");
    $time2 = strtotime($pass_row['timeGen']);
    $timeDiff = $time1 - $time2;

    if ($pass_row['used']==0||$timeDiff>180) {
      return true;
    }
    else {
      return false;
    }
}
?>

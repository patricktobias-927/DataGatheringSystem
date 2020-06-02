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
        <!-- InputMask -->
        <script src="include/plugins/moment/moment.min.js"></script>
        <script src="include/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>


        <title>
            <?php echo SCHOOL_ABV ."  | PRISM"?>
        </title>
    <link rel="shortcut icon" href="assets/imgs/favicon.ico">
        

</head>

<body>
	<div class=" main">

		<div class="row navbar" style="margin-top: -10px;">
			<div class="col-sm-8" style="padding-left: 30px;">
			<img class="img-school-logo " src="<?php echo SCHOOL_LOGO_PATH ?>" style="border-radius: 50%; width: 70px; height: 70px; margin-top: -10px;">
			<span class="lbl-school-name"><b><?php echo SCHOOL_NAME; ?></b></span>
			</div>
			<div class="col-sm-4">
				<form  action="index.php" method="post">
          <div class="row">
              <div class="col-sm-5">
                <label for="log-number" class="log-label">Mobile Number</label>
                <input placeholder="09xx-xxx-xxxx" type="text" name="number" <?php if(isset($_POST['number'])) echo " value='".$_POST['number']."' ";?> class="form-control numberOnly" id="txtf-lrn"  id="log-number">
              </div>
              <div class="col-sm-5">
                <label for="input-password" class="log-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" id="input-password">
                <a data-toggle="modal" data-target="#modal-default" class="fPassword forgotPassLink" href="#">Forgot Password?</a>
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
<form  action="index.php" method="post" onsubmit="valCheck(this)">
      <div class="container col-lg-10 reg-form"> 

        <div class="row">
          <div class="col-lg-10 signup-label" >Sign Up</div>
          <div class="col-lg-10 signup-sublabel">Sign up to start your session</div>
        </div>
<br>
        <div class="row">
          <div class="col-lg-5">
            <div class="form-group">
              <input value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>"
                name="first-name"required type="text" class="form-control textOnly" placeholder="First Name">
            </div>
          </div>
            
          <div class="col-lg-5">
            <div class="form-group">
              <input value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>"
                name="last-name"required type="text" class="form-control textOnly" placeholder="Last Name">
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

                <input <?php if(isset($_POST['numberSignup']))echo "value='".$_POST['numberSignup']."'"; ?>
                name="numberSignup"  type="text" class=" form-control" placeholder="Mobile Number (09xx-xxx-xxxx)" required="true" data-inputmask='"mask": "0\\999-999-9999    "' data-mask>

              </div>
            </div>
          </div> 
        </div>
        <div class="row">
          <div class="col-lg-10">                <div>
                </div></div>
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
      
                            <div class="col-lg-10">
        
                               <div class="form-group">
                                 <select name="question" class="form-control select2bs4">
                              <option value="invalid" selected="true">------------------- Choose a security question -------------------</option>

<?php 
          $sql = "select * FROM tbl_securityquestions";
           $result1 = mysqli_query($conn, $sql);
            $ctr=0;
              if (mysqli_num_rows($result1) > 0) {
                while($row = mysqli_fetch_array($result1)){
                  echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                }
              }
 ?>
                                 </select>
                               </div>
                            </div>
      
                          </div>
              
                      <div class="row">
                        <div class="col-lg-10">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" title="This will be use on your password reset."><i class="fas fa-question-circle primary" style="width: 14px;" ></i></span>
                              </div>
                              <input autocomplete="off" name="answer" type="text" class="input thisNumber form-control" id="exampleInputEmail1" placeholder="Security Answer" required="true">
                           </div>
                         </div>
                       </div>
                     </div>

        <div class="row">
          <div class="col-sm-10">
            <div class="icheck-primary">
              <input name=icheckbox type="checkbox" id="remember" required <?php if(isset($_POST['remember'])){echo " checked";} ?>>
              <label for="remember" class='lbl-datapolicy' style="font-family: sans-serif; font-weight: normal;">
By clicking 'Submit', I consent to my personal information being used for the 
purpose of providing pre-registration services offered in the ARALinks portal. This includes being able to enter my child's information, update it in case there are records in existence and to be notified via SMS and other means for security confirmations and school announcements,
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


      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
              <form action="forgotpassword.php" method="get" onsubmit=" return forgotNumberValid(this)">
              <div class="modal-header">
                <h4 class="modal-title">Password Recovery</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                     <div class="form-group">
                       <label class="required-field">Mobile Number</label><br>
                       <div class="input-group">
                         <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                          </div>
                         <input value="<?php if(isset($_GET['mobilenr'])){ echo $_GET['mobilenr']; } ?>"
                         name="forgotNumber" required type="text" class="form-control" data-inputmask='"mask": "9999-999-9999"' data-mask>
                        </div>
                      </div> 
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="forgotpass" value="true">Next</button>
              </div>

              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</body>



 <!-- jQuery -->
<script src="include/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- InputMask -->
<script src="include/plugins/moment/moment.min.js"></script>
<script src="include/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<script type="text/javascript">

    $('[data-mask]').inputmask();


function forgotNumberValid(form) {
    var forgotNumber = form.forgotNumber.value;
    forgotNumber = forgotNumber.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
    forgotNumber = $.trim(forgotNumber);


    if (forgotNumber.length <11) {
      $(form.forgotNumber).addClass("is-invalid").removeClass("is-invalid");
      $(form.forgotNumber).attr('title', "Invalid Number");
      $(form.forgotNumber).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
      return false;
    }
  else{
    //return true;
  }

}      


function valCheck(form) {
  var question = form.question.value;
  var answer   = $.trim(form.answer.value);

  if (question=='invalid') {
    $(form.question).addClass("is-invalid").removeClass("is-valid");
    $(form.question).attr('title', "Please select a question");
    $(form.question).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
    event.preventDefault();
  }
  if (answer.length == 0 ) {
    $(form.answer).addClass("is-invalid").removeClass("is-valid");
    $(form.answer).attr('title', "Please answer a question");
    $(form.answer).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
    event.preventDefault();
  }
  else{
    return confirm('Are you sure?')

  }

}

(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));

// Install input filters.
$(".interger").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });
$(".numberOnly").inputFilter(function(value) {
  return /^\d*$/.test(value); });
$("#intLimitTextBox").inputFilter(function(value) {
  return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500); });
$(".decimal").inputFilter(function(value) {
  return /^-?\d*[.]?\d*$/.test(value); });
$("#currencyTextBox").inputFilter(function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
$(".textOnly").inputFilter(function(value) {
  return /^[a-z-' ']*$/i.test(value); });
$(".textOnly2").inputFilter(function(value) {
  return /^[a-z-' '-\.]*$/i.test(value); });
$("#hexTextBox").inputFilter(function(value) {
  return /^[0-9a-f]*$/i.test(value); });

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}




</script>


</html>
<?php
if (isset($_REQUEST['insertsuccess'])) {
    $message = "You\'re now register";
    displayMessage("success", "Success", $message);
    
}

if (isset($_REQUEST['cps'])) {
    $message = "Password Changed";
    displayMessage("success", "Success", $message);
}
if (isset($_REQUEST['mobilenr'])) {
    $message = "This mobile number is not register";
    displayMessage("error", "No Match", $message);
}


if (isset($_POST['login'])) {
    if (strlen($_POST['number']) < 10 || strlen($_POST['number']) > 13) {
        displayMessage("warning", "Invalid Mobile Number", "Please try again ");
        
    } else {
        $_POST['number']   = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['number'])));
        $_POST['password'] = mysqli_real_escape_string($conn, stripcslashes($_POST['password']));
        
        $sql = "select a.* from tbl_parentuser as a where mobile='" . $_POST['number'] . "'";
        
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            
            if ($pass_row = mysqli_fetch_assoc($result)) {
                //$_POST['password'] == $pass_row['password']
                
                $chkpass = password_verify($_POST['password'], $pass_row['password']);

                
                if (!$chkpass) {
                    displayMessage("warning", "Wrong Password", "Please try again ");
                }
                
                elseif ($chkpass == true) {
                    
                    
                    $_SESSION['userID']      = $pass_row['userID'];
                    $_SESSION['first-name']  = $pass_row['fname'];
                    $_SESSION['middle-name'] = $pass_row['mname'];
                    $_SESSION['last-name']   = $pass_row['lname'];
                    $_SESSION['mobile']      = $pass_row['mobile'];
                    $_SESSION['userEmail']   = $pass_row['email'];
                    $_SESSION['usertype']    = $pass_row['usertype'];
                    $_SESSION['gender']       = $pass_row['sex'];
                    $_SESSION['userPass']     = $_POST['password'];
                    $_SESSION['last-time-stamp'] = time();
                    // $timeStamp = date("Y-m-d H:i:s");
                    // $token = generateNumericOTP(6);
                    // $accID = $_SESSION['id']; 
                    // $sql = "Insert into tbl_token (token, accountID, timeGen) 
                    // values ('$token','$accID','$timeStamp')";
                    // mysqli_query($conn, $sql);
                    
                    // $_SESSION['token'] = $token;
                    
                    if ($_SESSION['usertype'] === 'A') {
                        header('Location: u/index.php');
                        exit();
                    } else {
                        header('Location: u/home.php');
                        exit();
                    }
                    
                }
            }
            
            else {
                header('Location: index2.php?tryagain');
                exit();
            }
        } else {
            displayMessage("warning", "This phone number is not registered", "Please try again");
        }
        
    }
}
if (isset($_POST['Signup'])) {
    if (strlen(cleanThis($_POST['numberSignup'])) < 11) {
        $message = "Mobile number is invalid";
        displayMessage("error", "Invalid Entry", $message);
    } elseif ($_POST['pass1'] != $_POST['pass2']) {
        $message = "Password mismatch";
        displayMessage("error", "Invalid Entry", $message);
    }
    elseif (strlen(strtok($_POST['email'], '@'))<7) {
        $message = "Invalid Email";
        displayMessage("error", "Invalid Entry", $message);
    } 
    
    
    else {


        
        $_POST['first-name']   = mysqli_real_escape_string($conn, stripcslashes($_POST['first-name']));
        $_POST['last-name']    = mysqli_real_escape_string($conn, stripcslashes($_POST['last-name']));
        $_POST['email']        = mysqli_real_escape_string($conn, stripcslashes($_POST['email']));
        $_POST['numberSignup'] = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['numberSignup'])));
        $_POST['pass1']        = mysqli_real_escape_string($conn, stripcslashes($_POST['pass1']));
        $_POST['question']     = mysqli_real_escape_string($conn, stripcslashes($_POST['question']));
        $_POST['answer']       = mysqli_real_escape_string($conn, stripcslashes($_POST['answer']));
        $hashedPassword = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
        if (isset($_POST['r1'])) {
            if ($_POST['r1'] == "male") {
                $gender = "Male";
                ;
            } else {
                $gender = "Female";
            }
            
        }
        $sql = "select a.* from tbl_parentuser as a where mobile='" . $_POST['numberSignup'] . "'";
        
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            
            $message = "This mobile number is already registered";
            displayMessage("error", "Invalid Entry", $message);
            
        } else {
            
            
            $insertQuery = "Insert into tbl_parentuser
(
fname,
lname,
mobile,
sex,
email,
password,
isEnabled,
userType,
sqID,
sqAnswer


) 
VALUES 
(

'" . $_POST['first-name'] . "',
'" . $_POST['last-name'] . "',
'" . $_POST['numberSignup'] . "',
'$gender',
'" . $_POST['email'] . "',
'" . $hashedPassword . "',
'1',
'P',
'" . $_POST['question'] . "',
'" . $_POST['answer'] . "'

)";
            
            mysqli_query($conn, $insertQuery);
            echo "<script>window.location.href='index.php?registered';</script>";
            exit;
            
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
    echo "</script>";
    
}

if (isset($_REQUEST['logout'])) {
    session_destroy();
    // echo "<script>";
    //   echo "Swal.fire({";
    //     echo "html: 'Logged out',";
    //     echo "type: 'info',";
    //     echo "title: 'Information',";
    //     echo "showConfirmButton: false,";
    //     echo "timer: 2700,";
    //     echo "customClass: 'swal-sm'";
    //   echo "});";
    // echo "</script>";
    
}


?>
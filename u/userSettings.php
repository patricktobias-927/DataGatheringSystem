<!DOCTYPE html>

<?php
  require '../include/config.php';
  require 'assets/fonts.php';
  require 'assets/generalSandC.php';
  require 'assets/adminlte.php';
  require '../include/schoolConfig.php';
  require 'assets/scipts/phpfunctions.php';
  $page="AccountSettings";

// $_SESSION['userID']     
// $_SESSION['first-name'] 
// $_SESSION['middle-name']
// $_SESSION['last-name']  
// $_SESSION['usertype']        
// $_SESSION['userEmail']  
// $_SESSION['schoolID']   
// $_SESSION['userType']  
// $_SESSION['gender'] 
// $_SESSION['mobile']

  session_start();
  $user_check = $_SESSION['userID'] ;
  $levelCheck = $_SESSION['usertype'];
  if(!isset($user_check) && !isset($password_check))
  {
    session_destroy();
    header("location: ../index.php");
  }
  else if ($levelCheck=='A'){
    header("location: index.php"); 
  }
?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Settings | PRISM</title>

  <link rel="stylesheet" type="text/css" href="assets/css/css-home.css">
    <script type="text/javascript" src="../include/plugins/sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../include/plugins/sweetalert2/sweetalert2.min.css">

  <link rel="stylesheet" href="../include/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" type="text/css" href="assets/css/css-studentinfo.css">


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

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- nav bar & side bar -->
<?php 
require 'includes/navAndSide2.php';
?>
<!-- nav bar & side bar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title"><?php echo "Edit Information"?></h5>
<form action="" method="post" >
<br>
        <div class="row">
          <div class="col-lg-5">
            <div class="form-group">
              <input value="<?php echo $_SESSION['first-name']  ?>"
                name="first-name"required type="text" class="form-control textOnly" placeholder="First Name">
            </div>
          </div>
            
          <div class="col-lg-5">
            <div class="form-group">
              <input value="<?php echo $_SESSION['last-name'] ?>"
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
                <input value="<?php echo $_SESSION['mobile']  ?>"
                name="numberSignup"  type="text" class=" form-control" placeholder="Mobile Number" required="true" data-inputmask='"mask": "9999-999-9999    "' data-mask>
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
                <input <?php echo "value='".$_SESSION['userEmail']. "'"; ?> name="email" type="email" class="input thisNumber form-control" id="exampleInputEmail1" placeholder="Email Address" required="true">
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
                <input name="pass1" type="password" class="input form-control" required="true" placeholder="Enter Old Password">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-10">
            <div class="form-group clearfix" > 
              <label class="genderform">Gender</label><br>
      
              <div class="icheck-primary d-inline">
                  <input <?php if(strtolower(trim($_SESSION['gender']))==="female") echo 'checked'; ?>
                  value="female" type="radio" id="radioPrimary2" name="r1" checked>
                  <label for="radioPrimary2">Female
                  </label>
              </div>&nbsp
      
              <div class="icheck-primary d-inline">
                 <input <?php if(strtolower(trim($_SESSION['gender']))==="male") echo 'checked'; ?>
                 value="male" type="radio" id="radioPrimary1" name="r1" >
                 <label for="radioPrimary1">Male
                 </label>
              </div>
      
            </div> 
          </div>
        </div>

              </div> <div class="card-footer"> <button class="btn btn-primary"
name="editThis" value="editThis" type="submit">Save</button> </form> </div>
</div><!-- /.card --> 

</div>
        <div class="col-lg-6">
<div class="card card-danger card-outline">
              <div class="card-body">
                <h5 class="card-title"><?php echo "Change Password"?></h5>
<form action="" method="post" >
<br>
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                </div>
                <input name="epassO" type="password" class="input form-control" required="true" placeholder="Enter Old Password">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                </div>
                <input name="epass1" type="password" class="input form-control" required="true" placeholder=" New Password">
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                </div>
                <input name="epass2" type="password" class="input form-control" required="true" placeholder="Re-Type New Password">
              </div>
            </div>
          </div>
        </div>
                      </div> <div class="card-footer"> <button class="btn btn-primary"
name="editPass" value="editPass" type="submit">Save</button> </form> </div>
</div><!-- /.card --> 
</form>
</div>
</div>

</div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- ./wrapper -->



<?php 

require 'assets/scripts.php';

?>
<!-- customize scripts -->
<script src="../include/plugins/datatables/jquery.dataTables.js"></script>

<script src="../include/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

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

$(document).ready(function() {
    $('#example1').DataTable( {
        "scrollX": true,
    } );
} );

$(document).ready(function() {
    $('.yearselect').select2();
});
$(document).on("click", ".delete", function() {
    var x = $(this).attr('value');
    var row = $(this).attr('rowIdentifier');

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
                swal.fire("Done!", "It was succesfully deleted!", "success");
                $("#"+row).css({ "background-color": "#FACFCB"},"slow").delay( 200 ).animate({ opacity: "hide" }, "slow");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal.fire("Error deleting!", "Please try again", "error");
            }
        });
  }
})
});

$(document).on("click", ".submit", function() {
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
                $("#"+badge).addClass('badge-info').removeClass('badge-danger').text('Submitted') ;
                $("#delete"+ctr).delay( 100 ).animate({ opacity: "hide" }, "slow");
                $("#submit"+ctr).delay( 100 ).animate({ opacity: "hide" }, "slow");
                $("#view"+ctr).text('View') ;

                swal.fire("Submitted", "It was succesfully stored to the database!", "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal.fire("Error submitting!", "Please try again", "error");
            }
        });
  }
})
});


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


// validations





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
<?php 
if (isset($_POST['editPass'])) {
  if ($_POST['epassO'] != $_SESSION['userPass']) {
        $message = "Incorrect Password";
        $title = "Invalid Entry";
        $type = "error";
        header('Location: userSettings.php?title='.$title.'&type='.$type.'&message='.$message);
    }
  elseif (strlen($_POST['epass1'])<6){
    $message = "Password is too weak";
    $title = "Invalid Entry";
    $type = "error";
    header('Location: userSettings.php?title='.$title.'&type='.$type.'&message='.$message);
  }
  elseif ($_POST['epass1']!=$_POST['epass2']){
    $message = "Password mismatch";
    $title = "Invalid Entry";
    $type = "error";
    header('Location: userSettings.php?title='.$title.'&type='.$type.'&message='.$message);
  }
  else{
            $insertQuery = "update tbl_parentuser
set
password = '" . $_POST['epass1'] . "'
where userID =".$_SESSION['userID']."

";
     
 $_SESSION['userPass']   = $_POST['epass1'];
 
            mysqli_query($conn, $insertQuery);
            $message = "Password Changed";
            $title = "Success";
            $type = "success";
            header('Location: userSettings.php?title='.$title.'&type='.$type.'&message='.$message);
  }

}
if (isset($_POST['editThis'])) {
    if (strlen(cleanThis($_POST['numberSignup'])) < 11) {
        $message = "Mobile number is invalid";
        $title = "Invalid Entry";
        $type = "error";
        header('Location: userSettings.php?title='.$title.'&type='.$type.'&message='.$message);
    } elseif ($_POST['pass1'] != $_SESSION['userPass']) {
        $message = "Incorrect Password";
        $title = "Invalid Entry";
        $type = "error";
        header('Location: userSettings.php?title='.$title.'&type='.$type.'&message='.$message);
    }
    
    else {
        $notEdited = false;
        $_POST['first-name']   = mysqli_real_escape_string($conn, stripcslashes($_POST['first-name']));
        $_POST['last-name']    = mysqli_real_escape_string($conn, stripcslashes($_POST['last-name']));
        $_POST['email']        = mysqli_real_escape_string($conn, stripcslashes($_POST['email']));
        $_POST['numberSignup'] = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['numberSignup'])));
        $_POST['pass1']        = mysqli_real_escape_string($conn, stripcslashes($_POST['pass1']));
        if (isset($_POST['r1'])) {
            if ($_POST['r1'] == "male") {
                $gender = "Male";
                ;
            } else {
                $gender = "Female";
            }
            
        }
        if ($_POST['numberSignup'] == $_SESSION['mobile']) {
          $notEdited = true;
        }
        $sql = "select a.* from tbl_parentuser as a where mobile='" . $_POST['numberSignup'] . "'";
        
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0 && !$notEdited) {
            
            $message = "This mobile number is already registered";
            $title = "Invalid Entry";
            $type = "error";
            header('Location: userSettings.php?title='.$title.'&type='.$type.'&message='.$message);
            
        } else {
            
            
            $insertQuery = "update tbl_parentuser
set
fname = '" . $_POST['first-name'] . "',
lname = '" . $_POST['last-name'] . "',
mobile = '" . $_POST['numberSignup'] . "',
sex = '$gender',
email = '" . $_POST['email'] . "',
password = '" . $_POST['pass1'] . "',
isEnabled = '1',
userType = 'P'
where userID =".$_SESSION['userID']."

";
     
 $_SESSION['first-name'] =  $_POST['first-name'];
 $_SESSION['last-name']=  $_POST['last-name'] ;
 $_SESSION['mobile']     = $_POST['numberSignup'];
 $_SESSION['userEmail']  = $_POST['email'];
 $_SESSION['userPass']   = $_POST['pass1'] ;
 $_SESSION['gender']    = $gender;
 
            mysqli_query($conn, $insertQuery);
            $message = "Information Changed";
            $title = "Success";
            $type = "success";
            echo $insertQuery;
            header('Location: userSettings.php?title='.$title.'&type='.$type.'&message='.$message);
            
        }
        
        
    }
}

if (isset($_REQUEST['EditSuccess'])) {
    echo "<script>";
    echo "Swal.fire({";
    echo "html: 'Edit Success',";
    echo "type: 'success',";
    echo "title: 'Success',";
    echo "showConfirmButton: false,";
    echo "timer: 2700,";
    echo "customClass: 'swal-sm'";
    echo "});";
    echo "$('#exampleModalCenter').modal('show');</script>";
    
}
if (isset($_REQUEST['ChangeSuccess'])) {
    echo "<script>";
    echo "Swal.fire({";
    echo "html: 'Password Changed',";
    echo "type: 'success',";
    echo "title: 'Success',";
    echo "showConfirmButton: false,";
    echo "timer: 2700,";
    echo "customClass: 'swal-sm'";
    echo "});";
    echo "$('#exampleModalCenter').modal('show');</script>";

}
if (isset($_GET['message'])) {
  displayMessage($_GET['type'], $_GET['title'], $_GET['message']);
}



?>
</body>
</html>

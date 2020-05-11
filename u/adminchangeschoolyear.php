<!DOCTYPE html>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<?php
  require '../include/config.php';
  require 'assets/fonts.php';
  require 'assets/adminlte.php';
  require '../include/config.php';
  $page = "adminchangeschoolyear";
  require 'assets/scipts/phpfunctions.php';
  require 'assets/generalSandC.php';
  require '../include/schoolConfig.php';
  require '../include/getschoolyear.php';
//   session_start();
//   $userID = $_SESSION['userID'];
//   $userFname = $_SESSION['first-name'];
//   $userMname = $_SESSION['middle-name'];
//   $userLname = $_SESSION['last-name'];
//   $userLvl = $_SESSION['usertype'];
//   $userEmail = $_SESSION['userEmail'];
   

//   $user_check = $_SESSION['userID'] ;
//   $levelCheck = $_SESSION['usertype'];
//   if(!isset($user_check) && !isset($password_check))
//   {
//     session_destroy();
//     header("location: ../index.php");
//   }
?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin Change School Year | PRISM</title>

<!-- customize css -->
  <link rel="stylesheet" type="text/css" href="assets/css/hideAndNext.css">
  <!-- sweet alert -->
  <link rel="stylesheet" type="text/css" href="assets/css/css-navAndSlide.css">
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

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">
    
        <!-- nav bar & side bar -->
        <?php
        require 'includes/navAndSide.php';
        ?>

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

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Change School Year	</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin Change School Year</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <form action="" method="POST" enctype="multipart/form-data" class="noEnterOnSubmit">
                <div class="row">
                  <div class="col-lg-2">
                  </div>
                  <div class="col-lg-8">
                    <div class="card-body display nowrap" style="width:100%;border-radius: 25px;
                          border: 2px solid gray;text-align: center">
                       <div class="row mb-4"> <!-- Current School year-->
                          <div class="col-lg-2">
                          </div>
                          <div class="col-lg-8">
                            <?php
                                $sql = "select y.schoolYear,s.currentSchoolYear from tbl_schoolyear y join tbl_settings s on y.schoolYearID = s.currentSchoolYear;";
                                $result=mysqli_query($conn, $sql); //rs.open sql,con
                                while ($row=mysqli_fetch_assoc($result))
                                { ?><!--open of while -->
                                <h4>Current School Year : S.Y. <?php echo $row['schoolYear']; ?></h4><br>
                              <?php
                                } //close of while
                              ?>
                          </div>
                          <div class="col-lg-2">
                          </div>
                       </div> <!-- Current School year-->
                       <div class="row mb-4"> <!-- Table of school year -->
                        <table id="example1" class="table table-striped table-bordered ">	
                            <thead>
                              <tr>
                                <th>School Year</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php

                                  $sql = "select y.schoolYear,(Case when s.currentSchoolYear = y.schoolYearID  
                                  then 'Active' else 'Inactive' end) as Status, y.schoolYearID from tbl_schoolyear y 
                                  left join tbl_settings s on y.schoolYearID = s.currentSchoolYear; ";
                                  $result=mysqli_query($conn, $sql); //rs.open sql,con
                                  $var = 0;
                                while ($row=mysqli_fetch_assoc($result))
                                {  $var = $var + 1 ; ?><!--open of while -->
                                <tr>
                                  <td><?php echo $row['schoolYear']; ?></td>
								                  <td><?php echo $row['Status']; ?></td>
                                  <td class="text-center">
                                        <!-- <button 
                                        type="submit" name="btn-submit" class="btn btn-primary add-button">
                                        <span class=" fas fa-save">&nbsp&nbsp</span>
                                        Active
                                         </button> -->
                                         <?php
                                           if ($row['Status'] == 'Inactive') {
                                            echo'<a class="btn btn-primary btn-sm " href="activateschoolyear.php?page='.$row['schoolYearID'].'">';
                                            // echo'   <i class="fas fa-folder">';
                                            // echo'   </i>';
                                            echo "Activate";
                                            }
                                            echo' </a>';
                                        ?>                                       
                                  </td>
                                </tr>
                                <?php
                                  } //close of while
                                ?>
                            </tbody>
                        </table>
                       </div><!-- Table of school year -->
                       <div class="row mb-2"> <!-- old password-->
                                <div class="col-lg-3">
                                  <label class="unrequired-field">(New) S.Y. From :</label><br>
                                </div>
                                <div class="col-lg-2">
                                  <div class="input-group">
                                      <input 
                                      name="syfrom" id="syfrom"   maxlength="4"
                                      onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                                      type="number"  class="form-control">
                                  </div>
                                </div>
                                <div class="col-lg-1">
                                  <label class="unrequired-field">to :</label><br>
                                </div>
                                <div class="col-lg-2">
                                  <div class="input-group">
                                      <input 
                                      name="syto" id="syto" type="number"   maxlength="4" 
                                      onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                                      class="form-control">
                                  </div>
                                </div>
                                <div class="col-lg-3">
                                        <button 
                                        type="submit" name="btn-submit" class="btn btn-primary add-button">
                                        <span class=" fas fa-save">&nbsp&nbsp</span>Add New
                                        </button>
                                </div>
                                <div class="col-lg-1">
                                </div>
                          </div>
                    </div>
                  </div>
                  <div class="col-lg-2">
                  </div>                  
                </div>
                </form>
            </section>


            
        </div>

    </div>

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
</body>

</html>


<?php 
if (isset($_POST["btn-submit"])) { 
  $_POST['syfrom'] = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['syfrom'])));
  $_POST['syto'] = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['syto'])));
  $newSY = $_POST['syfrom'] . ' - ' . $_POST['syto'];

  if (empty($_POST['syfrom']) || empty( $_POST['syto'])) {
    displayMessage("warning","School Year must not be empty"  ,"Please try again");
  }
  elseif ($_POST['syfrom'] ===  $_POST['syto']) {
    displayMessage("warning","School Year must not be same"  ,"Please try again");
  }
  elseif ($_POST['syfrom'] >  $_POST['syto']) {
    displayMessage("warning","Start of School Year must less than end of School year "  ,"Please try again");
  }
  elseif (($_POST['syto'] - $_POST['syfrom']) != 1) {
    displayMessage("warning","Duration of School must be 1 year "  ,"Please try again");
  }
  else{
    $sql = "select * from tbl_schoolyear where schoolYear='" . $newSY . "'";
        
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      displayMessage("warning", $newSY . " - School Year already exist", "Please try again ");
    }
    else
    {
      $sql = "select schoolYearID from tbl_schoolyear order by schoolYearID desc limit 1;";
      $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          if ($ctr_row = mysqli_fetch_assoc($result)) {
            $newctr = $ctr_row['schoolYearID'] + 1;
            $sql = "insert into tbl_schoolyear (schoolYearID,schoolYear) values(".$newctr.", '" .$newSY. "');";
            $result = mysqli_query($conn, $sql);
            displayMessage("success", " New School Year inserted " , "Success! ");
            echo "<meta http-equiv='refresh' content='0'>";
          }
        }
    }
  }
  
  
}

?>
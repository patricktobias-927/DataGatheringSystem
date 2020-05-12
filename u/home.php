<!DOCTYPE html>

<?php
  require '../include/config.php';
  require 'assets/fonts.php';
  require 'assets/generalSandC.php';
  require 'assets/adminlte.php';
  require '../include/schoolConfig.php';
  $page="home";

// $_SESSION['userID']     
// $_SESSION['first-name'] 
// $_SESSION['middle-name']
// $_SESSION['last-name']  
// $_SESSION['usertype']        
// $_SESSION['userEmail']  
// $_SESSION['schoolID']   
// $_SESSION['userType']   

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

 // $sql = "sELECT a.* FROM tbl_student AS a WHERE a.studentID = '".$studentID."'";
?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo SCHOOL_NAME; ?></title>

  <link rel="stylesheet" type="text/css" href="assets/css/css-home.css">
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
            <h1 class="m-0 text-dark">Home Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <!-- <li class="breadcrumb-item active">Starter Page</li> -->
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
          <div class="col-lg-8">

<!-- <div class="card card-secondary">

<div class="card-header">
     <h3 class="card-title">Welcome! <?php  if($_SESSION['gender']==="Male"){echo "Mr.";} else{echo "Ms.";} echo $_SESSION['last-name'];?> </h3>
     <div class="card-tools">
       <span class="badge badge-warning">v1.00.01</span>
     </div>
   </div> 
  
<img class="col-lg-12" src="../assets/imgs/PrismLogo.jpg">

</div>
</div> -->
<div class="col-md-4">

<!--             <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Exported</span>
                <span class="info-box-number"></span>
              </div>
            </div>
 -->
<!--             <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Submitted</span>
                <span class="info-box-number">163,921</span>
              </div>
            </div> -->

<!--             <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-exclamation"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Un-submitted</span>
                <span class="info-box-number">114,381</span>
              </div>
            </div> -->

          <div class="mb-3">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>WARNING</h3>

                <p>Under Development</p>
              </div>
              <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
              </div>
              <a href="studentEntry.php" class="small-box-footer">
                Click here to View <i  class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>        
            <!-- /.info-box -->
<!--           <div class="mb-3">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Get Started</h3>

                <p>Register a student here</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="studentEntry.php" class="small-box-footer">
                Click here to start <i  class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div> -->

          </div>

          <!-- /.col-md-6 -->
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
</body>
</html>

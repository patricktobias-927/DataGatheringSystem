<!DOCTYPE html>

<?php
  require '../include/config.php';
  require 'assets/fonts.php';
  require 'assets/generalSandC.php';
  require 'assets/adminlte.php';
  require '../include/schoolConfig.php';
  require '../include/getschoolyear.php';
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


  $query = "sELECT (SELECT COUNT(userID) FROM tbl_student WHERE userID = ".$user_check." AND isSubmitted = 1 AND schoolYearID = ".$schoolYearID.") AS submitted,
 (SELECT COUNT(userID) FROM tbl_student WHERE userID = ".$user_check." AND isExported = 1 AND schoolYearID = ".$schoolYearID.") AS exported,
  (SELECT COUNT(userID) FROM tbl_student WHERE userID = ".$user_check." AND (isSubmitted = 0 || schoolYearID != ".$schoolYearID.")) AS draft,
 sex, fname,lname FROM tbl_parentuser WHERE userId =".$user_check;
    $result = mysqli_query($conn,  $query);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        if ($pass_row = mysqli_fetch_array ($result)) {

            $lname       = $pass_row['5']; 
            $gender     = $pass_row['3'];   
            $submitted  = $pass_row['0'];       
            $draft      = $pass_row['2'];   
            if ($gender=="Male") {
              $prefix="Mr.";
            }
            else{
              $prefix="Ms.";
            }

      }
    }
  }

 // $sql = "sELECT a.* FROM tbl_student AS a WHERE a.studentID = '".$studentID."'";
?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo SCHOOL_NAME; ?></title>
  <link rel="shortcut icon" href="../assets/imgs/favicon.ico">

  <link rel="stylesheet" type="text/css" href="assets/css/css-home.css">
  <style type="text/css">
    .small-box{
       box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- nav bar & side bar -->
<?php 
require 'includes/navAndSide2.php';
?>
<!-- nav bar & side bar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
 

<div class="container-fluid ">
  <div class="content">
    <div class="row" style="margin-top: 20px;">
      <div class="col-lg-12" >
        <div class="col-lg-12 bannerprism" style="">
          <br><br>
          <div class="row">
            <div class="col-sm-3" >
              <img class="logo" src="../assets/imgs/prismLogo.png">
            </div>
            <div class="col-sm-6" >
            </div>
            <div class="col-sm-3 " >
              <div class="float-right">
                <a href="studentEntry.php?getstarted" class="btn btn-warning btn-getstarted">
                  Get Started
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7">
        <div class="row">
          <div class="col-lg-12">
            <p class="welcome-lbl">Welcome! <?php echo $prefix." ".$lname; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="small-box" style="padding: 50px 0;">
              <div class="inner" style="text-align: center">
              <div class="">
                <i class="fas fa-check-circle" style="color: #0091BD; font-size: 95px;"></i></br></br></br>
              </div>
                <h3><?php echo $submitted?><sup style="font-size: 20px"></sup></h3>
                <p class="lead" style="color: gray; font-size: 21px;">SUBMITTED</p>
              </div>

            </div>
          </div>
          <div class="col-lg-6">
            <div class="small-box" style="padding: 50px 0;">
              <div class="inner" style="text-align: center">
                <i class="fas fa-inbox" style="color: #FF7A21; font-size: 95px;"></i></br></br></br>
                <h3><?php echo $draft?><sup style="font-size: 20px"></sup></h3>

                <p class="lead" style="color: gray; font-size: 21px;">DRAFT</p>
              </div>


            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
          <div class="col-lg-12" style="padding-top: 4px">
            </br></br>
          </div>
<div class="card addshadow">
              <div class="card-header">
                <h3 class="card-title">Announcements</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2 card-overflow">
<?php 
          $sql = "select * FROM tbl_announcement where dateEnd >= CAST(NOW() AS DATE)";
           $result1 = mysqli_query($conn, $sql);
            $ctr=0;
              if (mysqli_num_rows($result1) > 0) {
                while($row = mysqli_fetch_array($result1)){

                  $announceID   = $row[0];
                  $title        = $row[1];
                  $subtitle     = $row[2];
                  $dateCreated  = date_format(date_create($row[4]),"M d, Y");



                  echo '<li class="item">';
                  echo '<div class="product-img">';
                  echo '<img src="dist/img/default-150x150.png" alt="" class="img-size-50">';
                  echo '</div>';
                  echo '<div class="product-info">';
                  echo '<a href="viewAnnouncement.php?Aid='.$announceID.'" class="product-title">'.$title;
                  echo '<span class="badge badge-warning float-right">'.$dateCreated.'</span></a>';
                  echo '<span class="product-description">'.$subtitle;
                  echo '</span>';
                  echo '</div>';
                  echo '</li>';

                }
              }
              else{
                echo '<br><br><br><div class="col-sm-12">';
                echo '<div class="card card-primary">';
                echo '<div class="card-header">';
                echo '<h3 class="card-title">Notice</h3>';
                echo '</div>';
                echo '<div class="card-body">';
                echo 'There is no announcement at the moment';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
 ?>


                </ul>
              </div>
              <!-- /.card-body -->

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
      </div>
    </div>
  </div>
</div>

  </div>
  <!-- /.content-wrapper -->


<?php 

require 'assets/scripts.php';

?>
</body>
</html>

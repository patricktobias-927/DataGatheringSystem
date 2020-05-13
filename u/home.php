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

  $query = "SELECT (SELECT COUNT(userID) FROM tbl_student WHERE userID = 7 AND isSubmitted = 1 AND schoolYearID = 1) AS submitted,
 (SELECT COUNT(userID) FROM tbl_student WHERE userID = 7 AND isExported = 1 AND schoolYearID = 1) AS exported,
  (SELECT COUNT(userID) FROM tbl_student WHERE userID = 7 AND isSubmitted = 1 AND schoolYearID != 1) AS draft,
 sex, fname,lname FROM tbl_parentuser WHERE userId =7
"

  $name;
  $prefix;
  $submitted;
  $draft;


 // $sql = "sELECT a.* FROM tbl_student AS a WHERE a.studentID = '".$studentID."'";
?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo SCHOOL_NAME; ?></title>

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
          <div class="row">
            <div class="col-sm-3" >
              <img src="../assets/imgs/prismLogo.png">
            </div>
            <div class="col-sm-6" >
            </div>
            <div class="col-sm-3 " >
              <div class="float-right">
                <button class="btn btn-warning "style="position: absolute; right: 4px; bottom: 4px; border-radius: 50px;">
                  Get Started
                </button>
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
            <p class="welcome-lbl">Welcome, Mr. Pangilinan</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="small-box" style="padding: 50px 0;">
              <div class="inner" style="text-align: center">
              <div class="">
                <i class="fas fa-check-circle" style="color: #0091BD; font-size: 85px;"></i></br></br>
              </div>
                <h3>53<sup style="font-size: 20px"></sup></h3>
                <p class="lead" style="color: gray; font-size: 21px;">SUBMITTED</p>
              </div>

            </div>
          </div>
          <div class="col-lg-6">
            <div class="small-box" style="padding: 50px 0;">
              <div class="inner" style="text-align: center">
                <i class="fas fa-inbox" style="color: #FF7A21; font-size: 85px;"></i></br></br>
                <h3>53<sup style="font-size: 20px"></sup></h3>

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
<div class="card">
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
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Class card release
                        <span class="badge badge-warning float-right">May 15, 2020</span></a>
                      <span class="product-description">
                        Moved Schedule because of the Extended community quarantine
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">High School Final Exam
                        <span class="badge badge-warning float-right">December 12, 2020</span></a>
                      <span class="product-description">
                        
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Diploma release
                        <span class="badge badge-warning float-right">September 15, 2020</span></a>
                      <span class="product-description">
                        Incomming 1st year highschool student
                      </span>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Announcement</a>
              </div>
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

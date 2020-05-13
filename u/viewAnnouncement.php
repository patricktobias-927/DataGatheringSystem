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
        	$haveAccess;

  if(!isset($user_check) && !isset($password_check))
  {
    session_destroy();
    header("location: ../index.php");
  }
  else if ($levelCheck=='A'){
    header("location: index.php"); 
  }


  $query = "select * from tbl_announcement where announceID =".$_GET['Aid'];
    $result = mysqli_query($conn,  $query);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_array ($result)) {
        	if (date("Y/m/d")<=date_format(date_create($row[4]),"Y/m/d")) {
                  $announceID   = $row[0];
                  $title        = $row[1];
                  $html         = $row[3];
                  $subtitle     = $row[2];    
                  $dateCreated  = date_format(date_create($row[4]),"M d, Y");
                  $haveAccess=1;

        	}
        	else{
        	 $haveAccess=0;

        	}


      }
    }
    else{
    $haveAccess = 2;

    }
  }

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


<?php 

if ($haveAccess=='2') {
  require 'includes/4042.php';
}
else if($haveAccess=='1'){?>
	<br>
	<div class="container">
		<div class="container-fluid">
			<div class="content">
        <div class="col-lg-12">
<div class="card card-danger card-outline">
              <div class="card-body">
<form action="" method="post" >
<br>
<?php echo html_entity_decode(htmlspecialchars_decode($html));   ?>   

</form>

<?php }
else if ($haveAccess=='0'){
  require 'includes/noAccess2.php';
}

?>


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

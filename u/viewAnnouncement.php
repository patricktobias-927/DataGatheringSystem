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
        	if (date("Y/m/d")<=date_format(date_create($row[5]),"Y/m/d")) {
                  $announceID   = $row[0];
                  $title        = $row[1];
                  $html         = $row[3];
                  $subtitle     = $row[2];    
                  $dateCreated  = date_format(date_create($row[4]),"M d, Y");
                  $haveAccess=1;
                  $startDate    = date_format(date_create($row[6]),"M d, Y");

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
  <title>Announcement | PRIMS</title>
  <link rel="shortcut icon" href="../assets/imgs/favicon.ico">
  <style type="text/css">
    #myBtn {
      border-radius: 50%;

  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: grey; /* Set a background color */
  color: black; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding-top: 10px;
  padding-left: 12px;
  padding-right: 12px;
  font-size: 18px; /* Increase font size */
  zoom: 1;
  filter: alpha(opacity=75);
  opacity: 0.75;
}

#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}
  </style>

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
	<br><br>
	<div class="container">
		<div class="container-fluid">
			<div class="content">
        <div class="col-lg-12">
<div class="card card-dark">
    <div class="card-header">
    <span class="card-title"><span style="font-size: 31px;"><?php echo $title; ?></span></span>
    <div class="card-tools" style="padding-top: 6.5px;">
    <button type="button" class="btn btn-tool float-right" data-card-widget="maximize" style="padding-top: 12px; font-size: 21px;"><i class="fas fa-expand"></i></button>
    <span class="badge badge-warning float-right" style="font-size: 21px;">Posted: <?php echo $startDate; ?></span></a>

  </div>
</div>
              <div class="card-body">
<form action="" method="post" >
<br>
<?php echo html_entity_decode(htmlspecialchars_decode($html));   ?>   
<br>
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

<button onclick="topFunction()" id="myBtn" title="Go to top"><h3><span class="fa fa-arrow-up"></span></h3></button>
<script type="text/javascript">
  //Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
</body>
</html>

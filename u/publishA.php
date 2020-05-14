<!DOCTYPE html>

<?php
  require '../include/config.php';
  require 'assets/fonts.php';
  require 'assets/generalSandC.php';
  require 'assets/adminlte.php';
  require '../include/schoolConfig.php';
  require '../include/getschoolyear.php';
  require '../assets/phpfunctions.php';
  $page="AddAnnouncement";
  

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
  else if ($levelCheck=='P'){
    header("location: home.php"); 
  }



 // $sql = "sELECT a.* FROM tbl_student AS a WHERE a.studentID = '".$studentID."'";
?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Create Announcement | PRISM</title>
  <link rel="shortcut icon" href="../assets/imgs/favicon.ico">

  <link rel="stylesheet" href="../include/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" type="text/css" href="assets/css/css-home.css">
    <!-- daterange picker -->
  <link rel="stylesheet" href="../include/plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="../include/plugins/fontawesome-free/css/all.min.css">
  <!-- sweet alert -->
  <script type="text/javascript" src="../include/plugins/sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../include/plugins/sweetalert2/sweetalert2.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="../include/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../include/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../include/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../include/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../include/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../include/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../include/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../include/dist/css/adminlte.min.css">




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
require 'includes/navAndSide.php';
?>
<!-- nav bar & side bar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
 

<div class="container-fluid ">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Announcement Creation
                <small></small>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <form  method="post">

                  <div class="row">
                          <div class="col-lg-4">  
                            <div class="form-group">
                              <label class="unrequired-field">Title</label>
                              <input value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>"
                              name="title" id="title" type="text" class="form-control" placeholder="">
                            </div>
                          </div>
                          <div class="col-lg-4">  
                            <div class="form-group">
                              <label class="unrequired-field">Subtitle</label>
                              <input value="<?php echo isset($_POST['subtitle']) ? $_POST['subtitle'] : '' ?>"
                              name="subtitle" type="text" class="form-control" placeholder="">
                            </div>
                          </div>
                   </div>

                   <div class="row">
                    <div class="col-lg-4">
                <div class="form-group">
                  <label>Date range button:</label>

                  <div class="input-group">
                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> Date range picker
                      <i class="fas fa-caret-down"></i>
                    </button>
                  </div>
                </div>
                </div>
                          <div class="col-lg-4">  
                            <div class="form-group">
                              <label class="unrequired-field">Start Date</label>
                          <input type="text" name="startdate" class="form-control" readonly="true" id="startdate">
                            </div>
                          </div>
                          <div class="col-lg-4">  
                            <div class="form-group">
                              <label class="unrequired-field">End Date</label>
                          <input type="text" name="enddate" class="form-control" readonly="true" id="enddate">
                            </div>
                          </div>

                   </div>





      





              <div class="mb-3">
                <textarea value="" name="htmlcode" class="textarea" 
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php if(isset($_POST['htmlcode'])){
                  echo htmlentities($_POST['htmlcode']);
                } 
                ?></textarea>
              </div>
              <button type="submit" class="btn btn-primary float-right" name="gothis">Create</button>
              </form>

            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
 
</div>

  </div>
  <!-- /.content-wrapper -->


<?php 

require 'assets/scripts.php';

if (isset($_POST['gothis'])) {
  echo "<script>$('#summernote').summernote('codeview.toggle');</script>";
  $_POST['title'] = mysqli_real_escape_string($conn, stripcslashes($_POST['title']));
  $_POST['startdate'] = mysqli_real_escape_string($conn, stripcslashes($_POST['startdate']));
  $_POST['enddate'] = mysqli_real_escape_string($conn, stripcslashes($_POST['enddate']));
  $newDateStart = date('Y-m-d', strtotime($_POST['startdate']));
  $newDateEnd = date('Y-m-d', strtotime($_POST['enddate']));

  $_POST['subtitle'] = mysqli_real_escape_string($conn, stripcslashes($_POST['subtitle']));
  $_POST['htmlcode'] = mysqli_real_escape_string($conn, stripcslashes($_POST['htmlcode']));
    $htmlcode = htmlentities(htmlspecialchars($_POST['htmlcode']));
    //echo html_entity_decode(htmlspecialchars_decode($htmlcode));
  if (strlen(trim($_POST['startdate']))<3) {
    displayMessage("warning","Range Date Invalid","Please try again");
  }
  else{
 $insertQuery = "Insert into tbl_announcement
 (
 title,
 subtitle,
 htmlcode,
 dateCreated,
 dateEnd,
 dateStart,
 userID
 ) 
 VALUES 
 (
  '".$_POST['title'] ."',
  '".$_POST['subtitle']."',
  '".$htmlcode."',
  now(),
  '".$newDateEnd."',
  '".$newDateStart."',
  '".$_SESSION['userID']  ."'



 )";      
mysqli_query($conn, $insertQuery); 
displayMessage("success","Success","Announcement has been made");
  }




}
?>
<!-- Summernote -->
<script src="../include/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
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
<script src="../include/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script><script>

  $(function () {

$('.textarea').summernote({
toolbar: [
  ['style', ['style']],
  ['font', ['bold', 'underline', 'clear']],
  ['fontname', ['fontname']],
  ['color', ['color']],
  ['para', ['ul', 'ol', 'paragraph']],
  ['table', ['table']],
  ['insert', ['link']],
  ['view', ['fullscreen', 'codeview', 'help']],
]
});
  })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        },
        startDate: moment().subtract(29, 'days'),
        minDate:new Date(),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        $('#startdate').val(start.format('MMMM D, YYYY'))
        $('#enddate').val(end.format('MMMM D, YYYY'))
      }
    )


</script>
<script type="text/javascript">

</script>
</body>
</html>

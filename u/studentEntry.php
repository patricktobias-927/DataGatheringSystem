<!DOCTYPE html>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<?php
  require '../include/config.php';
  require 'assets/fonts.php';
  require 'assets/adminlte.php';
  require '../include/config.php';
  $page = "studentEntry";
  require 'assets/scipts/phpfunctions.php';
  require 'assets/generalSandC.php';
  require '../include/schoolConfig.php';
  require '../include/getschoolyear.php';
  session_start();
  $userID = $_SESSION['userID'];
  $userFname = $_SESSION['first-name'];
  $userMname = $_SESSION['middle-name'];
  $userLname = $_SESSION['last-name'];
  $userLvl = $_SESSION['usertype'];
  $userEmail = $_SESSION['userEmail'];
   

  $user_check = $_SESSION['userID'] ;
  $levelCheck = $_SESSION['usertype'];
  if(!isset($user_check) && !isset($password_check))
  {
    session_destroy();
    header("location: ../index.php");
  }
?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Registration | PRISM</title>
  <link rel="shortcut icon" href="../assets/imgs/favicon.ico">

<!-- customize css -->
  <link rel="stylesheet" type="text/css" href="assets/css/hideAndNext.css">
  <link rel="stylesheet" type="text/css" href="assets/css/css-navAndSlide.css">
  <!-- sweet alert -->
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
require 'includes/navAndSide2.php';
?>
<!-- nav bar & side bar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Student Entry List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <p>
              <span class="h2">Students for this School Year</span>

              <a href="?" type="button" class="btn btn-success add-button buttonDelete ">
                <span class="fa fa-undo  ref-btn ref-btn2" aria-hidden="true">&nbsp&nbsp</span>Refresh
                </a>&nbsp&nbsp
                <button 
                data-toggle="modal" data-target="#addstudentmodal"
                type="button" class="btn btn-primary add-button">
                <span class=" fa fa-plus-square">&nbsp&nbsp</span>Add Student
                </button>
              </p>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="width: 100%;">
              <table id="example1" class="table table-bordered" style="table-layout: fixed; width: 100%;">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Code</th>
                  <th>LRN</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
          <?php 

          $sql = "select a.Firstname, a.Lastname, a.Middlename, a.studentCode, a.LRN, a.studentID, a.isSubmitted, a.isExported, a.schoolYearID, b.schoolYear  FROM tbl_student as a inner join tbl_schoolyear as b on a.schoolYearID = b.schoolYearID where userID =".$userID." AND b.schoolyearid = ".$schoolYearID;
           $result1 = mysqli_query($conn, $sql);
            $ctr=0;
              if (mysqli_num_rows($result1) > 0) {
                while($row = mysqli_fetch_array($result1)){
                  $status='';$haveStudentCode='';
          echo"<tr class='tRow' id='row".$ctr."'>";
                  echo"<td><h5>";
                    echo ucwords(combineName($row[0],$row[1],$row[2]));
                  echo"</h5></td>";
                  echo"<td id='studCode".$ctr."'><h6 >";
                    echo $row[3];
                  echo"</h6></td>";
                  echo"<td><h6>";
                    echo $row[4];
                  echo"</h6></td>";


                  if ($row['isSubmitted']&&$row['schoolYearID']==$schoolYearID) {
                    echo '<td class="text-center" title="Your information has been save."><h3><span class="badge badge-info">Registered</span></h3></td>';
                    $status = '2';
                  }
                  else{
                    echo '<td class="text-center" title="Press submit to confirm your registration."><h3><span id="badge'.$ctr.'" class=" badge badge-danger">Pending Registration</span></h3></td>';
                    $status = '3';
                  }

                  if ($status==1||$status==2) {
                   echo'   <td class="text-center">';
                   echo'       <a class="btn btn-primary btn-sm " href="viewDetails.php?page='.$row[5].'">';
                   echo'           <i class="fas fa-folder">';
                   echo'           </i>';
                   echo'           View';
                   echo'       </a>';
                   echo'   </td>';
                  }
                  else{
                  echo"</td>";
                   echo'   <td class="text-center">';
                   echo'       <a class="btn btn-primary btn-sm "  href="viewDetails.php?page='.$row[5].'">';
                   echo'           <i class="fas fa-folder">';
                   echo'           </i>';
                   echo'           <span id="view'.$ctr.'">View/Edit<span>';
                   echo'       </a>';
                   echo'       <a class="btn btn-success btn-sm submit " id="submit'.$ctr.'" ctrIdentifier="'.$ctr.'" badgeIdentifier="badge'.$ctr.'" href="#" value="'.$row[5].'">';
                   echo'           <i class="fas fa-check-square">';
                   echo'           </i>';
                   echo'           Register';
                   echo'       </a>';
                   echo'       <a href="#" class="btn delete btn-sm btn-danger" id="delete'.$ctr.'" rowIdentifier="row'.$ctr.'"  value="'.$row[5].'" >';
                   echo'           <i class="fas fa-trash">';
                   echo'           </i>';
                   echo'           Delete';
                   echo'       </a>';
                   echo'   </td>';
                   }

                  
          echo"</tr>";
                    $ctr++;

                }
              }

              else{
                echo "<script> swal('error'); </script>";
              }


          ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    <!-- /.content -->
<?php           $sql = "select a.Firstname, a.Lastname, a.Middlename, a.studentID, a.schoolYearID, b.schoolYear  FROM tbl_student as a inner join tbl_schoolyear as b on a.schoolYearID = b.schoolYearID where userID =".$userID." AND b.schoolyearid < ".$schoolYearID;
           $result1 = mysqli_query($conn, $sql);
            $ctr=0;
              if (mysqli_num_rows($result1) > 0) {?>
      <!-- Default box -->
          <div class="card col-xl-12 " >
            <div class="card-header">
              <h2>Previously Registered Students</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="width: 100%;">
              <table id="example1" class="table table-bordered" style="table-layout: fixed; width: 100%;">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Code</th>
                  <th>LRN</th>
                  <th>School Year Applied</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody id="p_scents">
          <?php 




                while($row = mysqli_fetch_array($result1)){
                  $status='';$haveStudentCode='';
          echo"<tr class='tRow' id='row".$ctr."'>";
                  echo"<td><h5>";
                    echo ucwords(combineName($row[0],$row[1],$row[2]));
                  echo"</h5></td>";
                  echo"<td><h6 >";
                    echo $row[3];
                  echo"</h6></td>";
                  echo"<td><h6>";
                    echo $row[4];
                  echo"</h6></td>";




                    echo '<td class="text-center"><h3>S.Y. '.$row['schoolYear'].'</h3></td>';

                   echo'   <td class="text-center">';
                   echo'       <a class="btn btn-warning btn-sm " value="'.$row['studentID'].'" id="copyData" ctrIdentifier="'.$ctr.'">';
                   echo'           <i class="fas fa-copy">';
                   echo'           </i>';
                   echo'           Copy Data';
                   echo'       </a>';
                   echo'   </td>';


                  
          echo"</tr>";
                    $ctr++;

                }

?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <?php               }


          ?>




  </div>
  <!-- /.content-wrapper -->


    </section>





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


<!-- Modal -->
<div class="modal  fade" id="addstudentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLongTitle">New Student Form</h2><span style="color: red;">* Required</span>
          </div>

          <div class="modal-body"  style="background-color: #D3D3D3 ">
            <div class="callout callout-info" id="next-stud-card">
      
              <form onsubmit="return lastValidation()" method="POST" enctype="multipart/form-data" class="noEnterOnSubmit">
              <a class="modal-myheading">Student Information</a>
              <br><!-- Spaceing --><br>
               
      
                      <div class="row">
                        
                            <div class="col-lg-4">
                              <div class="form-group" >
                                <label class="unrequired-field">Student Code</label><br>
                                <div class="input-group">
                                  <input title="We will fill this up for you" value="<?php echo isset($_POST['student-code']) ? $_POST['student-code'] : '' ?>"
                                  name="student-code" type="text" class="form-control">
                                 </div>
                               </div>
                              </div>
      
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label class="unrequired-field">LRN</label><br>
                                <div class="input-group">
                                  <input value="<?php echo isset($_POST['student-lrn']) ? $_POST['student-lrn'] : '' ?>"
                                  name="student-lrn" type="text" class="form-control" data-inputmask='"mask": " 999999999999    "' data-mask>
                                 </div>
                               </div>
                              </div>
      
                            <div class="col-lg-4">
      
                              <div class="form-group clearfix"> 
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
      
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label name="first-name-lbl" class="required-field">First Name</label>
                              <input value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>"
                              name="first-name" required type="text" class="form-control textOnly">
                            </div>
                          </div>
      
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label name="first-name-lbl"  class="unrequired-field">Middle Name</label>
                              <input value="<?php echo isset($_POST['middle-name']) ? $_POST['middle-name'] : '' ?>"
                              name="middle-name"type="text" class="form-control textOnly">
                            </div>
                          </div>
      
                          <div class="col-lg-4">
                            <div name="middle-name-lbl"  class="form-group">
                              <label class="required-field">Surname/Last Name</label>
                              <input value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>"
                              name="last-name"required type="text" class="form-control textOnly">
                            </div>
                          </div>
      
                      </div>
      
                        <div class="row">
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label name="last-name-lbl" class="unrequired-field ">Suffix</label>
                              <input value="<?php echo isset($_POST['suffix']) ? $_POST['suffix'] : '' ?>"
                              name="suffix" type="text" class="form-control textOnly" placeholder="E.g: Jr, Sr">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="unrequired-field">Complete Address</label>
                              <input value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"
                              name="address" type="text" class="form-control ">
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label class="unrequired-field ">City</label>
                              <input value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>"
                              name="city" type="text" class="form-control textOnly">
                            </div>
                          </div>
      
<!--                           <div class="col-lg-3">
                            <div class="form-group">
                              <label class="unrequired-field">Student Phone Number</label><br>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                 </div>
                                <input value="<?php echo isset($_POST['student-phone']) ? $_POST['student-phone'] : '' ?>"
                                name="student-phone" type="text" class="form-control" data-inputmask='"mask": "999-99-99    "' data-mask>
                               </div>
                             </div>
                            </div>    
              
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label class="unrequired-field">Student Mobile Number</label><br>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                 </div>
                                <input value="<?php echo isset($_POST['student-mobile']) ? $_POST['student-mobile'] : '' ?>"
                                name="student-mobile" type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                               </div>
                             </div>  
                            </div>  -->
                        </div>
                        
                      <div class="row">
      

      
                          <div class="col-lg-4">
                            <div class="form-group">
                               <label class="unrequired-field">Birthdate</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input value="<?php echo isset($_POST['birthdate']) ? $_POST['birthdate'] : '' ?>"
                                name="birthdate" id="datemask2" type="text" class="form-control" data-inputmask-alias="datetime"data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                              </div>
                            </div>
                          </div>
      
                          <div class="col-lg-4">  
                            <div class="form-group">
                              <label class="unrequired-field">Birthplace</label>
                              <input value="<?php echo isset($_POST['birthplace']) ? $_POST['birthplace'] : '' ?>"
                              name="birthplace" type="text" class="form-control" placeholder="">
                            </div>
                          </div>

                                                    <div class="col-lg-3">
      
                           <div class="form-group">
                             <label class="unrequired-field">Incoming Level</label>
                             <select name="inComingLevel" class="form-control select2bs4 ">
                              <?php 
                              if (isset($_POST['inComingLevel'])){?>
                              <option <?php if($_POST['inComingLevel']=="Nursery 1") {echo' selected ="true"';}?>value="Nursery 1">Nursery 1</option>
                              <option <?php if($_POST['inComingLevel']=="Nursery 2") {echo' selected ="true"';}?>value="Nursery 2">Nursery 2</option>
                              <option <?php if($_POST['inComingLevel']=="Kinder 1") {echo' selected ="true"';}?>value="Kinder 1">Kinder 1</option>
                              <option <?php if($_POST['inComingLevel']=="Kinder 2") {echo' selected ="true"';}?>value="Kinder 2">Kinder 2</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 1") {echo' selected ="true"';}?>value="Grade 1">Grade 1</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 2"){echo' selected ="true"';}?>value="Grade 2">Grade 2</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 3"){echo' selected ="true"';}?>value="Grade 3">Grade 3</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 4"){echo' selected ="true"';}?>value="Grade 4">Grade 4</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 5"){echo' selected ="true"';}?>value="Grade 5">Grade 5</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 6"){echo' selected ="true"';}?>value="Grade 6">Grade 6</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 7"){echo' selected ="true"';}?>value="Grade 7">Grade 7</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 8"){echo' selected ="true"';}?>value="Grade 8">Grade 8</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 9"){echo' selected ="true"';}?>value="Grade 9">Grade 9</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 10") {echo' selected ="true"';}?>value="Grade 10">Grade 10</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 11") {echo' selected ="true"';}?>value="Grade 11">Grade 11</option>
                              <option <?php if($_POST['inComingLevel']=="Grade 12") {echo' selected ="true"';}?>value="Grade 12">Grade 12</option>

                             <?php }
                              else{  ?>
                              ?>
                              <option value="Nursery 1">Nursery 1</option>
                              <option value="Nursery 2">Nursery 2</option>
                              <option value="Kinder 1">Kinder 1</option>
                              <option value="Kinder 2">Kinder 2</option>
                              <option value="Grade 1">Grade 1</option>
                              <option value="Grade 2">Grade 2</option>
                              <option value="Grade 3">Grade 3</option>
                              <option value="Grade 4">Grade 4</option>
                              <option value="Grade 5">Grade 5</option>
                              <option value="Grade 6">Grade 6</option>
                              <option value="Grade 7">Grade 7</option>
                              <option value="Grade 8">Grade 8</option>
                              <option value="Grade 9">Grade 9</option>
                              <option value="Grade 10">Grade 10</option>
                              <option value="Grade 11">Grade 11</option>
                              <option value="Grade 12">Grade 12</option>
                            <?php }?>
                             </select>
                           </div>
                        </div> 
      
                      </div>
                      <br>
                      <a class="modal-myheading">Previous School Information</a>
                      <br><br>
                      <div class="row">
                            
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="unrequired-field">School Name</label>
                            <input value="<?php echo isset($_POST['school-last-attended']) ? $_POST['school-last-attended'] : '' ?>"
                            name="school-last-attended" type="text" class="form-control" placeholder="Enter School Name">
                          </div>
                        </div>
      
                        <div class="col-lg-2">
                           <div class="form-group">
                             <label class="unrequired-field">School Year</label>
      
                             <select placeholder="Enter School Name" name="last-school-attended-year" class="form-control select2bs4">
                              <option value='' <?php if(!isset($_POST['last-school-attended-year'])){ echo "Selected = 'true'";} else{}?>
                              ></option>
                               <?php 
                                  $start = date('Y');
                                  $end = $start-=1;
                                  $start++;
                                  $instance=0;
                                  $years=20;
                                  for ($i=0; $i <($years) ; $i++) { 
                                    $SY= $end." - ".$start;
                                    if (!isset($_POST['last-school-attended-year'])&&!$instance) {
                                      echo "<option value='". $SY."' Selected='true'>". $SY."</option>";
                                      $start--;
                                    $end--;
                                      $instance=1;
                                    }
                                    elseif(isset($_POST['last-school-attended-year']) && cleanThis($_POST['last-school-attended-year'])==cleanThis($SY)){ $selected="Selected='true'";}
                                    else{$selected="";
                                    echo "<option value='". $SY."' ".$selected.">". $SY."</option>";
                                    $start--;
                                    $end--;}
                                  }
      
                               ?>
      
      
                             </select>
                           </div>
                        </div>

      
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label class="unrequired-field">Average Grade</label><br>
                            <div class="input-group">
                              <input  value="<?php echo isset($_POST['last-school-attended-grade']) ? $_POST['last-school-attended-grade'] : '' ?>"
                                name="last-school-attended-grade" type="text" class="form-control" data-inputmask='"mask": "99.99    "' data-mask>
                             </div>
                           </div>
                          </div> 
                        </div>
      
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="unrequired-field">School Address</label>
                              <input value="<?php echo isset($_POST['last-school-attended-address']) ? $_POST['last-school-attended-address'] : '' ?>"
                              name="last-school-attended-address" type="text" class="form-control" placeholder="Enter School Address">
                            </div>
                          </div>



                        </div>
            <div class="modal-footer">
              <a type="button"  class="btn btn-danger" id="next-stud-cancel" data-dismiss="modal">Cancel</a>
              <a class="btn btn-primary" onclick="nxtStud()" id="next-stud">Next</a>
            </div>
                      </div>


    <div class="callout callout-danger hiddenCard" id="next-cont-card" >
      
                  <a class="modal-myheading">Contact Information</a>
                  <br><!-- Spaceing --><br>
      
                <div class="row">
      
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label class="required-field">Full Name</label>
                      <input value="<?php echo isset($_POST['contact-person-name']) ? $_POST['contact-person-name'] : '' ?>"
                      name="contact-person-name" required type="text" class="form-control textOnly2" placeholder="Firstname Lastname">
                    </div>
                  </div>
      
                </div> 
      
                 <div class="row">
      
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label class="unrequired-field">Phone Number</label><br>
                       <div class="input-group">
                         <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                         <input value="<?php echo isset($_POST['contact-person-phone']) ? $_POST['contact-person-phone'] : '' ?>"
                         name="contact-person-phone" type="text" class="form-control" data-inputmask='"mask": "(999) 9999-9999    "' data-mask>
                        </div>
                      </div>
                     </div>    
      
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label class="required-field">Mobile Number</label><br>
                       <div class="input-group">
                         <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                          </div>
                         <input value="<?php echo isset($_POST['contact-person-mobile']) ? $_POST['contact-person-mobile'] : '' ?>"
                         name="contact-person-mobile" required type="text" class="form-control" data-inputmask='"mask": "0\\999-999-9999    "' data-mask>
                        </div>
                      </div>  
                     </div> 
      
                      <div class="col-lg-4">
                         <div class="form-group">
                           <label class="required-field" for="exampleInputEmail1">Email address</label>
                           <input required="true" value="<?php echo isset($_POST['contact-person-email']) ? $_POST['contact-person-email'] : '' ?>"
                           name="contact-person-email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                         </div>
                       </div>     
      
                  </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-warning" onclick=" backCont()" id="next-cont-back">Back</a>
              <a class="btn btn-primary" onclick=" nxtCont()" id="next-cont">Next</a>
            </div>

    </div>
              <div class="row">
                <div class="col-12">
                  <div class="callout callout-success hiddenCard" id="next-fami-card">
                  <!-- Family Information -->

                    <div class="card-header d-flex p-0">
                      <a class="  p-3 modal-myheading2">Family Background</a>
                    </div>

                    <div class="card-body">
                      <div class="tab-content">
                        <br>
                        <a class=""><h4>Mother's Information</h4></a>
                          <hr class="hrstyle">
      
    
                          <div class="row">
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Full Name</label>
                                <input value="<?php echo isset($_POST['mother-name']) ? $_POST['mother-name'] : '' ?>"
                                name="mother-name" type="text" class="form-control textOnly2" placeholder="Firstname Lastname">
                              </div>
                            </div>
  
      
                          </div>
      
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Employer Name</label>
                                <input value="<?php echo isset($_POST['mother-employer-name']) ? $_POST['mother-employer-name'] : '' ?>"
                                name="mother-employer-name" type="text" class="form-control" placeholder="Firstname Lastname / Company Name">
                              </div>
                            </div>
      
                          </div> 
                          <br>
                          <a class=""><h4>Father's Information</h4></a>
                          <hr class="hrstyle">
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Full Name</label>
                                <input value="<?php echo isset($_POST['father-name']) ? $_POST['father-name'] : '' ?>"
                                name="father-name" type="text" class="form-control textOnly2" placeholder="Firstname Lastname">
                              </div>
                            </div>

      
                          </div>
        
            
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Employer Name</label>
                                <input value="<?php echo isset($_POST['father-employer-name']) ? $_POST['father-employer-name'] : '' ?>"
                                name="father-employer-name" type="text" class="form-control" placeholder="Firstname Lastname / Company Name">
                              </div>
                            </div>
      
                          </div> 
      
                          <br>
                          <a class=""><h4>Guardian's Information</h4></a>
                          <hr class="hrstyle">
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Full Name</label>
                                <input value="<?php echo isset($_POST['guardian-name']) ? $_POST['guardian-name'] : '' ?>"
                                name="guardian-name" type="text" class="form-control textOnly2" placeholder="Firstname Lastname">
                              </div>
                            </div>
      
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label >Relationship</label>
                                <input value="<?php echo isset($_POST['guardian-relationship']) ? $_POST['guardian-relationship'] : '' ?>" 
                                name="guardian-relationship" type="text" class="form-control textOnly" placeholder="Auntie / Grandmother etc.">
                              </div>
                            </div>
      
                          </div>          
      
                          <div class="row">
      
                            <div class="col-lg-4">
                              <div class="form-group">
                               <label >Phone Number</label><br>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                 <input value="<?php echo isset($_POST['guardian-phone']) ? $_POST['guardian-phone'] : '' ?>" 
                                 name="guardian-phone" type="text" class="form-control" data-inputmask='"mask": "(999) 9999-9999    "' data-mask>
                                </div>
                              </div>
                            </div>    
      
                            <div class="col-lg-4">
                              <div class="form-group">
                               <label>Mobile Number</label><br>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                  </div>
                                 <input value="<?php echo isset($_POST['guardian-mobile']) ? $_POST['guardian-mobile'] : '' ?>" 
                                 name="guardian-mobile" type="text" class="form-control" data-inputmask='"mask": "0\\999-999-9999    "' data-mask>
                                </div>
                              </div>  
                            </div> 


                        </div>
                        <br>
                        <a class=""><h4>Sibling's Information</h4></a>
                        <hr class="hrstyle">
                          <div class="row"> 
                            <div class="col-lg-3">
                              <div class="icheck-primary d-inline ">
                                <input class="unrequired-field" name ="isEldest" type="checkbox" id="checkboxPrimary1" <?php 
                                if (isset($_POST['isEldest'])) {echo 'checked';} ?> >
                                <label class="unrequired-field" for="checkboxPrimary1">Eldest?
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-8" >
                              <div class="icheck-primary d-inline">
                              <div class="input-group">
                                <input value=" <?php 
                                if (isset($_POST['isEldest']) && $_POST['isEldest'] == 'Yes') {
                                  echo "value='1' disabled='true' ";
                                }
                                else if(isset($_POST['siblings-order'])){echo $_POST['siblings-order'] ;}
                                ?>"
                               name="siblings-order" class="form-control form-control-sm col-sm-1 numberOnly" id="siblings-order" type="text" maxlength="2" style="text-align: center">
                                <span class="col-sm-8">&nbsp &nbsp Order of birth &nbsp&nbsp&nbsp </span>
                                
                                </div>
                              </div>
                            </div>


    <!-- Chronological order of birth among his/her siblings? -->
                            
                            </div>
                          <br>
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label class="unrequired-field">Name</label>
                                <input value="<?php echo isset($_POST['sibling1-name']) ? $_POST['sibling1-name'] : '' ?>" 
                                name="sibling1-name" type="text" class="form-control textOnly" placeholder="Firstname Lastname">
                              </div>
                            </div>  
                            <div class="col-lg-3">
        
                               <div class="form-group">
                                 <label class="unrequired-field">Level</label>
                                 <select name="sibling1-level" class="form-control select2bs4">
                           <?php 
                              if (isset($_POST['sibling1-level'])){?>
                              <option <?php if($_POST['sibling1-level']=="Nursery 1") {echo' selected ="true"';}?>value="Nursery 1">Nursery 1</option>
                              <option <?php if($_POST['sibling1-level']=="Nursery 2") {echo' selected ="true"';}?>value="Nursery 2">Nursery 2</option>
                              <option <?php if($_POST['sibling1-level']=="Kinder 1") {echo' selected ="true"';}?>value="Kinder 1">Kinder 1</option>
                               <option <?php if($_POST['sibling1-level']=="Kinder 2") {echo' selected ="true"';}?>value="Kinder 2">Kinder 2</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 1") {echo' selected ="true"';}?>value="Grade 1">Grade 1</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 2"){echo' selected ="true"';}?>value="Grade 2">Grade 2</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 3"){echo' selected ="true"';}?>value="Grade 3">Grade 3</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 4"){echo' selected ="true"';}?>value="Grade 4">Grade 4</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 5"){echo' selected ="true"';}?>value="Grade 5">Grade 5</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 6"){echo' selected ="true"';}?>value="Grade 6">Grade 6</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 7"){echo' selected ="true"';}?>value="Grade 7">Grade 7</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 8"){echo' selected ="true"';}?>value="Grade 8">Grade 8</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 9"){echo' selected ="true"';}?>value="Grade 9">Grade 9</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 10") {echo' selected ="true"';}?>value="Grade 10">Grade 10</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 11") {echo' selected ="true"';}?>value="Grade 11">Grade 11</option>
                              <option <?php if($_POST['sibling1-level']=="Grade 12") {echo' selected ="true"';}?>value="Grade 12">Grade 12</option>

                             <?php }
                              else{  ?>
                              ?>
                              <option value="Nursery 1">Nursery 1</option>
                              <option value="Nursery 2">Nursery 2</option>
                              <option value="Kinder 1">Kinder 1</option>
                              <option value="Kinder 2">Kinder 2</option>
                              <option value="Grade 1">Grade 1</option>
                              <option value="Grade 2">Grade 2</option>
                              <option value="Grade 3">Grade 3</option>
                              <option value="Grade 4">Grade 4</option>
                              <option value="Grade 5">Grade 5</option>
                              <option value="Grade 6">Grade 6</option>
                              <option value="Grade 7">Grade 7</option>
                              <option value="Grade 8">Grade 8</option>
                              <option value="Grade 9">Grade 9</option>
                              <option value="Grade 10">Grade 10</option>
                              <option value="Grade 11">Grade 11</option>
                              <option value="Grade 12">Grade 12</option>
                            <?php }?>
                                 </select>
                               </div>
                            </div>
      
                          </div> 

                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label class="unrequired-field">Name</label>
                                <input value="<?php echo isset($_POST['sibling2-name']) ? $_POST['sibling2-name'] : '' ?>" 
                                name="sibling2-name" type="text" class="form-control textOnly" placeholder="Firstname Lastname">
                              </div>
                            </div>
      
                            <div class="col-lg-3">
        
                               <div class="form-group">
                                 <label class="unrequired-field">Level</label>
                                 <select name="sibling2-level" class="form-control select2bs4">
                           <?php 
                              if (isset($_POST['sibling2-level'])){?>
                              <option <?php if($_POST['sibling2-level']=="Nursery 1") {echo' selected ="true"';}?>value="Nursery 1">Nursery 1</option>
                              <option <?php if($_POST['sibling2-level']=="Nursery 2") {echo' selected ="true"';}?>value="Nursery 2">Nursery 2</option>
                              <option <?php if($_POST['sibling2-level']=="Kinder 1") {echo' selected ="true"';}?>value="Kinder 1">Kinder 1</option>
                              <option <?php if($_POST['sibling2-level']=="Kinder 2") {echo' selected ="true"';}?>value="Kinder 2">Kinder 2</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 1") {echo' selected ="true"';}?>value="Grade 1">Grade 1</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 2"){echo' selected ="true"';}?>value="Grade 2">Grade 2</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 3"){echo' selected ="true"';}?>value="Grade 3">Grade 3</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 4"){echo' selected ="true"';}?>value="Grade 4">Grade 4</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 5"){echo' selected ="true"';}?>value="Grade 5">Grade 5</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 6"){echo' selected ="true"';}?>value="Grade 6">Grade 6</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 7"){echo' selected ="true"';}?>value="Grade 7">Grade 7</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 8"){echo' selected ="true"';}?>value="Grade 8">Grade 8</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 9"){echo' selected ="true"';}?>value="Grade 9">Grade 9</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 10") {echo' selected ="true"';}?>value="Grade 10">Grade 100</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 11") {echo' selected ="true"';}?>value="Grade 11">Grade 111</option>
                              <option <?php if($_POST['sibling2-level']=="Grade 12") {echo' selected ="true"';}?>value="Grade 12">Grade 122</option>

                             <?php }
                              else{

                              }
                              ?>
                              <option value="Nursery 1">Nursery 1</option>
                              <option value="Nursery 2">Nursery 2</option>
                              <option value="Kinder 1">Kinder 1</option>
                              <option value="Kinder 2">Kinder 2</option>
                              <option value="Grade 1">Grade 1</option>
                              <option value="Grade 2">Grade 2</option>
                              <option value="Grade 3">Grade 3</option>
                              <option value="Grade 4">Grade 4</option>
                              <option value="Grade 5">Grade 5</option>
                              <option value="Grade 6">Grade 6</option>
                              <option value="Grade 7">Grade 7</option>
                              <option value="Grade 8">Grade 8</option>
                              <option value="Grade 9">Grade 9</option>
                              <option value="Grade 10">Grade 10</option>
                              <option value="Grade 11">Grade 11</option>
                              <option value="Grade 12">Grade 12</option>
                                 </select>
                               </div>
                            </div>
      
                          </div> 

                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label class="unrequired-field">Name</label>
                                <input value="<?php echo isset($_POST['sibling2-name']) ? $_POST['sibling2-name'] : '' ?>" 
                                name="sibling3-name" type="text" class="form-control" placeholder="Firstname Lastname">
                              </div>
                            </div>
      
                            <div class="col-lg-3">
        
                               <div class="form-group">
                                 <label class="unrequired-field">Level</label>
                                 <select name="sibling3-level" class="form-control select2bs4">
                           <?php 
                              if (isset($_POST['sibling3-level'])){?>
                              <option <?php if($_POST['sibling3-level']=="Nursery 1") {echo' selected ="true"';}?>value="Nursery 1">Nursery 1</option>
                              <option <?php if($_POST['sibling3-level']=="Nursery 2") {echo' selected ="true"';}?>value="Nursery 2">Nursery 2</option>
                              <option <?php if($_POST['sibling3-level']=="Kinder 1") {echo' selected ="true"';}?>value="Kinder 1">Kinder 1</option>
                              <option <?php if($_POST['sibling3-level']=="Kinder 2") {echo' selected ="true"';}?>value="Kinder 2">Kinder 2</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 1") {echo' selected ="true"';}?>value="Grade 1">Grade 1</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 2"){echo' selected ="true"';}?>value="Grade 2">Grade 2</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 3"){echo' selected ="true"';}?>value="Grade 3">Grade 3</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 4"){echo' selected ="true"';}?>value="Grade 4">Grade 4</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 5"){echo' selected ="true"';}?>value="Grade 5">Grade 5</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 6"){echo' selected ="true"';}?>value="Grade 6">Grade 6</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 7"){echo' selected ="true"';}?>value="Grade 7">Grade 7</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 8"){echo' selected ="true"';}?>value="Grade 8">Grade 8</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 9"){echo' selected ="true"';}?>value="Grade 9">Grade 9</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 10") {echo' selected ="true"';}?>value="Grade 10">Grade 10</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 11") {echo' selected ="true"';}?>value="Grade 11">Grade 11</option>
                              <option <?php if($_POST['sibling3-level']=="Grade 12") {echo' selected ="true"';}?>value="Grade 12">Grade 12</option>

                             <?php }
                              else{  ?>
                              ?>
                              <option value="Nursery 1">Nursery 1</option>
                              <option value="Nursery 2">Nursery 2</option>
                              <option value="Kinder 1">Kinder 1</option>
                              <option value="Kinder 2">Kinder 2</option>
                              <option value="Grade 1">Grade 1</option>
                              <option value="Grade 2">Grade 2</option>
                              <option value="Grade 3">Grade 3</option>
                              <option value="Grade 4">Grade 4</option>
                              <option value="Grade 5">Grade 5</option>
                              <option value="Grade 6">Grade 6</option>
                              <option value="Grade 7">Grade 7</option>
                              <option value="Grade 8">Grade 8</option>
                              <option value="Grade 9">Grade 9</option>
                              <option value="Grade 10">Grade 10</option>
                              <option value="Grade 11">Grade 11</option>
                              <option value="Grade 12">Grade 12</option>
                            <?php }?>>
                                 </select>
                               </div>
                            </div>
      

                        </div>

                      </div>
                                  <div class="modal-footer">
              <a type="button" class="btn btn-warning" onclick="backFami()" id="next-cont-back">Back</a>
              <button type="submit" name="btn-submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
            </div>
                    </div><!-- /.card-body -->
                  </div><!-- ./card -->
                </div><!-- /.col -->
              </div> <!-- /.row -->
             

<!--             <div class="modal-footer">
              <a href="index.php" type="button" class="btn btn-secondary" data-dilgiss="modal">Cancel</a>
              <button type="submit" name="btn-submit" class="btn btn-primary">Submit</button>
            </div> -->

          </form>
        </div>
      </div>
    </div>
<!-- Modal -->
</body>
<script type="text/javascript">

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
<script type="text/javascript" src="assets/scipts/hideAndNext.js"></script>
<!-- FastClick -->
<script src="../include/plugins/fastclick/fastclick.js"></script>
<script>

$( "#siblings-order" ).keyup(function() {

  var orderBirth = $("#siblings-order"). val();
  if (orderBirth==1) {
    $('#checkboxPrimary1').prop('checked', true);

   }
   else{
    $('#checkboxPrimary1').prop('checked', false);

   }

});  

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

            swal.fire({
                title: 'Please Wait..!',
                text: 'Deleting..',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                onOpen: () => {
                    swal.showLoading()
                }
            })
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
e.preventDefault();
});

$(document).on("click", "#copyData", function() {
    var x = $(this).attr('value');

Swal.fire({
  title: 'Are you sure?',
  text: "This will preregister the student",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Copy this!'
}).then((result) => {
  if (result.value) {

            swal.fire({
                title: 'Please Wait..!',
                text: 'Pulling old data..',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                onOpen: () => {
                    swal.showLoading()
                }
            })
        $.ajax({
            url: "copyData.php",
            type: "POST",
            cache: false,
            "data": 
                {"studentidx" : x},
            dataType: "html",
            success: function (htmlcodes) {


                swal.fire("Success", "It was succesfully added to pre-registered students.", "success");
                window.location.href = "studentEntry.php";
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal.fire("Error Coppying data!", "Please try again", "error");
            }
        });
  }
})
e.preventDefault();
});

$(document).on("click", ".submit", function() {
    var x = $(this).attr('value');
    var badge = $(this).attr('badgeIdentifier');
    var ctr = $(this).attr('ctrIdentifier');
    var hasSC = $(this).attr('hasStudentCode');

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

            swal.fire({
                title: 'Please Wait..!',
                text: 'Submitting..',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                onOpen: () => {
                    swal.showLoading()
                }
            })
        $.ajax({
            url: "submit2.php",
            type: "POST",
            cache: false,
            "data": 
                {"studentidx" : x},
            dataType: "html",
            success: function (studentCode2) {
                $("#"+badge).addClass('badge-info').removeClass('badge-danger').text('Registered').prop('title', 'Your information has been save.'); 
                $("#delete"+ctr).delay( 100 ).animate({ opacity: "hide" }, "slow");
                $("#submit"+ctr).delay( 100 ).animate({ opacity: "hide" }, "slow");
                $("#view"+ctr).text('View') ;
                $("#studCode"+ctr).html(studentCode2) ;

                swal.fire("Registered", "It was succesfully stored to the database!", "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal.fire("Error submitting!", "Please try again", "error");
            }
        });
  }
})
e.preventDefault();
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
$(".numberOnly2").inputFilter(function(value) {
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

$('form input').on('keypress', function(e) {
    return e.which !== 13;
});

</script>
</html>

<?php 
if (isset($_POST["btn-submit"])) { 
      $_POST['student-lrn'] = cleanThis($_POST['student-lrn']);
      



      //bday is in future
       if (substr($_POST['birthdate'],6)>date('Y') && $_POST['birthdate']!="" && $_POST['birthdate']!=" ") {
        displayMessage("warning","Birthdate Invalid","Please try again");
        echo "<script>$('#addstudentmodal').modal('show');  </script>";

        }

      //student mobile validation 
      elseif (isset($_POST['student-mobile'])&& strlen(cleanThis($_POST['student-mobile']))!=11 && cleanThis($_POST['student-mobile']) != "") {
        displayMessage("warning","Invalid Student Mobile","Student Mobile Number");
        echo "<script> console.log('contact Monile invalid'); </script>";
        echo "<script>$('#addstudentmodal').modal('show');  </script>";

      }
       //contact person mobile validation 
      elseif (strlen(cleanThis($_POST['contact-person-mobile']))!=11) {
        displayMessage("warning","Invalid Mobile Number","Contact Person Mobile Number");
        echo "<script> console.log('contact Monile invalid'); </script>";
        echo "<script>$('#addstudentmodal').modal('show');  </script>";
        
      }
      else{
        $lrn=cleanThis($_POST['student-lrn']);
       $code=$_POST['student-code'];
        $isLRNMatch=false;
        $isCodeMatch=false;
        $gender;
        $genderprefix;
        $noLRN=false;

        if (isset($_POST['student-code'])&&strlen(trim($_POST['student-code']))!=0) {  
          $sql = "select studentCODE as matchedCODE, Lastname, Firstname, Middlename  from `tbl_student` where studentCODE = '".$code."'";
          $result1 = mysqli_query($conn, $sql);
          $rowcount=mysqli_num_rows($result1);
          //check if theres a result
          if ($result1) {
            $query1 = mysqli_fetch_assoc($result1);
            
            if ($rowcount>0) {
            $CODEName = combineName($query1['Firstname'],$query1['Lastname'],$query1['Middlename']);
            $isCODEMatch=true;
            $message="There is existing record <br> CODE:".$code."<br> Name: ".$CODEName;
            displayMessage("error","Duplicate Entry",$message);
            echo "<script>$('#addstudentmodal').modal('show');  </script>";
            }
      
          else{
              $isCODEMatch=false;
            }
          }

        }
        else{
          $isCODEMatch=false;
        }

        //check length
        if (isset($_POST['student-lrn'])&&strlen(trim($_POST['student-lrn']))!=0) {  
          $sql = "select lrn as matchedLRN, Lastname, Firstname, Middlename  from `tbl_student` where lrn = '".  $lrn."'";
          $result1 = mysqli_query($conn, $sql);
          $rowcount=mysqli_num_rows($result1);
          //check if theres a result
          if ($result1) {
            $query1 = mysqli_fetch_assoc($result1);
            
            if ($rowcount>0) {
              echo '<script>console.log("duplicate");</script>';
            $LRNName = combineName($query1['Firstname'],$query1['Lastname'],$query1['Middlename']);
            $isLRNMatch=true;
            $message="There is existing record <br> LRN:".$lrn."<br> Name: ".$LRNName;
            displayMessage("error","Duplicate Entry",$message);
            echo "<script>$('#addstudentmodal').modal('show');  </script>";
            }
      
          else{
              $isLRNMatch=false;
            }
          }

        }
        else{
          $isLRNMatch=false;
        }

      
           if ((!$isLRNMatch) && (!$isCODEMatch)) {

              $isEldest;
              $hasMother;
              $hasFather;
              $hasGuardian;
              $hasSibling1;
              $hasSibling2;
              $hasSibling3;
              $numberOfSiblings=0;
              $hasSchoolAttended;
          
              if ($_POST['school-last-attended']==''||$_POST['school-last-attended']==' ') {
                $_POST['last-school-attended-year']='';
                $_POST['last-school-attended-grade']='';
                $_POST['last-school-attended-address']='';
                $hasSchoolAttended = false;
              }
              else{
                $hasSchoolAttended = true;
              }
              if ($_POST['mother-name']==''|| $_POST['mother-name']==' ' ) {
                $_POST['mother-employer-name']='';
                $hasMother = false;
              }
              else{
                $hasMother = true;
              }
              if ($_POST['father-name']==''|| $_POST['father-name']==' ' ) {
                $_POST['father-employer-name']='';
                $hasFather = false;
              }
              else{
                $hasFather = true;
              }
              if ($_POST['guardian-name']==''|| $_POST['guardian-name']==' ' ) {
                $_POST['guardian-relationship']='';
                $_POST['guardian-phone']='';
                $_POST['guardian-mobile']='';
                $hasGuardian = false;
              }
              else{
                $_POST['guardian-phone'] =cleanThis($_POST['guardian-phone'] );
                $_POST['guardian-mobile']=cleanThis($_POST['guardian-mobile']);
                $hasGuardian = true;
              }
              if ($_POST['sibling1-name']==''|| $_POST['sibling1-name']==' ' ) {
                $_POST['sibling1-level']='';
                $hasSibling1 = false;
              }
              else{
                $numberOfSiblings++;
                $hasSibling1 = true;
              }
              if ($_POST['sibling2-name']==''|| $_POST['sibling2-name']==' ' ) {
                $_POST['sibling2-level']='';
                $hasSibling2 = false;
              }
              else{
                $numberOfSiblings++;
                $hasSibling2 = true;
              }
              if ($_POST['sibling3-name']==''|| $_POST['sibling3-name']==' ' ) {
                $_POST['sibling3-level']='';
                $hasSibling3 = false;
              }
              else{
                $numberOfSiblings++;
                $hasSibling3 = true;

              }
              if (!isset($_POST['siblings-order'])) {
                $_POST['siblings-order']= '';
              }
              else{
                $_POST['siblings-order']= cleanThis($_POST['siblings-order']);
              }
              if (isset($_POST['isEldest'])) {
                $isEldest="Yes";
              }
              else{
                $isEldest="No";
              }
              if (isset($_POST['r1'])) {
                if ($_POST['r1']=="male") {
                  $gender="M";;
                  $genderprefix="Mr.";
                }
                else{
                  $gender="F";
                  $genderprefix="Ms."; 
                }
              }
              $formatedBirthdate = $_POST['birthdate'];
              $date = str_replace('/', '-', $formatedBirthdate);
              $_POST['birthdate'] = date('Y-m-d', strtotime($date));
     //$_POST['student-mobile']               = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['student-mobile'])));        
     $_POST['address']                      = mysqli_real_escape_string($conn, stripcslashes($_POST['address']));
     $_POST['city']                         = mysqli_real_escape_string($conn, stripcslashes($_POST['city']));
     $_POST['siblings-order']               = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['siblings-order'])));
     $_POST['student-lrn']                  = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['student-lrn'])));
     $_POST['first-name']                   = mysqli_real_escape_string($conn, stripcslashes($_POST['first-name']));
     $_POST['middle-name']                  = mysqli_real_escape_string($conn, stripcslashes($_POST['middle-name']));
     $_POST['last-name']                    = mysqli_real_escape_string($conn, stripcslashes($_POST['last-name']));
     $_POST['suffix']                       = mysqli_real_escape_string($conn, stripcslashes($_POST['suffix']));
     $_POST['student-code']                 = mysqli_real_escape_string($conn, stripcslashes($_POST['student-code']));
     $_POST['r1']                           = mysqli_real_escape_string($conn, stripcslashes($_POST['r1']));
     $_POST['birthdate']                    = mysqli_real_escape_string($conn, stripcslashes($_POST['birthdate']));
     $_POST['birthplace']                   = mysqli_real_escape_string($conn, stripcslashes($_POST['birthplace']));
     $_POST['school-last-attended']         = mysqli_real_escape_string($conn, stripcslashes($_POST['school-last-attended']));
     $_POST['last-school-attended-year']    = mysqli_real_escape_string($conn, stripcslashes($_POST['last-school-attended-year']));
     $_POST['inComingLevel']               = mysqli_real_escape_string($conn, stripcslashes($_POST['inComingLevel']));
     $_POST['last-school-attended-grade']   = mysqli_real_escape_string($conn, stripcslashes($_POST['last-school-attended-grade']));
     $_POST['last-school-attended-address'] = mysqli_real_escape_string($conn, stripcslashes($_POST['last-school-attended-address']));
     $_POST['contact-person-name']          = mysqli_real_escape_string($conn, stripcslashes($_POST['contact-person-name']));
     $_POST['contact-person-phone']         = mysqli_real_escape_string($conn, stripcslashes($_POST['contact-person-phone']));
     $_POST['contact-person-mobile']        = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['contact-person-mobile'])));
     $_POST['contact-person-email']         = mysqli_real_escape_string($conn, stripcslashes($_POST['contact-person-email']));
     $_POST['mother-name']                  = mysqli_real_escape_string($conn, stripcslashes($_POST['mother-name']));
     $_POST['mother-employer-name']         = mysqli_real_escape_string($conn, stripcslashes($_POST['mother-employer-name']));
     $_POST['father-name']                  = mysqli_real_escape_string($conn, stripcslashes($_POST['father-name']));
     $_POST['father-employer-name']         = mysqli_real_escape_string($conn, stripcslashes($_POST['father-employer-name']));
     $_POST['guardian-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['guardian-name']));
     $_POST['guardian-relationship']        = mysqli_real_escape_string($conn, stripcslashes($_POST['guardian-relationship']));
     $_POST['guardian-phone']               = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['guardian-phone'])));
     $_POST['guardian-mobile']              = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['guardian-mobile'])));
     $_POST['sibling1-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling1-name']));
     $_POST['sibling1-level']               = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling1-level']));
     $_POST['sibling2-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling2-name']));
     $_POST['sibling2-level']               = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling2-level']));
     $_POST['sibling3-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling3-name']));
     $_POST['sibling3-level']               = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling3-level']));

      $randomToken = generateNumericOTP(10);
      $nowtime = date("Y-m-d H:i:s");

$insertQuery = "Insert into tbl_student
(
userID,
schoolYearID,
studentCode,
LRN,
Prefix,
Lastname,
Firstname,
Middlename,
Suffix,
Birthdate,
Birthplace,
Address,
city,
IsEldest,
familyPlace,
datetimeRegistered
) 
VALUES 
(
'".$userID."',
'".$schoolYearID."',
'".$_POST['student-code']."',
'".$_POST['student-lrn']."',
'".$gender."',
'".$_POST['last-name']."',
'".$_POST['first-name']."',
'".$_POST['middle-name']."',
'".$_POST['suffix']."',
'".$_POST['birthdate']."',
'".$_POST['birthplace']."',
'".$_POST['address'] ."',
'".$_POST['city'] ."',
'".$isEldest."',
'".$_POST['siblings-order']."',
'".$nowtime."'


)";      
mysqli_query($conn, $insertQuery);




$sql = "sELECT a.studentID FROM tbl_student AS a WHERE a.Birthdate = '".$_POST['birthdate']."' AND a.Lastname = '".$_POST['last-name']."' ORDER BY a.studentID";



$result = mysqli_query($conn, $sql);
$pass_row = mysqli_fetch_assoc($result);
$studentID = $pass_row['studentID'];

 $insertQuery2 = "Insert into tbl_contact
(
userID,
studentID,
fullName,
phone,
mobile,
email
) 
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['contact-person-name']."',
'".$_POST['contact-person-phone']."',
'".$_POST['contact-person-mobile']."',
'".$_POST['contact-person-email']."'
)";
 
mysqli_query($conn, $insertQuery2);



if ($hasMother) {
 $insertQuery2 = "Insert into tbl_parents 
(
userID,
studentID,
fullName,
employerName,
isFather
) 
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['mother-name']."',
'".$_POST['mother-employer-name']."',
'0'
)";
 
mysqli_query($conn, $insertQuery2);
}


if ($hasFather) {
 $insertQuery2 = "Insert into tbl_parents 
(
userID,
studentID,
fullName,
employerName,
isFather
) 
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['father-name']."',
'".$_POST['father-employer-name']."',
'1'
)";
 
mysqli_query($conn, $insertQuery2);
}

if ($hasGuardian) {
 $insertQuery2 = "Insert into tbl_guardian
(
userID,
studentID,
fullName,
relationship,
guardianPhone,
guardianMobile
) 
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['guardian-name']."',
'".$_POST['guardian-relationship']."',
'".$_POST['guardian-phone']."',
'".$_POST['guardian-mobile']."'
)";
 
mysqli_query($conn, $insertQuery2);
}


 $insertQuery2 = "Insert into tbl_schoolinfo
(
userID,
studentID,
schoolLastAttended,
schoolYear,
schoolAddress,
inComingLevel,
averageGrade
)     
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['school-last-attended'] ."',
'".$_POST['last-school-attended-year'] ."',
'".$_POST['last-school-attended-address']."',
'".$_POST['inComingLevel'] ."',
'".$_POST['last-school-attended-grade']."'
)";
 
mysqli_query($conn, $insertQuery2);


if ($hasSibling1) {
 $insertQuery2 = "Insert into tbl_siblings
(
userID,
studentID,
fullName,
level,
siblingNo
)     
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['sibling1-name'] ."',
'".$_POST['sibling1-level']."',
'1'
)";
 
 mysqli_query($conn, $insertQuery2);
}

if ($hasSibling2) {
 $insertQuery2 = "Insert into tbl_siblings
(
userID,
studentID,
fullName,
level,
siblingNo
)     
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['sibling2-name'] ."',
'".$_POST['sibling2-level']."',
'2'
)";
 
 mysqli_query($conn, $insertQuery2);
}


if ($hasSibling3) {
 $insertQuery2 = "Insert into tbl_siblings
(
userID,
studentID,
fullName,
level,
siblingNo
)     
VALUES
(
'".$userID."',
'".$studentID."',
'".$_POST['sibling3-name'] ."',
'".$_POST['sibling3-level']."',
'3'
)";
 
mysqli_query($conn, $insertQuery2);
}

 header('Location: viewDetails.php?insertsuccess&page='.$studentID);

   }
  }
            
}
if (isset($_REQUEST['getstarted'])) {
        echo "<script>$('#addstudentmodal').modal('show');  </script>";
}

?>
<script src="includes/sessionChecker.js"></script>
<script type="text/javascript">
    extendSession();
    var isPosted;
    var isDisplayed = false; 
setInterval(function(){sessionChecker();}, 1000);//time in milliseconds 
</script>
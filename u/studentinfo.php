<!DOCTYPE html>

<?php
  require '../include/config.php';
  require 'assets/fonts.php';
  require 'assets/adminlte.php';
  require '../include/config.php';
  $page = "studentinfo";
  require 'assets/scipts/phpfunctions.php';
  $_SESSION['CurrentSchoolYear']='S.Y. 2019-2020';
?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>PPH DGS</title>

<!-- customize css -->
  
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
  <link rel="stylesheet" href="../include/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../include/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../include/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../include/dist/css/adminlte.min.css">


</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

<!-- nav bar & side bar -->
<?php 
require 'includes/navAndSide.php';
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
              <li class="breadcrumb-item active">Data Entry</li>
              <li class="breadcrumb-item active">Student</li>
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
              
              <button type="button" class="btn btn-danger add-button buttonDelete">
                <span class=" fa fa-trash">&nbsp&nbsp</span>Delete Selected
                </button>&nbsp&nbsp
                <button 
                data-toggle="modal" data-target="#addstudentmodal"
                type="button" class="btn btn-primary add-button">
                <span class=" fa fa-plus-square">&nbsp&nbsp</span>Add Student
                </button>
              </p>
            </div>
            <!-- /.card-header -->
            <div class="card-body display nowrap" style="width:100%">
              <table id="example1" class="table table-bordered ">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Code</th>
                  <th>LRN</th>
                  <th>Mobile Number</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
          <?php 

          $sql = "sELECT Firstname, Lastname, Middlename, Code, LRN,  ContactMobile as Mobile FROM `tbl_student` where CurrentSchoolYear ='".$_SESSION['CurrentSchoolYear']."'";
           $result1 = mysqli_query($conn, $sql);
            $ctr=0;
              if (mysqli_num_rows($result1) > 0) {
                while($row = mysqli_fetch_array($result1)){
          echo"<tr class='tRow' id='row".$ctr."'>";
                  echo"<td>";
                    echo combineName($row[0],$row[1],$row[2]);
                  echo"</td>";
                  echo"<td>";
                    echo $row[3];
                  echo"</td>";
                  echo"<td>";
                    echo $row[4];
                  echo"</td>";
                  echo"<td>";
                    echo $row[5];
                  echo"</td>";
                   echo'   <td style="width:15%; class="">';
                   echo'       <a class="btn btn-primary btn-sm" href="#">';
                   echo'           <i class="fas fa-folder">';
                   echo'           </i>';
                   echo'           View';
                   echo'       </a>';
                   echo'       <a class="btn btn-info btn-sm" href="#">';
                   echo'           <i class="fas fa-pencil-alt">';
                   echo'           </i>';
                   echo'           Edit';
                   echo'       </a>';
                   echo'       <a class="btn btn-danger btn-sm" href="#">';
                   echo'           <i class="fas fa-trash">';
                   echo'           </i>';
                   echo'           Delete';
                   echo'       </a>';
                   echo'   </td>';
                  
          echo"</tr>";
                    $ctr++;

                }
              }

              else{
                echo "<script> swal('error'); </script>";
              }


          ?>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                     <td class="project-actions text-right">
       <a class="btn btn-primary btn-sm" href="#">
           <i class="fas fa-folder">
           </i>
           View
       </a>
       <a class="btn btn-info btn-sm" href="#">
           <i class="fas fa-pencil-alt">
           </i>
           Edit
       </a>
       <a class="btn btn-danger btn-sm" href="#">
           <i class="fas fa-trash">
           </i>
           Delete
       </a>
   </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Full Name</th>
                  <th>Code</th>
                  <th>LRN</th>
                  <th>Mobile Number</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- ./wrapper -->
<script type="text/javascript">
  

</script>

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
<div class="modal  fade" id="addstudentmodal" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h2 class="modal-title" id="exampleModalLongTitle">Add Student</h2>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body"  style="background-color: #D3D3D3 ">
        <div class="callout callout-info">
  
          <form onsubmit="return confirm('Are you sure?')" method="POST" enctype="multipart/form-data">
          <a class="modal-myheading">Student Information</a>
          <br><!-- Spaceing --><br>
           
  
                  <div class="row">
                    
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label class="required-field">Student Code</label><br>
                            <div class="input-group">
                              <input value="<?php echo isset($_POST['student-code']) ? $_POST['student-code'] : '' ?>"
                              name="student-code" required type="text" class="form-control">
                             </div>
                           </div>
                          </div>
  
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label class="unrequired-field">LRN</label><br>
                            <div class="input-group">
                              <input value="<?php echo isset($_POST['student-lrn']) ? $_POST['student-lrn'] : '' ?>"
                              name="student-lrn" type="text" class="form-control" data-inputmask='"mask": " 999999999999    "' data-mask>
                             </div>
                           </div>
                          </div>
  
                        <div class="col-sm-4">
  
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
  
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="required-field">Given Name</label>
                          <input value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>"
                          name="first-name"required type="text" class="form-control" placeholder="Enter First Name">
                        </div>
                      </div>
  
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="unrequired-field">Middle Name</label>
                          <input value="<?php echo isset($_POST['middle-name']) ? $_POST['middle-name'] : '' ?>"
                          name="middle-name"type="text" class="form-control" placeholder="Enter Middle Name">
                        </div>
                      </div>
  
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="required-field">Surname/Last Name</label>
                          <input value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>"
                          name="last-name"required type="text" class="form-control" placeholder="Enter Last Name">
                        </div>
                      </div>
  
                  </div>
  
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="unrequired-field">Student / Family Address</label>
                          <input value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"
                          name="address" type="text" class="form-control" placeholder="Enter School Address">
                        </div>
                      </div>
  
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="unrequired-field">Student Phone Number</label><br>
                          <div class="input-group">
                            <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fas fa-phone"></i></span>
                             </div>
                            <input value="<?php echo isset($_POST['contact-person-phone']) ? $_POST['contact-person-phone'] : '' ?>"
                            name="contact-person-phone" type="text" class="form-control" data-inputmask='"mask": "999-99-99    "' data-mask>
                           </div>
                         </div>
                        </div>    
          
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="unrequired-field">Student Mobile Number</label><br>
                          <div class="input-group">
                            <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                             </div>
                            <input value="<?php echo isset($_POST['contact-person-mobile']) ? $_POST['contact-person-mobile'] : '' ?>"
                            name="contact-person-mobile" type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                           </div>
                         </div>  
                        </div> 
                    </div>
                    
                  <div class="row">
  
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="unrequired-field">Suffix</label>
                          <input value="<?php echo isset($_POST['suffix']) ? $_POST['suffix'] : '' ?>"
                          name="suffix" type="text" class="form-control" placeholder="E.g: Jr, Sr">
                        </div>
                      </div>
  
                      <div class="col-sm-4">
                        <div class="form-group">
                           <label class="unrequired-field">Birthdate</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input value="<?php echo isset($_POST['birthdate']) ? $_POST['birthdate'] : '' ?>"
                            name="birthdate" id="datemask2" type="text" class="form-control" data-inputmask-alias="datetime"data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                          </div>
                        </div>
                      </div>
  
                      <div class="col-sm-4">  
                        <div class="form-group">
                          <label class="unrequired-field">Birthplace</label>
                          <input value="<?php echo isset($_POST['birthplace']) ? $_POST['birthplace'] : '' ?>"
                          name="birthplace" type="text" class="form-control" placeholder="">
                        </div>
                      </div>
  
                  </div>
  
  
                  <div class="row">
                        
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="unrequired-field">School Last Attended</label>
                        <input value="<?php echo isset($_POST['school-last-attended']) ? $_POST['school-last-attended'] : '' ?>"
                        name="school-last-attended" type="text" class="form-control" placeholder="Enter School Name">
                      </div>
                    </div>
  
                    <div class="col-sm-2">
                       <div class="form-group">
                         <label class="unrequired-field">School Year</label>
  
                         <select placeholder="Enter School Name" name="last-school-attended-year" class="form-control select2bs4" style="width: 100%;">
                          <option value='' <?php if(!isset($_POST['school-last-attended-year'])){ echo "Selected";} else{}?>
                          ></option>
                           <?php 
                              $start = date('Y');
                              $end = $start;
                              $start++;
                              $years=10;
                              for ($i=0; $i <($years*2) ; $i++) { 
                                $SY= "S.Y. ".$end." - ".$start;
                                if(isset($_POST['school-last-attended-year']) && isset($_POST['school-last-attended-year'])==$SY){ $selected="Selected";}
                                else{$selected="";}
                                echo "<option value='". $SY."'".$selected.">". $SY."</option>";
                                $start--;
                                $end--;
                              }
  
  
                           ?>
  
  
                         </select>
                       </div>
                    </div>
  
                    <div class="col-sm-2">
  
                       <div class="form-group">
                         <label class="unrequired-field">Level</label>
                         <select name="last-school-attended-level" class="form-control select2bs4" style="width: 100%;">
                          <?php if (isset($_POST['last-school-attended-level'])){
                            $selectedYear;
                          if ($_POST['last-school-attended-level']=="") {
                            $selectedYear = 0;
                          }
                          else if ($_POST['last-school-attended-level']=="Nursery1") {$selectedYear = 1;}
                          else if ($_POST['last-school-attended-level']=="Nursery2") {$selectedYear = 2;}
                          else if ($_POST['last-school-attended-level']=="Kinder1") {$selectedYear =  3;}
                          else if ($_POST['last-school-attended-level']=="Grade1") {$selectedYear =   4;}
                          else if ($_POST['last-school-attended-level']=="Grade2") {$selectedYear =   5;}
                          else if ($_POST['last-school-attended-level']=="Grade5") {$selectedYear =   6;}
                          else if ($_POST['last-school-attended-level']=="Grade3") {$selectedYear =   7;}
                          else if ($_POST['last-school-attended-level']=="Grade4") {$selectedYear =   8;}
                          else if ($_POST['last-school-attended-level']=="Grade6") {$selectedYear =   9;}
                          else if ($_POST['last-school-attended-level']=="Grade7") {$selectedYear =   10;}
                          else if ($_POST['last-school-attended-level']=="Grade8") {$selectedYear =   11;}
                          else if ($_POST['last-school-attended-level']=="Grade9") {$selectedYear =   12;}
                          else if ($_POST['last-school-attended-level']=="Grade10") {$selectedYear =  13;}
                          else if ($_POST['last-school-attended-level']=="Grade11") {$selectedYear =  14;}
                          else if ($_POST['last-school-attended-level']=="Grade12") {$selectedYear =  15;}}
                          else{$selectedYear=0;}
                          ?>
                          <option <?php if($selectedYear==1) echo'selected';?>value="Nursery1">Nursery 1</option>
                          <option <?php if($selectedYear==2) echo'selected';?>value="Nursery2">Nursery 2</option>
                          <option <?php if($selectedYear==3) echo'selected';?>value="Kinder1">Kinder 1</option>
                          <option <?php if($selectedYear==4) echo'selected';?>value="Grade1">Grade 1</option>
                          <option <?php if($selectedYear==5) echo'selected';?>value="Grade2">Grade 2</option>
                          <option <?php if($selectedYear==6) echo'selected';?>value="Grade5">Grade 5</option>
                          <option <?php if($selectedYear==7) echo'selected';?>value="Grade3">Grade 3</option>
                          <option <?php if($selectedYear==8) echo'selected';?>value="Grade4">Grade 4</option>
                          <option <?php if($selectedYear==9) echo'selected';?>value="Grade6">Grade 6</option>
                          <option <?php if($selectedYear==10) echo'selected';?>value="Grade7">Grade 7</option>
                          <option <?php if($selectedYear==11) echo'selected';?>value="Grade8">Grade 8</option>
                          <option <?php if($selectedYear==12) echo'selected';?>value="Grade9">Grade 9</option>
                          <option <?php if($selectedYear==13) echo'selected';?>value="Grade10">Grade 10</option>
                          <option <?php if($selectedYear==14) echo'selected';?>value="Grade11">Grade 11</option>
                          <option <?php if($selectedYear==15) echo'selected';?>value="Grade12">Grade 12</option>
                         </select>
                       </div>
                    </div>
  
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label class="unrequired-field">Average Grade</label><br>
                        <div class="input-group">
                          <input value="<?php echo isset($_POST['last-school-attended-grade']) ? $_POST['last-school-attended-grade'] : '' ?>"
                          name="last-school-attended-grade" class="form-control" type="text" maxlength="3" style="text-align: center">
                         </div>
                       </div>
                      </div> 
                    </div>
  
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="unrequired-field">School Last Attended Address</label>
                          <input value="<?php echo isset($_POST['last-school-attended-address']) ? $_POST['last-school-attended-address'] : '' ?>"
                          name="last-school-attended-address" type="text" class="form-control" placeholder="Enter School Address">
                        </div>
                      </div>
                    </div>
                  </div>
<div class="callout callout-danger">
  
              <a class="modal-myheading">Contact Information</a>
              <br><!-- Spaceing --><br>
  
            <div class="row">
  
              <div class="col-sm-8">
                <div class="form-group">
                  <label class="required-field">Contact Person Full Name</label>
                  <input value="<?php echo isset($_POST['contact-person-name']) ? $_POST['contact-person-name'] : '' ?>"
                  name="contact-person-name" required type="text" class="form-control" placeholder="FirstName LastName">
                </div>
              </div>
  
            </div> 
  
             <div class="row">
  
               <div class="col-sm-4">
                 <div class="form-group">
                   <label class="unrequired-field">Phone Number</label><br>
                   <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                     <input value="<?php echo isset($_POST['contact-person-phone']) ? $_POST['contact-person-phone'] : '' ?>"
                     name="contact-person-phone" type="text" class="form-control" data-inputmask='"mask": "999-99-99    "' data-mask>
                    </div>
                  </div>
                 </div>    
  
               <div class="col-sm-4">
                 <div class="form-group">
                   <label class="required-field">Mobile Number</label><br>
                   <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                      </div>
                     <input value="<?php echo isset($_POST['contact-person-mobile']) ? $_POST['contact-person-mobile'] : '' ?>"
                     name="contact-person-mobile" required type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                    </div>
                  </div>  
                 </div> 
  
                  <div class="col-sm-4">
                     <div class="form-group">
                       <label class="unrequired-field" for="exampleInputEmail1">Email address</label>
                       <input value="<?php echo isset($_POST['contact-person-email']) ? $_POST['contact-person-email'] : '' ?>"
                       name="contact-person-email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                     </div>
                   </div>     
  
              </div>
</div>
          <div class="row">
            <div class="col-12">
              <div class="callout callout-success">
              <!-- Family Information -->

                <div class="card-header d-flex p-0">
                  <a class="  p-3 modal-myheading2">Family Information</a>
                  <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active nav-link-custom" href="#tab_1" data-toggle="tab">Mother Information</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#tab_2" data-toggle="tab">Father Information</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#tab_3" data-toggle="tab">Guardian Information</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#tab_4" data-toggle="tab">Siblings Information</a></li>
                    <li class="nav-item dropdown">
                    </li>
                  </ul>
                </div>

                <div class="card-body">
                  <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">

                      <div class="row">
  
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label >Mother Full Name</label>
                            <input value="<?php echo isset($_POST['mother-name']) ? $_POST['mother-name'] : '' ?>"
                            name="mother-name" type="text" class="form-control" placeholder="FirstName LastName">
                          </div>
                        </div>
  
                      </div>
  
                      <div class="row">
  
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label >Employer Name</label>
                            <input value="<?php echo isset($_POST['mother-employer-name']) ? $_POST['mother-employer-name'] : '' ?>"
                            name="mother-employer-name" type="text" class="form-control" placeholder="FirstName LastName / Company Name">
                          </div>
                        </div>
  
                      </div> 
  
                      <div class="row">
  
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label >Employer Address</label>
                            <input value="<?php echo isset($_POST['mother-employer-address']) ? $_POST['mother-employer-address'] : '' ?>"
                            name="mother-employer-address" type="text" class="form-control" placeholder="Address">
                          </div>
                        </div>
  
                      </div>  
  
                      <div class="row">
  
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label >Employer Phone Number</label><br>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-phone"></i></span>
                               </div>
                              <input value="<?php echo isset($_POST['mother-employer-phone']) ? $_POST['mother-employer-phone'] : '' ?>"
                              name="mother-employer-phone" type="text" class="form-control" data-inputmask='"mask": "999-99-99    "' data-mask>
                             </div>
                           </div>
                        </div>    
  
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Employer Mobile Number</label><br>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                               </div>
                              <input value="<?php echo isset($_POST['mother-employer-mobile']) ? $_POST['mother-employer-phone'] : '' ?>"
                              name="mother-employer-mobile" type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                            </div>
                          </div>  
                        </div>   

                      </div>

                  </div>
                    <div class="tab-pane" id="tab_2">

                      <div class="row">
  
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label >Father Full Name</label>
                            <input value="<?php echo isset($_POST['father-name']) ? $_POST['father-name'] : '' ?>"
                            name="father-name" type="text" class="form-control" placeholder="FirstName LastName">
                          </div>
                        </div>
  
                      </div>
  
                      <div class="row">
  
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label >Employer Name</label>
                            <input value="<?php echo isset($_POST['father-employer-name']) ? $_POST['father-employer-name'] : '' ?>"
                            name="father-employer-name" type="text" class="form-control" placeholder="FirstName LastName / Company Name">
                          </div>
                        </div>
  
                      </div> 
  
                      <div class="row">
  
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label >Employer Address</label>
                            <input value="<?php echo isset($_POST['father-employer-address']) ? $_POST['father-employer-address'] : '' ?>"
                            name="father-employer-address" type="text" class="form-control" placeholder="Address">
                          </div>
                        </div>
  
                      </div>  
  
                      <div class="row">
  
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label >Employer Phone Number</label><br>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                              </div>
                             <input 
                             value="<?php echo isset($_POST['father-employer-address']) ? $_POST['father-employer-address'] : '' ?>"
                             name="father-employer-phone" type="text" class="form-control" data-inputmask='"mask": "999-99-99    "' data-mask>
                            </div>
                          </div>
                        </div>    
  
                        <div class="col-sm-4">
                          <div class="form-group">
                           <label>Employer Mobile Number</label><br>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                              </div>
                             <input value="<?php echo isset($_POST['father-employer-mobile']) ? $_POST['father-employer-mobile'] : '' ?>"
                             name="father-employer-mobile" type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                            </div>
                          </div>  
                        </div> 

                      </div>     

                    </div>

                    <div class="tab-pane" id="tab_3">
  
                      <div class="row">
  
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label >Guardian Full Name</label>
                            <input value="<?php echo isset($_POST['guardian-name']) ? $_POST['guardian-name'] : '' ?>"
                            name="guardian-name" type="text" class="form-control" placeholder="FirstName LastName">
                          </div>
                        </div>
  
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label >Guardian Relationship</label>
                            <input value="<?php echo isset($_POST['guardian-relationship']) ? $_POST['guardian-relationship'] : '' ?>" 
                            name="guardian-relationship" type="text" class="form-control" placeholder="Auntie / Grandmother etc.">
                          </div>
                        </div>
  
                      </div>          
  
                      <div class="row">
  
                        <div class="col-sm-4">
                          <div class="form-group">
                           <label >Phone Number</label><br>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                              </div>
                             <input value="<?php echo isset($_POST['guardian-phone']) ? $_POST['guardian-phone'] : '' ?>" 
                             name="guardian-phone" type="text" class="form-control" data-inputmask='"mask": "999-99-99    "' data-mask>
                            </div>
                          </div>
                        </div>    
  
                        <div class="col-sm-4">
                          <div class="form-group">
                           <label>Mobile Number</label><br>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                              </div>
                             <input value="<?php echo isset($_POST['guardian-mobile']) ? $_POST['guardian-mobile'] : '' ?>" 
                             name="guardian-mobile" type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                            </div>
                          </div>  
                        </div> 

                      </div> 

                    </div>
  
                    <div class="tab-pane" id="tab_4">
                      <div class="row"> 
                        <div class="col-sm-2">
                          <div class="icheck-primary d-inline">
                            <input name ="isEldest" type="checkbox" id="checkboxPrimary1" <?php 
                            if (isset($_POST['isEldest'])) {echo 'checked';} ?> >
                            <label for="checkboxPrimary1">Eldest?
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="icheck-primary d-inline">
                      <div class="input-group">
                        <label>Chronological order of birth among his/her siblings &nbsp&nbsp&nbsp </label>
                        <input value="<?php echo isset($_POST['siblings-order']) ? $_POST['siblings-order'] : '' ?>"
                        name="siblings-order" class="form-control form-control-sm col-3" type="text" maxlength="2" style="text-align: center">
                       </div>
                          </div>
                        </div>


<!-- Chronological order of birth among his/her siblings? -->
                        
                        </div>
                      <br>
                      <div class="row">
  
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label>Sibling 1 Name</label>
                            <input value="<?php echo isset($_POST['sibling1-name']) ? $_POST['sibling1-name'] : '' ?>" 
                            name="sibling1-name" type="text" class="form-control" placeholder="FirstName LastName">
                          </div>
                        </div>
  
                        <div class="col-sm-3">
    
                           <div class="form-group">
                             <label class="unrequired-field">Level</label>
                             <select name="sibling1-level" class="form-control select2bs4" style="width: 100%;">
                        <?php if (isset($_POST['sibling1-level'])){
                        if ($_POST['sibling1-level']=="") {
                          $selectedYear = 1;
                        }
                        else if ($_POST['sibling1-level']=="Nursery1") {$selectedYear = 1;}
                        else if ($_POST['sibling1-level']=="Nursery2") {$selectedYear = 2;}
                        else if ($_POST['sibling1-level']=="Kinder1") {$selectedYear =  3;}
                        else if ($_POST['sibling1-level']=="Grade1") {$selectedYear =   4;}
                        else if ($_POST['sibling1-level']=="Grade2") {$selectedYear =   5;}
                        else if ($_POST['sibling1-level']=="Grade5") {$selectedYear =   6;}
                        else if ($_POST['sibling1-level']=="Grade3") {$selectedYear =   7;}
                        else if ($_POST['sibling1-level']=="Grade4") {$selectedYear =   8;}
                        else if ($_POST['sibling1-level']=="Grade6") {$selectedYear =   9;}
                        else if ($_POST['sibling1-level']=="Grade7") {$selectedYear =   10;}
                        else if ($_POST['sibling1-level']=="Grade8") {$selectedYear =   11;}
                        else if ($_POST['sibling1-level']=="Grade9") {$selectedYear =   12;}
                        else if ($_POST['sibling1-level']=="Grade10") {$selectedYear =  13;}
                        else if ($_POST['sibling1-level']=="Grade11") {$selectedYear =  14;}
                        else if ($_POST['sibling1-level']=="Grade12") {$selectedYear =  15;}}
                        else{$selectedYear=1;}
                        ?>
                        <option <?php if($selectedYear==1) echo'selected';?>value="Nursery1">Nursery 1</option>
                        <option <?php if($selectedYear==2) echo'selected';?>value="Nursery2">Nursery 2</option>
                        <option <?php if($selectedYear==3) echo'selected';?>value="Kinder1">Kinder 1</option>
                        <option <?php if($selectedYear==4) echo'selected';?>value="Grade1">Grade 1</option>
                        <option <?php if($selectedYear==5) echo'selected';?>value="Grade2">Grade 2</option>
                        <option <?php if($selectedYear==6) echo'selected';?>value="Grade5">Grade 5</option>
                        <option <?php if($selectedYear==7) echo'selected';?>value="Grade3">Grade 3</option>
                        <option <?php if($selectedYear==8) echo'selected';?>value="Grade4">Grade 4</option>
                        <option <?php if($selectedYear==9) echo'selected';?>value="Grade6">Grade 6</option>
                        <option <?php if($selectedYear==10) echo'selected';?>value="Grade7">Grade 7</option>
                        <option <?php if($selectedYear==11) echo'selected';?>value="Grade8">Grade 8</option>
                        <option <?php if($selectedYear==12) echo'selected';?>value="Grade9">Grade 9</option>
                        <option <?php if($selectedYear==13) echo'selected';?>value="Grade10">Grade 10</option>
                        <option <?php if($selectedYear==14) echo'selected';?>value="Grade11">Grade 11</option>
                        <option <?php if($selectedYear==15) echo'selected';?>value="Grade12">Grade 12</option>
                       </select>
                             </select>
                           </div>
                        </div>
  
                      </div> 

                      <div class="row">
  
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label>Sibling 2 Name</label>
                            <input value="<?php echo isset($_POST['sibling2-name']) ? $_POST['sibling2-name'] : '' ?>" 
                            name="sibling2-name" type="text" class="form-control" placeholder="FirstName LastName">
                          </div>
                        </div>
  
                        <div class="col-sm-3">
    
                           <div class="form-group">
                             <label class="unrequired-field">Level</label>
                             <select name="sibling2-level" class="form-control select2bs4" style="width: 100%;">
                        <?php if (isset($_POST['sibling2-level'])){
                        if ($_POST['sibling2-level']=="") {
                          $selectedYear = 1;
                        }
                        else if ($_POST['sibling2-level']=="Nursery1") {$selectedYear = 1;}
                        else if ($_POST['sibling2-level']=="Nursery2") {$selectedYear = 2;}
                        else if ($_POST['sibling2-level']=="Kinder1") {$selectedYear =  3;}
                        else if ($_POST['sibling2-level']=="Grade1") {$selectedYear =   4;}
                        else if ($_POST['sibling2-level']=="Grade2") {$selectedYear =   5;}
                        else if ($_POST['sibling2-level']=="Grade5") {$selectedYear =   6;}
                        else if ($_POST['sibling2-level']=="Grade3") {$selectedYear =   7;}
                        else if ($_POST['sibling2-level']=="Grade4") {$selectedYear =   8;}
                        else if ($_POST['sibling2-level']=="Grade6") {$selectedYear =   9;}
                        else if ($_POST['sibling2-level']=="Grade7") {$selectedYear =   10;}
                        else if ($_POST['sibling2-level']=="Grade8") {$selectedYear =   11;}
                        else if ($_POST['sibling2-level']=="Grade9") {$selectedYear =   12;}
                        else if ($_POST['sibling2-level']=="Grade10") {$selectedYear =  13;}
                        else if ($_POST['sibling2-level']=="Grade11") {$selectedYear =  14;}
                        else if ($_POST['sibling2-level']=="Grade12") {$selectedYear =  15;}}
                        else{$selectedYear=1;}
                        ?>
                        <option <?php if($selectedYear==1) echo'selected';?>value="Nursery1">Nursery 1</option>
                        <option <?php if($selectedYear==2) echo'selected';?>value="Nursery2">Nursery 2</option>
                        <option <?php if($selectedYear==3) echo'selected';?>value="Kinder1">Kinder 1</option>
                        <option <?php if($selectedYear==4) echo'selected';?>value="Grade1">Grade 1</option>
                        <option <?php if($selectedYear==5) echo'selected';?>value="Grade2">Grade 2</option>
                        <option <?php if($selectedYear==6) echo'selected';?>value="Grade5">Grade 5</option>
                        <option <?php if($selectedYear==7) echo'selected';?>value="Grade3">Grade 3</option>
                        <option <?php if($selectedYear==8) echo'selected';?>value="Grade4">Grade 4</option>
                        <option <?php if($selectedYear==9) echo'selected';?>value="Grade6">Grade 6</option>
                        <option <?php if($selectedYear==10) echo'selected';?>value="Grade7">Grade 7</option>
                        <option <?php if($selectedYear==11) echo'selected';?>value="Grade8">Grade 8</option>
                        <option <?php if($selectedYear==12) echo'selected';?>value="Grade9">Grade 9</option>
                        <option <?php if($selectedYear==13) echo'selected';?>value="Grade10">Grade 10</option>
                        <option <?php if($selectedYear==14) echo'selected';?>value="Grade11">Grade 11</option>
                        <option <?php if($selectedYear==15) echo'selected';?>value="Grade12">Grade 12</option>
                             </select>
                           </div>
                        </div>
  
                      </div> 

                      <div class="row">
  
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label>Sibling 3 Name</label>
                            <input value="<?php echo isset($_POST['sibling2-name']) ? $_POST['sibling2-name'] : '' ?>" 
                            name="sibling3-name" type="text" class="form-control" placeholder="FirstName LastName">
                          </div>
                        </div>
  
                        <div class="col-sm-3">
    
                           <div class="form-group">
                             <label class="unrequired-field">Level</label>
                             <select name="sibling3-level" class="form-control select2bs4" style="width: 100%;">
                        <?php if (isset($_POST['sibling3-level'])){
                        if ($_POST['sibling3-level']=="") {
                          $selectedYear = 1;
                        }
                        else if ($_POST['sibling3-level']=="Nursery1") {$selectedYear = 1;}
                        else if ($_POST['sibling3-level']=="Nursery2") {$selectedYear = 2;}
                        else if ($_POST['sibling3-level']=="Kinder1") {$selectedYear =  3;}
                        else if ($_POST['sibling3-level']=="Grade1") {$selectedYear =   4;}
                        else if ($_POST['sibling3-level']=="Grade2") {$selectedYear =   5;}
                        else if ($_POST['sibling3-level']=="Grade5") {$selectedYear =   6;}
                        else if ($_POST['sibling3-level']=="Grade3") {$selectedYear =   7;}
                        else if ($_POST['sibling3-level']=="Grade4") {$selectedYear =   8;}
                        else if ($_POST['sibling3-level']=="Grade6") {$selectedYear =   9;}
                        else if ($_POST['sibling3-level']=="Grade7") {$selectedYear =   10;}
                        else if ($_POST['sibling3-level']=="Grade8") {$selectedYear =   11;}
                        else if ($_POST['sibling3-level']=="Grade9") {$selectedYear =   12;}
                        else if ($_POST['sibling3-level']=="Grade10") {$selectedYear =  13;}
                        else if ($_POST['sibling3-level']=="Grade11") {$selectedYear =  14;}
                        else if ($_POST['sibling3-level']=="Grade12") {$selectedYear =  15;}}
                        else{$selectedYear=1;}
                        ?>
                        <option <?php if($selectedYear==1) echo'selected';?>value="Nursery1">Nursery 1</option>
                        <option <?php if($selectedYear==2) echo'selected';?>value="Nursery2">Nursery 2</option>
                        <option <?php if($selectedYear==3) echo'selected';?>value="Kinder1">Kinder 1</option>
                        <option <?php if($selectedYear==4) echo'selected';?>value="Grade1">Grade 1</option>
                        <option <?php if($selectedYear==5) echo'selected';?>value="Grade2">Grade 2</option>
                        <option <?php if($selectedYear==6) echo'selected';?>value="Grade5">Grade 5</option>
                        <option <?php if($selectedYear==7) echo'selected';?>value="Grade3">Grade 3</option>
                        <option <?php if($selectedYear==8) echo'selected';?>value="Grade4">Grade 4</option>
                        <option <?php if($selectedYear==9) echo'selected';?>value="Grade6">Grade 6</option>
                        <option <?php if($selectedYear==10) echo'selected';?>value="Grade7">Grade 7</option>
                        <option <?php if($selectedYear==11) echo'selected';?>value="Grade8">Grade 8</option>
                        <option <?php if($selectedYear==12) echo'selected';?>value="Grade9">Grade 9</option>
                        <option <?php if($selectedYear==13) echo'selected';?>value="Grade10">Grade 10</option>
                        <option <?php if($selectedYear==14) echo'selected';?>value="Grade11">Grade 11</option>
                        <option <?php if($selectedYear==15) echo'selected';?>value="Grade12">Grade 12</option>
                             </select>
                           </div>
                        </div>
  
                      </div> 

                    </div>

                  </div>
                </div><!-- /.card-body -->
              </div><!-- ./card -->
            </div><!-- /.col -->
          </div> <!-- /.row -->
         

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="btn-submit" class="btn btn-primary">Add Student</button>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- Modal -->

</body>
<script>
  $(function () {
    $("#example1").DataTable( {
    } );
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

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

$(document).ready(function() {
    $('#example').DataTable( {
        "scrollY": 200,
        "scrollX": true
    } );
} );

// $('input[name="school-last-attended"]').change(function() {
//   if ($(this).val() == ''||$(this).val() == '  ') {
//   $('input[name="last-school-attended-grade"]').prop("disabled",true);
//   $('input[name="last-school-attended-grade"]').val('');
//   $('input[name="last-school-attended-address"]').prop("disabled",true);
//   $('input[name="last-school-attended-address"]').val('');
//   $('input[name="last-school-attended-year"]').attr('disabled',true);
//   $('input[name="last-school-attended-year"]').val('');
//   $('input[name="last-school-attended-level"]').prop("disabled",true);
//   $('input[name="last-school-attended-level"]').val('');

//   }
//   else{
//     $('input[name="last-school-attended-grade"]').prop("disabled",false);
//     $('input[name="last-school-attended-address"]').prop("disabled",false);
//     $('input[name="last-school-attended-year"]').prop("disabled",false);
//     $('input[name="last-school-attended-level"]').prop("disabled",false);
//   }
// });


</script>
</html>

<?php 
if (isset($_POST["btn-submit"])) { 
      echo "<script> console.log('start'); </script>";
      $_POST['student-lrn'] = cleanThis($_POST['student-lrn']);
      if (strlen($_POST['student-lrn'])!=12 && strlen($_POST['student-lrn'])!=0){
        displayMessage("warning","LRN is Invalid","Please try again");
        echo "<script> console.log('lrn invalid'); </script>";
        }
      else if (substr($_POST['birthdate'],6)>date(Y) && $_POST['birthdate']!="" && $_POST['birthdate']!=" ") {
        displayMessage("warning","Birthdate Invalid","Please try again");
        echo "<script> console.log('bday'); </script>";
        }
      elseif (strlen(cleanThis($_POST['contact-person-mobile']))!=11) {
        displayMessage("warning","Invalid Mobile Number","Contact Person Mobile Number");
        echo "<script> console.log('contact Monile invalid'); </script>";
      }
      
      else{
        echo "<script> console.log('second'); </script>";
        $lrn=$_POST['student-lrn'];
        $code=$_POST['student-code'];
        $isLRNMatch;
        $isCodeMatch;
        $gender;
        $genderprefix;
        $sql = "select COUNT(LRN) as matchedLRN, COUNT(Code) as matchedCode, Lastname, Firstname, Middlename  from `tbl_student` where LRN = '".  $lrn."'";
      
        $result1 = mysqli_query($conn, $sql);
        $query1 = mysqli_fetch_assoc($result);
      
        if ($query1['matchedLRN']>0) {
          echo "<script> console.log('lrnmatch'); </script>";
          $isLRNMatch=true;
          $LRNName = combineName($query1['Firstname'],$query1['Lastname'],$query1['Middlename']);
          }
      
        else{
          echo "<script> console.log('lrnNOTmatch'); </script>";
            $isLRNMatch=false;
          }
      
        $sql = "select COUNT(Code) as matchedCode, Lastname, Firstname, Middlename  from `tbl_student` where Code ='".$code."'";
      
          $result2 = mysqli_query($conn, $sql);
          $query2 = mysqli_fetch_assoc($result);
      
        if ($query2['matchedCode']>0) {
          echo "<script> console.log('codematch'); </script>";
            $isCodeMatch=true;
            $CODEname = combineName($query2['Firstname'],$query2['Lastname'],$query2['Middlename']);
          }
      
          else{
            echo "<script> console.log('codeNOTmatch'); </script>";
            $isCodeMatch=false;
          } 
      
          if ($isLRNMatch && !$isCodeMatch) {
          $message="There is existing record <br> LRN:".$lrn."<br> Name: ".$LRNName;
          displayMessage("error","Duplicate Entry",$message);
          echo "<script> console.log('only lrn conflict'); </script>";
          }
      
          else if (!$isLRNMatch && $isCodeMatch) {
          $message="There is existing record <br> Student Code:".$code."<br> Name: ".$CODEName;
          displayMessage("error","Duplicate Entry",$message);
          echo "<script> console.log('only code conflict'); </script>";
          }
      
          else if ($isLRNMatch && $isCodeMatch) {
            if ($CODEname == $LRNName) {
                $message="There is existing record <br> LRN:".$lrn."<br> Name: ".$LRNName;
                displayMessage("error","Duplicate Entry",$message);
                echo "<script> console.log('one match'); </script>";
            }
      
            else if ($CODEname != $LRNName) {
              $message="Please check the LRN and Student code of The following <br> 1.)".$CODEname."<br> 2.)".$LRNName;
              displayMessage("error","Duplicate Entry",$message);
              echo "<script> console.log('more match'); </script>";
            }
          }
      
          else if (!$isCodeMatch && !$isLRNMatch) {
              $isEldest;
              $numberOfSiblings=0;
          
              if ($_POST['school-last-attended']==''||$_POST['school-last-attended']==' ') {
                $_POST['last-school-attended-year']='';
                $_POST['last-school-attended-level']='';
                $_POST['last-school-attended-grade']='';
                $_POST['last-school-attended-address']='';
              }
              else{
                $_POST['school-last-attended']=$_POST['school-last-attended'];
                $_POST['last-school-attended-year']=cleanThis($_POST['last-school-attended-year']);
                $_POST['last-school-attended-level']=$_POST['last-school-attended-level'];
                $_POST['last-school-attended-grade']=cleanThis($_POST['last-school-attended-grade']);
                $_POST['last-school-attended-address']=$_POST['last-school-attended-address'];
                $_POST['last-school-attended-grade']=cleanThis($_POST['last-school-attended-grade']);
              }
              if ($_POST['mother-name']==''|| $_POST['mother-name']==' ' ) {
                $_POST['mother-employer-name']='';
                $_POST['mother-employer-address']='';
                $_POST['mother-employer-phone']='';
                $_POST['mother-employer-mobile']='';
              }
              else{
                $_POST['mother-employer-phone']=cleanThis($_POST['mother-employer-phone']);
                $_POST['mother-employer-mobile']=cleanThis($_POST['mother-employer-mobile']);
              }
              if ($_POST['father-name']==''|| $_POST['father-name']==' ' ) {
                $_POST['father-employer-name']='';
                $_POST['father-employer-address']='';
                $_POST['father-employer-phone']='';
                $_POST['father-employer-mobile']='';
              }
              else{
                $_POST['father-employer-phone']=cleanThis($_POST['mother-employer-phone']);
                $_POST['father-employer-mobile']=cleanThis($_POST['mother-employer-mobile']);
              }
              if ($_POST['guardian-name']==''|| $_POST['guardian-name']==' ' ) {
                $_POST['guardian-relationship']='';
                $_POST['guardian-phone']='';
                $_POST['guardian-mobile']='';
              }
              else{
                $_POST['guardian-employer-phone']=cleanThis($_POST['mother-employer-phone']);
                $_POST['guardian-employer-mobile']=cleanThis($_POST['mother-employer-mobile']);
              }
              if ($_POST['sibling1-name']==''|| $_POST['sibling1-name']==' ' ) {
                $_POST['sibling1-level']='';
              }
              else{
                $numberOfSiblings++;
              }
              if ($_POST['sibling2-name']==''|| $_POST['sibling2-name']==' ' ) {
                $_POST['sibling2-level']='';
              }
              else{
                $numberOfSiblings++;
              }
              if ($_POST['sibling3-name']==''|| $_POST['sibling3-name']==' ' ) {
                $_POST['sibling3-level']='';
              }
              else{
                $numberOfSiblings++;
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
     $_POST['address']                      = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['address'])));
     $_POST['siblings-order']               = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['siblings-order'])));
     $_POST['student-lrn']                  = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['student-lrn'])));
     $_POST['first-name']                   = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['first-name'])));
     $_POST['middle-name']                  = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['middle-name'])));
     $_POST['last-name']                    = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['last-name'])));
     $_POST['suffix']                       = mysqli_real_escape_string($conn, stripcslashes($_POST['suffix']));
     $_POST['student-code']                 = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['student-code'])));
     $_POST['r1']                           = mysqli_real_escape_string($conn, stripcslashes($_POST['r1']));
     $_POST['birthdate']                    = mysqli_real_escape_string($conn, stripcslashes($_POST['birthdate']));
     $_POST['birthplace']                   = mysqli_real_escape_string($conn, stripcslashes($_POST['birthplace']));
     $_POST['school-last-attended']         = mysqli_real_escape_string($conn, stripcslashes($_POST['school-last-attended']));
     $_POST['last-school-attended-year']    = mysqli_real_escape_string($conn, stripcslashes($_POST['last-school-attended-year']));
     $_POST['last-school-attended-level']   = mysqli_real_escape_string($conn, stripcslashes($_POST['last-school-attended-level']));
     $_POST['last-school-attended-grade']   = mysqli_real_escape_string($conn, stripcslashes($_POST['last-school-attended-grade']));
     $_POST['last-school-attended-address'] = mysqli_real_escape_string($conn, stripcslashes($_POST['last-school-attended-address']));
     $_POST['contact-person-name']          = mysqli_real_escape_string($conn, stripcslashes($_POST['contact-person-name']));
     $_POST['contact-person-phone']         = mysqli_real_escape_string($conn, stripcslashes($_POST['contact-person-phone']));
     $_POST['contact-person-mobile']        = mysqli_real_escape_string($conn, stripcslashes($_POST['contact-person-mobile']));
     $_POST['mother-name']                  = mysqli_real_escape_string($conn, stripcslashes($_POST['mother-name']));
     $_POST['mother-employer-name']         = mysqli_real_escape_string($conn, stripcslashes($_POST['mother-employer-name']));
     $_POST['mother-employer-address']      = mysqli_real_escape_string($conn, stripcslashes($_POST['mother-employer-address']));
     $_POST['mother-employer-phone']        = mysqli_real_escape_string($conn, stripcslashes($_POST['mother-employer-phone']));
     $_POST['mother-employer-mobile']       = mysqli_real_escape_string($conn, stripcslashes($_POST['mother-employer-mobile']));
     $_POST['father-name']                  = mysqli_real_escape_string($conn, stripcslashes($_POST['father-name']));
     $_POST['father-employer-name']         = mysqli_real_escape_string($conn, stripcslashes($_POST['father-employer-name']));
     $_POST['father-employer-address']      = mysqli_real_escape_string($conn, stripcslashes($_POST['father-employer-address']));
     $_POST['father-employer-phone']        = mysqli_real_escape_string($conn, stripcslashes($_POST['father-employer-phone']));
     $_POST['father-employer-mobile']       = mysqli_real_escape_string($conn, stripcslashes($_POST['father-employer-mobile']));
     $_POST['guardian-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['guardian-name']));
     $_POST['guardian-relationship']        = mysqli_real_escape_string($conn, stripcslashes($_POST['guardian-relationship']));
     $_POST['guardian-phone']               = mysqli_real_escape_string($conn, stripcslashes($_POST['guardian-phone']));
     $_POST['guardian-mobile']              = mysqli_real_escape_string($conn, stripcslashes($_POST['guardian-mobile']));
     $_POST['guardian-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['guardian-name']));
     $_POST['sibling1-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling1-name']));
     $_POST['sibling1-level']               = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling1-level']));
     $_POST['sibling2-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling2-name']));
     $_POST['sibling2-level']               = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling2-level']));
     $_POST['sibling3-name']                = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling3-name']));
     $_POST['sibling3-level']               = mysqli_real_escape_string($conn, stripcslashes($_POST['sibling3-level']));




      $randomToken = generateNumericOTP(10);

$insertQuery = "Insert into tbl_student 
(
schoolID,
CurrentSchoolYear,
Code,
LRN,
Prefix,
Lastname,
Firstname,
Middlename,
Suffix,
Birthday,
Birthplace,
ContactPerson,
ContactMobile,
ContactPhone,
ContactEmail,
IsEldest,
) 
VALUES
(
'".$_SESSION['schoolID']."',
'".$_SESSION['CurrentSchoolYear']."',
'".$_POST['student-code']."',
'".$_POST['student-lrn ']."',
'".$_POST['Prefix']."',
'".$_POST['last-name']."',
'".$_POST['first-name']."',
'".$_POST['middle-name']."',
'".$_POST['suffix']."',
'".$_POST['Birthday']."',
'".$_POST['Birthplace']."',
'".$_POST['contact-person-name']."',
'".$_POST['contact-person-mobile']."',
'".$_POST['contact-person-phone']."',
'".$_POST['contact-person-email']."',
'".$IsEldest."'
)";
 mysqli_query($conn, $sql);
$sql = "select studentID from tbl_student where Code = ".$_POST['student-code'];

$result = mysqli_query($conn, $sql);
$pass_row = mysqli_fetch_assoc($result);
$studentID = $pass_row['accountID'];
 $insertQuery = "Insert into tbl_studentinfo 
(
studentID,
schoolID,
CurrentSchoolYear,
Family_Place,
Gender,
Address,
Telno,
Cellphone,
School_last_attended,
School_year,
School_Address,
Level_Completed,
Average_grade,
mother-name,
mother-employer-name,
mother-employer-address,
mother-employer-phone,
mother-employer-mobile,
father-name,
father-employer-name,
father-employer-address,
father-employer-phone,
father-employer-mobile,
guardian-name,
guardian-relationship,
guardian-phone,
guardian-mobile,
NoOfSiblings,
sibling1-name,
sibling1-level,
sibling2-name,
sibling2-level,
sibling3-name,
sibling3-level

) 
VALUES
(
'".$studentID."',
'".$_SESSION['schoolID']."',
'".$_SESSION['CurrentSchoolYear']."',
'".$_POST['siblings-order']."',
'".$Gender."',
'".$_POST['address'] ."',
'".Telno."',
'".Cellphone."',
'".School_last_attended."',
'".School_year."',
'".School_Address."',
'".Level_Completed."',
'".Average_grade."',
'".mother-name."',
'".mother-employer-name."',
'".mother-employer-address."',
'".mother-employer-phone."',
'".mother-employer-mobile."',
'".father-name."',
'".father-employer-name."',
'".father-employer-address."',
'".father-employer-phone."',
'".father-employer-mobile."',
'".guardian-name."',
'".guardian-relationship."',
'".guardian-phone."',
'".guardian-mobile."',
'".NoOfSiblings."',
'".sibling1-name."',
'".sibling1-level."',
'".sibling2-name."',
'".sibling2-level."',
'".sibling3-name."',
'".sibling3-level."'
)";

              displayMessage("success","Success",$message);
              echo "<script> console.log('no match'); </script>";

        
        }
      }
}
?>

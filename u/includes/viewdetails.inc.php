  <?php 
    if ($Prefix =="Mr.") {
      $sex = "Male";
    }
    else{
      $sex = "Female";
    }

    $hasContact;
    $hasSchoolInfo;
    $hasFather;
    $hasMother;
    $sibling1_siblingID;
    $sibling1_fullName ;
    $sibling1_level    ;
    $sibling2_siblingID;
    $sibling2_fullName ;
    $sibling2_level    ;
    $sibling3_siblingID;
    $sibling3_fullName ;
    $sibling3_level    ;
    $hasSibling1=0;
    $hasSibling2=0;
    $hasSibling3=0;
    $hasFamilyinformation=1;

    $sql = "sELECT a.* FROM tbl_contact AS a WHERE a.studentID = '".$studentID."'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        if ($pass_row = mysqli_fetch_array ($result)) {
            $haveContact='1';

            $contactID      = $pass_row['2'];
            $fullName       = $pass_row['3'];
            $phone          = $pass_row['4'];
            $mobile         = $pass_row['5'];
            $email         = $pass_row['6'];
        }
        else{
          $haveContact='0';
        }
            
    }
    else{
      $haveContact='0';
    }

  }

  else{
      $haveContact='0';
  }

      $sql = "sELECT a.* FROM tbl_schoolinfo AS a WHERE a.studentID = '".$studentID."'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        if ($pass_row = mysqli_fetch_array ($result)) {
            $hasSchoolInfo ='1';

            $schoolInfoID       = $pass_row['2'];
            $schoolLastAttended = $pass_row['3'];
            $schoolYear         = $pass_row['4'];
            $schoolAddress      = $pass_row['5'];
            $levelCompleted     = $pass_row['6'];
            $averageGrade       = $pass_row['7'];
        }
        else{
          $hasSchoolInfo ='0';
        }
            
    }
    else{
      $hasSchoolInfo ='0';
    }

  }

  else{
      $hasSchoolInfo ='0';
  }

  $sql = "sELECT a.* FROM tbl_parents AS a WHERE a.studentID = '".$studentID."' and isFather = '0'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        if ($pass_row = mysqli_fetch_array ($result)) {
            $hasMother ='1';

            $mother_parentID       = $pass_row['2'];
            $mother_fullName       = $pass_row['3'];
            $mother_employerName   = $pass_row['4'];
            $mother_mobileNumber   = $pass_row['6'];
        }
        else{
          $hasMother ='0';
        }
            
    }
    else{
      $hasMother ='0';
    }

  }

  else{
      $hasMother ='0';
  }

  $sql = "sELECT a.* FROM tbl_parents AS a WHERE a.studentID = '".$studentID."' and isFather = '1'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        if ($pass_row = mysqli_fetch_array ($result)) {
            $hasFather ='1';

            $father_parentID       = $pass_row['2'];
            $father_fullName       = $pass_row['3'];
            $father_employerName   = $pass_row['4'];
            $father_mobileNumber   = $pass_row['6'];
        }
        else{
          $hasFather ='0';
        }
            
    }
    else{
      $hasFather ='0';
    }

  }

  else{
      $hasFather ='0';
  }

  $sql = "sELECT a.* FROM tbl_siblings AS a WHERE a.studentID = '".$studentID."'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        while ($pass_row = mysqli_fetch_array ($result)) {
          if ($pass_row['siblingNo'] == '1') {
            $hasSibling1='1';
            $sibling1_siblingID = $pass_row['siblingID'];
            $sibling1_fullName  = $pass_row['fullName'];
            $sibling1_level     = $pass_row['level'];
          }
          else if ($pass_row['siblingNo'] == '2') {
            $hasSibling2='1';
            $sibling2_siblingID = $pass_row['siblingID'];
            $sibling2_fullName  = $pass_row['fullName'];
            $sibling2_level     = $pass_row['level'];
          }
          else if ($pass_row['siblingNo'] == '3') {
            $hasSibling3='1';
            $sibling3_siblingID = $pass_row['siblingID'];
            $sibling3_fullName  = $pass_row['fullName'];
            $sibling3_level     = $pass_row['level'];
          }
        }
            
    }
    // else{
    //   $hasSibling1 ='0';
    // }

  }

  // else{
  //     $hasSibling1 ='0';
  // }
  // 

  if (!$hasSibling1 && !$hasSibling2 && !$hasSibling3 && !$hasFather && !$hasMother) {
    $hasFamilyinformation='0';
  }

  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $Lastname?>'s information</h1>
          </div>
          <div class="col-sm-6">
            <a href="?page=<?php echo $studentID?>&print" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Registration</a></li>
              <li class="breadcrumb-item active">View Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


    <div class="row">
      <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Student Information</h3>
                        <div class="card-tools">
                          <!-- Collapse Button -->
                          <button type="button" onclick="ShowCard()" data-card-widget="collapse" id="student-card" class="btn btn-tool no-print" ><i class="fas fa-plus"></i> Show</button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->

              <div class="card-body collapse">
                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Name: </b><?php echo combineName($Firstname,$Lastname,$Middlename); ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Sex: </b><?php echo $sex ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>LRN: </b><?php echo $LRN ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Student Code: </b><?php echo $studentCode ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Suffix: </b><?php echo $Suffix ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Birthdate: </b><?php echo $Birthdate ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Birthplace: </b><?php echo $Birthplace ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Address: </b><?php echo $Address ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Telephone Number: </b><?php echo $Telno ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Mobile Number: </b><?php echo $Cellphone ?></div>
                    </div>
                  </div>
                </div> 


                <br>
                <button 
                data-toggle="modal" data-target="#studentinfo"
                type="button" class="btn btn-primary add-button">
                <span class=" fa fa fa-edit">&nbsp&nbsp</span>Edit
                </button>

              </div>
            </div>
      </div>

<div class="col-lg-6">
                    <div class="card card-danger card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Contact Information</h3>
                        <div class="card-tools ">
                          <button type="button" data-card-widget="collapse" id="contact-card" class="btn btn-tool no-print" ><i class="fas fa-plus"></i> Show</button>
                        </div>
                        <!-- /.card-tools -->
                      </div>

                      <!-- /.card-header -->

              <div class="card-body collapse ">
              <?php if($haveContact){?>
                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Full Name: </b> <?php echo $fullName?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Phone Number: </b>    <?php echo $phone?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Mobile Number: </b>   <?php echo $mobile?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Email: </b>    <?php echo $email?></div>
                    </div>
                  </div>
                </div> 
              <?php } else{ echo'<p class="card-text">This Student dont have contact information</p>';}?>



                <br>
                <a href="#" class="btn btn-primary no-print"><i class="fa fa-edit"></i> Edit</a>
              </div>
            </div>
      </div>

    </div>

    <div class="row">
<div class="col-lg-6">
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Last School Information</h3>
                        <div class="card-tools">
                          <!-- Collapse Button -->
                          <button type="button" data-card-widget="collapse" id="ls-card" class="btn btn-tool no-print" ><i class="fas fa-plus"></i> Show</button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
            
              <?php if ($hasSchoolInfo) {
             ?>
            <div class="card-body collapse">
                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>School: </b><?php echo $schoolLastAttended ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>School Year: </b><?php echo $schoolYear ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>School Address: </b><?php echo $schoolAddress ?></div>
                    </div>
                  </div>
                </div>
                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Average Grade: </b><?php echo $averageGrade ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Incomming Level: </b><?php echo $levelCompleted ?></div>
                    </div>
                  </div>
                </div> 

                <?php }?>

                <br>
                <a href="#" class="btn btn-primary no-print"><i class="fa fa-edit"></i> Edit</a>
              </div>
            </div>
      </div>
<div class="col-lg-6">
                    <div class="card card-warning card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Family Information</h3>
                        <div class="card-tools">
                          <!-- Collapse Button -->
                          <button type="button" data-card-widget="collapse" id="family-card" class="btn btn-tool no-print" value="0" ><i class="fas fa-plus"> Show</i></button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->

              <div class="card-body collapse">

                <?php 

                  if (!$hasFamilyinformation) {
                    echo "<p class='no-print'>Family information is not set</p>";
                  }
                  else{
                    if ($hasMother) {
                      
                 ?>

                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Mother's Full Name: </b><?php echo $mother_fullName; ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Mother's Mobile Number: </b><?php echo $mother_mobileNumber; ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Mother's Employer Name: </b><?php echo $mother_employerName; ?></div>
                    </div>
                  </div>
                  <br>
                </div> 
                  <hr class="hrstyle">
                
  
                  
                  <?php } 
                    if ($hasFather) {
                  ?>

                                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Fathers's Full Name: </b><?php echo $father_fullName; ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Fathers's Mobile Number: </b><?php echo $father_mobileNumber; ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Fathers's Employer Name: </b><?php echo $father_employerName; ?></div>
                    </div>
                  </div>
                  <br>
                </div> 
                  <hr class="hrstyle">

              <?php } 
                if ($hasSibling1) {
              ?>

                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Sibling-1's Full Name: </b><?php echo $sibling1_fullName; ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Sibling-1's Level: </b><?php echo $sibling1_level; ?></div>
                    </div>
                  </div>
                </div> 
                  <hr class="hrstyle">


              <?php } 
                if ($hasSibling2) {
              ?>

                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Sibling-2's Full Name: </b><?php echo $sibling2_fullName; ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Sibling-2's Level: </b><?php echo $sibling2_level; ?></div>
                    </div>
                  </div>
                </div>
                  <hr class="hrstyle">


              <?php } 
                if ($hasSibling3) {
              ?>

                <div class="row">                
                  <div class="col-lg-6 col-print-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Sibling-3's Full Name: </b><?php echo $sibling3_fullName; ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-print-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Sibling-3's Level: </b><?php echo $sibling3_level; ?></div>
                    </div>
                  </div>
                </div> 
                
                <?php }} ?>



                <br>
                <a href="#" class="btn btn-primary no-print"><i class="fa fa-edit"></i> Edit</a>
              </div>
            </div>
      </div>
    </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- $studentID -->
<div class="modal  fade" id="addstudentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">

                <h2 class="modal-title" id="exampleModalLongTitle">Add Student</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="callout callout-info">
                <a class="modal-myheading">Student Information</a>
                <br>
                <br>

                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="required-field">Student Code</label>
                            <br>
                            <div class="input-group">
                                <input value="<?php echo isset($_POST['student-code']) ? $_POST['student-code'] : '' ?>" name="student-code" required type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="unrequired-field">LRN</label>
                            <br>
                            <div class="input-group">
                                <input value="<?php echo isset($_POST['student-lrn']) ? $_POST['student-lrn'] : '' ?>" name="student-lrn" type="text" class="form-control" data-inputmask='"mask": " 999999999999    "' data-mask>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">

                        <div class="form-group clearfix">
                            <label class="genderform">Gender</label>
                            <br>

                            <div class="icheck-primary d-inline">
                                <input <?php if(isset($_POST[ 'r1']) && $_POST[ 'r1']=="female" ) echo 'checked'; ?> value="female" type="radio" id="radioPrimary2" name="r1" checked>
                                <label for="radioPrimary2">Female
                                </label>
                            </div>&nbsp

                            <div class="icheck-primary d-inline">
                                <input <?php if(isset($_POST[ 'r1']) && $_POST[ 'r1']=="male" ) echo 'checked'; ?> value="male" type="radio" id="radioPrimary1" name="r1" >
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
                            <input value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>" name="first-name" required type="text" class="form-control" placeholder="Enter First Name">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="unrequired-field">Middle Name</label>
                            <input value="<?php echo isset($_POST['middle-name']) ? $_POST['middle-name'] : '' ?>" name="middle-name" type="text" class="form-control" placeholder="Enter Middle Name">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="required-field">Surname/Last Name</label>
                            <input value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>" name="last-name" required type="text" class="form-control" placeholder="Enter Last Name">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="unrequired-field">Student / Family Address</label>
                            <input value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" name="address" type="text" class="form-control" placeholder="Enter School Address">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="unrequired-field">Student Phone Number</label>
                            <br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input value="<?php echo isset($_POST['student-phone']) ? $_POST['student-phone'] : '' ?>" name="student-phone" type="text" class="form-control" data-inputmask='"mask": "999-99-99    "' data-mask>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="unrequired-field">Student Mobile Number</label>
                            <br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                </div>
                                <input value="<?php echo isset($_POST['student-mobile']) ? $_POST['student-mobile'] : '' ?>" name="student-mobile" type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="unrequired-field">Suffix</label>
                            <input value="<?php echo isset($_POST['suffix']) ? $_POST['suffix'] : '' ?>" name="suffix" type="text" class="form-control" placeholder="E.g: Jr, Sr">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="unrequired-field">Birthdate</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input value="<?php echo isset($_POST['birthdate']) ? $_POST['birthdate'] : '' ?>" name="birthdate" id="datemask2" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="unrequired-field">Birthplace</label>
                            <input value="<?php echo isset($_POST['birthplace']) ? $_POST['birthplace'] : '' ?>" name="birthplace" type="text" class="form-control" placeholder="">
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
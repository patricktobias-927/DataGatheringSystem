  <?php 
    if ($Prefix =="Mr.") {
      $sex = "Male";
    }
    else{
      $sex = "Female";
    }

    $hasContact;
    $hasSchoolInfo;

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
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->

              <div class="card-body">
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Name: </b><?php echo combineName($Firstname,$Lastname,$Middlename); ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Sex: </b><?php echo $sex ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>LRN: </b><?php echo $LRN ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Student Code: </b><?php echo $studentCode ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Suffix: </b><?php echo $Suffix ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Birthdate: </b><?php echo $Birthdate ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Birthplace: </b><?php echo $Birthplace ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Address: </b><?php echo $Address ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Telephone Number: </b><?php echo $Telno ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Mobile Number: </b><?php echo $Cellphone ?></div>
                    </div>
                  </div>
                </div> 


                <br>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>

<div class="col-lg-6">
                    <div class="card card-danger card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Contact Information</h3>
                        <div class="card-tools">
                          <!-- Collapse Button -->
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->

              <div class="card-body">
              <?php if($haveContact){?>
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Full Name: </b> <?php echo $fullName?></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Phone Number: </b>    <?php echo $phone?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Mobile Number: </b>   <?php echo $mobile?></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Email: </b>    <?php echo $email?></div>
                    </div>
                  </div>
                </div> 
              <?php } else{ echo'<p class="card-text">This Student dont have contact information</p>';}?>



                <br>
                <a href="#" class="btn btn-primary">Go somewhere</a>
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
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
  
            <div class="card-body">
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>School: </b><?php echo $schoolLastAttended ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>School Year: </b><?php echo $schoolYear ?></div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>School Address: </b><?php echo $schoolAddress ?></div>
                    </div>
                  </div>
                </div>
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Average Grade: </b><?php echo $averageGrade ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Incomming Level: </b><?php echo $levelCompleted ?></div>
                    </div>
                  </div>
                </div> 
                <br>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
<div class="col-lg-6">
                    <div class="card card-warning card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Family Information</h3>
                        <div class="card-tools">
                          <!-- Collapse Button -->
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->

              <div class="card-body">
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Name: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Sex: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>LRN: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Student Code: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Suffix: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Birthdate: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Birthplace: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Address: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Telno: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Cellphone: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                </div> 


                <br>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
    </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- $studentID -->

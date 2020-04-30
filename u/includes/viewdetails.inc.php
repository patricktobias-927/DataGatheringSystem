  <?php 
    if ($Prefix =="Mr.") {
      $sex = "Male";
    }
    else{
      $sex = "Female";
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


                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Full Name: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Phone Number: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Mobile Number: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Email: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                </div> 


                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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
                        <div class="col-sm-auto details-title"><b>School: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>School Year: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                </div> 
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>School Address: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                </div>
                <div class="row">                
                  <div class="col-lg-6" > 
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Average Grade: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-auto details-title"><b>Level Completed: </b>Pangilinan, Jerrnie B.</div>
                    </div>
                  </div>
                </div> 

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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


                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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

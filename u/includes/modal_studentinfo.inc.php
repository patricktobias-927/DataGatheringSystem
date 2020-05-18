<!-- Modal -->
<div class="modal  fade" id="addstudentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLongTitle">New Student Form </h2><span style="color: red;">* Required</span>
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
                                  <input title="We will fill this up for you" value="<?php echo isset($studentCode ) ? $studentCode  : '' ?>"
                                  name="student-code" type="text" class="form-control">
                                 </div>
                               </div>
                              </div>
      
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label class="unrequired-field">LRN</label><br>
                                <div class="input-group">
                                  <input value="<?php if(isset($LRN)){echo$LRN;}?>"
                                  name="student-lrn" type="text" class="form-control" data-inputmask='"mask": " 999999999999    "' data-mask>
                                 </div>
                               </div>
                              </div>
      
                            <div class="col-lg-4">
      
                              <div class="form-group clearfix"> 
                                <label class="genderform">Gender</label><br>
      
                                <div class="icheck-primary d-inline">
                                    <input <?php if(isset($Prefix) && $Prefix=="F") echo 'checked'; ?>
                                    value="female" type="radio" id="radioPrimary2" name="r1" checked>
                                    <label for="radioPrimary2">Female
                                    </label>
                                </div>&nbsp
      
                                <div class="icheck-primary d-inline">
                                   <input <?php if(isset($Prefix) && $Prefix=="M") echo 'checked'; ?>
                                   value="male" type="radio" id="radioPrimary1" name="r1" >
                                   <label for="radioPrimary1">Male
                                   </label>
                                </div>
      
                              </div> 
                            </div>  
                                                    <div class="col-lg-3">
      
                           <div class="form-group">
                             <label class="unrequired-field">Incoming Level</label>
                             <select name="inComingLevel" class="form-control select2bs4 ">
                              <?php 
                              if (isset($levelCompleted)){?>
                              <option <?php if($levelCompleted=="Nursery 1") {echo' selected ="true"';}?>value="Nursery 1">Nursery 1</option>
                              <option <?php if($levelCompleted=="Nursery 2") {echo' selected ="true"';}?>value="Nursery 2">Nursery 2</option>
                              <option <?php if($levelCompleted=="Kinder 1") {echo' selected ="true"';}?>value="Kinder 1">Kinder 1</option>
                              <option <?php if($levelCompleted=="Kinder 2") {echo' selected ="true"';}?>value="Kinder 2">Kinder 2</option>
                              <option <?php if($levelCompleted=="Grade 1") {echo' selected ="true"';}?>value="Grade 1">Grade 1</option>
                              <option <?php if($levelCompleted=="Grade 2"){echo' selected ="true"';}?>value="Grade 2">Grade 2</option>
                              <option <?php if($levelCompleted=="Grade 3"){echo' selected ="true"';}?>value="Grade 3">Grade 3</option>
                              <option <?php if($levelCompleted=="Grade 4"){echo' selected ="true"';}?>value="Grade 4">Grade 4</option>
                              <option <?php if($levelCompleted=="Grade 5"){echo' selected ="true"';}?>value="Grade 5">Grade 5</option>
                              <option <?php if($levelCompleted=="Grade 6"){echo' selected ="true"';}?>value="Grade 6">Grade 6</option>
                              <option <?php if($levelCompleted=="Grade 7"){echo' selected ="true"';}?>value="Grade 7">Grade 7</option>
                              <option <?php if($levelCompleted=="Grade 8"){echo' selected ="true"';}?>value="Grade 8">Grade 8</option>
                              <option <?php if($levelCompleted=="Grade 9"){echo' selected ="true"';}?>value="Grade 9">Grade 9</option>
                              <option <?php if($levelCompleted=="Grade 10") {echo' selected ="true"';}?>value="Grade 10">Grade 10</option>
                              <option <?php if($levelCompleted=="Grade 11") {echo' selected ="true"';}?>value="Grade 11">Grade 11</option>
                              <option <?php if($levelCompleted=="Grade 12") {echo' selected ="true"';}?>value="Grade 12">Grade 12</option>

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
      
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label name="first-name-lbl" class="required-field">First Name</label>
                              <input value="<?php if(isset($Firstname)){echo$Firstname;}?>"
                              name="first-name" required type="text" class="form-control textOnly">
                            </div>
                          </div>
      
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label name="first-name-lbl"  class="unrequired-field">Middle Name</label>
                              <input value="<?php if(isset($Middlename)){echo$Middlename;}?>"
                              name="middle-name"type="text" class="form-control textOnly">
                            </div>
                          </div>
      
                          <div class="col-lg-4">
                            <div name="middle-name-lbl"  class="form-group">
                              <label class="required-field">Surname/Last Name</label>
                              <input value="<?php if(isset($Lastname)){echo$Lastname;}?>"
                              name="last-name"required type="text" class="form-control textOnly">
                            </div>
                          </div>
      
                      </div>
      
                        <div class="row">
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label name="last-name-lbl" class="unrequired-field ">Suffix</label>
                              <input value="<?php echo isset($Suffix) ? $Suffix : '' ?>"
                              name="suffix" type="text" class="form-control textOnly" placeholder="E.g: Jr, Sr">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="unrequired-field">Complete Address</label>
                              <input value="<?php if(isset($Address)){echo $Address;}?>"
                              name="address" type="text" class="form-control ">
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label class="unrequired-field ">City</label>
                              <input value="<?php if(isset($city)){echo$city;}?>"
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
                                <input value="<?php if(isset($Birthdate)){echo date('d/m/Y', strtotime($Birthdate));}?>"
                                name="birthdate" id="datemask2" type="text" class="form-control" data-inputmask-alias="datetime"data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                              </div>
                            </div>
                          </div>
      
                          <div class="col-lg-4">  
                            <div class="form-group">
                              <label class="unrequired-field">Birthplace</label>
                              <input value="<?php if(isset($Birthplace)){echo$Birthplace;}?>"
                              name="birthplace" type="text" class="form-control" placeholder="">
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
                            <input value="<?php if(isset($schoolLastAttended)){echo$schoolLastAttended;}?>"
                            name="school-last-attended" type="text" class="form-control" placeholder="Enter School Name">
                          </div>
                        </div>
      
                        <div class="col-lg-2">
                           <div class="form-group">
                             <label class="unrequired-field">School Year </label>
      
                             <select placeholder="Enter School Name" name="last-school-attended-year" class="form-control select2bs4">

                               <?php 
                                  $start = date('Y');
                                  $end = $start-=1;
                                  $start++;
                                  $instance=0;
                                  $years=20;
                                  for ($i=0; $i <($years) ; $i++) { 
                                    $SY= $end." - ".$start;
                                    if ((!isset($schoolYear))&&(!$instance)) {
                                      echo "<option value='". $SY."' Selected='true'>". $SY."</option>";
                                      $start--;
                                      $end--;
                                      $instance=1;
                                    }
                                    elseif(isset($schoolYear) && $schoolYear==$SY){ $selected="Selected='true'";}
                                    else{$selected="";}
                                    echo "<option value='". $SY."' ".$selected.">". $SY."</option>";
                                    $start--;
                                    $end--;
                                  }
      
                               ?>
      
                             </select>
                           </div>
                        </div>

      
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label class="unrequired-field">Average Grade</label><br>
                            <div class="input-group">
                                <input  value="<?php if(isset($averageGrade)){echo$averageGrade;}?>"
                                name="last-school-attended-grade" type="text" class="form-control" data-inputmask='"mask": "99.99    "' data-mask>
                             </div>
                           </div>
                          </div> 
                        </div>
      
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="unrequired-field">School Address</label>
                              <input value="<?php if(isset($schoolAddress)){echo$schoolAddress;}?>"
                              name="last-school-attended-address" type="text" class="form-control" placeholder="Enter School Address">
                            </div>
                          </div>



                        </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-danger" id="next-stud-cancel" data-dismiss="modal">Cancel</a>
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
                      <input value="<?php if(isset($fullName)){echo$fullName;}?>"
                      name="contact-person-name" required type="text" class="form-control textOnly2" placeholder="FirstName LastName">
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
                         <input value="<?php if(isset($phone)){echo$phone;}?>"
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
                         <input value="<?php if(isset($mobile)){echo$mobile;}?>"
                         name="contact-person-mobile" required type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                        </div>
                      </div>  
                     </div> 
      
                      <div class="col-lg-4">
                         <div class="form-group">
                           <label class="required-field" for="exampleInputEmail1">Email address</label>
                           <input required="true" value="<?php if(isset($email)){echo$email;}?>"
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
                                <input value="<?php if(isset($mother_fullName)){echo$mother_fullName;}?>"
                                name="mother-name" type="text" class="form-control textOnly2" placeholder="FirstName LastName">
                              </div>
                            </div>
  
      
                          </div>
      
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Employer Name</label>
                                <input value="<?php if(isset($mother_employerName)){echo$mother_employerName;}?>"
                                name="mother-employer-name" type="text" class="form-control" placeholder="FirstName LastName / Company Name">
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
                                <input value="<?php if(isset($father_fullName)){echo$father_fullName;}?>"
                                name="father-name" type="text" class="form-control textOnly2" placeholder="FirstName LastName">
                              </div>
                            </div>

      
                          </div>
        
            
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Employer Name</label>
                                <input value="<?php if(isset($father_employerName)){echo$father_employerName;}?>"
                                name="father-employer-name" type="text" class="form-control" placeholder="FirstName LastName / Company Name">
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
                                <input value="<?php if(isset($guardian_fullName)){echo$guardian_fullName;}?>"
                                name="guardian-name" type="text" class="form-control textOnly2" placeholder="FirstName LastName">
                              </div>
                            </div>
      
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label >Relationship</label>
                                <input value="<?php if(isset($guardian_relationship)){echo$guardian_relationship;}?>" 
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
                                 <input value="<?php if(isset($guardian_phone)){echo$guardian_phone;}?>" 
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
                                 <input value="<?php if(isset($guardian_mobileNumber)){echo$guardian_mobileNumber;}?>" 
                                 name="guardian-mobile" type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
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
                                <input class="unrequired-field" name ="isEldest" type="checkbox" id="checkboxPrimary1" 
                                <?php 
                                if (isset($IsEldest) && $IsEldest == 'Yes') {echo 'checked';} 
                                ?> >
                                <label class="unrequired-field" for="checkboxPrimary1">Eldest?
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-8" >
                              <div class="icheck-primary d-inline">
                              <div class="input-group">
                                <input <?php 
                                if (isset($IsEldest) && $IsEldest == 'Yes') {
                                  echo "value='1' disabled='true' ";
                                }
                                else if(isset($familyPlace )){echo "value='".$familyPlace."'" ;}
                                ?>
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
                                <input value="<?php if(isset($sibling1_fullName)){echo$sibling1_fullName;}?>" 
                                name="sibling1-name" type="text" class="form-control textOnly" placeholder="FirstName LastName">
                              </div>
                            </div>  
                            <div class="col-lg-3">
        
                               <div class="form-group">
                                 <label class="unrequired-field">Level</label>
                                 <select name="sibling1-level" class="form-control select2bs4">
                           <?php 
                              if (isset($sibling1_level)){?>
                              <option <?php if($sibling1_level=="Nursery 1") {echo' selected ="true"';}?>value="Nursery 1">Nursery 1</option>
                              <option <?php if($sibling1_level=="Nursery 2") {echo' selected ="true"';}?>value="Nursery 2">Nursery 2</option>
                              <option <?php if($sibling1_level=="Kinder 1") {echo' selected ="true"';}?>value="Kinder 1">Kinder 1</option>
                              <option <?php if($sibling1_level=="Kinder 2") {echo' selected ="true"';}?>value="Kinder 2">Kinder 2</option>
                              <option <?php if($sibling1_level=="Grade 1") {echo' selected ="true"';}?>value="Grade 1">Grade 1</option>
                              <option <?php if($sibling1_level=="Grade 2"){echo' selected ="true"';}?>value="Grade 2">Grade 2</option>
                              <option <?php if($sibling1_level=="Grade 3"){echo' selected ="true"';}?>value="Grade 3">Grade 3</option>
                              <option <?php if($sibling1_level=="Grade 4"){echo' selected ="true"';}?>value="Grade 4">Grade 4</option>
                              <option <?php if($sibling1_level=="Grade 5"){echo' selected ="true"';}?>value="Grade 5">Grade 5</option>
                              <option <?php if($sibling1_level=="Grade 6"){echo' selected ="true"';}?>value="Grade 6">Grade 6</option>
                              <option <?php if($sibling1_level=="Grade 7"){echo' selected ="true"';}?>value="Grade 7">Grade 7</option>
                              <option <?php if($sibling1_level=="Grade 8"){echo' selected ="true"';}?>value="Grade 8">Grade 8</option>
                              <option <?php if($sibling1_level=="Grade 9"){echo' selected ="true"';}?>value="Grade 9">Grade 9</option>
                              <option <?php if($sibling1_level=="Grade 10") {echo' selected ="true"';}?>value="Grade 10">Grade 10</option>
                              <option <?php if($sibling1_level=="Grade 11") {echo' selected ="true"';}?>value="Grade 11">Grade 11</option>
                              <option <?php if($sibling1_level=="Grade 12") {echo' selected ="true"';}?>value="Grade 12">Grade 12</option>
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
                                <input value="<?php if(isset($sibling2_fullName)){echo$sibling2_fullName;}?>" 
                                name="sibling2-name" type="text" class="form-control textOnly" placeholder="FirstName LastName">
                              </div>
                            </div>
      
                            <div class="col-lg-3">
        
                               <div class="form-group">
                                 <label class="unrequired-field">Level</label>
                                 <select name="sibling2-level" class="form-control select2bs4">
                           <?php 
                              if (isset($sibling2_level)){?>
                              <option <?php if($sibling2_level=="Nursery 1") {echo' selected ="true"';}?>value="Nursery 1">Nursery 1</option>
                              <option <?php if($sibling2_level=="Nursery 2") {echo' selected ="true"';}?>value="Nursery 2">Nursery 2</option>
                              <option <?php if($sibling2_level=="Kinder 1") {echo' selected ="true"';}?>value="Kinder 1">Kinder 1</option>
                              <option <?php if($sibling2_level=="Kinder 2") {echo' selected ="true"';}?>value="Kinder 2">Kinder 2</option>
                              <option <?php if($sibling2_level=="Grade 1") {echo' selected ="true"';}?>value="Grade 1">Grade 1</option>
                              <option <?php if($sibling2_level=="Grade 2"){echo' selected ="true"';}?>value="Grade 2">Grade 2</option>
                              <option <?php if($sibling2_level=="Grade 3"){echo' selected ="true"';}?>value="Grade 3">Grade 3</option>
                              <option <?php if($sibling2_level=="Grade 4"){echo' selected ="true"';}?>value="Grade 4">Grade 4</option>
                              <option <?php if($sibling2_level=="Grade 5"){echo' selected ="true"';}?>value="Grade 5">Grade 5</option>
                              <option <?php if($sibling2_level=="Grade 6"){echo' selected ="true"';}?>value="Grade 6">Grade 6</option>
                              <option <?php if($sibling2_level=="Grade 7"){echo' selected ="true"';}?>value="Grade 7">Grade 7</option>
                              <option <?php if($sibling2_level=="Grade 8"){echo' selected ="true"';}?>value="Grade 8">Grade 8</option>
                              <option <?php if($sibling2_level=="Grade 9"){echo' selected ="true"';}?>value="Grade 9">Grade 9</option>
                              <option <?php if($sibling2_level=="Grade 10") {echo' selected ="true"';}?>value="Grade 10">Grade 10</option>
                              <option <?php if($sibling2_level=="Grade 11") {echo' selected ="true"';}?>value="Grade 11">Grade 11</option>
                              <option <?php if($sibling2_level=="Grade 12") {echo' selected ="true"';}?>value="Grade 12">Grade 12</option>

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
                                <input value="<?php if(isset($sibling3_fullName)){echo$sibling3_fullName;}?>" 
                                name="sibling3-name" type="text" class="form-control" placeholder="FirstName LastName">
                              </div>
                            </div>
      
                            <div class="col-lg-3">
        
                               <div class="form-group">
                                 <label class="unrequired-field">Level</label>
                                 <select name="sibling3-level" class="form-control select2bs4">
                           <?php 
                              if (isset($sibling3_level)){?>
                              <option <?php if($sibling3_level=="Nursery 1") {echo' selected ="true"';}?>value="Nursery 1">Nursery 1</option>
                              <option <?php if($sibling3_level=="Nursery 2") {echo' selected ="true"';}?>value="Nursery 2">Nursery 2</option>
                              <option <?php if($sibling3_level=="Kinder 1") {echo' selected ="true"';}?>value="Kinder 1">Kinder 1</option>
                              <option <?php if($sibling3_level=="Kinder 2") {echo' selected ="true"';}?>value="Kinder 2">Kinder 2</option>
                              <option <?php if($sibling3_level=="Grade 1") {echo' selected ="true"';}?>value="Grade 1">Grade 1</option>
                              <option <?php if($sibling3_level=="Grade 2"){echo' selected ="true"';}?>value="Grade 2">Grade 2</option>
                              <option <?php if($sibling3_level=="Grade 3"){echo' selected ="true"';}?>value="Grade 3">Grade 3</option>
                              <option <?php if($sibling3_level=="Grade 4"){echo' selected ="true"';}?>value="Grade 4">Grade 4</option>
                              <option <?php if($sibling3_level=="Grade 5"){echo' selected ="true"';}?>value="Grade 5">Grade 5</option>
                              <option <?php if($sibling3_level=="Grade 6"){echo' selected ="true"';}?>value="Grade 6">Grade 6</option>
                              <option <?php if($sibling3_level=="Grade 7"){echo' selected ="true"';}?>value="Grade 7">Grade 7</option>
                              <option <?php if($sibling3_level=="Grade 8"){echo' selected ="true"';}?>value="Grade 8">Grade 8</option>
                              <option <?php if($sibling3_level=="Grade 9"){echo' selected ="true"';}?>value="Grade 9">Grade 9</option>
                              <option <?php if($sibling3_level=="Grade 10") {echo' selected ="true"';}?>value="Grade 10">Grade 10</option>
                              <option <?php if($sibling3_level=="Grade 11") {echo' selected ="true"';}?>value="Grade 11">Grade 11</option>
                              <option <?php if($sibling3_level=="Grade 12") {echo' selected ="true"';}?>value="Grade 12">Grade 12</option>

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
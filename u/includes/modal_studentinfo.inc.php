<!-- Modal -->
<div class="modal  fade" id="addstudentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLongTitle">New Student Form</h2><span style="color: red;">* Required</span>
          </div>

          <div class="modal-body"  style="background-color: #D3D3D3 ">
            <div class="callout callout-info" id="next-stud-card">
      
              <form onsubmit="return confirm('Are you sure?')" method="POST" enctype="multipart/form-data">
              <a class="modal-myheading">Student Information</a>
              <br><!-- Spaceing --><br>
               
      
                      <div class="row">
                        
<!--                             <div class="col-lg-4">
                              <div class="form-group" >
                                <label class="unrequired-field">Student Code</label><br>
                                <div class="input-group">
                                  <input title="We will fill this up for you" value="<?php echo isset($_POST['student-code']) ? $_POST['student-code'] : '' ?>"
                                  name="student-code" type="text" class="form-control">
                                 </div>
                               </div>
                              </div> -->
      
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
                              <label name="first-name-lbl" class="required-field">Given Name</label>
                              <input value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>"
                              name="first-name" required type="text" class="form-control">
                            </div>
                          </div>
      
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label name="first-name-lbl"  class="unrequired-field">Middle Name</label>
                              <input value="<?php echo isset($_POST['middle-name']) ? $_POST['middle-name'] : '' ?>"
                              name="middle-name"type="text" class="form-control">
                            </div>
                          </div>
      
                          <div class="col-lg-4">
                            <div name="first-name-lbl"  class="form-group">
                              <label class="required-field">Surname/Last Name</label>
                              <input value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>"
                              name="last-name"required type="text" class="form-control">
                            </div>
                          </div>
      
                      </div>
      
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="unrequired-field">Student / Family Address</label>
                              <input value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"
                              name="address" type="text" class="form-control" placeholder="Enter School Address">
                            </div>
                          </div>
      
                          <div class="col-lg-3">
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
                            </div> 
                        </div>
                        
                      <div class="row">
      
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="unrequired-field">Suffix</label>
                              <input value="<?php echo isset($_POST['suffix']) ? $_POST['suffix'] : '' ?>"
                              name="suffix" type="text" class="form-control" placeholder="E.g: Jr, Sr">
                            </div>
                          </div>
      
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
      
                      </div>
      
      
                      <div class="row">
                            
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="unrequired-field">School Last Attended</label>
                            <input value="<?php echo isset($_POST['school-last-attended']) ? $_POST['school-last-attended'] : '' ?>"
                            name="school-last-attended" type="text" class="form-control" placeholder="Enter School Name">
                          </div>
                        </div>
      
                        <div class="col-lg-2">
                           <div class="form-group">
                             <label class="unrequired-field">Last School Year</label>
      
                             <select placeholder="Enter School Name" name="last-school-attended-year" class="form-control select2bs4">
                              <option value='' <?php if(!isset($_POST['last-school-attended-year'])){ echo "Selected = 'true'";} else{}?>
                              ></option>
                               <?php 
                                  $start = date('Y');
                                  $end = $start;
                                  $start++;
                                  $years=10;
                                  for ($i=0; $i <($years*2) ; $i++) { 
                                    $SY= $end." - ".$start;
                                    if(isset($_POST['last-school-attended-year']) && cleanThis($_POST['last-school-attended-year'])==cleanThis($SY)){ $selected="Selected='true'";}
                                    else{$selected="";}
                                    echo "<option value='". $SY."'".$selected.">". $SY."</option>";
                                    $start--;
                                    $end--;
                                  }
                                        $res = cleanThis($SY);
                                        $res2 = cleanThis($_POST['last-school-attended-year']);
      
                               ?>
      
      
                             </select>
                           </div>
                        </div>

      
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label class="unrequired-field">Average Grade</label><br>
                            <div class="input-group">
                              <input value="<?php echo isset($_POST['last-school-attended-grade']) ? $_POST['last-school-attended-grade'] : '' ?>"
                                name="last-school-attended-grade" type="text" class="form-control" >
                             </div>
                           </div>
                          </div> 
                        </div>
      
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="unrequired-field">School Last Attended Address</label>
                              <input value="<?php echo isset($_POST['last-school-attended-address']) ? $_POST['last-school-attended-address'] : '' ?>"
                              name="last-school-attended-address" type="text" class="form-control" placeholder="Enter School Address">
                            </div>
                          </div>

      
                        <div class="col-lg-3">
      
                           <div class="form-group">
                             <label class="unrequired-field">incoming School Year Level</label>
                             <select name="inComingLevel" class="form-control select2bs4 ">
                              <?php 
                              if (isset($_POST['inComingLevel'])){?>
                              <option <?php if($_POST['inComingLevel']=="Nursery1") {echo' selected ="true"';}?>value="Nursery1">Nursery 1</option>
                              <option <?php if($_POST['inComingLevel']=="Nursery2") {echo' selected ="true"';}?>value="Nursery2">Nursery 2</option>
                              <option <?php if($_POST['inComingLevel']=="Kinder1") {echo' selected ="true"';}?>value="Kinder1">Kinder 1</option>
                              <option <?php if($_POST['inComingLevel']=="Grade1") {echo' selected ="true"';}?>value="Grade1">Grade 1</option>
                              <option <?php if($_POST['inComingLevel']=="Grade2"){echo' selected ="true"';}?>value="Grade2">Grade 2</option>
                              <option <?php if($_POST['inComingLevel']=="Grade5"){echo' selected ="true"';}?>value="Grade5">Grade 5</option>
                              <option <?php if($_POST['inComingLevel']=="Grade3"){echo' selected ="true"';}?>value="Grade3">Grade 3</option>
                              <option <?php if($_POST['inComingLevel']=="Grade4"){echo' selected ="true"';}?>value="Grade4">Grade 4</option>
                              <option <?php if($_POST['inComingLevel']=="Grade6"){echo' selected ="true"';}?>value="Grade6">Grade 6</option>
                              <option <?php if($_POST['inComingLevel']=="Grade7"){echo' selected ="true"';}?>value="Grade7">Grade 7</option>
                              <option <?php if($_POST['inComingLevel']=="Grade8"){echo' selected ="true"';}?>value="Grade8">Grade 8</option>
                              <option <?php if($_POST['inComingLevel']=="Grade9"){echo' selected ="true"';}?>value="Grade9">Grade 9</option>
                              <option <?php if($_POST['inComingLevel']=="Grade10") {echo' selected ="true"';}?>value="Grade10">Grade 10</option>
                              <option <?php if($_POST['inComingLevel']=="Grade11") {echo' selected ="true"';}?>value="Grade11">Grade 11</option>
                              <option <?php if($_POST['inComingLevel']=="Grade12") {echo' selected ="true"';}?>value="Grade12">Grade 12</option>

                             <?php }
                              else{

                              }
                              ?>
                              <option value="Nursery1">Nursery 1</option>
                              <option value="Nursery2">Nursery 2</option>
                              <option value="Kinder1">Kinder 1</option>
                              <option value="Grade1">Grade 1</option>
                              <option value="Grade2">Grade 2</option>
                              <option value="Grade5">Grade 5</option>
                              <option value="Grade3">Grade 3</option>
                              <option value="Grade4">Grade 4</option>
                              <option value="Grade6">Grade 6</option>
                              <option value="Grade7">Grade 7</option>
                              <option value="Grade8">Grade 8</option>
                              <option value="Grade9">Grade 9</option>
                              <option value="Grade10">Grade 10</option>
                              <option value="Grade11">Grade 11</option>
                              <option value="Grade12">Grade 12</option>
                             </select>
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
                  <input type="hidden" name="contactID">
      
                <div class="row">
      
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label class="required-field">Contact Person Full Name</label>
                      <input value="<?php echo isset($_POST['contact-person-name']) ? $_POST['contact-person-name'] : '' ?>"
                      name="contact-person-name" required type="text" class="form-control" placeholder="FirstName LastName">
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
                         name="contact-person-phone" type="text" class="form-control" data-inputmask='"mask": "999-99-99    "' data-mask>
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
                         name="contact-person-mobile" required type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
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
                      <a class="  p-3 modal-myheading2">Family Information</a>
                    </div>

                    <div class="card-body">
                      <div class="tab-content">
                          <hr class="hrstyle">
      

                          <div class="row">
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Mother Full Name</label>
                                <input value="<?php echo isset($_POST['mother-name']) ? $_POST['mother-name'] : '' ?>"
                                name="mother-name" type="text" class="form-control" placeholder="FirstName LastName">
                              </div>
                            </div>

                            <div class="col-lg-4">
                              <div class="form-group">
                                <label >Mother Contact Number</label><br>
                                <input type="hidden" name="motherID">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                   </div>
                                  <input value="<?php echo isset($_POST['mother-mobile']) ? $_POST['mother-mobile'] : '' ?>"
                                  name="mother-mobile" type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                                 </div>
                               </div>
                            </div>    
      
                          </div>
      
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Mother's Employer Name</label>
                                <input value="<?php echo isset($_POST['mother-employer-name']) ? $_POST['mother-employer-name'] : '' ?>"
                                name="mother-employer-name" type="text" class="form-control" placeholder="FirstName LastName / Company Name">
                              </div>
                            </div>
      
                          </div> 
      

                          <hr class="hrstyle">
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Father Full Name</label>
                                <input type="hidden" name="fatherID">
                                <input value="<?php echo isset($_POST['father-name']) ? $_POST['father-name'] : '' ?>"
                                name="father-name" type="text" class="form-control" placeholder="FirstName LastName">
                              </div>
                            </div>

                            <div class="col-lg-4">
                              <div class="form-group">
                               <label>Father Mobile Number</label><br>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                  </div>
                                 <input value="<?php echo isset($_POST['father-mobile']) ? $_POST['father-mobile'] : '' ?>"
                                 name="father-mobile" type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                                </div>
                              </div>  
                            </div>
      
                          </div>
        
            
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Father's Employer Name</label>
                                <input value="<?php echo isset($_POST['father-employer-name']) ? $_POST['father-employer-name'] : '' ?>"
                                name="father-employer-name" type="text" class="form-control" placeholder="FirstName LastName / Company Name">
                              </div>
                            </div>
      
                          </div> 
      


                          <hr class="hrstyle">
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label >Guardian Full Name</label>
                                <input value="<?php echo isset($_POST['guardian-name']) ? $_POST['guardian-name'] : '' ?>"
                                name="guardian-name" type="text" class="form-control" placeholder="FirstName LastName">
                              </div>
                            </div>
      
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label >Guardian Relationship</label>
                                <input value="<?php echo isset($_POST['guardian-relationship']) ? $_POST['guardian-relationship'] : '' ?>" 
                                name="guardian-relationship" type="text" class="form-control" placeholder="Auntie / Grandmother etc.">
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
                                 name="guardian-phone" type="text" class="form-control" data-inputmask='"mask": "999-99-99    "' data-mask>
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
                                 name="guardian-mobile" type="text" class="form-control" data-inputmask='"mask": "9999-999-9999    "' data-mask>
                                </div>
                              </div>  
                            </div> 


                        </div>
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
                                <input value="<?php echo isset($_POST['siblings-order']) ? $_POST['siblings-order'] : '' ?>"
                               name="siblings-order" class="form-control form-control-sm col-sm-1" type="number" maxlength="2" style="text-align: center">
                                <span class="col-sm-8">&nbsp &nbspChronological order of birth among his/her siblings &nbsp&nbsp&nbsp </span>
                                
                                </div>
                              </div>
                            </div>


    <!-- Chronological order of birth among his/her siblings? -->
                            
                            </div>
                          <br>
                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label class="unrequired-field">Sibling 1 Name</label>
                                <input type="hidden" name="sib1ID">
                                <input value="<?php echo isset($_POST['sibling1-name']) ? $_POST['sibling1-name'] : '' ?>" 
                                name="sibling1-name" type="text" class="form-control" placeholder="FirstName LastName">
                              </div>
                            </div>  
                            <div class="col-lg-3">
        
                               <div class="form-group">
                                 <label class="unrequired-field">Level</label>
                                 <select name="sibling1-level" class="form-control select2bs4">
                           <?php 
                              if (isset($_POST['sibling1-level'])){?>
                              <option <?php if($_POST['sibling1-level']=="Nursery1") {echo' selected ="true"';}?>value="Nursery1">Nursery 1</option>
                              <option <?php if($_POST['sibling1-level']=="Nursery2") {echo' selected ="true"';}?>value="Nursery2">Nursery 2</option>
                              <option <?php if($_POST['sibling1-level']=="Kinder1") {echo' selected ="true"';}?>value="Kinder1">Kinder 1</option>
                              <option <?php if($_POST['sibling1-level']=="Grade1") {echo' selected ="true"';}?>value="Grade1">Grade 1</option>
                              <option <?php if($_POST['sibling1-level']=="Grade2"){echo' selected ="true"';}?>value="Grade2">Grade 2</option>
                              <option <?php if($_POST['sibling1-level']=="Grade5"){echo' selected ="true"';}?>value="Grade5">Grade 5</option>
                              <option <?php if($_POST['sibling1-level']=="Grade3"){echo' selected ="true"';}?>value="Grade3">Grade 3</option>
                              <option <?php if($_POST['sibling1-level']=="Grade4"){echo' selected ="true"';}?>value="Grade4">Grade 4</option>
                              <option <?php if($_POST['sibling1-level']=="Grade6"){echo' selected ="true"';}?>value="Grade6">Grade 6</option>
                              <option <?php if($_POST['sibling1-level']=="Grade7"){echo' selected ="true"';}?>value="Grade7">Grade 7</option>
                              <option <?php if($_POST['sibling1-level']=="Grade8"){echo' selected ="true"';}?>value="Grade8">Grade 8</option>
                              <option <?php if($_POST['sibling1-level']=="Grade9"){echo' selected ="true"';}?>value="Grade9">Grade 9</option>
                              <option <?php if($_POST['sibling1-level']=="Grade10") {echo' selected ="true"';}?>value="Grade10">Grade 10</option>
                              <option <?php if($_POST['sibling1-level']=="Grade11") {echo' selected ="true"';}?>value="Grade11">Grade 11</option>
                              <option <?php if($_POST['sibling1-level']=="Grade12") {echo' selected ="true"';}?>value="Grade12">Grade 12</option>

                             <?php }
                              else{

                              }
                              ?>
                              <option value="Nursery1">Nursery 1</option>
                              <option value="Nursery2">Nursery 2</option>
                              <option value="Kinder1">Kinder 1</option>
                              <option value="Grade1">Grade 1</option>
                              <option value="Grade2">Grade 2</option>
                              <option value="Grade5">Grade 5</option>
                              <option value="Grade3">Grade 3</option>
                              <option value="Grade4">Grade 4</option>
                              <option value="Grade6">Grade 6</option>
                              <option value="Grade7">Grade 7</option>
                              <option value="Grade8">Grade 8</option>
                              <option value="Grade9">Grade 9</option>
                              <option value="Grade10">Grade 10</option>
                              <option value="Grade11">Grade 11</option>
                              <option value="Grade12">Grade 12</option>
                                 </select>
                               </div>
                            </div>
      
                          </div> 

                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label class="unrequired-field">Sibling 2 Name</label>
                                <input type="hidden" name="sib2ID">
                                <input value="<?php echo isset($_POST['sibling2-name']) ? $_POST['sibling2-name'] : '' ?>" 
                                name="sibling2-name" type="text" class="form-control" placeholder="FirstName LastName">
                              </div>
                            </div>
      
                            <div class="col-lg-3">
        
                               <div class="form-group">
                                 <label class="unrequired-field">Level</label>
                                 <select name="sibling2-level" class="form-control select2bs4">
                           <?php 
                              if (isset($_POST['sibling2-level'])){?>
                              <option <?php if($_POST['sibling2-level']=="Nursery1") {echo' selected ="true"';}?>value="Nursery1">Nursery 1</option>
                              <option <?php if($_POST['sibling2-level']=="Nursery2") {echo' selected ="true"';}?>value="Nursery2">Nursery 2</option>
                              <option <?php if($_POST['sibling2-level']=="Kinder1") {echo' selected ="true"';}?>value="Kinder1">Kinder 1</option>
                              <option <?php if($_POST['sibling2-level']=="Grade1") {echo' selected ="true"';}?>value="Grade1">Grade 1</option>
                              <option <?php if($_POST['sibling2-level']=="Grade2"){echo' selected ="true"';}?>value="Grade2">Grade 2</option>
                              <option <?php if($_POST['sibling2-level']=="Grade5"){echo' selected ="true"';}?>value="Grade5">Grade 5</option>
                              <option <?php if($_POST['sibling2-level']=="Grade3"){echo' selected ="true"';}?>value="Grade3">Grade 3</option>
                              <option <?php if($_POST['sibling2-level']=="Grade4"){echo' selected ="true"';}?>value="Grade4">Grade 4</option>
                              <option <?php if($_POST['sibling2-level']=="Grade6"){echo' selected ="true"';}?>value="Grade6">Grade 6</option>
                              <option <?php if($_POST['sibling2-level']=="Grade7"){echo' selected ="true"';}?>value="Grade7">Grade 7</option>
                              <option <?php if($_POST['sibling2-level']=="Grade8"){echo' selected ="true"';}?>value="Grade8">Grade 8</option>
                              <option <?php if($_POST['sibling2-level']=="Grade9"){echo' selected ="true"';}?>value="Grade9">Grade 9</option>
                              <option <?php if($_POST['sibling2-level']=="Grade10") {echo' selected ="true"';}?>value="Grade10">Grade 10</option>
                              <option <?php if($_POST['sibling2-level']=="Grade11") {echo' selected ="true"';}?>value="Grade11">Grade 11</option>
                              <option <?php if($_POST['sibling2-level']=="Grade12") {echo' selected ="true"';}?>value="Grade12">Grade 12</option>

                             <?php }
                              else{

                              }
                              ?>
                              <option value="Nursery1">Nursery 1</option>
                              <option value="Nursery2">Nursery 2</option>
                              <option value="Kinder1">Kinder 1</option>
                              <option value="Grade1">Grade 1</option>
                              <option value="Grade2">Grade 2</option>
                              <option value="Grade5">Grade 5</option>
                              <option value="Grade3">Grade 3</option>
                              <option value="Grade4">Grade 4</option>
                              <option value="Grade6">Grade 6</option>
                              <option value="Grade7">Grade 7</option>
                              <option value="Grade8">Grade 8</option>
                              <option value="Grade9">Grade 9</option>
                              <option value="Grade10">Grade 10</option>
                              <option value="Grade11">Grade 11</option>
                              <option value="Grade12">Grade 12</option>
                                 </select>
                               </div>
                            </div>
      
                          </div> 

                          <div class="row">
      
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label class="unrequired-field">Sibling 3 Name</label>
                                <input type="hidden" name="sib3ID">
                                <input value="<?php echo isset($_POST['sibling2-name']) ? $_POST['sibling2-name'] : '' ?>" 
                                name="sibling3-name" type="text" class="form-control" placeholder="FirstName LastName">
                              </div>
                            </div>
      
                            <div class="col-lg-3">
        
                               <div class="form-group">
                                 <label class="unrequired-field">Level</label>
                                 <select name="sibling3-level" class="form-control select2bs4">
                           <?php 
                              if (isset($_POST['sibling3-level'])){?>
                              <option <?php if($_POST['sibling3-level']=="Nursery1") {echo' selected ="true"';}?>value="Nursery1">Nursery 1</option>
                              <option <?php if($_POST['sibling3-level']=="Nursery2") {echo' selected ="true"';}?>value="Nursery2">Nursery 2</option>
                              <option <?php if($_POST['sibling3-level']=="Kinder1") {echo' selected ="true"';}?>value="Kinder1">Kinder 1</option>
                              <option <?php if($_POST['sibling3-level']=="Grade1") {echo' selected ="true"';}?>value="Grade1">Grade 1</option>
                              <option <?php if($_POST['sibling3-level']=="Grade2"){echo' selected ="true"';}?>value="Grade2">Grade 2</option>
                              <option <?php if($_POST['sibling3-level']=="Grade5"){echo' selected ="true"';}?>value="Grade5">Grade 5</option>
                              <option <?php if($_POST['sibling3-level']=="Grade3"){echo' selected ="true"';}?>value="Grade3">Grade 3</option>
                              <option <?php if($_POST['sibling3-level']=="Grade4"){echo' selected ="true"';}?>value="Grade4">Grade 4</option>
                              <option <?php if($_POST['sibling3-level']=="Grade6"){echo' selected ="true"';}?>value="Grade6">Grade 6</option>
                              <option <?php if($_POST['sibling3-level']=="Grade7"){echo' selected ="true"';}?>value="Grade7">Grade 7</option>
                              <option <?php if($_POST['sibling3-level']=="Grade8"){echo' selected ="true"';}?>value="Grade8">Grade 8</option>
                              <option <?php if($_POST['sibling3-level']=="Grade9"){echo' selected ="true"';}?>value="Grade9">Grade 9</option>
                              <option <?php if($_POST['sibling3-level']=="Grade10") {echo' selected ="true"';}?>value="Grade10">Grade 10</option>
                              <option <?php if($_POST['sibling3-level']=="Grade11") {echo' selected ="true"';}?>value="Grade11">Grade 11</option>
                              <option <?php if($_POST['sibling3-level']=="Grade12") {echo' selected ="true"';}?>value="Grade12">Grade 12</option>

                             <?php }
                              else{

                              }
                              ?>
                              <option value="Nursery1">Nursery 1</option>
                              <option value="Nursery2">Nursery 2</option>
                              <option value="Kinder1">Kinder 1</option>
                              <option value="Grade1">Grade 1</option>
                              <option value="Grade2">Grade 2</option>
                              <option value="Grade5">Grade 5</option>
                              <option value="Grade3">Grade 3</option>
                              <option value="Grade4">Grade 4</option>
                              <option value="Grade6">Grade 6</option>
                              <option value="Grade7">Grade 7</option>
                              <option value="Grade8">Grade 8</option>
                              <option value="Grade9">Grade 9</option>
                              <option value="Grade10">Grade 10</option>
                              <option value="Grade11">Grade 11</option>
                              <option value="Grade12">Grade 12</option>
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
<div class="modal  fade" id="studentinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Edit Student Information</h2><span style="color: red;">* Required</span>
            </div>

            <div class="modal-body" style="background-color: #D3D3D3 ">
                <div class="callout callout-info" id="next-stud-card">
                    <form onsubmit="return confirm('Are you sure?')" method="POST" enctype="multipart/form-data" action="viewDetails.php?page=<?php echo $studentID?>">
                        <a class="modal-myheading">Student Information</a>
                        <br>
                        <!-- Spaceing -->
                        <br>

                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="unrequired-field">Student Code</label>
                                    <br>
                                    <div class="input-group">
                                        <input title="We will fill this up for you" value="<?php echo isset($_POST['student-code']) ? $_POST['student-code'] : '' ?>" name="student-code" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="unrequired-field">LRN</label>
                                    <br>
                                    <div class="input-group">
                                        <input value="<?php echo isset($_POST['student-lrn']) ? $_POST['student-lrn'] : '' ?>" name="student-lrn" type="text" class="form-control" data-inputmask='"mask": " 999999999999    "' data-mask>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">

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

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="required-field">Given Name</label>
                                    <input value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>" name="first-name" required type="text" class="form-control" placeholder="Enter First Name">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="unrequired-field">Middle Name</label>
                                    <input value="<?php echo isset($_POST['middle-name']) ? $_POST['middle-name'] : '' ?>" name="middle-name" type="text" class="form-control" placeholder="Enter Middle Name">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="required-field">Surname/Last Name</label>
                                    <input value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>" name="last-name" required type="text" class="form-control" placeholder="Enter Last Name">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="unrequired-field">Student / Family Address</label>
                                    <input value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" name="address" type="text" class="form-control" placeholder="Enter School Address">
                                </div>
                            </div>

                            <div class="col-lg-3">
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

                            <div class="col-lg-3">
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

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="unrequired-field">Suffix</label>
                                    <input value="<?php echo isset($_POST['suffix']) ? $_POST['suffix'] : '' ?>" name="suffix" type="text" class="form-control" placeholder="E.g: Jr, Sr">
                                </div>
                            </div>

                            <div class="col-lg-4">
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

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="unrequired-field">Birthplace</label>
                                    <input value="<?php echo isset($_POST['birthplace']) ? $_POST['birthplace'] : '' ?>" name="birthplace" type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                        </div>

                


            <div class="modal-footer">
              <a type="button" class="btn btn-danger" id="next-stud-cancel" data-dismiss="modal">Cancel</a>
              <button class="btn btn-success" type="submit" id="studentInformationSave">Save</button>
            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
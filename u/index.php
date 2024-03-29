<!DOCTYPE html>

<?php
  require '../include/config.php';
  require 'assets/fonts.php';
  require 'assets/generalSandC.php';
  require 'assets/adminlte.php';
  require 'assets/scipts/phpfunctions.php';
  require 'assets/generalSandC.php';
  require '../include/schoolConfig.php';
  require '../include/getschoolyear.php';
  $page = "index";

?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Home | PRISM</title>
  <link rel="shortcut icon" href="../assets/imgs/favicon.ico">
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/css-home.css"> -->
<!-- customize css -->
<link rel="stylesheet" type="text/css" href="assets/css/hideAndNext.css">
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
  <link rel="stylesheet" type="text/css" href="../include/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../include/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../include/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

<!-- nav bar & side bar -->
<?php
require 'includes/navAndSide.php';
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
?>
<!-- nav bar & side bar -->


  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
	<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        	<div class="col-sm-6">
            <h1>Pre-Enrolled Students	</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Pre-Enrolled Students</li>
            </ol>
         	 </div>
       		</div>
     	</div><!-- /.container-fluid -->
    </section>

    <!-- <div class="content-header"> -->
	    <!-- Main content -->
		<section class="content">
				<!-- <div class="box span12"> -->

			<!-- /Dashboard -->
			<div class="row">
					<div class="col-lg-1">
					</div>
					<div class="col-lg-2">
						<div class="card-body display nowrap" style="width:100%;">
							<table class="table table-striped table-bordered " style="text-align:center;
								 font-size: 150%;font-weight:bold;">	
							<thead>
								<tr>
									<th style="background-color:#DA70D6;font-size: 60%">Masterlist</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql = "select count(*) as preEnrolled from tbl_student where schoolYearID = " . $schoolYearID . "";
									$result=mysqli_query($conn, $sql); //rs.open sql,con
								while ($row=mysqli_fetch_assoc($result))
								{ ?><!--open of while -->
								<tr>
									<td><?php echo $row['preEnrolled']; ?></td>
								</tr>
								<?php
								} //close of while
								?>
							</tbody>
							</table>
						</div>
					</div>

					<div class="col-lg-2">
						<div class="card-body display nowrap" style="width:100%;">
							<table class="table table-striped table-bordered " style="text-align:center;
								 font-size: 150%;font-weight:bold;">	
							<thead>
								<tr>
									<th style="background-color:#FFFF66;font-size: 60%">Pending Registration</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql = "select count(*) as pending from tbl_student where isSubmitted = 0 and schoolYearID = " . $schoolYearID . "";
									$result=mysqli_query($conn, $sql); //rs.open sql,con
								while ($row=mysqli_fetch_assoc($result))
								{ ?><!--open of while -->
								<tr>
									<td><?php echo $row['pending']; ?></td>
								</tr>
								<?php
								} //close of while
								?>
							</tbody>
							</table>
						</div>
					</div>

					<div class="col-lg-2">
						<div class="card-body display nowrap" style="width:100%">
							<table class="table table-striped table-bordered " style="text-align:center; font-size: 150%;font-weight:bold">	
							<thead>
								<tr>
									<th style="background-color:#7FFF00;font-size: 60%">Registered Students</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$sql = "select count(*) as submitted from tbl_student where isSubmitted	 = 1 and schoolYearID = " . $schoolYearID . "";
								$result=mysqli_query($conn, $sql); //rs.open sql,con
							while ($row=mysqli_fetch_assoc($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['submitted']; ?></td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="card-body display nowrap" style="width:100%">
              			<table class="table table-striped table-bordered " style="text-align:center; font-size: 150%;font-weight:bold">	
						  <thead>
							  <tr>
								  <th style="background-color:#00BFFF;font-size: 60%">Exported to Excel</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								$sql = "select count(*) as exported from tbl_student where isExported = 1 and schoolYearID = " . $schoolYearID . "";
								$result=mysqli_query($conn, $sql); //rs.open sql,con
							while ($row=mysqli_fetch_assoc($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['exported']; ?></td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="card-body display nowrap" style="width:100%">
              			<table class="table table-striped table-bordered " style="text-align:center; font-size: 150%;font-weight:bold">	
						  <thead>
							  <tr>
								  <th style="background-color: #FF0000;font-size: 60%">Pending Export </th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								$sql = "select count(*) as Notexported from tbl_student where isSubmitted = 1 and isExported = 0 and schoolYearID = " . $schoolYearID . "";
								$result=mysqli_query($conn, $sql); //rs.open sql,con
							while ($row=mysqli_fetch_assoc($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['Notexported']; ?></td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>
					</div>
				</div>
				<div class="col-lg-1">
				</div>
			</div><!--/row / Dashboard-->

				<!-- Default box -->
				<div class="card">

				<div class="card-header">
					<!-- <p>
						<button onclick="Export()"
						data-toggle="modal" data-target="#addstudentmodal"
						type="button" class="btn btn-primary add-button">
						<span class=" fas fa-file-alt">&nbsp&nbsp</span>Export
						</button>
					</p> -->
					</div>
					<!-- <div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Pre-Enrolled Students</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div> -->
					<!-- <div class="card-body display nowrap">
						<table id="example1" class="table table-striped table-bordered bootstrap-datatable datatable"> -->
					<div class="card-body display nowrap" style="width:100%">
              			<table id="example1" class="table table-striped table-bordered ">	
						  <thead>
							  <tr>
								  <th>Last Name</th>
								  <th>First Name</th>
								  <th>Middle Name</th>
								  <th>LRN</th>
                  					<th>Date Enrolled</th>
									<th>Registered</th>
									<th>Exported</th>
									<th>Action</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php

								$sql = "SELECT * FROM tbl_student where schoolYearID = " . $schoolYearID . " ORDER BY datetimeRegistered ";
								$result=mysqli_query($conn, $sql); //rs.open sql,con

								$ctr=0;
							while ($row=mysqli_fetch_assoc($result))
							{ echo "<tr id='row".$ctr."'>"; ?><!--open of while  --> 
								<td><?php echo $row['lastName']; ?></td>
								<td><?php echo $row['firstName']; ?></td>
								<td><?php echo $row['middleName']; ?></td>
								<td><?php echo $row['lrn']; ?></td>
								<td><?php echo $row['datetimePosted']; ?></td> 
								<td><?php
								if ($row['isSubmitted'] == 1){
									echo "Yes";
								}else{
									echo "No";
								}; ?></td>
								<td><?php
								if ($row['isExported'] == 1){
									echo "Yes";
								}else{
									echo "No";
								}; ?></td>
								<!-- <td class="center">
									<a class="btn btn-info" href="edit_data.php?uID=<?php echo $row['id']; ?>">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" onclick="return confirmDel()" href="delete_data.php?delID=<?php echo $row['id'];?>">
										<i class="halflings-icon white trash"></i>
									</a>
								</td> -->
								<?php 
                   echo'   <td class="text-center">';
                   echo'       <a href="#" class="btn delete btn-sm btn-danger" id="delete'.$ctr.'" rowIdentifier="row'.$ctr.'"  value="'.$row['studentID'].'" >';
                   echo'           <i class="fas fa-trash">';
                   echo'           </i>';
                   echo'           Delete';
                   echo'       </a>';
                   echo'   </td>';
                   $ctr++;
								?>

							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>
					</div>
				</div><!--/span-->
			</section>
	</div><!--/row-->





<!-- ./wrapper -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        "scrollY": 200,
        "scrollX": true
    } );
} );

	function Export()
			{
				var conf = confirm("Export users to CSV?");
				if(conf == true)
				{
					window.open("../include/export.php", '_blank');
				}
			}


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
<script src="includes/sessionChecker.js"></script>
<script type="text/javascript">
    extendSession();
    var isPosted;
    var isDisplayed = false; 
setInterval(function(){sessionChecker();}, 1000);//time in milliseconds 
</script>



</body>
<script type="text/javascript" src="assets/scipts/hideAndNext.js"></script>
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


</script>
</html>

<!DOCTYPE html>

<?php
  require '../include/config.php';
  require 'assets/fonts.php';
  require 'assets/generalSandC.php';
  require 'assets/adminlte.php';
  require '../include/schoolConfig.php';

?>

<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>PPH DGS</title>
  <link rel="stylesheet" type="text/css" href="assets/css/css-home.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- nav bar & side bar -->
<?php 
require 'includes/navAndSide.php';
?>
<!-- nav bar & side bar -->


  <div class="content-wrapper">		
    <div class="content-header">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Pre-Enrolled Students</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Last Name</th>
								  <th>First Name</th>
								  <th>Middle Name</th>
								  <th>LRN</th>
                  					<th>Date Enrolled</th>
									<th>Submitted</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php

								$sql = "SELECT * FROM tbl_student  ORDER BY firstName";
								$result=mysqli_query($conn, $sql); //rs.open sql,con

							while ($row=mysqli_fetch_assoc($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['lastName']; ?></td>
								<td><?php echo $row['firstName']; ?></td>
								<td><?php echo $row['middleName']; ?></td>
								<td><?php echo $row['lrn']; ?></td>
								<td><?php echo $row['dateTimeEnrolled']; ?></td>
								<td><?php
								if ($row['isSubmitted'] == 1){
									echo "Yes";
								}else{
									echo "No";
								}; ?></td>
								<td class="center">
									<a class="btn btn-info" href="edit_data.php?uID=<?php echo $row['id']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onclick="return confirmDel()" href="delete_data.php?delID=<?php echo $row['id'];?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div>
	</div><!--/row-->


 

<!-- ./wrapper -->

<?php 

require 'assets/scripts.php';

?>

</body>
</html>

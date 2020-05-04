<?php 
require '../include/config.php';

$id = $_POST['studentidx'];


if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"sELECT studentID FROM tbl_student where studentID ='".$id."'");
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
  	$sql = "select a.schoolYearID from tbl_schoolyear as a ";

    $result = mysqli_query($conn, $sql);

    $pass_row = mysqli_fetch_assoc($result);

    $schoolYearID = $pass_row['schoolYearID'];

    $nowtime = date("Y-m-d H:i:s");

 	  $query = "update tbl_student set isSubmitted =  '1', dateTimeSubmitted = '".$nowtime."', schoolYearID ='".$schoolYearID."'  WHERE studentID='".$id."'";
	  mysqli_query($conn,$query);
    echo 1;
    exit;
  }
}

echo 0;
exit; 
?>
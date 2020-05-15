<?php 
require '../include/config.php';

$id = $_POST['studentidx'];


if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"sELECT announceID FROM tbl_announcement where announceID ='".$id."'");
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "dELETE FROM tbl_announcement  WHERE announceID='".$id."'";
    mysqli_query($conn,$query);

    exit;
  }
}

echo 0;
exit; 
?>
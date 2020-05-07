<?php 
require '../include/config.php';
require '../assets/phpfunctions.php';

$id = $_POST['studentidx'];


if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"sELECT studentID, studentCode FROM tbl_student where studentID ='".$id."'");
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    $getStudentID = mysqli_fetch_assoc($checkRecord);
  	$sql = "select a.schoolYearID from tbl_schoolyear as a ";

    $result = mysqli_query($conn, $sql);

    $pass_row = mysqli_fetch_assoc($result);

    $schoolYearID = $pass_row['schoolYearID'];
    
    if (strlen(trim($getStudentID['studentCode']))<=0 ) {
    function genStudCode()
      {
        $studentCode = generateStudentCode();
        $checkStudentCode = mysqli_query($conn,"sELECT studentID FROM tbl_student where studentCode ='".$studentCode."'");
        $totalrowsCode = mysqli_num_rows($checkStudentCode);
        if($totalrowsCode > 0){
          genStudCode();
        }
        return $studentCode;
      }
      $studentCode=genStudCode();
    }
    else{
      $studentCode=$getStudentID['studentCode'];
    }


    $nowtime = date("Y-m-d H:i:s");
 	  $query = "update tbl_student set isSubmitted =  '1', studentCode = '".$studentCode."' , dateTimeSubmitted = '".$nowtime."', schoolYearID ='".$schoolYearID."'  WHERE studentID='".$id."'";
	  mysqli_query($conn,$query);

  }
}


?>
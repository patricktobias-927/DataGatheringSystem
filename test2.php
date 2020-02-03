
<?php 
function combineName($fName,$lName,$mName)
{
  if ($mName == ' ' || $mName =='') {
    $combinedName = $lName . ", " . $fName;
  }
  else{
    $mInitial = substr($mName, 0,1);
    $combinedName = $lName . ", " . $fName .' '. $mInitial . '.';
  }

  return $combinedName;
}
require 'include/config.php';
$lrn='911213213323';
$code='911123123213';
$isLRNMatch;
$isCodeMatch;

$sql = "select COUNT(LRN) as matchedLRN, COUNT(Code) as matchedCode, Lastname, Firstname, Middlename  from `tbl_student` where LRN = '".$lrn."'";

$result1 = mysqli_query($conn, $sql);
$query1 = mysqli_fetch_assoc($result);

if ($query1['matchedLRN']>0) {
 $isLRNMatch=true;
 $LRNName = combineName($query1['Firstname'],$query1['Lastname'],$query1['Middlename']);
    }

else{
      $isLRNMatch=false;
    }

$sql = "select COUNT(Code) as matchedCode, Lastname, Firstname, Middlename  from `tbl_student` where Code ='".$code."'";

  $result2 = mysqli_query($conn, $sql);
  $query2 = mysqli_fetch_assoc($result);

if ($query2['matchedCode']>0) {
      $isCodeMatch=true;
      $CODEname = combineName($query2['Firstname'],$query2['Lastname'],$query2['Middlename']);
    }

  else{
      $isCodeMatch=false;
    } 

  if ($isLRNMatch && !$isCodeMatch) {
    $message="There is existing record \n LRN:".$lrn."\n Name: ".$LRNName;
    displayMessage("error","Duplicate Entry",$message);
  }

  else if (!$isLRNMatch && $isCodeMatch) {
    $message="There is existing record \n Student Code:".$code."\n Name: ".$CODEName;
    displayMessage("error","Duplicate Entry",$message);
  }

  else if ($isLRNMatch && $isCodeMatch) {
    if ($CODEname == $LRNName) {
      $message="There is existing record \n LRN:".$lrn."\n Name: ".$LRNName;
      displayMessage("error","Duplicate Entry",$message);
    }

    else if ($CODEname != $LRNName) {
      $message="Please check the LRN and Student code of The following \n 1.)".$CODEname
      ."\n 2.)".$LRNName;
      displayMessage("error","Duplicate Entry",$message);
    }
  }
  else if (!$isCodeMatch && !$isLRNMatch) {
    echo"nodupes";
  }
<?php
require 'include/config.php';
$_POST['student-lrn'] = str_replace(' ', '', $_POST['student-lrn']);

if (strlen($_POST['student-lrn'])!=12 || strlen($_POST['student-lrn'])>1){
	displayMessage("warning","LRN is Invalid","Please try again");
	}
else if (substr($_POST['birthdate'],6)>date(Y)) {
	displayMessage("warning","Date is Invalid","Please try again");
	}

else{
	$lrn=$_POST['student-lrn'];
	$code=$_POST['student-code'];
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
    	  $message="Please check the LRN and Student code of The following \n 1.)".$CODEname."\n 2.)".$LRNName;
    	  displayMessage("error","Duplicate Entry",$message);
    	}
  	}

  	else if (!$isCodeMatch && !$isLRNMatch) {
    
		if ($_POST['school-last-attended']==''||$_POST['school-last-attended']==' ') {
			$_POST['last-school-attended-year']='';
			$_POST['last-school-attended-level']='';
			$_POST['last-school-attended-grade']='';
			$_POST['last-school-attended-address']='';
		}
		else{
			$_POST['school-last-attended']=$_POST['school-last-attended'];
			$_POST['last-school-attended-year']=clean($_POST['last-school-attended-year']);
			$_POST['last-school-attended-level']=$_POST['last-school-attended-level']);
			$_POST['last-school-attended-grade']=clean($_POST['last-school-attended-grade']);
			$_POST['last-school-attended-address']=$_POST['last-school-attended-address'];
			$_POST['last-school-attended-grade']=clean($_POST['last-school-attended-grade']);
		}
		if ($_POST['mother-name']==''|| $_POST['mother-name']==' ' ) {
			$_POST['mother-employer-name']='';
			$_POST['mother-employer-address']='';
			$_POST['mother-employer-phone']='';
			$_POST['mother-employer-mobile']='';
		}
		else{
			$_POST['mother-employer-phone']=clean($_POST['mother-employer-phone']);
			$_POST['mother-employer-mobile']=clean($_POST['mother-employer-mobile']);
		}
		if ($_POST['father-name']==''|| $_POST['father-name']==' ' ) {
			$_POST['father-employer-name']='';
			$_POST['father-employer-address']='';
			$_POST['father-employer-phone']='';
			$_POST['father-employer-mobile']='';
		}
		else{
			$_POST['father-employer-phone']=clean($_POST['mother-employer-phone']);
			$_POST['father-employer-mobile']=clean($_POST['mother-employer-mobile']);
		}
		if ($_POST['guardian-name']==''|| $_POST['guardian-name']==' ' ) {
			$_POST['guardian-relationship']='';
			$_POST['guardian-phone']='';
			$_POST['guardian-mobile']='';
		}
		else{
			$_POST['guardian-employer-phone']=clean($_POST['mother-employer-phone']);
			$_POST['guardian-employer-mobile']=clean($_POST['mother-employer-mobile']);
		}
		if ($_POST['sibling1-name']==''|| $_POST['sibling1-name']==' ' ) {
			$_POST['sibling1-level']='';
		}
		if ($_POST['sibling2-name']==''|| $_POST['sibling2-name']==' ' ) {
			$_POST['sibling2-level']='';
		}
		if ($_POST['sibling3-name']==''|| $_POST['sibling3-name']==' ' ) {
			$_POST['sibling3-level']='';
		}
		$_POST['student-code'] = cleanData($_POST['student-code']);
 		$_POST['student-lrn'] = cleanData(clean($_POST['student-lrn']););
 		$_POST['r1'] = cleanData($_POST['r1'];);
 		$_POST['first-name'] = cleanData(clean($_POST['first-name']););
 		$_POST['middle-name'] = cleanData(clean($_POST['middle-name']););
 		$_POST['last-name'] = cleanData(clean($_POST['last-name']););
 		$_POST['suffix'] = cleanData(clean($_POST['suffix']););
 		$_POST['birthdate'] = cleanData($_POST['birthdate']);
 		$_POST['birthplace'] = cleanData($_POST['birthplace']);
 		$_POST['school-last-attended'] = cleanData($_POST['school-last-attended']);
 		$_POST['last-school-attended-year'] = cleanData($_POST['last-school-attended-year']);
 		$_POST['last-school-attended-level'] = cleanData($_POST['last-school-attended-level']);
 		$_POST['last-school-attended-grade'] = cleanData($_POST['last-school-attended-grade']);
 		$_POST['last-school-attended-address'] = cleanData($_POST['last-school-attended-address']);
 		$_POST['contact-person-name'] = cleanData($_POST['contact-person-name']);
 		$_POST['contact-person-phone'] = cleanData($_POST['contact-person-phone']);
 		$_POST['contact-person-mobile'] = cleanData($_POST['contact-person-mobile']);
 		$_POST['mother-name'] = cleanData($_POST['mother-name']);
 		$_POST['mother-employer-name'] = cleanData($_POST['mother-employer-name']);
 		$_POST['mother-employer-address'] = cleanData($_POST['mother-employer-address']);
 		$_POST['mother-employer-phone'] = cleanData($_POST['mother-employer-phone']);
 		$_POST['mother-employer-mobile'] = cleanData($_POST['mother-employer-mobile']);
 		$_POST['father-name'] = cleanData($_POST['father-name']);
 		$_POST['father-employer-name'] = cleanData($_POST['father-employer-name']);
 		$_POST['father-employer-address'] = cleanData($_POST['father-employer-address']);
 		$_POST['father-employer-phone'] = cleanData($_POST['father-employer-phone']);
 		$_POST['father-employer-mobile'] = cleanData($_POST['father-employer-mobile']);
 		$_POST['guardian-name'] = cleanData($_POST['guardian-name']);
 		$_POST['guardian-relationship'] = cleanData($_POST['guardian-relationship']);
 		$_POST['guardian-phone'] = cleanData($_POST['guardian-phone']);
 		$_POST['guardian-mobile'] = cleanData($_POST['guardian-mobile']);
 		$_POST['guardian-name'] = cleanData($_POST['guardian-name']);
 		$_POST['sibling1-name'] = cleanData($_POST['sibling1-name']);
 		$_POST['sibling1-level'] = cleanData($_POST['sibling1-level']);
 		$_POST['sibling2-name'] = cleanData($_POST['sibling2-name']);
 		$_POST['sibling2-level'] = cleanData($_POST['sibling2-level']);
 		$_POST['sibling3-name'] = cleanData($_POST['sibling3-name']);
 		$_POST['sibling3-level'] = cleanData($_POST['sibling3-level']);
		echo "clear!";
	}	
}

 

function displayMessage($type,$title,$message){
	echo'<script>';
	echo"Swal.fire(";
  	echo"'".$title."',";
  	echo"'".$message."',";
  	echo"'".$type."'";
	echo'<script>';
)
}
function clean($string) {
   $string = str_replace('-', '', $string);
   $string = str_replace(' ', '', $string);
   $string = str_replace('/', '', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
}
function cleanData($data)
{
	require 'include/config.php';
	$data= stripcslashes($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}
?>
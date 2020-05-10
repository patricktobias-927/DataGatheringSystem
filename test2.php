<?php
$grade = "20..00";
$gradeLen = strlen($grade)-1;
$decimalPos = strrpos($grade, '.');
if ($decimalPos < $gradeLen && $decimalPos >=  $gradeLen-2) {
	echo $grade;
}
else{
	echo $decimalPos . " - " . $gradeLen;
}
// echo gradeValidation($grade);
function gradeValidation($grade)
{
	// if no deimal point
	if(strpos($grade,".")===false){
		//if length is less than 4 max 999
		if(strlen($grade)>0 && strlen($grade) <4){
			//if grade is more than 100.00
			if ($grade>100.00) {
				return "Invalid Inputx";
			}
			else{
				return $grade.".00";
			}
	    }
	    else{
	    	return "Invalid Inputy";
	    }
	}
	//no decimal point
	else if (strpos($grade,".")>0  && 4>strpos($grade,".")) {
		if ($grade>100.01) {
			echo "Invalid Inputz";
		}
		else{
			return $grade;
		}
	}
	else{
		return "Invalid Input";
	}
}
// 1.0
// 20.
// 100.

?> 

 
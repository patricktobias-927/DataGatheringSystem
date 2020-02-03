<?php
function displayMessage($type,$title,$message){
  echo "<script>";
    echo "Swal.fire({";
      echo "position: 'bottom-end',";
      echo "html: '$message',";
      echo "type: '$type',";
      echo "title: '$title',";
      echo "showConfirmButton: false,";
      echo "timer: 1700,";
      echo "customClass: 'swal-sm'";
    echo "})";
  echo "</script>";

}
function cleanThis($string) {
   $string = str_replace('-', '', $string);
   $string = str_replace(' ', '', $string);
   $string = str_replace('/', '', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
   return $string;
}
function cleanData($data)
{
  require 'include/config.php';
  $data= stripcslashes($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

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

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return $string; // Removes special chars.
}

function obfuscate_email($email)
  {    
      $em   = explode("@",$email);
      $name = implode(array_slice($em, 0, count($em)-1), '@');
      $len  = floor(strlen($name)/2);

      return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);   
  }

function generateNumericOTP($n) { 
      
    $generator = "1357902468ABCDEFGHIJKLMOPWXYZ"; 
  
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
   
    return $result; 
} 
  

?>


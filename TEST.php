<?php
$start = date('Y');
$end = $start;
$start++;
$years=10;
for ($i=0; $i <($years*2) ; $i++) { 
	echo "S.Y ".$end." - ".$start."<br>";
	$start--;
	$end--;
}


?>
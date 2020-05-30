<div><form method="post" >
	<div><label for="Mobile">Mobile</label><input name="Mobile" type="text"></div>
	<div><label for="SMS">SMS</label><input name="SMS" type="text"></div>
	<div><button type="submit" name="submit">submit</button></div>
</form></div>

<?php 

if (isset($_POST['submit'])) {

	$secretKey = '002eab2e09373b05d0ce52d014363379';
	$UserID	='30';
	$Mobile	=$_POST['Mobile'];
	$hash = md5($Mobile.$secretKey);
	$SMS	=$_POST['SMS'];
	header("location: https://api.myinfotxt.com/v1/send.php?UserID=".$UserID."&Hash=".$hash."&Mobile=".$Mobile."&SMS=".$SMS);

}

?>
<?php 

$password = "jerrnie01";
echo password_hash($password, PASSWORD_DEFAULT);
$chkpass = password_verify($_POST['password'], $pass_row['password']);
?>
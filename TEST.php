<?php 

$password = "jerrnie01";
$session_start();
$_SESSION['asd'] = "asd";
$_SESSION['last_time_stamp'] = time();

echo password_hash($password, PASSWORD_DEFAULT);
$chkpass = password_verify($_POST['password'], $pass_row['password']);
?>
<script type="text/javascript">
	
$(document).ready(function(){
	function checkSession() {
		$.ajax({
			url:"check_session.php",
			method:"post"
			success:function(data) {
				alert('session xpire');

			}
		});
	}

	setInterval(function(){

	},10000)
});	

</script>
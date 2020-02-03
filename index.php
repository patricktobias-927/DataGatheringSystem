<?php
require 'assets/header.php'; 

?>
<link rel="stylesheet" type="text/css" href="assets/css/login-style.css">
<link href="https://fonts.googleapis.com/css?family=Monda|Lato|Righteous|Montserrat&display=swap" rel="stylesheet">

</head>
<body>
	
<div class="log-header underline">
	<span class="create">Phoenix Publishing House</span> 
</div>

<div class="container login-main-container">
	<h3 class="header-subinfo">Data Collection System</h2>
	<p>By Clicking Login, You agree to our 
		<a href="#" id="term" onclick="dispMSG('term')" >Terms</a> 
		and that you have read our 
		<a href="#" id="data" onclick="dispMSG('data')">Data Use Policy.</a>
	</p> 
	<button onclick="document.getElementById('id01').style.display='block'" class="btn-login">Login</button>
</div>

<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="login.php" method="POST">
    <div class="imgcontainer">
    	<div class="boxstyle">
      <img src="assets/imgs/avatar.png" alt="Avatar" class="avatar">
    	
    	</div>
    </div>

    <div class="container">
      <div class="login-user">
      	<label class='label-user' for="uname"><b>MobileNo</b></label>
      	<input class='form-user' type="text" placeholder="09XXXXXXXXX" name="mobileno" required>
      </div>
	<br>
	  <div class="login-pass">
	  	<label class='label-pass' for="psw"><b>Password</b></label>
      	<input class='form-pass' type="password" placeholder="Enter Password" name="Password" required>
	  </div>
      
    </div>
	
	<div class="container">
      <button type="submit" value="submit" class="btn btn-primary btn-log">Login</button>
      <button type="button" onclick="document.getElementById('id01').style.display='none'" 
      class="btn-pas cancelbtn btn btn-dark">Cancel</button>
	</div>
    <div class="container psw-pos" >
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>



</body>

<script type="text/javascript">
	 $(document).foundation();

	function dispMSG(type){

		if (type == 'term') {

			Swal.fire({
 				position: 'top-end',
  				type: 'info',
  				title: 'Terms and Agreement',
  				html:
    				'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore id quia, ipsa maiores 		pariatur velit ut reprehenderit voluptas totam, fugiat repellendus, modi optio unde 		cupiditate possimus sunt voluptates. Voluptatibus, repudiandae.' +
    				'</br> ' + '</br> ' + 
    				'<h4><strong>blah blah</strong></h4>' +
    				'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque delectus fuga ducimus eum, 		cupiditate, quae provident fugiat facere libero, et placeat accusamus, labore. Sequi 		incidunt veniam quos deserunt! Deserunt, repellat.',
  				showConfirmButton: false,
  				showCloseButton: true
			})

		}

		else if (type == 'data'){

			Swal.fire({
 				position: 'top-end',
  				type: 'info',
  				title: 'Data Use Policy',
  				html:
    				'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore id quia, ipsa maiores 		pariatur velit ut reprehenderit voluptas totam, fugiat repellendus, modi optio unde 		cupiditate possimus sunt voluptates. Voluptatibus, repudiandae.' +
    				'</br> ' + '</br> ' + 
    				'<h4><strong>blah blah</strong></h4>' +
    				'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque delectus fuga ducimus eum, 		cupiditate, quae provident fugiat facere libero, et placeat accusamus, labore. Sequi 		incidunt veniam quos deserunt! Deserunt, repellat.',
  				showConfirmButton: false,
  				showCloseButton: true
			})

		}

		else if (type == 'wrongpass'){
			Swal.fire({
			type: 'error',
			title: 'Access Denied',
			text: 'Wrong Password!',
			footer: '<a href="#">I forgot my password.</a>'})
		}

		else if (type == 'noUserExist'){
			Swal.fire({
			type: 'error',
			title: 'Access Denied',
			text: 'User not exist or password is',
			html:'User <strong>not exist</strong> or password is <strong>incorrect</strong>.'
			})
		}

		else{

		}


	  }

</script>

<?php

if (isset($_REQUEST['wrongPassword'])) {
		echo "<script>";
		echo "dispMSG('wrongpass')";
		echo "</script>";
	}

else if (isset($_REQUEST['noUserExist'])){
		echo "<script>";
		echo "dispMSG('noUserExist')";
		echo "</script>";
}
?>

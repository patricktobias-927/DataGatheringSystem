
<?php
ob_start();
session_start();

require 'assets/header.php';
if (isset($_POST['mobileno']) && isset($_POST['Password'])) {
    
    
    $mobileno = $_POST['mobileno'];
    $password = $_POST['Password'];
    
    //prevent sql injection
    $mobileno = stripcslashes($mobileno);
    $password = stripcslashes($password);
    $mobileno = mysqli_real_escape_string($conn, $mobileno);
    $password = mysqli_real_escape_string($conn, $password);
    
    $sql = "select * from tbl_user where mobileno = '$mobileno'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

      if ($pass_row = mysqli_fetch_assoc($result)) {

          $chkpass = $password==$pass_row['Password'];

          if ($chkpass == false) {
            header('Location: index.php?wrongPassword');
          }

          elseif ($chkpass == true) {
            $_SESSION['id'] = $pass_row['accountID'];
            $_SESSION['lname'] = $pass_row['Lastname'];
            $_SESSION['fname'] = $pass_row['Firstname'];
            $_SESSION['mobileno'] = $pass_row['Mobileno'];
            $_SESSION['lvl'] = $pass_row['Level'];
            $_SESSION['userEmail'] = $pass_row['userEmail'];
            
            $timeStamp = date("Y-m-d H:i:s");
            $token = generateNumericOTP(6);
            $accID = $_SESSION['id']; 
            $sql = "Insert into tbl_token (token, accountID, timeGen) 
            values ('$token','$accID','$timeStamp')";
            mysqli_query($conn, $sql);

           // include 'include/sendEmail.php';

            $_SESSION['token'] = $token;
            header('Location: include/sendEmail.php');
    	     //header('Location: verification.php');

		      }
	     }

      else {
      header('Location: index.php?tryagain');
    }
        
    }

    else {
      header('Location: index.php?noUserExist');
    }
}

else{
header('Location: index.php');  
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


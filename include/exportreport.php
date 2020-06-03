<?php
  require '../include/config.php';
  require '../u/assets/scripts.php';
  require '../include/schoolConfig.php';
  require '../include/getschoolyear.php';
?>


<?php
if (isset($_POST["btn-submit"])) { 
    // $_POST['gradelevel'] = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['gradelevel'])));
    // $_POST['r1'] = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['r1'])));
    // $_POST['filenameinfo'] = mysqli_real_escape_string($conn, stripcslashes(cleanThis($_POST['filenameinfo'])));
   
    if  ($_POST['r1'] === "submitted"){
      $submitted = 1;
    }else{
      $submitted = 0;
    }
    $quote = '"';
      $sql = " select s.studentCode,concat(".$quote."'".$quote.",s.LRN) as LRN,s.prefix as gender, s.lastName, s.firstName,
          s.middleName, s.suffix, s.birthdate, s.Address,concat(".$quote."'".$quote.",c.phone) as Telno,
          concat(".$quote."'".$quote.",c.mobile) as Mobileno,
          s.datetimePosted, i.inComingLevel, i.averageGrade
          from tbl_student s join tbl_schoolinfo i
          on s.studentID = i.studentID
          join tbl_contact c
		    	on c.studentID = s.studentID
          where s.isSubmitted = " . $submitted . " and i.inComingLevel = '" . $_POST['gradelevel'] . "'
          and date(s.datetimePosted) >= '"  . $_POST['subfrom'] . "'
          and date(s.datetimePosted) <= '"  . $_POST['subto'] . "'
          and schoolYearID = " . $schoolYearID . " order by s.lastName;";
  
      $resultset = mysqli_query($conn, $sql);
      if ($resultset->num_rows > 0) {
          while( $rowsinfo = $resultset->fetch_assoc())
          {
              $studinfo[] = $rowsinfo;
          }
      }
       $filename =  $_POST['filenameinfo'] . ".xls";
       header("Content-Type: application/xls");
       header("Content-Disposition: attachment; filename=\"$filename\"");
       $show_coloumn = false;
       ob_end_clean();
       if(!empty($studinfo)) 
       {
           foreach($studinfo as $record) 
           {
               if(!$show_coloumn) 
               {
               // display field/column names in first row
               echo implode("\t", array_keys($record)) . "\n";
               $show_coloumn = true;
               }
               echo implode("\t",  array_values($record)) . "\n";
           }

       } 
       exit();     


  
  }


?>
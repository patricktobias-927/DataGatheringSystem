
<?php
  require '../include/config.php';
?>



<?php

    $quote = '"';
    //$query = "select cast(concat(".$quote."'".$quote.",cellphone)  as char) as cellphone  from tbl_student";
    
    $query = "select s.studentCode as Code, concat(".$quote."'".$quote.",s.LRN) as LRN,
        s.prefix,s.lastName,s.firstName,s.middleName,s.suffix,
        s.birthdate as Birthday,(select fullName from tbl_parents 
        order by isFather desc limit 1)  as Parentname,
        concat(".$quote."'".$quote.",s.Cellphone) as Mobileno,
        s.isEldest as Eldest,u.email  from tbl_student s 
        join tbl_parentuser u
        on s.userID = u.userID;";

   // $result=mysqli_query($conn, $sql); //rs.open sql,con

    // if (!$result = mysqli_query($conn, $query)) {
    //     exit(mysqli_error($conn));
    // }

    // $users = array();
    // if (mysqli_num_rows($result) > 0) {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $users[] = $row;
    //     }
    // }

    // header('Content-Type: text/csv; charset=utf-8');
    // header('Content-Disposition: attachment; filename=Users.csv');
    // $output = fopen('php://output', 'w');
    // fputcsv($output, array('No', 'First Name', 'Last Name', 'Email'));
     
    // if (count($users) > 0) {
    //     foreach ($users as $row) {
    //         fputcsv($output, $row);
    //     }
    // }
    $resultset = mysqli_query($conn, $query);
   // $users = array();
    // while( $rows = mysqli_fetch_assoc($resultset) ) 
    // {
    //      $users[] = $rows;
    // }
    if ($resultset->num_rows > 0) {
        while( $rows = $resultset->fetch_assoc())
        {
            $stud[] = $rows;
        }
    }
     // if(isset($_POST["export_data"])) 
     // {
     $filename = "RegisteredStudents_".date('Ymd') . ".xls";
     header("Content-Type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=\"$filename\"");
     $show_coloumn = false;
     ob_end_clean();
     if(!empty($stud)) 
     {
         foreach($stud as $record) 
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
?>





    
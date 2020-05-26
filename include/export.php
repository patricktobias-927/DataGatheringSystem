
<?php
  require '../include/config.php';
  require '../u/assets/scripts.php';
  require '../include/getschoolyear.php';
?>


<?php

    //$currentDate = date('Y-m-d H:i:s');
    $date = date_create();
    $currentDateTime = date_format($date,"Y-m-d H:i:s");
    
   // $datestr = $currentDateTime->format('Y-m-d H:i:s');
    $tagsub = 0;
    $tagexpo = 0;
    $all ="";
    $all = $_POST['r1'];
    $filename = $_POST['filename'];
    // $sub = $_POST['r1'];
    // $expo = $_POST['r1'];
    if ($all  == "submitted")
    {
        $tagsub = 1;
    }
    if ($all  == "exported")
    {
        $tagexpo = 1;
    }
    if ($all == "all")
    {
        $quote = '"';
        //$query = "select cast(concat(".$quote."'".$quote.",cellphone)  as char) as cellphone  from tbl_student";
        $tagsub = 1;
        $query = "select s.studentCode as Code, concat(".$quote."'".$quote.",s.LRN) as LRN,
            (case when s.prefix = 'M' then 'Mr.' when s.prefix = 'F' then 'Ms.' End ) as Prefix,
            s.lastName,s.firstName,s.middleName,s.suffix,
            s.birthdate as Birthday,(select fullName from tbl_parents p
            where s.studentID = p.studentID 
            order by isFather desc limit 1)  as Parentname,
            concat(".$quote."'".$quote.",s.Cellphone) as Mobileno,
            s.isEldest as Eldest,u.email  from tbl_student s 
            join tbl_parentuser u
            on s.userID = u.userID  where s.schoolYearID = " . $schoolYearID . " and s.isSubmitted = $tagsub order by code;";
           // and timestamp(dateTimeSubmitted) <= timestamp('".$currentDateTime."') ;";
    }
    elseif ($all == "exported")
    {
        $quote = '"';
        //$query = "select cast(concat(".$quote."'".$quote.",cellphone)  as char) as cellphone  from tbl_student";
        
        $query = "select s.studentCode as Code, concat(".$quote."'".$quote.",s.LRN) as LRN,
            (case when s.prefix = 'M' then 'Mr.' when s.prefix = 'F' then 'Ms.' End ) as Prefix,
            s.lastName,s.firstName,s.middleName,s.suffix,
            s.birthdate as Birthday,(select fullName from tbl_parents p
            where s.studentID = p.studentID 
            order by isFather desc limit 1)  as Parentname,
            concat(".$quote."'".$quote.",s.Cellphone) as Mobileno,
            s.isEldest as Eldest,u.email  from tbl_student s 
            join tbl_parentuser u
            on s.userID = u.userID where isExported = $tagexpo and schoolYearID = $schoolYearID order by code;";
           // and timestamp(dateTimeSubmitted) <= timestamp('".$currentDateTime."') ;";
    }
    else
    {
        $quote = '"';
        //$query = "select cast(concat(".$quote."'".$quote.",cellphone)  as char) as cellphone  from tbl_student";

        $query = "select s.studentCode as Code, concat(".$quote."'".$quote.",s.LRN) as LRN,
            (case when s.prefix = 'M' then 'Mr.' when s.prefix = 'F' then 'Ms.' End ) as Prefix,
            s.lastName,s.firstName,s.middleName,s.suffix,
            s.birthdate as Birthday,(select fullName from tbl_parents p
            where s.studentID = p.studentID
            order by isFather desc limit 1)  as Parentname,
            concat(".$quote."'".$quote.",s.Cellphone) as Mobileno,
            s.isEldest as Eldest,u.email  from tbl_student s 
            join tbl_parentuser u
            on s.userID = u.userID  where s.isSubmitted = $tagsub and  isExported = $tagexpo
            and schoolYearID = $schoolYearID  order by code;";
           //and timestamp(dateTimeSubmitted) < timestamp('".$currentDateTime."') ;";

    
    };
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
     $filename = $filename . ".xls";
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









    
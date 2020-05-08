
<?php
  require '../include/config.php';
 
?>

<?php

    $date = date_create();
    $currentDateTime = date_format($date,"Y-m-d H:i:s");

    $tagsub = 0;
    $tagexpo = 0;
    $all ="";
    $all = $_POST['r2'];
    $filenameinfo = $_POST['filenameinfo'];
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

        $queryinfo = "select  s.studentCode as Code, s.birthdate as Birthdate,
        s.birthplace as birthplace, '' as siblingNo, s.familyplace as family_place,
        s.prefix as gender,concat(s.Address,',',(case when s.city is null then '' Else s.city End)) as Address,
		  concat(".$quote."'".$quote.",s.telno) as Telno, 
        concat(".$quote."'".$quote.",s.Cellphone) as cellphone,
        i.schoolLastAttended as School_last_attended, i.schoolYear as school_year,
        i.schoolAddress as school_address,i.incomingLevel as level_completed,
        averageGrade as average_grade,
        (select fullname from tbl_parents where s.studentID=studentiD
        and isfather=1 limit 1) as Father_name,
        (select employerName from tbl_parents where s.studentID=studentiD
        and isfather=1 limit 1) as employer_Name,
        s.Address as employer_Address,
        '' as Employer_telno,'' as Employer_cellphone,
        (select fullname from tbl_parents where s.studentID=studentiD
        and isfather=0 limit 1) as Mother_name,
        (select employerName from tbl_parents where s.studentID=studentiD
        and isfather=0 limit 1) as employer_Name2,
        s.Address  as employer_Address2,
        '' as Employer_telno2,'' as Employer_cellphone2, g.fullName as Guardian_Name,
        g.relationship as Guardian_relationship,
        g.guardianphone as Guardian_Telno,
        concat(".$quote."'".$quote.",g.guardianmobile) as Guardian_cellphone, 
        (select fullname from tbl_siblings where s.studentID=studentiD and siblingNo = 1 limit 1) as sibling1,
        (select level from tbl_siblings where s.studentID=studentiD and siblingNo = 1 limit 1) as sibling1_grade_level,
         (select fullname from tbl_siblings where s.studentID=studentiD and siblingNo = 2 limit 1) as sibling2,
        (select level from tbl_siblings where s.studentID=studentiD and siblingNo = 2 limit 1) as sibling2_grade_level,
         (select fullname from tbl_siblings where s.studentID=studentiD and siblingNo = 3 limit 1) as sibling3,
        (select level from tbl_siblings where s.studentID=studentiD and siblingNo = 3 limit 1) as sibling3_grade_level
        from tbl_student s 
        inner JOIN tbl_schoolinfo i  on s.studentID= i.studentID
        inner JOIN tbl_guardian g  on s.studentID= g.studentID 
         order by code ;";
         //where timestamp(s.dateTimeSubmitted) <= timestamp('".$currentDateTime."')

    }
    elseif ($all == "exported")
    {
        $quote = '"';
        //$query = "select cast(concat(".$quote."'".$quote.",cellphone)  as char) as cellphone  from tbl_student";
        
        $queryinfo = "select  s.studentCode as Code, s.birthdate as Birthdate,
        s.birthplace as birthplace, '' as siblingNo, s.familyplace as family_place,
        s.prefix as gender,concat(s.Address,',',(case when s.city is null then '' Else s.city End)) as Address,
		  concat(".$quote."'".$quote.",s.telno) as Telno, 
        concat(".$quote."'".$quote.",s.Cellphone) as cellphone,
        i.schoolLastAttended as School_last_attended, i.schoolYear as school_year,
        i.schoolAddress as school_address,i.incomingLevel as level_completed,
        averageGrade as average_grade,
        (select fullname from tbl_parents where s.studentID=studentiD
        and isfather=1 limit 1) as Father_name,
        (select employerName from tbl_parents where s.studentID=studentiD
        and isfather=1 limit 1) as employer_Name,
        s.Address as employer_Address,
        '' as Employer_telno,'' as Employer_cellphone,
        (select fullname from tbl_parents where s.studentID=studentiD
        and isfather=0 limit 1) as Mother_name,
        (select employerName from tbl_parents where s.studentID=studentiD
        and isfather=0 limit 1) as employer_Name2,
        s.Address  as employer_Address2,
        '' as Employer_telno2,'' as Employer_cellphone2, g.fullName as Guardian_Name,
        g.relationship as Guardian_relationship,
        g.guardianphone as Guardian_Telno,
        concat(".$quote."'".$quote.",g.guardianmobile) as Guardian_cellphone, 
        (select fullname from tbl_siblings where s.studentID=studentiD and siblingNo = 1 limit 1) as sibling1,
        (select level from tbl_siblings where s.studentID=studentiD and siblingNo = 1 limit 1) as sibling1_grade_level,
         (select fullname from tbl_siblings where s.studentID=studentiD and siblingNo = 2 limit 1) as sibling2,
        (select level from tbl_siblings where s.studentID=studentiD and siblingNo = 2 limit 1) as sibling2_grade_level,
         (select fullname from tbl_siblings where s.studentID=studentiD and siblingNo = 3 limit 1) as sibling3,
        (select level from tbl_siblings where s.studentID=studentiD and siblingNo = 3 limit 1) as sibling3_grade_level
        from tbl_student s 
        inner JOIN tbl_schoolinfo i  on s.studentID= i.studentID
        inner JOIN tbl_guardian g  on s.studentID= g.studentID
        where isExported = $tagexpo
         order by code ;";
         //and timestamp(s.dateTimeSubmitted) <= timestamp('".$currentDateTime."') 
    }
    else
    {
        $quote = '"';
        //$query = "select cast(concat(".$quote."'".$quote.",cellphone)  as char) as cellphone  from tbl_student";
        
        $queryinfo = "select  s.studentCode as Code, s.birthdate as Birthdate,
        s.birthplace as birthplace, '' as siblingNo, s.familyplace as family_place,
        s.prefix as gender,concat(s.Address,',',(case when s.city is null then '' Else s.city End)) as Address,
		  concat(".$quote."'".$quote.",s.telno) as Telno, 
        concat(".$quote."'".$quote.",s.Cellphone) as cellphone,
        i.schoolLastAttended as School_last_attended, i.schoolYear as school_year,
        i.schoolAddress as school_address,i.incomingLevel as level_completed,
        averageGrade as average_grade,
        (select fullname from tbl_parents where s.studentID=studentiD
        and isfather=1 limit 1) as Father_name,
        (select employerName from tbl_parents where s.studentID=studentiD
        and isfather=1 limit 1) as employer_Name,
        s.Address as employer_Address,
        '' as Employer_telno,'' as Employer_cellphone,
        (select fullname from tbl_parents where s.studentID=studentiD
        and isfather=0 limit 1) as Mother_name,
        (select employerName from tbl_parents where s.studentID=studentiD
        and isfather=0 limit 1) as employer_Name2,
        s.Address  as employer_Address2,
        '' as Employer_telno2,'' as Employer_cellphone2, g.fullName as Guardian_Name,
        g.relationship as Guardian_relationship,
        g.guardianphone as Guardian_Telno,
        concat(".$quote."'".$quote.",g.guardianmobile) as Guardian_cellphone, 
        (select fullname from tbl_siblings where s.studentID=studentiD and siblingNo = 1 limit 1) as sibling1,
        (select level from tbl_siblings where s.studentID=studentiD and siblingNo = 1 limit 1) as sibling1_grade_level,
         (select fullname from tbl_siblings where s.studentID=studentiD and siblingNo = 2 limit 1) as sibling2,
        (select level from tbl_siblings where s.studentID=studentiD and siblingNo = 2 limit 1) as sibling2_grade_level,
         (select fullname from tbl_siblings where s.studentID=studentiD and siblingNo = 3 limit 1) as sibling3,
        (select level from tbl_siblings where s.studentID=studentiD and siblingNo = 3 limit 1) as sibling3_grade_level
        from tbl_student s 
        inner JOIN tbl_schoolinfo i  on s.studentID= i.studentID
        inner JOIN tbl_guardian g  on s.studentID= g.studentID
        where s.isSubmitted =$tagsub and isExported = $tagexpo
         order by code ;";
          // and timestamp(s.dateTimeSubmitted) <= timestamp('".$currentDateTime."') 

    }

    $queryupdate = " update tbl_student set isExported = 1 where  isSubmitted = 1 and
    timestamp(dateTimeSubmitted) < timestamp('".$currentDateTime."')  ;";

    $resultsetinfo = mysqli_query($conn, $queryinfo);
    if ($resultsetinfo->num_rows > 0) {
    while( $rowsinfo = $resultsetinfo->fetch_assoc())
    {
        $studinfo[] = $rowsinfo;
    }
    }
    // if(isset($_POST["export_data"])) 
    // {
    $filename = $filenameinfo . ".xls";
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $show_coloumn = false;
    ob_end_clean();
    if(!empty($studinfo)) 
    {
        foreach($studinfo as $recordinfo) 
        {
            if(!$show_coloumn) 
            {
            // display field/column names in first row
            echo implode("\t", array_keys($recordinfo)) . "\n";
            $show_coloumn = true;
            }
            echo implode("\t",  array_values($recordinfo)) . "\n";
        }
        mysqli_query($conn, $queryupdate);
    }
    exit();      

?>

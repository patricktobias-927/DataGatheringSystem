
<?php
  require '../include/config.php';
?>

<?php
    $quote = '"';
    //$query = "select cast(concat(".$quote."'".$quote.",cellphone)  as char) as cellphone  from tbl_student";

    $queryinfo = "select s.studentCode as Code, s.birthdate as Birthdate,
       s.birthplace as birthplace, b.siblingNo, 0 as family_place,
       '' as gender,s.Address,concat(".$quote."'".$quote.",s.telno) as Telno, 
       concat(".$quote."'".$quote.",s.Cellphone) as cellphone,
       i.schoolLastAttended as School_last_attended, i.schoolYear as school_year,
       i.schoolAddress as school_address,i.levelCompleted as level_completed,
       averageGrade as average_grade,
       (select fullname from tbl_parents where s.studentID=studentiD
       and isfather=1) as Father_name,
       (select employerName from tbl_parents where s.studentID=studentiD
       and isfather=1) as employer_Name,
       (select employerAddress from tbl_parents where s.studentID=studentiD
       and isfather=1) as employer_Address,
       '' as Employer_telno,'' as Employer_cellphone,
       (select fullname from tbl_parents where s.studentID=studentiD
       and isfather=0) as Mother_name,
       (select employerName from tbl_parents where s.studentID=studentiD
       and isfather=0) as employer_Name2,
       (select employerAddress from tbl_parents where s.studentID=studentiD
       and isfather=0) as employer_Address2,
       '' as Employer_telno2,'' as Employer_cellphone2, g.fullName as Guardian_Name,
       g.relationship as Guardian_relationship,
       concat(".$quote."'".$quote.",g.guardianphone) as Guardian_Telno,
       concat(".$quote."'".$quote.",g.guardianmobile) as Guardian_cellphone, 
       '' as sibling1, '' as sibling1_grade_level,
       '' as sibling2, '' as sibling2_grade_level,
       '' as sibling3, '' as sibling3_grade_level
       from tbl_student s 
       left join tbl_siblings b on b.studentID =s.studentID 
       LEFT JOIN tbl_schoolinfo i  on i.studentID= s.studentID
       LEFT JOIN tbl_guardian g  on g.studentID= s.studentID;";

    $resultsetinfo = mysqli_query($conn, $queryinfo);
    if ($resultsetinfo->num_rows > 0) {
    while( $rowsinfo = $resultsetinfo->fetch_assoc())
    {
        $studinfo[] = $rowsinfo;
    }
    }
    // if(isset($_POST["export_data"])) 
    // {
    $filename = "RegisteredStudentsInfo_".date('Ymd') . ".xls";
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
    }
    exit();      
?>

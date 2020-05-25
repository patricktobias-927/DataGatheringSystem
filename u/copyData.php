<?php 
require '../include/config.php';
require '../assets/phpfunctions.php';

$id = $_POST['studentidx'];


if($id > 0){

  // Check record exists

    $sql = "select a.currentSchoolYear from tbl_settings as a ";

    $result = mysqli_query($conn, $sql);

    $pass_row = mysqli_fetch_assoc($result);

    $schoolYearID = $pass_row['currentSchoolYear'];
    



    $nowtime = date("Y-m-d H:i:s");
 	  $query = "update tbl_student set isSubmitted =  '0' , isExported =  '0' , datetimePosted = null, datetimeRegistered = '".$nowtime."', schoolYearID ='".$schoolYearID."'  WHERE studentID='".$id."'";
	  mysqli_query($conn,$query);



	// $htmlcodes="";

 //          $sql = "select Firstname, Lastname, Middlename, studentCode, LRN, studentID, isSubmitted, isExported, schoolYearID FROM tbl_student where userID =".$id;
 //           $result1 = mysqli_query($conn, $sql);
 //            $ctr=0;
 //              if (mysqli_num_rows($result1) > 0) {
 //                while($row = mysqli_fetch_array($result1)){
 //                  $status='';$haveStudentCode='';
 //          $htmlcodes .="<tr class='tRow' id='row".$ctr."'>";
 //                  $htmlcodes .="<td><h5>";
 //                    $htmlcodes .= ucwords(combineName($row[0],$row[1],$row[2]));
 //                  $htmlcodes .="</h5></td>";
 //                  $htmlcodes .="<td id='studCode".$ctr."'><h6 >";
 //                    $htmlcodes .= $row[3];
 //                  $htmlcodes .="</h6></td>";
 //                  $htmlcodes .="<td><h6>";
 //                    $htmlcodes .= $row[4];
 //                  $htmlcodes .="</h6></td>";


 //                  if ($row['isSubmitted']&&$row['schoolYearID']==$schoolYearID) {
 //                    $htmlcodes .= '<td class="text-center" title="Your information has been save."><h3><span class="badge badge-info">Registered</span></h3></td>';
 //                    $status = '2';
 //                  }
 //                  else{
 //                    $htmlcodes .= '<td class="text-center" title="Press submit to confirm your registration."><h3><span id="badge'.$ctr.'" class=" badge badge-danger">Pending Registration</span></h3></td>';
 //                    $status = '3';
 //                  }

 //                  if ($status==1||$status==2) {
 //                   $htmlcodes .='   <td class="text-center">';
 //                   $htmlcodes .='       <a class="btn btn-primary btn-sm " href="viewDetails.php?page='.$row[5].'">';
 //                   $htmlcodes .='           <i class="fas fa-folder">';
 //                   $htmlcodes .='           </i>';
 //                   $htmlcodes .='           View';
 //                   $htmlcodes .='       </a>';
 //                   $htmlcodes .='   </td>';
 //                  }
 //                  else{
 //                  $htmlcodes .="</td>";
 //                   $htmlcodes .='   <td class="text-center">';
 //                   $htmlcodes .='       <a class="btn btn-primary btn-sm "  href="viewDetails.php?page='.$row[5].'">';
 //                   $htmlcodes .='           <i class="fas fa-folder">';
 //                   $htmlcodes .='           </i>';
 //                   $htmlcodes .='           <span id="view'.$ctr.'">View/Edit<span>';
 //                   $htmlcodes .='       </a>';
 //                   $htmlcodes .='       <a class="btn btn-success btn-sm submit " id="submit'.$ctr.'" ctrIdentifier="'.$ctr.'" badgeIdentifier="badge'.$ctr.'" href="#" value="'.$row[5].'">';
 //                   $htmlcodes .='           <i class="fas fa-check-square">';
 //                   $htmlcodes .='           </i>';
 //                   $htmlcodes .='           Register';
 //                   $htmlcodes .='       </a>';
 //                   $htmlcodes .='       <a href="#" class="btn delete btn-sm btn-danger" id="delete'.$ctr.'" rowIdentifier="row'.$ctr.'"  value="'.$row[5].'" >';
 //                   $htmlcodes .='           <i class="fas fa-trash">';
 //                   $htmlcodes .='           </i>';
 //                   $htmlcodes .='           Delete';
 //                   $htmlcodes .='       </a>';
 //                   $htmlcodes .='   </td>';
 //                   }

                  
 //          $htmlcodes .="</tr>";
 //                    $ctr++;

 //                }
 //              }


 //              echo $htmlcodes;


  
}


?>
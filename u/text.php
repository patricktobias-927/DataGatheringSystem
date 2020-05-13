<?php 
require '../include/config.php';
  $query = "select * from tbl_announcement where announceID = 5";
    $result = mysqli_query($conn,  $query);

        $pass_row = mysqli_fetch_array ($result);

            $html       = $pass_row['3']; 

      


  echo html_entity_decode(htmlspecialchars_decode($html));
?>
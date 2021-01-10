<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';


 $sql = "SELECT
 drugstore.storeid,
drugstore.storename,

 CONCAT(DATE_FORMAT(main_survey.dateadd,'%d-%m'),'-',DATE_FORMAT(main_survey.dateadd,'%Y')+543) as  dataadd

 
 FROM
 main_survey
INNER JOIN    drugstore on  main_survey.storeid = drugstore.storeid

 order by  drugstore.storeid ";


$return_arr = array();

if ($result = mysqli_query( $conn, $sql )){
    while ($row = mysqli_fetch_assoc($result)) {
	
     array_push($return_arr,$row);
   }
 }

mysqli_close($conn);

echo json_encode($return_arr);








?>

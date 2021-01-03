<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

    $storeid = $_GET["storeid"];


 $sql = "SELECT
 drugstore.storeid,
 drugstore.name,
 drugstore.lastname,
 drugstore.sex,
 drugstore.age,
 drugstore.storename,
 drugstore.village,
 drugstore.tambon,
 drugstore.pcucode,
 drugstore.grocery,
 drugstore.education,
 drugstore.training,
 drugstore.datacollector1,
 drugstore.affiliate1,
 drugstore.datacollector2,
 drugstore.affiliate2,
 drugstore.datacollector3,
 drugstore.affiliate3,
 drugstore.datestart,
 drugstore.timestart
FROM
 drugstore
where  drugstore.storeid  = '".$storeid."'


";


$return_arr = array();

if ($result = mysqli_query( $conn, $sql )){
    while ($row = mysqli_fetch_assoc($result)) {
	
     array_push($return_arr,$row);
   }
 }

mysqli_close($conn);

echo json_encode($return_arr);








?>

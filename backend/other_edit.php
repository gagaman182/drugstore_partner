<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

    $storeid = $_GET["storeid"];
 

   
      $sql = "select storeid,other from other 
      where       storeid  = '".$storeid."'
    





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

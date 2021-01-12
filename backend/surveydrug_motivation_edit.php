<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

    $storeid = $_GET["storeid"];
    $typedruggroup = $_GET["typedruggroup"];

   
      $sql = "select t_motivation.motivation,t_motivation.name  from motivation INNER JOIN t_motivation on motivation.motivationid = t_motivation.motivation
      where  typedruggroup = '".$typedruggroup."' and storeid  = '".$storeid."'





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

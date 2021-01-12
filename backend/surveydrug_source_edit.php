<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

    $storeid = $_GET["storeid"];
    $typedruggroup = $_GET["typedruggroup"];

   
      $sql = "select t_source.source,t_source.name  from source INNER JOIN t_source on source.sourceid = t_source.source
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

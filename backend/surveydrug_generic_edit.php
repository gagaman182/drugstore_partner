<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

    $storeid = $_GET["storeid"];
    $typedruggroup = $_GET["typedruggroup"];

   
      $sql = "select t_generic.generic,t_generic.name  from generic INNER JOIN t_generic on generic.genericid = t_generic.generic
      where typedruggroup = '".$typedruggroup."' and storeid  = '".$storeid."'





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

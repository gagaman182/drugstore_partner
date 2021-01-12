
 <?php
 header('Content-Type:application/json');
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization');
 $data = json_decode(file_get_contents('php://input'),true);
 
 $storeid = $data['storeid'];
 $other = $data['other'];

 

 include 'conn.php';

 
  $sql = "UPDATE other
SET other = '" . $other ."',


dateadd = CURRENT_TIMESTAMP


WHERE storeid = '" . $storeid ."' ";





$return_arr = array();

if ($conn->query($sql) === TRUE) {
	
	
		$row_array['message'] = "เพิ่มข้อมูลสำเร็จ";
		array_push($return_arr,$row_array);
	
        
        
	
} else {
	$row_array['message'] =  "เพิ่มข้อมูลไม่สำเร็จ " ;
	array_push($return_arr,$row_array);
}


mysqli_close($conn);

echo json_encode($return_arr);


?>
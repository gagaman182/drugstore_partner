
 <?php
 header('Content-Type:application/json');
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization');
 $data = json_decode(file_get_contents('php://input'),true);
 
 $storeid = $data['storeid'];
 $name = $data['name'];
 $lastname = $data['lastname'];
 $sex = $data['sex'];
 $age = $data['age'];
 $storename = $data['storename'];
 $address = $data['address'];
 $village = $data['village'];
 $tambon = $data['tambon'];
 $pcucode = $data['pcucode'];
 $grocery = $data['grocery'];
 $education = $data['education'];
 $training = $data['training'];
 $datacollector1 = $data['datacollector1'];
 $affiliate1 = $data['affiliate1'];
 $datacollector2 = $data['datacollector2'];
 $affiliate2 = $data['affiliate2'];
 $datacollector3 = $data['datacollector3'];
 $affiliate3 = $data['affiliate3'];
 $datestart = $data['datestart'];
 $timestart = $data['timestart'];

 include 'conn.php';

 
  $sql = "UPDATE drugstore
SET name = '" . $name ."',
lastname = '" . $lastname ."',
sex = '" . $sex ."',
age = '" . $age ."',
storename = '" . $storename ."',
address = '" . $address ."',
village = '" . $village ."',
tambon = '" . $tambon ."',
pcucode = '" . $pcucode ."',
grocery = '" . $grocery ."',
education = '" . $education ."',
training = '" . $training ."',
datacollector1 = '" . $datacollector1 ."',
affiliate1 = '" . $affiliate1 ."',
datacollector2 = '" . $datacollector2 ."',
affiliate2 = '" . $affiliate2 ."',
datacollector3 = '" . $datacollector3 ."',
affiliate3 = '" . $affiliate3 ."',
datestart = '" . $datestart ."',
timestart = '" . $timestart ."',

dateedit = CURRENT_TIMESTAMP


WHERE storeid = '" . $storeid ."' ";





$return_arr = array();

if ($conn->query($sql) === TRUE) {
	
	
		$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
		array_push($return_arr,$row_array);
	
        
        
	
} else {
	$row_array['message'] =  "ไม่สามารถแก้ไขข้อมูลได้ " ;
	array_push($return_arr,$row_array);
}


mysqli_close($conn);

echo json_encode($return_arr);


?>
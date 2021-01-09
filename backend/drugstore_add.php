<?php
 header('Content-Type:application/json');
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization');
 $data = json_decode(file_get_contents('php://input'),true);

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





 // หา record ล่าสุด
$sql = "SELECT count(*) as total from drugstore";
 
if ($result = mysqli_query( $conn, $sql )){
  
   while ($row = mysqli_fetch_assoc($result)) {

     $id=$row['total']+1;
 }
}




if (!empty($name)) {
 

    
       $strvisit  = "  INSERT INTO drugstore(storeid,name,lastname,sex,age,storename,address,village,tambon,pcucode,grocery,education,training,
       datacollector1,affiliate1,datacollector2,affiliate2,datacollector3,affiliate3,datestart,timestart,dateadd) 
        VALUES('".$id."','".$name."','".$lastname."','".$sex."','".$age."','".$storename."','".$address."','".$village."','".$tambon."','".$pcucode."','".$grocery."','".$education."','".$training."',
        '".$datacollector1."','".$affiliate1."','".$datacollector2."','".$affiliate2."','".$datacollector3."','".$affiliate3."','".$datestart."','".$timestart."',CURRENT_TIMESTAMP)";
        
        
        
        if ($conn->query($strvisit) === TRUE) {
          
            
            $return_message = array();
            $row_array['message'] = "เพิ่มข้อมูลสำเร็จ";
            array_push($return_message,$row_array);
        
        
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            $return_message = array();
            $row_array['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
            array_push($return_message,$row_array);
            
        }


      }
      
mysqli_close($conn);
	
echo json_encode($return_message);

?>
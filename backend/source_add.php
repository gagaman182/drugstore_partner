<?php
 header('Content-Type:application/json');
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization');
 $data = json_decode(file_get_contents('php://input'),true);

  $storeid = $data['storeid'];
  $sourceid = $data['sourceid'];
  $typedruggroup = $data['typedruggroup'];
 
  
 



include 'conn.php';


if (empty($sourceid)) {
  $row_array['message'] = "เพิ่มข้อมูลสำเร็จ444";

}else{


 // หา record ล่าสุด
$sql = "SELECT count(*) as total from source";
 
if ($result = mysqli_query( $conn, $sql )){
  
   while ($row = mysqli_fetch_assoc($result)) {

     $id=$row['total']+1;
 }
}




if (!empty($storeid)) {
 

    
       $strvisit  = "  INSERT INTO source(id,storeid,sourceid,typedruggroup,dateadd) 
        VALUES('".$id."','".$storeid."','".$sourceid."','".$typedruggroup."',CURRENT_TIMESTAMP)";
        
        
        
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
    } 
mysqli_close($conn);
	
echo json_encode($return_message);

?>
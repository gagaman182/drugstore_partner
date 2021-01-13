<?php
 header('Content-Type:application/json');
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization');
 $data = json_decode(file_get_contents('php://input'),true);

  $storeid = $data['storeid'];
  $drugstoreid = $data['drugstoreid'];
  $typedruggroup = $data['typedruggroup'];
 
  




include 'conn.php';





//  // หา record ล่าสุด
// $sql = "SELECT count(*) as total from drugstore_select";
 
// if ($result = mysqli_query( $conn, $sql )){
  
//    while ($row = mysqli_fetch_assoc($result)) {

//      $id=$row['total']+1;
//  }
// }




if (!empty($storeid)) {
 

    
      //  $strvisit  = "  INSERT INTO drugstore_select(id,storeid,drugstoreid,typedruggroup,dateadd) 
      //   VALUES('".$id."','".$storeid."','".$drugstoreid."','".$typedruggroup."',CURRENT_TIMESTAMP)";
        
        $strvisit  = "  INSERT INTO drugstore_select(storeid,drugstoreid,typedruggroup,dateadd) 
        VALUES(".$storeid."','".$drugstoreid."','".$typedruggroup."',CURRENT_TIMESTAMP)";
        
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
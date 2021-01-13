<?php
 header('Content-Type:application/json');
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization');
 $data = json_decode(file_get_contents('php://input'),true);

  $id = $data['id'];
  $name = $data['name'];
  $type = $data['type'];

 
include 'conn.php';

if($type ==  'source'){

if (!empty($id)) {

   // หา record ล่าสุด
$sql = "SELECT count(*) as total from t_source";
 
if ($result = mysqli_query( $conn, $sql )){
  
   while ($row = mysqli_fetch_assoc($result)) {

     $num=$row['total']+1;
 }
}


 
       $strvisit  = "  INSERT INTO t_source(num,source,name) 
        VALUES('".$num."','".$id."','".$name."')";
        
        
        
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
}elseif($type ==  'motivation'){
  if (!empty($id)) {

    // หา record ล่าสุด
 $sql = "SELECT count(*) as total from t_motivation";
  
 if ($result = mysqli_query( $conn, $sql )){
   
    while ($row = mysqli_fetch_assoc($result)) {
 
      $num=$row['total']+1;
  }
 }
 
 
  
        $strvisit  = "  INSERT INTO t_motivation(num,motivation,name) 
         VALUES('".$num."','".$id."','".$name."')";
         
         
         
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

}elseif($type ==  'generic'){
  if (!empty($id)) {

    // หา record ล่าสุด
 $sql = "SELECT count(*) as total from t_generic";
  
 if ($result = mysqli_query( $conn, $sql )){
   
    while ($row = mysqli_fetch_assoc($result)) {
 
      $num=$row['total']+1;
  }
 }
 
 
  
        $strvisit  = "  INSERT INTO t_generic(num,generic,name) 
         VALUES('".$num."','".$id."','".$name."')";
         
         
         
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

}elseif($type ==  'tradename'){
  if (!empty($id)) {

    // หา record ล่าสุด
 $sql = "SELECT count(*) as total from t_tradename";
  
 if ($result = mysqli_query( $conn, $sql )){
   
    while ($row = mysqli_fetch_assoc($result)) {
 
      $num=$row['total']+1;
  }
 }
 
 
  
        $strvisit  = "  INSERT INTO t_tradename(num,tradename,name) 
         VALUES('".$num."','".$id."','".$name."')";
         
         
         
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

}elseif($type ==  'tambon'){
  if (!empty($id)) {

    // หา record ล่าสุด
 $sql = "SELECT count(*) as total from t_tambon";
  
 if ($result = mysqli_query( $conn, $sql )){
   
    while ($row = mysqli_fetch_assoc($result)) {
 
      $num=$row['total']+1;
  }
 }
 
 
  
        $strvisit  = "  INSERT INTO t_tambon(num,tambon,name) 
         VALUES('".$num."','".$id."','".$name."')";
         
         
         
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

}elseif($type ==  'pcucode'){
  if (!empty($id)) {

    // หา record ล่าสุด
 $sql = "SELECT count(*) as total from t_pcucode";
  
 if ($result = mysqli_query( $conn, $sql )){
   
    while ($row = mysqli_fetch_assoc($result)) {
 
      $num=$row['total']+1;
  }
 }
 
 
  
        $strvisit  = "  INSERT INTO t_pcucode(num,pcucode,name) 
         VALUES('".$num."','".$id."','".$name."')";
         
         
         
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

}elseif($type ==  'education'){
  if (!empty($id)) {

    // หา record ล่าสุด
 $sql = "SELECT count(*) as total from t_education";
  
 if ($result = mysqli_query( $conn, $sql )){
   
    while ($row = mysqli_fetch_assoc($result)) {
 
      $num=$row['total']+1;
  }
 }
 
 
  
        $strvisit  = "  INSERT INTO t_education(num,education,name) 
         VALUES('".$num."','".$id."','".$name."')";
         
         
         
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

}elseif($type ==  'training'){
  if (!empty($id)) {

    // หา record ล่าสุด
 $sql = "SELECT count(*) as total from t_training";
  
 if ($result = mysqli_query( $conn, $sql )){
   
    while ($row = mysqli_fetch_assoc($result)) {
 
      $num=$row['total']+1;
  }
 }
 
 
  
        $strvisit  = "  INSERT INTO t_training(num,training,name) 
         VALUES('".$num."','".$id."','".$name."')";
         
         
         
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

}elseif($type ==  'grocery'){
  if (!empty($id)) {

    // หา record ล่าสุด
 $sql = "SELECT count(*) as total from t_grocery";
  
 if ($result = mysqli_query( $conn, $sql )){
   
    while ($row = mysqli_fetch_assoc($result)) {
 
      $num=$row['total']+1;
  }
 }
 
 
  
        $strvisit  = "  INSERT INTO t_grocery(num,grocery,name) 
         VALUES('".$num."','".$id."','".$name."')";
         
         
         
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
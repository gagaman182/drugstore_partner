<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';


 $sql = "SELECT
 drugstore.storeid,
 concat(drugstore.name,' ',drugstore.lastname) as name,
 IF(drugstore.sex = 'm','ชาย','หญิง') as sex,
 drugstore.age,
 drugstore.storename,
 drugstore.village,
 t_tambon.name as tambon,
 t_pcucode.name as pcucode,
 t_grocery.name as grocery,
 t_education.name as education,
 t_training.name as training,
 CONCAT(DATE_FORMAT(drugstore.datestart,'%d-%m'),'-',DATE_FORMAT(drugstore.datestart,'%Y')+543) as  datestart,
drugstore.timestart
 
 FROM
   drugstore
 LEFT JOIN t_tambon on drugstore.tambon = t_tambon.tambon
 LEFT JOIN t_pcucode on drugstore.pcucode = t_pcucode.pcucode
 LEFT JOIN t_grocery on drugstore.grocery = t_grocery.grocery
 LEFT JOIN t_education on drugstore.education = t_education.education
 LEFT JOIN t_training on drugstore.training = t_training.training
 order by  drugstore.storeid ";


$return_arr = array();

if ($result = mysqli_query( $conn, $sql )){
    while ($row = mysqli_fetch_assoc($result)) {
	
     array_push($return_arr,$row);
   }
 }

mysqli_close($conn);

echo json_encode($return_arr);








?>

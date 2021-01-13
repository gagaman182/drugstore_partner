
 <?php
 header('Content-Type:application/json');
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization');
 $data = json_decode(file_get_contents('php://input'),true);
 $num = $data['num'];
 $id = $data['id'];
  $name = $data['name'];
  $type = $data['type'];
 

 include 'conn.php';
 if($type ==  'source'){

	

	if (!empty($id)) {
	 
		$sql = "UPDATE t_source
		SET source = '" . $id ."',
		name = '" . $name ."'
		WHERE num = '" . $num ."' ";
		
		
		$return_arr = array();
		
		if ($conn->query($sql) === TRUE) {
			
			
				$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
				array_push($return_arr,$row_array);
			
				
				
			
		} else {
			$row_array['message'] =  "ไม่สามารถแก้ไขข้อมูลได้ " ;
			array_push($return_arr,$row_array);
		}
	
	
		  }
	}elseif($type == 'motivation'){

	

		if (!empty($id)) {
		 
			$sql = "UPDATE t_motivation
			SET motivation = '" . $id ."',
			name = '" . $name ."'
			WHERE num = '" . $num ."' ";
			
			
			$return_arr = array();
			
			if ($conn->query($sql) === TRUE) {
				
				
					$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
					array_push($return_arr,$row_array);
				
					
					
				
			} else {
				$row_array['message'] =  "ไม่สามารถแก้ไขข้อมูลได้ " ;
				array_push($return_arr,$row_array);
			}
		
		
			  }
		}elseif($type == 'generic'){

	

			if (!empty($id)) {
			 
				$sql = "UPDATE t_generic
				SET generic = '" . $id ."',
				name = '" . $name ."'
				WHERE num = '" . $num ."' ";
				
				
				$return_arr = array();
				
				if ($conn->query($sql) === TRUE) {
					
					
						$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
						array_push($return_arr,$row_array);
					
						
						
					
				} else {
					$row_array['message'] =  "ไม่สามารถแก้ไขข้อมูลได้ " ;
					array_push($return_arr,$row_array);
				}
			
			
				  }
			}elseif($type == 'tradename'){

	

				if (!empty($id)) {
				 
					$sql = "UPDATE t_tradename
					SET tradename = '" . $id ."',
					name = '" . $name ."'
					WHERE num = '" . $num ."' ";
					
					
					$return_arr = array();
					
					if ($conn->query($sql) === TRUE) {
						
						
							$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
							array_push($return_arr,$row_array);
						
							
							
						
					} else {
						$row_array['message'] =  "ไม่สามารถแก้ไขข้อมูลได้ " ;
						array_push($return_arr,$row_array);
					}
				
				
					  }
				}elseif($type == 'tambon'){

	

					if (!empty($id)) {
					 
						$sql = "UPDATE t_tambon
						SET tambon = '" . $id ."',
						name = '" . $name ."'
						WHERE num = '" . $num ."' ";
						
						
						$return_arr = array();
						
						if ($conn->query($sql) === TRUE) {
							
							
								$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
								array_push($return_arr,$row_array);
							
								
								
							
						} else {
							$row_array['message'] =  "ไม่สามารถแก้ไขข้อมูลได้ " ;
							array_push($return_arr,$row_array);
						}
					
					
						  }
					}elseif($type == 'pcucode'){

	

						if (!empty($id)) {
						 
							$sql = "UPDATE t_pcucode
							SET pcucode = '" . $id ."',
							name = '" . $name ."'
							WHERE num = '" . $num ."' ";
							
							
							$return_arr = array();
							
							if ($conn->query($sql) === TRUE) {
								
								
									$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
									array_push($return_arr,$row_array);
								
									
									
								
							} else {
								$row_array['message'] =  "ไม่สามารถแก้ไขข้อมูลได้ " ;
								array_push($return_arr,$row_array);
							}
						
						
							  }
						}elseif($type == 'education'){

	

							if (!empty($id)) {
							 
								$sql = "UPDATE t_education
								SET education = '" . $id ."',
								name = '" . $name ."'
								WHERE num = '" . $num ."' ";
								
								
								$return_arr = array();
								
								if ($conn->query($sql) === TRUE) {
									
									
										$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
										array_push($return_arr,$row_array);
									
										
										
									
								} else {
									$row_array['message'] =  "ไม่สามารถแก้ไขข้อมูลได้ " ;
									array_push($return_arr,$row_array);
								}
							
							
								  }
							}
							elseif($type == 'training'){

	

								if (!empty($id)) {
								 
									$sql = "UPDATE t_training
									SET training = '" . $id ."',
									name = '" . $name ."'
									WHERE num = '" . $num ."' ";
									
									
									$return_arr = array();
									
									if ($conn->query($sql) === TRUE) {
										
										
											$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
											array_push($return_arr,$row_array);
										
											
											
										
									} else {
										$row_array['message'] =  "ไม่สามารถแก้ไขข้อมูลได้ " ;
										array_push($return_arr,$row_array);
									}
								
								
									  }
								}
								elseif($type == 'grocery'){

	

									if (!empty($id)) {
									 
										$sql = "UPDATE t_grocery
										SET grocery = '" . $id ."',
										name = '" . $name ."'
										WHERE num = '" . $num ."' ";
										
										
										$return_arr = array();
										
										if ($conn->query($sql) === TRUE) {
											
											
												$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
												array_push($return_arr,$row_array);
											
												
												
											
										} else {
											$row_array['message'] =  "ไม่สามารถแก้ไขข้อมูลได้ " ;
											array_push($return_arr,$row_array);
										}
									
									
										  }
									}
							
	
 
 


mysqli_close($conn);

echo json_encode($return_arr);


?>
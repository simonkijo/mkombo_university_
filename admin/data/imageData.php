<?php 
	// uploading file(s) to uploads/questions folder.
	$valid_formats = array("jpg");
	$max_file_size = 1024*(1024*1024); // 1GB
	$path = "..\\dist\\img\\"; // Upload directory
	$count = 0;
	
	if(@isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
			// Loop $_FILES to execute all files
			foreach ($_FILES['files']['name'] as $f => $name) { 
				if($name != ""){
					if ($_FILES['files']['error'][$f] == 4) {
						continue; // Skip file if any error found
					}	       
					if ($_FILES['files']['error'][$f] == 0) {	           
						if ($_FILES['files']['size'][$f] > $max_file_size) {
							$message[0] = "large";
							continue; // Skip large files
						}
						elseif( !@in_array(strtolower(pathinfo($name, PATHINFO_EXTENSION)), $valid_formats) ){
							$message[1] = "invalid";
							continue; // Skip invalid file formats
						}
						else{ // No error found! Move uploaded files 
							if(@move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name)){
								$message[2] = 'success';
								$count++; // Number of successfully uploaded files
							}
						}
					}
				}else{
					$message[3] = "empty";
				}
			}
		}
?>
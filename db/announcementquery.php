<?php 
	if(isset($_POST['btnAdd'])){
		$category_name = $_POST['category_name'];
														
		// get image info
		$menu_image = $_FILES['category_image']['name'];
		$image_error = $_FILES['category_image']['error'];
		$image_type = $_FILES['category_image']['type'];
														
		// create array variable to handle error
		$error = array();
														
		if(empty($category_name)){
		$error['category_name'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
														}
        // common image file extensions
		$allowedExts = array("gif", "jpeg", "jpg", "png");
														
		// get image file extension
		error_reporting(E_ERROR | E_PARSE);
		$extension = end(explode(".", $_FILES["category_image"]["name"]));
																
		if($image_error > 0){
		$error['category_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert an image! </span>";
		}else if(!(($image_type == "image/gif") || 
		($image_type == "image/jpeg") || 
		($image_type == "image/jpg") || 
		($image_type == "image/x-png") ||
		($image_type == "image/png") || 
		($image_type == "image/pjpeg")) &&
		!(in_array($extension, $allowedExts))){
														
		$error['category_image'] = " <span class='label label-danger errormsg'>Image type must jpg, jpeg, gif, or png!</span>";
		}
														
		if(!empty($category_name) && empty($error['category_image'])){
															
		// create random image file name
		$string = '0123456789';
		$file = preg_replace("/\s+/", "_", $_FILES['category_image']['name']);
		$function = new functions;
		$menu_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
																
		// upload new image
		$upload = move_uploaded_file($_FILES['category_image']['tmp_name'], 'upload/category/'.$menu_image);
													
		// insert new data to menu table
		$sql_query = "INSERT INTO announcement_category (category_name, category_image)
		VALUES(?, ?)";
															
		$upload_image = $menu_image;
		$stmt = $connect->stmt_init();
		if($stmt->prepare($sql_query)) {	
	    // Bind your variables to replace the ?s
		$stmt->bind_param('ss', 
		$category_name, 
		$upload_image
		);
		// Execute query
		$stmt->execute();
		// store result 
		$result = $stmt->store_result();
		$stmt->close();
		}
															
	    if($result){
		$error['add_category'] = " 
		<h4>
			<div class='alert alert-success cattxtbox'>
				* New Category Successfully Added.
				<a href='category.php'>
				    <i class='fa fa-check fa-lg'></i>
			    </a>
		    </div>
		</h4>";
		}else{
			$error['add_category'] = " <span class='label label-danger'>Failed add category</span>";
				}
			}
		}
?>

<?php 
		
		if(isset($_POST['btnDelete'])){
			if(isset($_GET['id'])){
				$ID = $_GET['id'];
			}else{
				$ID = "";
			}
			// get image file from table
			$delquery = "SELECT category_image 
					FROM announcement_category 
					WHERE cid = ?";
			
			$stmt = $connect->stmt_init();
			if($stmt->prepare($delquery)) {	
				// Bind your variables to replace the ?s
				$stmt->bind_param('s', $ID);
				// Execute query
				$stmt->execute();
				// store result 
				$stmt->store_result();
				$stmt->bind_result($category_image);
				$stmt->fetch();
				$stmt->close();
			}
			
			// delete image file from directory
			$delete = unlink('img/fileupload_announcement/'."$category_image");
			
			// delete data from menu table
			$delquery = "DELETE FROM announcement_category 
					WHERE cid = ?";
			
			$stmt = $connect->stmt_init();
			if($stmt->prepare($delquery)) {	
				// Bind your variables to replace the ?s
				$stmt->bind_param('s', $ID);
				// Execute query
				$stmt->execute();
				// store result 
				$delete_category_result = $stmt->store_result();
				$stmt->close();
			}
			
			// get image file from table
			$delquery = "SELECT announcement_image 
					FROM tbl_announcement 
					WHERE cat_id = ?";
			
			// create array variable to store menu image
			$image_data = array();
			
			$stmt_menu = $connect->stmt_init();
			if($stmt_menu->prepare($delquery)) {	
				// Bind your variables to replace the ?s
				$stmt_menu->bind_param('s', $ID);
				// Execute query
				$stmt_menu->execute();
				// store result 
				$stmt_menu->store_result();
				$stmt_menu->bind_result($image_data['announcement_image']);
			}
			
			// delete all menu image files from directory
			while($stmt_menu->fetch()){
				$announcement_image = $image_data[announcement_image];
				$delete_image = unlink("$announcement_image");
			}
			
			$stmt_menu->close();
			
			// delete data from menu table
			$delquery = "DELETE FROM tbl_announcement 
					WHERE cat_id = ?";
			
			$stmt = $connect->stmt_init();
			if($stmt->prepare($delquery)) {	
				// Bind your variables to replace the ?s
				$stmt->bind_param('s', $ID);
				// Execute query
				$stmt->execute();
				// store result 
				$delete_menu_result = $stmt->store_result();
				$stmt->close();
			}
				
			// if delete data success back to reservation page
			if($delete_category_result && $delete_menu_result){
				header("location: postannouncement.php");
			}
		}		
		
		
	?>




<?php

		
?>

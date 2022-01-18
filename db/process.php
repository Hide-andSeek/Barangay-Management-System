<?php
//Update: Text box.
// if(isset($_POST['editbtn'])){
			

// 	$blotter_id = $_GET['blotter_id'];
// 	$n_complainant = $_POST['n_complainant'];
// 	$comp_age = $_POST['comp_age'];
// 	$comp_gender = $_POST['comp_gender'];
// 	$comp_address = $_POST['comp_address'];
// 	$inci_address = $_POST['inci_address'];
// 	$n_violator = $_POST['n_violator'];
// 	$violator_age = $_POST['violator_age'];
// 	$violator_gender = $_POST['violator_gender'];
// 	$relationship = $_POST['relationship'];
// 	$violator_address = $_POST['violator_address'];
// 	$witnesses = $_POST['witnesses'];
// 	$complaints = $_POST['complaints'];
											
// 	// checking empty fields
// 	if(empty($n_complainant) || empty($comp_age) || empty($comp_gender) || empty($comp_address) || empty($inci_address) || empty($n_violator) || empty($violator_age) || empty($violator_gender) || empty($relationship) || empty($violator_address) || empty($witnesses) || empty($complaints)){	
												
// 	if(empty($n_complainant)) {
// 		echo "<font color='red'>Complainant field is empty.</font><br/>";
// 	}											
// 	if(empty($comp_age)) {
// 		echo "<font color='red'>Complainant Age field is empty.</font><br/>";
// 	}
											
// 	if(empty($comp_gender)) {
// 		echo "<font color='red'>Complainant Gender field is empty.</font><br/>";
// 	}
// 	if(empty($comp_address)) {
// 		echo "<font color='red'>Complainant Address field is empty.</font><br/>";
// 	}	
// 	if(empty($inci_address)) {
// 		echo "<font color='red'>Incident Address field is empty.</font><br/>";
// 	}	
// 	if(empty($n_violator)) {
// 		echo "<font color='red'>Name of Violator field is empty.</font><br/>";
// 	}	
// 	if(empty($violator_age)) {
// 		echo "<font color='red'>Name of Violator Age field is empty.</font><br/>";
// 	}	
// 	if(empty($violator_gender)) {
// 		echo "<font color='red'>Name of Violator Gender field is empty.</font><br/>";
// 	}	
// 	if(empty($relationship)) {
// 		echo "<font color='red'>Relationship field is empty.</font><br/>";
// 	}	
// 	if(empty($violator_address)) {
// 		echo "<font color='red'>Violator Address field is empty.</font><br/>";
// 	}	
// 	if(empty($witnesses)) {
// 		echo "<font color='red'>Witnesses field is empty.</font><br/>";
// 	}
// 	if(empty($complaints)) {
// 		echo "<font color='red'>Complaint field is empty.</font><br/>";
											
// 	}else{	
// 	//updating the table
// 	$sql = "UPDATE blotterdb SET n_complainant=:n_complainant, comp_age=:comp_age, comp_gender=:comp_gender,comp_address=:comp_address,inci_address=:inci_address,n_violator=:n_violator,violator_age=:violator_age,violator_gender=:violator_gender,relationship=:relationship,violator_address=:violator_address,witnesses=:witnesses, complaints=:complaints WHERE blotter_id=:blotter_id";
// 	$query = $db->prepare($sql);
														
// 	$query->bindparam(':n_complainant', $n_complainant);
// 	$query->bindparam(':comp_age', $comp_age);
// 	$query->bindparam(':comp_gender', $comp_gender);
// 	$query->bindparam(':comp_address', $comp_address);
// 	$query->bindparam(':inci_address', $inci_address);
// 	$query->bindparam(':n_violator', $n_violator);
// 	$query->bindparam(':violator_age', $violator_age);
// 	$query->bindparam(':violator_gender', $violator_gender);
// 	$query->bindparam(':relationship', $relationship);
// 	$query->bindparam(':violator_address', $violator_address);
// 	$query->bindparam(':witnesses', $witnesses);
// 	$query->bindparam(':complaints', $complaints);
// 	$query->execute();
																
// 		header("Location: compAdmin_dashboard.php");
// 		}	
// 	}
// }	

 
	if(isset($_POST[''])){
		try{
			$id = $_GET['blotter_id'];
            $n_complainant = $_POST['n_complainant'];
            $comp_age = $_POST['comp_age'];
            $comp_gender = $_POST['comp_gender'];
            $comp_address = $_POST['comp_address'];
            $inci_address = $_POST['inci_address'];
            $n_violator = $_POST['n_violator'];
            $violator_age = $_POST['violator_age'];
            $violator_gender = $_POST['violator_gender'];
            $relationship = $_POST['relationship'];
            $violator_address = $_POST['violator_address'];
            $witnesses = $_POST['witnesses'];
            $complaints = $_POST['complaints'];
 
			$sql = "UPDATE blotterdb SET n_complainant = '$n_complainant', comp_age = '$comp_age', comp_gender = '$comp_gender', comp_address = '$comp_address',inci_address= '$inci_address', n_violator= '$n_violator', violator_age= '$violator_age', violator_gender= '$violator_gender', relationship = '$relationship',violator_address = '$violator_address', witnesses = '$witnesses', complaints = '$complaints' WHERE blotter_id= '$blotter_id'";
			
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Information Processed successfully' : 'Something went wrong. Cannot update member';
 
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}
 
		//close connection
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Fill up edit form first';
	}
 
	header('location: index.php');
 

	




	if(isset($_POST['approvebtn'])){
	
		$blotterID = $_POST['blotterID'];
		$complainant = $_POST['complainant'];
		$c_age = $_POST['c_age'];
		$c_gender = $_POST['c_gender'];
		$c_address = $_POST['c_address'];
		$incident_add = $_POST['incident_add'];
		$violators = $_POST['violators'];
		$v_age = $_POST['v_age'];
		$v_gender = $_POST['v_gender'];
		$v_rel = $_POST['v_rel'];
		$v_address = $_POST['v_address'];
		$witness = $_POST['witness'];
		$ex_complaints = $_POST['ex_complaints'];
		$id_type = $_POST['id_type'];
		$dept = $_POST['dept'];
		$app_date = $_POST['app_date'];
		$app_by = $_POST['app_by'];
		$countfiles = count($_FILES['files']['name']);
			
		$query = "INSERT INTO admin_complaints (blotterID, complainant, c_age, c_gender, c_address, incident_add, violators, v_age, v_gender, v_rel, v_address, witness, ex_complaints, id_type, dept, app_date, app_by, id_name, id_image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		
		$stmt = $db->prepare($query);
	
		for($i = 0; $i < $countfiles; $i++) {
	
			// File name
			$filename = $_FILES['files']['name'][$i];
			// Location
			$target_file = 'img/fileupload_admincomp/'.$filename;
			// File Path
			$file_extension = pathinfo(
				$target_file, PATHINFO_EXTENSION);
		
			$file_extension = strtolower($file_extension);
		
			//Image extension
			$valid_extension = array("png","jpeg","jpg");
		
			if(in_array($file_extension, $valid_extension)) {
	
				// Upload file
				if(move_uploaded_file(
					$_FILES['files']['tmp_name'][$i],
					$target_file)
				) {
					// Execute query
					$stmt->execute(
						array($blotterID, $complainant, $c_age, $c_gender, $c_address, $incident_add, $violators, $v_age, $v_gender, $v_rel, $v_address, $witness, $ex_complaints, $id_type, $dept, $app_date, $app_by, $filename, $target_file));
				}
			}
		}
		echo "<script>
					alert('Submitted Successfully!');
					window.location.href='compAdmin_dashboard.php';
				</script>";
	}
?>
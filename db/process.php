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

 
	if(isset($_POST['editbtn'])){
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
 
?>
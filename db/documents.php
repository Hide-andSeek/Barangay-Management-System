<?php

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(password_verify($curr_password, $user['password'])){

			if($password == $user['password']){
				$password = $user['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$sql = "UPDATE accreg_resident SET email = '$email', password = '$password' WHERE resident_id = '".$user['resident_id']."'";
			if($connect->query($sql)){
	
				echo "<script>
						alert('Admin profile updated successfully!')
						window.location.href='index.php';
					</script>";
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}



?>

<?php

//Barangay Clearance
if(isset($_POST[''])){
	
	$full_name = $_POST['full_name'];
	$age = $_POST['age'];
	$status = $_POST['status'];
	$nationality = $_POST['nationality'];
	$address = $_POST['address'];
	$contactno = $_POST['contactno'];
	$emailadd = $_POST['emailadd'];
	$purpose = $_POST['purpose'];
	$date_issued = $_POST['date_issued'];
	$ctc_no = $_POST['ctc_no'];
	$issued_at = $_POST['issued_at'];
	$precint_no = $_POST['precint_no'];
	$countfiles = count($_FILES['files']['name']);
	$clearance_status = $_POST['clearance_status'];
		
	$query = "INSERT INTO barangayclearance (full_name, age, status, nationality, address,contactno, emailadd, purpose, date_issued, ctc_no, issued_at, precint_no, frontid_name, frontid_image, clearance_status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	
	$stmt = $db->prepare($query);

	for($i = 0; $i < $countfiles; $i++) {

		// File name
		$filename = $_FILES['files']['name'][$i];
		// Location
		$target_file = 'img/fileupload_clearance/'.$filename;
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
					array($full_name, $age, $status, $nationality, $address, $contactno, $emailadd, $purpose, $date_issued, $ctc_no, $issued_at, $precint_no, $filename, $target_file, $clearance_status));
			}
		}
	}
	echo "<script>
				alert('Submitted Successfully!');
				window.location.href='residentreqdocu.php';
			</script>";
}

?>

<?php
	//Barangay ID Form
	if(isset($_POST[''])){
	
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname	= $_POST['lname'];
		$address = $_POST['address'];
		$birthday = $_POST['birthday'];
		$placeofbirth = $_POST['placeofbirth'];
		$contact_no = $_POST['contact_no'];
		$emailadd = $_POST['emailadd'];
		$guardianname = $_POST['guardianname'];
		$emrgncycontact = $_POST['emrgncycontact'];
		$reladdress = $_POST['reladdress'];
		$dateissue = $_POST['dateissue'];
		$status = $_POST['status'];
		$countfiles = count($_FILES['files']['name']);

		$query = "INSERT INTO barangayid (fname, mname, lname, address, birthday,placeofbirth, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, id_name, id_image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	
		$stmt = $db->prepare($query);
	
		for($i = 0; $i < $countfiles; $i++) {
	
			// File name
			$filename = $_FILES['files']['name'][$i];
			// Location
			$target_file = 'img/'.$filename;
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
						array($fname,$mname, $lname, $address, $birthday, $placeofbirth, $contact_no, $emailadd,$guardianname, $emrgncycontact, $reladdress, $dateissue, $status, $filename, $target_file));
				}
			}
		}
		echo 	"<script>
					alert('Submitted Successfully!');
					window.location.href='residentreqdocu.php';
				</script>";
	}
	
?>

<?php
//Barangay Permit
if(isset($_POST[''])){
	
	$dateissued = $_POST['dateissued'];
	$selection = $_POST['selection'];
	$ownername	= $_POST['ownername'];
	$businessname = $_POST['businessname'];
	$businessaddress = $_POST['businessaddress'];
	$plateno = $_POST['plateno'];
	$contactno = $_POST['contactno'];
	$emailadd = $_POST['emailadd'];
	$countfiles = count($_FILES['files']['name']);
	
	$query = "INSERT INTO businesspermit (dateissued, selection, ownername, businessname, businessaddress, plateno, contactno, emailadd, frontid_name, frontid_image) VALUES(?,?,?,?,?,?,?,?,?,?)";
   
    $stmt = $db->prepare($query);
   
    for($i = 0; $i < $countfiles; $i++) {
   
        // File name
        $filename = $_FILES['files']['name'][$i];
        // Location
        $target_file = 'img/fileupload_bpermit/'.$filename;
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
                    array($dateissued, $selection, $ownername,  $businessname, $businessaddress, $plateno, $contactno, $emailadd, $filename, $target_file));
            }
        }
    }
    echo "<script>
				alert('Submitted Successfully!');
				window.location.href='residentreqdocu.php';
			 </script>";
}
?>

<?php

//Indigency
if(isset($_POST[''])){
   
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$purpose = $_POST['purpose'];
	$date_issue = $_POST['date_issue'];
	$contactno = $_POST['contactno'];
	$emailadd = $_POST['emailadd'];
	$countfiles = count($_FILES['files']['name']);
    
    $query = "INSERT INTO certificateindigency (fullname,address, purpose, date_issue, contactno , emailadd, name,image) VALUES(?,?,?,?,?,?,?,?)";
   
    $stmt = $db->prepare($query);
   
    for($i = 0; $i < $countfiles; $i++) {
   
        // File name
        $filename = $_FILES['files']['name'][$i];
        // Location
        $target_file = 'img/fileupload_indigency/'.$filename;
        // file extension
        $file_extension = pathinfo(
            $target_file, PATHINFO_EXTENSION);
    
        $file_extension = strtolower($file_extension);
       
        // Valid image extension
        $valid_extension = array("png","jpeg","jpg");
       
        if(in_array($file_extension, $valid_extension)) {
   
            // Upload file
            if(move_uploaded_file(
                $_FILES['files']['tmp_name'][$i],
                $target_file)
            ) {
                // Execute query
                $stmt->execute(
                    array($fullname,$address, $purpose, $date_issue, $contactno, $emailadd, $filename, $target_file));
            }
        }
    }
    echo 	"<script>
				alert('Submitted Successfully!');
				window.location.href='residentreqdocu.php';
			 </script>";
}


//Resident side - Blotter -> Cuyones/Verbo
if(isset($_POST[''])){
	
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
		
		$stmt = $db->prepare("INSERT INTO blotterdb (n_complainant, comp_age, comp_gender, comp_address, inci_address, n_violator, violator_age, violator_gender, relationship, violator_address, witnesses, complaints) VALUES (:n_complainant, :comp_age, :comp_gender, :comp_address, :inci_address, :n_violator, :violator_age, :violator_gender, :relationship, :violator_address, :witnesses, :complaints)");
		$stmt->bindParam(':n_complainant', $n_complainant);
		$stmt->bindParam(':comp_age', $comp_age);
		$stmt->bindParam(':comp_gender', $comp_gender);
		$stmt->bindParam(':comp_address', $comp_address);
		$stmt->bindParam(':inci_address', $n_complainant);
		$stmt->bindParam(':n_violator', $n_violator);
		$stmt->bindParam(':violator_age', $violator_age);
		$stmt->bindParam(':violator_gender', $violator_gender);
		$stmt->bindParam(':relationship', $relationship);
		$stmt->bindParam(':violator_address', $violator_address);
		$stmt->bindParam(':witnesses', $witnesses);
		$stmt->bindParam(':complaints', $complaints);
		
		
	if($stmt->execute()){
		echo "<script>
				alert('Submitted Successfully!');
				window.location.href='residentreqdocu.php';
			 </script>";
	}else{
		echo '<script>alert("An error occured! Please try again!")</script>';
	}	
}


if(isset($_POST[''])){
	
	$n_complainant = $_POST['n_complainant'];
	$comp_age = $_POST['comp_age'];
	$comp_gender = $_POST['comp_gender'];
	$comp_address = $_POST['comp_address'];
	$inci_address = $_POST['inci_address'];
	$contactno = $_POST['contactno'];
	$n_violator = $_POST['n_violator'];
	$violator_age = $_POST['violator_age'];
	$violator_gender = $_POST['violator_gender'];
	$relationship = $_POST['relationship'];
	$violator_address = $_POST['violator_address'];
	$witnesses = $_POST['witnesses'];
	$complaints = $_POST['complaints'];
	$id_type = $_POST['id_type'];
	$status = $_POST['status'];
	$countfiles = count($_FILES['files']['name']);
		
	$query = "INSERT INTO blotterdb (n_complainant, comp_age, comp_gender, comp_address, inci_address, contactno, n_violator, violator_age, violator_gender, relationship, violator_address, witnesses, complaints, id_type, status, id_name, id_image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	
	$stmt = $db->prepare($query);

	for($i = 0; $i < $countfiles; $i++) {

		// File name
		$filename = $_FILES['files']['name'][$i];
		// Location
		$target_file = 'upload/'.$filename;
		// File Path
		$file_extension = pathinfo(
			$target_file, PATHINFO_EXTENSION);
	
		$file_extension = strtolower($file_extension);
	
		//Image extension
		$valid_extension = array("png","jpeg","jpg");
	
		if(in_array($file_extension, $valid_extension)) {

			// Upload file
			if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
				// Execute query
				$stmt->execute(
					array($n_complainant, $comp_age, $comp_gender, $comp_address, $inci_address, $contactno, $n_violator, $violator_age, $violator_gender, $relationship, $violator_address, $witnesses, $complaints, $id_type, $status, $filename, $target_file));
			}
		}
	}
	echo "<script>
				alert('Submitted Successfully!');
				window.location.href='residentreqdocu.php';
			</script>";
}

?>

<?php
if(isset($_POST['brgyidappbtn'])){
	
	$app_brgyid = $_POST['app_brgyid'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$placeofbirth = $_POST['placeofbirth'];
	$contact_no = $_POST['contact_no'];
	$guardianname = $_POST['guardianname'];
	$emrgncycontact = $_POST['emrgncycontact'];
	$reladdress = $_POST['reladdress'];
	$dateissue = $_POST['dateissue'];
	$emailadd = $_POST['emailadd'];
	$approvedby = $_POST['approvedby'];

		$stmt = $db->prepare("INSERT INTO approved_brgyids (app_brgyid, fname, mname, lname, address, birthday, placeofbirth, contact_no, guardianname, emrgncycontact, reladdress, dateissue, emailadd, approvedby) VALUES (:app_brgyid, :fname, :mname, :lname, :address, :birthday, :placeofbirth, :contact_no, :guardianname, :emrgncycontact, :reladdress, :dateissue, :emailadd, :approvedby)");

		$stmt->bindParam(':app_brgyid', $app_brgyid);
		$stmt->bindParam(':fname', $fname);
		$stmt->bindParam(':mname', $mname);
		$stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':birthday', $birthday);
		$stmt->bindParam(':placeofbirth', $placeofbirth);
		$stmt->bindParam(':contact_no', $contact_no);
		$stmt->bindParam(':guardianname', $guardianname);
		$stmt->bindParam(':emrgncycontact', $emrgncycontact);
		$stmt->bindParam(':reladdress', $reladdress);
		$stmt->bindParam(':dateissue', $dateissue);
		$stmt->bindParam(':emailadd', $emailadd);
		$stmt->bindParam(':approvedby', $approvedby);
			
	if($stmt->execute()){
		echo "<script>
				alert('Successfully added!');
				window.location.href='barangayidapproval.php';
			 </script>";
	}else{
		echo '<script>
				alert("An error occured")
			</script>';
	}	
}

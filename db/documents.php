<?php

//Barangay Clearance
if(isset($_POST['clearancebtn'])){
	
	$full_name = $_POST['full_name'];
	$age = $_POST['age'];
	$status = $_POST['status'];
	$nationality = $_POST['nationality'];
	$address = $_POST['address'];
	$purpose = $_POST['purpose'];
	$date_issued = $_POST['date_issued'];
	$ctc_no = $_POST['ctc_no'];
	$issued_at = $_POST['issued_at'];
	$precint_no = $_POST['precint_no'];
		
		$stmt = $db->prepare("INSERT INTO barangayclearance (full_name, age, status, nationality, address, purpose, date_issued, ctc_no, issued_at, precint_no) VALUES (:full_name, :age, :status, :nationality, :address, :purpose, :date_issued, :ctc_no, :issued_at, :precint_no)");

		$stmt->bindParam(':full_name', $full_name);
		$stmt->bindParam(':age', $age);
		$stmt->bindParam(':status', $status);
		$stmt->bindParam(':nationality', $nationality);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':purpose', $purpose);
		$stmt->bindParam(':date_issued', $date_issued);
		$stmt->bindParam(':ctc_no', $ctc_no);
		$stmt->bindParam(':issued_at', $issued_at);
		$stmt->bindParam(':precint_no', $precint_no);
		
	if($stmt->execute()){
		echo "<script>
				alert('Successfully Added!');
				window.location.href='resident-defaultpage.php';
			 </script>";
	}else{
		echo "<script>
				alert('An error occured');
				window.location.href='resident-defaultpage.php';
				</script>";
	}	
}

?>

<?php
//Barangay ID Form
if(isset($_POST['brgyidbtn'])){
	
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname	= $_POST['lname'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$placeofbirth = $_POST['placeofbirth'];
	$guardianname = $_POST['guardianname'];
	$emrgncycontact = $_POST['emrgncycontact'];
	$reladdress = $_POST['reladdress'];
    $dateissue = $_POST['dateissue'];
		
		$stmt = $db->prepare("INSERT INTO barangayid (fname, mname, lname, address, birthday, placeofbirth, guardianname, emrgncycontact, reladdress, dateissue) VALUES (:fname, :mname, :lname, :address, :birthday, :placeofbirth, :guardianname, :emrgncycontact, :reladdress, :dateissue)");
		$stmt->bindParam(':fname', $fname);
		$stmt->bindParam(':mname', $mname);
		$stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':placeofbirth', $placeofbirth);
        $stmt->bindParam(':guardianname', $guardianname);
        $stmt->bindParam(':emrgncycontact', $emrgncycontact);
        $stmt->bindParam(':reladdress', $reladdress);
        $stmt->bindParam(':dateissue', $dateissue);

	if($stmt->execute()){
		echo "<script>
				alert('Added Successfully!');
				window.location.href='resident-defaultpage.php';
			 </script";
	}else{
		echo '<script>alert("An error occured! Please try again!")</script>';
	}	
}


//Barangay Permit
if(isset($_POST['permitBtn'])){
	
	$mess = "";
	
	$dateissued = $_POST['dateissued'];
	$selection = $_POST['selection'];
	$ownername	= $_POST['ownername'];
	$businessname = $_POST['businessname'];
	$businessaddress = $_POST['businessaddress'];
	$contactno = $_POST['contactno'];
	
	try{
		$permitsql = "INSERT INTO businesspermit (dateissued, selection, ownername, businessname, businessaddress, contactno) VALUES (?, ?, ?, ?, ?, ?)";
		$permitresult = $db->prepare($permitsql);
		$permitresult->execute(array($dateissued, $selection, $ownername, $businessname, $businessaddress, $contactno));
		
	}catch(PDOException $a){
		if($a->getCode() == 0) {
		}else{
			$mess = $a->getMessage();
		}
	} finally {
		echo $mess;
	}
}

//Indigency

if(isset($_POST['indigencybtn'])){
	
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$purpose = $_POST['purpose'];
	$date_issue = $_POST['date_issue'];
		
		$stmt = $db->prepare("INSERT INTO certificateindigency (fullname, address, purpose, date_issue) VALUES (:fullname, :address, :purpose, :date_issue)");
		$stmt->bindParam(':fullname', $fullname);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':purpose', $purpose);
		$stmt->bindParam(':date_issue', $date_issue);
		
	if($stmt->execute()){
		echo "<script>
				alert('Added Successfully!');
				window.location.href='resident-defaultpage.php';
			 </script>";
	}else{
		echo '<script>alert("An error occured! Please try again!")</script>';
	}	
}

?>

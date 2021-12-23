
																															<!--Resident Login Form-->
<?php 
	if(isset($_POST['logbtn'])){

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$email = !empty($_POST['email']) ? trim($_POST['email']) :null;
			$passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) :null;
			
			//Retrieve : Name Parameter
			$logsql = "SELECT resident_id, email, password FROM accreg_resident WHERE email = :email";
			$stmt = $db->prepare($logsql);
			
			$stmt->bindValue(':email', $email);
			
			$stmt->execute();
			
			$email = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if($email === false){
				echo "<script>
						alert('Invalid Email or Password');
					</script>";
			}else{
				$validPassword = password_verify($passwordAttempt, $email['password']);
				
				if($validPassword){
					$_SESSION['email'] = $email;
					echo '<script>
							window.location.href="resident-defaultpage.php";
						</script>';
						exit;
				}else{
					echo '<script>
							alert("Invalid mail or Password")
							window.location.href="index.php";
						</script>';
				}
			}
	}


//Resident Create Account Form
if(isset($_POST['regbtn'])){
	
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$password = password_hash($password, PASSWORD_BCRYPT);

	$sql_create_acc = "SELECT COUNT(email) AS num FROM accreg_resident WHERE email = :email";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':email', $email);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
		echo "<script>
				alert('Email already exist. Please choose unique email address!');
				window.location.href='index.php';
			</script>";
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO accreg_resident (uname, email, password) VALUES (:uname, :email, :password)");
		$stmt->bindParam(':uname', $uname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		
	if($stmt->execute()){
		echo "<script>
				alert('You are registered');
				window.location.href='index.php';
			 </script>";
	}else{
		echo '<script>alert("An error occured")</script>';
		}	
	}
}


?>

<?php
//Barangay ID Form
if(isset($_POST['brgyidbtn'])){
	$mess1 = "";
	
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname	= $_POST['lname'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$placeofbirth = $_POST['placeofbirth'];
	$guardianname = $_POST['guardianname'];
	$emrgncycontact = $_POST['emrgncycontact'];
	$reladdress = $_POST['reladdress'];
	
	try{
		//Positional Parameter 
		$sql = "INSERT INTO barangayid (fname, mname, lname, address, birthday, placeofbirth, guardianname, emrgncycontact, reladdress) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$result = $db->prepare($sql);
		$result->execute(array($fname, $mname, $lname, $address, $birthday, $placeofbirth, $guardianname, $emrgncycontact, $reladdress));
	} catch (PDOException $e){
		if($e->getCode() == 23000) {
		}else{
			$mess1 = $e->getMessage();
		}
	} finally {
		echo $mess1;
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

?>


<?php


//Indigency
if(isset($_POST['indigencybtn'])){
	
	$mess = "";
	
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$purpose = $_POST['purpose'];
	$date_issue = $_POST['date_issue'];
	
	try{
		$indigencysql = "INSERT INTO certificateindigency (fullname, address, purpose, date_issue) VALUES (?, ?, ?, ?)";
		$indigencyresult = $db->prepare($indigencysql);
		$indigencyresult->execute(array($fullname, $address, $purpose, $date_issue));
		
	}catch(PDOException $c){
		if($c->getCode() == 0) {
		}else{
			$mess = $c->getMessage();
		}
	} finally {
		echo $mess;
	}
}

?>




<?php
//Barangay Officia; Create Account Form
if(isset($_POST['officialcreatebtn'])){
	
	$official_name = $_POST['official_name'];
	$official_password = $_POST['official_password'];
	
	$official_password = password_hash($official_password, PASSWORD_BCRYPT);

	$sql_create_acc = "SELECT COUNT(official_name) AS num FROM brgy_captain WHERE official_name = :official_name";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':official_name', $official_name);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
		echo "<script>
				alert('The Username you input is already exist. Please choose unique username!');
				window.location.href='brgyofficialsmanagement.php';
			</script>";
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO brgy_captain (official_name, official_password) VALUES (:official_name, :official_password)");
		$stmt->bindParam(':official_name', $official_name);
		$stmt->bindParam(':official_password', $official_password);
		
	if($stmt->execute()){
		echo "<script>
				alert('Successfully Added!');
				window.location.href='brgyofficialsmanagement.php';
			 </script>";
	}else{
		echo '<script>alert("An error occured")</script>';
		}	
	}
}

																																//Barangay official Login
	
	if(isset($_POST['officiallogbtn'])){

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$official_name = !empty($_POST['official_name']) ? trim($_POST['official_name']) :null;
			$passwordoffi_Attempt = !empty($_POST['official_password']) ? trim($_POST['official_password']) :null;
			
			//Retrieve
			$kapitan_logsql = "SELECT official_name, official_password FROM brgy_captain WHERE official_name = :official_name";
			$stmt = $db->prepare($kapitan_logsql);
			
			$stmt->bindValue(':official_name', $official_name);
			
			$stmt->execute();
			
			$official_name = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if($official_name === false){
				echo "<script>
						alert('Invalid Brgy Official Name or Password. Please try again!');
					</script>";
			}else{
				$validPassword = password_verify($passwordoffi_Attempt, $official_name['official_password']);
				
				if($validPassword){
					$_SESSION['official_name'] = $official_name;
					echo '<script>
							window.location.href="employeemanagement.php";
						</script>';
						exit;
				}else{
					echo '<script>
							alert("Invalid Brgy Official Name or Password.")
							window.location.href="employee-login.php";
						</script>';
				}
			}
	}

		
?>

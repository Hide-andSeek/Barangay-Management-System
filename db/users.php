
<?php 

//Resident Create Account Form
if(isset($_POST['regbtn'])){
	
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$policy = $_POST['policy'];
	
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
		
		$stmt = $db->prepare("INSERT INTO accreg_resident (uname, email, password, policy) VALUES (:uname, :email, :password, :policy)");
		$stmt->bindParam(':uname', $uname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':policy', $policy);
		
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
							alert("Invalid Official Name or Password.")
							window.location.href="employee-login.php";
						</script>';
				}
			}
		
	}
	 
?>

<?php

//Resident Create Account Form
if(isset($_POST['regbtn'])){
	
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$policy = $_POST['policy'];
	
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
		
		$stmt = $db->prepare("INSERT INTO accreg_resident (uname, email, password, policy) VALUES (:uname, :email, :password, :policy)");
		$stmt->bindParam(':uname', $uname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':policy', $policy);
		
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
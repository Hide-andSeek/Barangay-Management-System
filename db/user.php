<?php
// Welcome to Create Account and Login Query

/* 
----------------------------------------------------------------
			TABLE OF CONTENTS: PREPARED STATEMENT
----------------------------------------------------------------
Login
1.0 Resident Login
1.1 Request Document
1.2 BCPC Login
1.3 Official Login
1.4 Lupon Login
1.5 VAWC Login
1.6 Complaints Login
1.7 Accounting Login
1.8 BPSO Login

Create Account
2.0 Official Create Account
2.1 User Create Account
2.2 Contact Us Account
2.3  Resident: Blotter
----------------------------------------------------------------
*/

//1.0 Resident Login Prepared Statement

if(isset($_POST['logbtn']))
{

	if(empty($_POST["email"]) || empty($_POST["password"]))
	{
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='index.php';
			</script>";
	}else{
		$residentequery = "SELECT * FROM accreg_resident WHERE email = :email";
		$stmt = $db->prepare($residentequery);
		$stmt->execute(array('email' => $_POST["email"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
					if(password_verify($_POST["password"], $row["password"]))
					{
						$_SESSION["email"] = $row["email"];
						header("location: resident-defaultpage.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
								window.location.href='index.php';
							</script>";
					}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Email. Please try again!!')
					window.location.href='index.php';
				</script>";
		}
	}

}

//1.1 Request Document Login Prepared Statement

if(isset($_POST['documentlogbtn']))
{

	if(empty($_POST["username"]) || empty($_POST["username"]))
	{
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='0index.php';
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM usersdb WHERE username = :username";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('username' => $_POST["username"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["user_no"], $row["user_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						$_SESSION["user"] = $row["username"];
						header("location: includes/dashboard.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
								window.location.href='0index.php';
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the official/admin!')
							window.location.href='0index.php';
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!')
					window.location.href='0index.php'; 
				</script>";
		}
	}

}

//1.2 BCPC Login Prepared Statement
if(isset($_POST['bcpcbtn']))
{
	if(empty($_POST["username"]) || empty($_POST["user_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='0index.php';
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM usersdb WHERE username = :username";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('username' => $_POST["username"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["user_no"], $row["user_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						$_SESSION["user"] = $row["username"];
						header("location: bcpcdashboard.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
								window.location.href='0index.php';
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the official/admin!')
							window.location.href='0index.php';
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!')
					window.location.href='0index.php'; 
				</script>";
		}
	}
}

//1.3 Official Login Prepared Statement
if(isset($_POST['officiallog']))
{
	if(empty($_POST["username"]) || empty($_POST["user_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='officials.php';
			</script>";
	}
	else
	{
		$officialquery = "SELECT * FROM usersdb WHERE username = :username";
		$stmt = $db->prepare($officialquery);
		$stmt->execute(array('username' => $_POST["username"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["user_no"], $row["user_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						$_SESSION["user"] = $row["username"];
						header("location: captaindashboard.php");
						exit;
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
								window.location.href='officials.php';
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled!')
							window.location.href='officials.php';
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!') 
					window.location.href='officials.php';
				</script>";
		}
	}
}

//1.4 Lupon Login Prepared Statement
if(isset($_POST['luponbtn']))
{
	if(empty($_POST["username"]) || empty($_POST["username"]))
	{
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='0index.php';
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM usersdb WHERE username = :username";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('username' => $_POST["username"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["user_no"], $row["user_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						$_SESSION["user"] = $row["username"];
						header("location: lupon.php");
						exit;
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
								window.location.href='0index.php';
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the official/admin!')
							window.location.href='0index.php';
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!')
					window.location.href='0index.php'; 
				</script>";
		}
	}
}


//1.5 VAWC Login Prepared Statement
if(isset($_POST['vawcbtn']))
{

	if(empty($_POST["username"]) || empty($_POST["user_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='0index.php';
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM usersdb WHERE username = :username";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('username' => $_POST["username"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["user_no"], $row["user_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						$_SESSION["user"] = $row["username"];
						header("location: includes/vawcdashboard.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
								window.location.href='0index.php';
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the official/admin!')
							window.location.href='0index.php';
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!')
					window.location.href='0index.php'; 
				</script>";
		}
	}

}

//1.6 Complaints Login Prepared Statement

if(isset($_POST['complaintsbtn']))
{

	if(empty($_POST["username"]) || empty($_POST["username"]))
	{
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='0index.php';
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM usersdb WHERE username = :username";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('username' => $_POST["username"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["user_no"], $row["user_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						$_SESSION["user"] = $row["username"];
						header("location: includes/compAdmin_dashboard.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
								window.location.href='0index.php';
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the official/admin!')
							window.location.href='0index.php';
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!')
					window.location.href='0index.php'; 
				</script>";
		}
	}
}


//1.7 Accounting Login Prepared Statement

if(isset($_POST['accountingbtn']))
{

	if(empty($_POST["username"]) || empty($_POST["user_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='0index.php';
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM usersdb WHERE username = :username";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('username' => $_POST["username"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["user_no"], $row["user_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						$_SESSION["user"] = $row["username"];
						header("location: includes/compAdmin_dashboard.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
								window.location.href='0index.php';
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the official/admin!')
							window.location.href='0index.php';
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!')
					window.location.href='0index.php';
				</script>";
		}
	}
}

//1.8 BPSO Login Prepared Statement

if(isset($_POST['bpsobtn']))
{

	if(empty($_POST["username"]) || empty($_POST["user_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='0index.php';
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM usersdb WHERE username = :username";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('username' => $_POST["username"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["user_no"], $row["user_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						$_SESSION["user"] = $row["username"];
						header("location: bpso.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
								window.location.href='0index.php';
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the official/admin!')
							window.location.href='0index.php';
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!')
					window.location.href='0index.php';
				</script>";
		}
	}
}


//2.1 User Create Account Prepared Statement
if(isset($_POST['userbtn'])){
	
	$username = $_POST['username'];
	$user_no = $_POST['user_no'];
	$emailadd = $_POST['emailadd'];
	$user_lname = $_POST['user_lname'];
	$user_fname = $_POST['user_fname'];
	$user_mname = $_POST['user_mname'];
	$birthday = $_POST['birthday'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$user_type = $_POST['user_type'];
	$department = $_POST['department'];
	$status = $_POST['status'];
	$added_on = $_POST['added_on'];
	
	$user_no = password_hash($user_no, PASSWORD_BCRYPT);

	$sql_create_acc = "SELECT COUNT(username) AS num FROM usersdb WHERE username = :username";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':username', $username);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
		echo "<script>
				alert('Username already exist. Please choose unique username!');
				window.location.href='usermanagement.php';
			</script>";
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO usersdb (username, user_no, emailadd,  user_lname, user_fname, user_mname, birthday, address, contact, user_type, department, status, added_on) VALUES (:username, :user_no, :emailadd, :user_lname, :user_fname, :user_mname, :birthday, :address, :contact, :user_type, :department, :status, :added_on)");

		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':user_no', $user_no);
		$stmt->bindParam(':emailadd', $emailadd);
		$stmt->bindParam(':user_lname', $user_lname);
		$stmt->bindParam(':user_fname', $user_fname);
		$stmt->bindParam(':user_mname', $user_mname);
		$stmt->bindParam(':birthday', $birthday);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':contact', $contact);
		$stmt->bindParam(':user_type', $user_type);
		$stmt->bindParam(':department', $department);
		$stmt->bindParam(':status', $status);
		$stmt->bindParam(':added_on', $added_on);
		
	if($stmt->execute()){
		echo "<script>
				alert('Successfully Added!');
				window.location.href='usermanagement.php';
			 </script>";
	}else{
		echo '<script>
				alert("An error occured");
				window.location.href="usermanagement.php";
			  </script>';
		}	
	}
}

// 2.2 Contact Us Account Prepared Statement

if(isset($_POST['contactusbtn'])){
	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
		
		$stmt = $db->prepare("INSERT INTO contactustbl (username, email, subject, message) VALUES (:username, :email, :subject, :message)");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':subject', $subject);
		$stmt->bindParam(':message', $message);
		
	if($stmt->execute()){
		echo "<script>
				alert('Submitted Successfully!');
				window.location.href='residentcontactus.php';
			 </script>";
	}else{
		echo '<script>
				alert("An error occured! Please try again!");
				window.location.href="residentcontactus.php";
			 </script>';
	}	
}

// 2.3 Resident: Blotter Prepared Statement

if(isset($_POST['blotterbtn'])){
	
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
		echo '<script>
				alert("An error occured! Please try again!");
				window.location.href="usermanagement.php";
			</script>';
	}	
}
?>




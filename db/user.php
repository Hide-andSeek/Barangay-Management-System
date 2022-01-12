<?php
//Resident Login
if(isset($_POST['logbtn'])){
	
	$email = '';

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
        echo '<script>
                alert("Invalid Email or Password");
                window.location.href="index.php";
            </script>';
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

//Employee - For Create Account Form
if(isset($_POST[''])){
	
	$employee_uname = $_POST['employee_uname'];
	$employee_lname = $_POST['employee_lname'];
	$employee_fname = $_POST['employee_fname'];
	$employee_mname = $_POST['employee_mname'];
	$birthday = $_POST['birthday'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$user_type = $_POST['user_type'];
	$department = $_POST['department'];
	$status = $_POST['status'];
	$added_on = $_POST['added_on'];
		
		$stmt = $db->prepare("INSERT INTO employeedb (employee_uname, employee_lname, employee_fname, employee_mname, birthday, address, contact, user_type, department, status, added_on) VALUES (:employee_uname, :employee_lname, :employee_fname, :employee_mname, :birthday, :address, :contact, :user_type, :department, :status, :added_on)");

		$stmt->bindParam(':employee_uname', $employee_uname);
		$stmt->bindParam(':employee_lname', $employee_lname);
		$stmt->bindParam(':employee_fname', $employee_fname);
		$stmt->bindParam(':employee_mname', $employee_mname);
		$stmt->bindParam(':birthday', $birthday);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':contact', $contact);
		$stmt->bindParam(':user_type', $user_type);
		$stmt->bindParam(':department', $department);
		$stmt->bindParam(':status', $status);
		$stmt->bindParam(':added_on', $added_on);
		
	if($stmt->execute()){
		echo "<script>
				alert('Successfully added!');
				window.location.href='employeemanagement.php';
			 </script>";
	}else{
		echo '<script>
				alert("An error occured")
			</script>';
	}	
}

//Employee Create Account Form : New
if(isset($_POST['empBtn'])){
	
	$employee_uname = $_POST['employee_uname'];
	$employee_no = $_POST['employee_no'];
	$employee_lname = $_POST['employee_lname'];
	$employee_fname = $_POST['employee_fname'];
	$employee_mname = $_POST['employee_mname'];
	$birthday = $_POST['birthday'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$user_type = $_POST['user_type'];
	$department = $_POST['department'];
	$status = $_POST['status'];
	$added_on = $_POST['added_on'];
	
	$employee_no = password_hash($employee_no, PASSWORD_BCRYPT);

	$sql_create_acc = "SELECT COUNT(employee_uname) AS num FROM employeedb WHERE employee_uname = :employee_uname";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':employee_uname', $employee_uname);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
		echo "<script>
				alert('Username already exist. Please choose unique username!');
				window.location.href='employeemanagement.php';
			</script>";
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO employeedb (employee_uname, employee_no, employee_lname, employee_fname, employee_mname, birthday, address, contact, user_type, department, status, added_on) VALUES (:employee_uname, :employee_no, :employee_lname, :employee_fname, :employee_mname, :birthday, :address, :contact, :user_type, :department, :status, :added_on)");
		$stmt->bindParam(':employee_uname', $employee_uname);
		$stmt->bindParam(':employee_no', $employee_no);
		$stmt->bindParam(':employee_lname', $employee_lname);
		$stmt->bindParam(':employee_fname', $employee_fname);
		$stmt->bindParam(':employee_mname', $employee_mname);
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
				window.location.href='employeemanagement.php';
			 </script>";
	}else{
		echo '<script>alert("An error occured")</script>';
		}	
	}
}

//Request Document Login
if(isset($_POST['documentlogbtn']))
{

	if(empty($_POST["employee_uname"]) || empty($_POST["employee_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM employeedb WHERE employee_uname = :employee_uname";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('employee_uname' => $_POST["employee_uname"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["employee_no"], $row["employee_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						header("location: includes/dashboard.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the admin!')
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!') 
				</script>";
		}
	}

}

//Employee - Document Request Login 
if(isset($_POST[''])){
	if($_POST["employee_no"]=="" or $_POST["department"]==""){
		
	}else{
	$employee_no=trim($_POST['employee_no']);
	$department=strip_tags(trim($_POST['department']));
	$query=$db->prepare("SELECT * FROM employeedb WHERE employee_no=? AND department=?");
	$query->execute(array($employee_no,$department));
	$control=$query->fetch(PDO::FETCH_OBJ);
	if($control>0){
		$_SESSION["employee_no"]=$employee_no;
		header("location: includes/dashboard.php");
	}
	echo"<script>alert('Wrong Employee No! Please try again')</script>";
	}
} 
?>




<?php
//Employee - BCPC Login
// if(isset($_POST['bcpcbtn'])){
// 	if($_POST["employee_no"]=="" or $_POST["department"]==""){
		
// 	}else{
// 	$employee_no=trim($_POST['employee_no']);
// 	$department=strip_tags(trim($_POST['department']));
// 	$query=$db->prepare("SELECT * FROM employeedb WHERE employee_no=? AND department=?");
// 	$query->execute(array($employee_no,$department));
// 	$control=$query->fetch(PDO::FETCH_OBJ);
// 	if($control>0){
// 		$_SESSION["employee_no"]=$employee_no;
// 		header("location: bcpcdashboard.php");
// 	}
// 	echo"<script>alert('Wrong Employee No! Please try again')</script>";
// 	}
// } 

if(isset($_POST['bcpcbtn']))
{
	if(empty($_POST["employee_uname"]) || empty($_POST["employee_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM employeedb WHERE employee_uname = :employee_uname";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('employee_uname' => $_POST["employee_uname"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["employee_no"], $row["employee_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						header("location: bcpcdashboard.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the admin!')
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!') 
				</script>";
		}
	}
}

//Employee - Lupon Login
// if(isset($_POST['luponbtn'])){
// 	if($_POST["employee_no"]=="" or $_POST["department"]==""){
		
// 	}else{
// 	$employee_no=trim($_POST['employee_no']);
// 	$department=strip_tags(trim($_POST['department']));
// 	$query=$db->prepare("SELECT * FROM employeedb WHERE employee_no=? AND department=?");
// 	$query->execute(array($employee_no,$department));
// 	$control=$query->fetch(PDO::FETCH_OBJ);
// 	if($control>0){
// 		$_SESSION["employee_no"]=$employee_no;
// 		header("location: lupon.php");
// 	}
// 	echo"<script>alert('Wrong Employee No! Please try again')</script>";
// 	}
// } 

if(isset($_POST['luponbtn']))
{
	if(empty($_POST["employee_uname"]) || empty($_POST["employee_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM employeedb WHERE employee_uname = :employee_uname";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('employee_uname' => $_POST["employee_uname"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["employee_no"], $row["employee_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						header("location: lupon.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the admin!')
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!') 
				</script>";
		}
	}
}

//Employee - Document Request Login 
if(isset($_POST[''])){
	if($_POST["employee_no"]=="" or $_POST["department"]==""){
		
	}else{
	$employee_no=trim($_POST['employee_no']);
	$department=strip_tags(trim($_POST['department']));
	$query=$db->prepare("SELECT * FROM employeedb WHERE employee_no=? AND department=?");
	$query->execute(array($employee_no,$department));
	$control=$query->fetch(PDO::FETCH_OBJ);
	if($control>0){
		$_SESSION["employee_no"]=$employee_no;
		header("location: includes/dashboard.php");
	}
	echo"<script>alert('Wrong Employee No! Please try again')</script>";
	}
} 


//Employee - VAWC Login
// if(isset($_POST['vawcbtn'])){
// 	if($_POST["employee_no"]=="" or $_POST["department"]==""){
		
// 	}else{
// 	$employee_no=trim($_POST['employee_no']);
// 	$department=strip_tags(trim($_POST['department']));
// 	$query=$db->prepare("SELECT * FROM employeedb WHERE employee_no=? AND department=?");
// 	$query->execute(array($employee_no,$department));
// 	$control=$query->fetch(PDO::FETCH_OBJ);
// 	if($control>0){
// 		$_SESSION["employee_no"]=$employee_no;
// 		header("location: includes/vawcdashboard.php");
// 	}
// 	echo"<script>alert('Wrong Employee No! Please try again')</script>";
// 	}
// } 

if(isset($_POST['vawcbtn']))
{

	if(empty($_POST["employee_uname"]) || empty($_POST["employee_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM employeedb WHERE employee_uname = :employee_uname";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('employee_uname' => $_POST["employee_uname"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["employee_no"], $row["employee_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						header("location: includes/vawcdashboard.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the admin!')
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!') 
				</script>";
		}
	}

}

// Complaints Login 
if(isset($_POST['complaintsbtn']))
{

	if(empty($_POST["employee_uname"]) || empty($_POST["employee_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM employeedb WHERE employee_uname = :employee_uname";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('employee_uname' => $_POST["employee_uname"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["employee_no"], $row["employee_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						header("location: includes/compAdmin_dashboard.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the admin!')
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!') 
				</script>";
		}
	}
}

// Accounting Login - Employee

if(isset($_POST['accountingbtn']))
{

	if(empty($_POST["employee_uname"]) || empty($_POST["employee_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
			</script>";
	}
	else
	{
		$employeequery = "SELECT * FROM employeedb WHERE employee_uname = :employee_uname";
		$stmt = $db->prepare($employeequery);
		$stmt->execute(array('employee_uname' => $_POST["employee_uname"]));
		$count = $stmt->rowCount();
		if($count > 0)
		{
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				if($row["status"] == 'active')
				{
					if(password_verify($_POST["employee_no"], $row["employee_no"]))
					{
						$_SESSION["type"] = $row["user_type"];
						header("location: includes/compAdmin_dashboard.php");
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the admin!')
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!') 
				</script>";
		}
	}
}

//Contact Us

//Resident side - Blotter -> Cuyones/Verbo
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
		echo '<script>alert("An error occured! Please try again!")</script>';
	}	
}


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
		echo '<script>alert("An error occured! Please try again!")</script>';
	}	
}
?>




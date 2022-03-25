


<?php

if (isset($_SESSION['user'])!="")
{
	header("Location:reg_employee_log.php");
	//exit();
}
if(isset($_POST['regularemployee']))
{

	if(empty($_POST["username"]) || empty($_POST["user_no"]))
	{
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='reg_employee_log.php';
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
						
						if($row["department"] == 'BCPC')
							{
								$_SESSION["type"] = $row["user_type"];
								$_SESSION["user"] = $row["username"];
								$_SESSION["uid"] = $row["user_id"];
								header("location: time_log.php");
							}

							else
							{
							echo "<script>
										alert('Access Denied, You dont have a permission to access this department!')
										window.location.href='reg_employee_log.php';
									</script>";
							}
					}
					else
					{
					   echo "<script>
					   			alert('Wrong Password!')
								window.location.href='reg_employee_log.php';
							</script>";
					}
				}
				else
				{
					echo "<script>
							alert('Your account has been disabled, please contact the official/admin!')
							window.location.href='reg_employee_log.php';
						</script>";
				}
			}
		}
		else
		{
			echo "<script>
					alert('Wrong Username. Please try again!!')
					window.location.href='reg_employee_log.php';
				</script>";
		}
	}
}

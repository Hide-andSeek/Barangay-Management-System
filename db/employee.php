<?php

//1.1 Request Document Login Prepared Statement
if (isset($_SESSION['user'])!="")
{
	header("Location:0index.php");
}
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
							if($row["department"] == 'REQUESTDOCUMENT')
							{
								$_SESSION["type"] = $row["user_type"];
								$_SESSION["user"] = $row["username"];
								header("location: includes/dashboard.php");
							}

							else
							{
							echo "<script>
										alert('Access Denied, You dont have a permission to access this department!')
										window.location.href='0index.php';
									</script>";
							}
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
						if($row["department"] == 'BCPC')
							{
								$_SESSION["type"] = $row["user_type"];
								$_SESSION["user"] = $row["username"];
								header("location: bcpcdashboard.php");
							}

							else
							{
							echo "<script>
										alert('Access Denied, You dont have a permission to access this department!')
										window.location.href='0index.php';
									</script>";
							}
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
						if($row["department"] == 'LUPON')
							{
								$_SESSION["type"] = $row["user_type"];
								$_SESSION["user"] = $row["username"];
								header("location: lupon.php");
							}

							else
							{
							echo "<script>
										alert('Access Denied, You dont have a permission to access this department!')
										window.location.href='0index.php';
									</script>";
							}
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
						if($row["department"] == 'VAWC')
							{
								$_SESSION["type"] = $row["user_type"];
								$_SESSION["user"] = $row["username"];
								header("location: includes/vawcdashboard.php");
							}

							else
							{
							echo "<script>
										alert('Access Denied, You dont have a permission to access this department!')
										window.location.href='0index.php';
									</script>";
							}
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
						if($row["department"] == 'COMPLAINT')
							{
								$_SESSION["type"] = $row["user_type"];
								$_SESSION["user"] = $row["username"];
								header("location: includes/compAdmin_dashboard.php");
							}

							else
							{
							echo "<script>
										alert('Access Denied, You dont have a permission to access this department!')
										window.location.href='0index.php';
									</script>";
							}
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
						
						if($row["department"] == 'ACCOUNTING')
							{
								$_SESSION["type"] = $row["user_type"];
								$_SESSION["user"] = $row["username"];
								$_SESSION["emails"] = $row["emailadd"];
								header("location: includes/accounting_dashboard.php");
							}

							else
							{
							echo "<script>
										alert('Access Denied, You dont have a permission to access this department!')
										window.location.href='0index.php';
									</script>";
							}
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
						if($row["department"] == 'BPSO')
							{
								$_SESSION["type"] = $row["user_type"];
								$_SESSION["user"] = $row["username"];
								$_SESSION["emails"] = $row["emailadd"];
								header("location: bpso.php");
							}

							else
							{
							echo "<script>
										alert('Access Denied, You dont have a permission to access this department!')
										window.location.href='0index.php';
									</script>";
							}
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

?>
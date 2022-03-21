<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
error_reporting(~E_NOTICE);

// 1.1 GCash Barangay ID Payment

if($_SERVER['REQUEST_METHOD']=='POST')
  {
if(isset($_POST['timeinbtn'])){
	
    $id = $_POST['user_id'];;

    $username = $_POST['username'];
	$user_id = $_POST['user_id'];
	$time_loged = date("Y-m-d H:i:s",strtotime("now"));
	$date_logged = date("Y-m-d", strtotime("now"));

	$sql_create_acc = "SELECT COUNT(date_logged) AS num FROM users_activity WHERE date_logged = :date_logged AND user_id = $id";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':date_logged', $date_logged);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Time is already set! Come Back Tommorrow";
        $_SESSION['status_code'] ="warning";
    
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO users_activity (username, user_id, time_loged, date_logged) VALUES (:username, :user_id, :time_loged, :date_logged)");

        $stmt->bindParam(':username', $username);
		$stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':time_loged', $time_loged);
		$stmt->bindParam(':date_logged', $date_logged);

	if($stmt->execute()){
		$_SESSION['status'] ="Time In Recorded";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}
  }
?>


<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
if(isset($_POST['timeoutbtn'])){
  
  $id = $_POST['user_id'];;

  $username = $_POST['username'];
  $user_id = $_POST['user_id'];
  $time_out = date("Y-m-d H:i:s",strtotime("now"));
  $date_logged_off = date("Y-m-d", strtotime("now"));

  $sql_create_acc = "SELECT COUNT(date_logged_off) AS num FROM user_activityout WHERE date_logged_off = :date_logged_off AND user_id = $id";
  $stmt = $db->prepare($sql_create_acc);
  $stmt->bindValue(':date_logged_off', $date_logged_off);
  $stmt->execute();
  
  $count_row = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if($count_row['num']>0){
      $_SESSION['status'] ="Time is already set! Come Back Tommorrow";
      $_SESSION['status_code'] ="warning";
  
  
  }else{
      
      $stmt = $db->prepare("INSERT INTO user_activityout (username, user_id, time_out, date_logged_off) VALUES (:username, :user_id, :time_out, :date_logged_off)");

      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':user_id', $user_id);
      $stmt->bindParam(':time_out', $time_out);
      $stmt->bindParam(':date_logged_off', $date_logged_off);

  if($stmt->execute()){
      $_SESSION['status'] ="Time In Recorded";
      $_SESSION['status_code'] ="success";
      
  }else{
      $_SESSION['status'] ="Error";
      $_SESSION['status_code'] ="error";
      }	
  }
}
}
?>



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
						
						if($row["department"] == 'NONE')
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

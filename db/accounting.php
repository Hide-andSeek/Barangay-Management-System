<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
error_reporting(~E_NOTICE);
// if(isset($_POST['savebtnworkinghrs'])){
                    

//     $user_id = $_GET['user_id'];
//     $working_hours	= $_POST['working_hours'];

//     $sql = "UPDATE usersdb SET working_hours = '8 Hours' WHERE user_id = $user_id";

//     if (mysqli_query($connect, $sql)) {
//       echo "<script>
//                 alert('Saved Successfully!');
//                 window.location.href='accounting_attendance_list.php';
//             </script>";
//     } else {
//       echo "Error updating record: " . mysqli_error($connect);
//     }
// }


// if(isset($_POST['savebtnworkinghrs'])){

//     try{
//         $user_id = $_GET['user_id'];
//         $working_hours = $_POST['working_hours'];

//         $sql = "UPDATE usersdb SET working_hours = '$working_hours' WHERE user_id = '$user_id'";
//         //if-else statement in executing our query
//         $_SESSION['message'] = ( $db->exec($sql) ) ? 'Member updated successfully' : 'Something went wrong. Cannot update member';

//     }
//     catch(PDOException $e){
//         $_SESSION['message'] = $e->getMessage();
//     }


// }
// else{
//     $_SESSION['message'] = 'Fill up edit form first';
// }

	session_start();
  if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO members (firstname, lastname, address) VALUES (:firstname, :lastname, :address)");
			//if-else statement in executing our prepared statement
			$_SESSION['message'] = ( $stmt->execute(array(':firstname' => $_POST['firstname'] , ':lastname' => $_POST['lastname'] , ':address' => $_POST['address'])) ) ? 'Member added successfully' : 'Something went wrong. Cannot add member';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}


	include_once('connection.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM members WHERE id = '".$_GET['id']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Member deleted successfully' : 'Something went wrong. Cannot delete member';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Select member to delete first';
	}



	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$address = $_POST['address'];

			$sql = "UPDATE members SET firstname = '$firstname', lastname = '$lastname', address = '$address' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Member updated successfully' : 'Something went wrong. Cannot update member';

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



  if($_SERVER['REQUEST_METHOD']=='POST')
  {
  if(isset($_POST['savebtnworkinghrs'])){
	
    $user_id = $_POST['user_id'];
    $employee_name = $_POST['employee_name'];
    $user_type = $_POST['user_type'];
    $department = $_POST['department'];
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];
    $facilitated_by = $_POST['facilitated_by'];
    $date_logged = $_POST['date_logged'];
    $working_hours = $_POST['working_hours'];
    $date_added = date("Y-m-d", strtotime("now"));
    $time_added = date("Y-m-d H:i:s",strtotime("now"));

      $stmt = $db->prepare("INSERT INTO working_hours (user_id, employee_name, user_type, department, time_in, time_out, facilitated_by, date_logged, working_hours, date_added, time_added) VALUES (:user_id, :employee_name, :user_type, :department, :time_in, :time_out, :facilitated_by, :date_logged, :working_hours, :date_added, :time_added)");
  
      $stmt->bindParam(':user_id', $user_id);
      $stmt->bindParam(':employee_name', $employee_name);
      $stmt->bindParam(':user_type', $user_type);
      $stmt->bindParam(':department', $department);
      $stmt->bindParam(':time_in', $time_in);
      $stmt->bindParam(':time_out', $time_out);
      $stmt->bindParam(':facilitated_by', $facilitated_by);
      $stmt->bindParam(':date_logged', $date_logged);
      $stmt->bindParam(':working_hours', $working_hours);
      $stmt->bindParam(':date_added', $date_added);
      $stmt->bindParam(':time_added', $time_added);

    if($stmt->execute()){
      echo "<script>
          alert('Successfully added!');
          window.location.href='accounting_salary.php';
         </script>";
    }else{
      echo '<script>
          alert("An error occured")
        </script>';
    }	
  }
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if(isset($_POST['savetopayroll'])){
  
  $employee_name = $_POST['employee_name'];
  $job_position = $_POST['job_position'];
  $department = $_POST['department'];
  $facilitated_by = $_POST['facilitated_by'];
  $working_hours = $_POST['working_hours'];
  $salary = $_POST['salary'];
  $date_added = date("Y-m-d", strtotime("now"));
  $time_added = date("Y-m-d H:i:s",strtotime("now"));

	$stmt = $db->prepare("INSERT INTO payroll (employee_name, job_position, department, facilitated_by, working_hours, salary, date_added, time_added) VALUES (:employee_name, :job_position, :department, :facilitated_by, :working_hours, :salary, :date_added, :time_added)");

	$stmt->bindParam(':employee_name', $employee_name);
	$stmt->bindParam(':job_position', $job_position);
	$stmt->bindParam(':department', $department);
	$stmt->bindParam(':facilitated_by', $facilitated_by);
	$stmt->bindParam(':working_hours', $working_hours);
	$stmt->bindParam(':salary', $salary);
	$stmt->bindParam(':date_added', $date_added);
	$stmt->bindParam(':time_added', $time_added);

  if($stmt->execute()){
	echo "<script>
		alert('Successfully added!');
		window.location.href='accounting_payroll.php';
	   </script>";
  }else{
	echo '<script>
		alert("An error occured")
	  </script>';
  }	
}
}
?>

<?php

include('db/conn.php');

//Resident Create Account Form
if(isset($_POST['registerbtn'])){
	
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
    $user_name = $_POST['user_name'];
	$user_type = $_POST['user_type'];
    $user_status = $_POST['user_status'];
	
	$user_password = password_hash($user_password, PASSWORD_BCRYPT);

	$sql_create_acc = "SELECT COUNT(user_email) AS num FROM user_details WHERE user_email = :user_email";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':user_email', $user_email);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
		echo "<script>
				alert('Email already exist. Please choose unique email address!');
				window.location.href='index.php';
			</script>";
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO user_details (user_email, user_password, user_name, user_type, user_status) VALUES (:user_email, :user_password, :user_name, :user_type, :user_status)");
		$stmt->bindParam(':user_email', $user_email);
		$stmt->bindParam(':user_password', $user_password);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':user_type', $user_type);
        $stmt->bindParam(':user_status', $user_status);
		
	if($stmt->execute()){
		echo "<script>
				alert('You are registered');
				window.location.href='register.php';
			 </script>";
	}else{
		echo '<script>alert("An error occured")</script>';
		}	
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="user_email" name="user_email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="user_name" name="user_name"  placeholder="Enter Username">
        </div>
		<div class="form-group">
			<label class="employee-label"> User Type </label>
				<select class="form-control" id="user_type" name="user_type">
					<option disabled>--Select--</option>
				    <option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
		</div>
        <div class="form-group">
			<label class="employee-label"> User Status </label>
				<select class="form-control" id="user_status" name="user_status">
					<option disabled>--Select--</option>
				    <option value="active">Active</option>
					<option value="inactive">Inactive</option>
				</select>
		</div>
     <button type="submit" name="registerbtn" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
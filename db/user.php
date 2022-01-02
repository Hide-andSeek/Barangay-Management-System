<?php

//Employee - For Create Account Form
if(isset($_POST['empBtn'])){
	
	$employee_uname = $_POST['employee_uname'];
	$employee_lname = $_POST['employee_lname'];
	$employee_fname = $_POST['employee_fname'];
	$employee_mname = $_POST['employee_mname'];
	$birthday = $_POST['birthday'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$department = $_POST['department'];
		
		$stmt = $db->prepare("INSERT INTO employeedb (employee_uname, employee_lname, employee_fname, employee_mname, birthday, address, contact, department) VALUES (:employee_uname, :employee_lname, :employee_fname, :employee_mname, :birthday, :address, :contact, :department)");
		$stmt->bindParam(':employee_uname', $employee_uname);
		$stmt->bindParam(':employee_lname', $employee_lname);
		$stmt->bindParam(':employee_fname', $employee_fname);
		$stmt->bindParam(':employee_mname', $employee_mname);
		$stmt->bindParam(':birthday', $birthday);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':contact', $contact);
		$stmt->bindParam(':department', $department);
		
	if($stmt->execute()){
		echo "<script>
				alert('You are registered');
				window.location.href='employeemanagement.php';
			 </script>";
	}else{
		echo '<script>
				alert("An error occured")
			</script>';
	}	
}



//Employee - Document Request Login 
if(isset($_POST['documentlogbtn'])){
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
if(isset($_POST['bcpcbtn'])){
	if($_POST["employee_no"]=="" or $_POST["department"]==""){
		
	}else{
	$employee_no=trim($_POST['employee_no']);
	$department=strip_tags(trim($_POST['department']));
	$query=$db->prepare("SELECT * FROM employeedb WHERE employee_no=? AND department=?");
	$query->execute(array($employee_no,$department));
	$control=$query->fetch(PDO::FETCH_OBJ);
	if($control>0){
		$_SESSION["employee_no"]=$employee_no;
		header("location: bcpcdashboard.php");
	}
	echo"<script>alert('Wrong Employee No! Please try again')</script>";
	}
} 

//Employee - Lupon Login
if(isset($_POST['luponbtn'])){
	if($_POST["employee_no"]=="" or $_POST["department"]==""){
		
	}else{
	$employee_no=trim($_POST['employee_no']);
	$department=strip_tags(trim($_POST['department']));
	$query=$db->prepare("SELECT * FROM employeedb WHERE employee_no=? AND department=?");
	$query->execute(array($employee_no,$department));
	$control=$query->fetch(PDO::FETCH_OBJ);
	if($control>0){
		$_SESSION["employee_no"]=$employee_no;
		header("location: lupon.php");
	}
	echo"<script>alert('Wrong Employee No! Please try again')</script>";
	}
} 

//Employee - VAWC Login
if(isset($_POST['vawcbtn'])){
	if($_POST["employee_no"]=="" or $_POST["department"]==""){
		
	}else{
	$employee_no=trim($_POST['employee_no']);
	$department=strip_tags(trim($_POST['department']));
	$query=$db->prepare("SELECT * FROM employeedb WHERE employee_no=? AND department=?");
	$query->execute(array($employee_no,$department));
	$control=$query->fetch(PDO::FETCH_OBJ);
	if($control>0){
		$_SESSION["employee_no"]=$employee_no;
		header("location: includes/vawcdashboard.php");
	}
	echo"<script>alert('Wrong Employee No! Please try again')</script>";
	}
} 
?>




<?php

//Employee Create Account Form
if(isset($_POST['empBtn'])){
	
	$mess1 = '';
	
	$employee_uname = $_POST['employee_uname'];
	$employee_lname = $_POST['employee_lname'];
	$employee_fname = $_POST['employee_fname'];
	$employee_mname = $_POST['employee_mname'];
	$birthday = $_POST['birthday'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$department = $_POST['department'];
	
	try{
		$employeesql = "INSERT INTO employeedb (employee_uname, employee_lname, employee_fname, employee_mname, birthday, address, contact, department) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$reqdocemployeeresult = $db->prepare($employeesql);
		$reqdocemployeeresult->execute(array($employee_uname, $employee_lname, $employee_fname, $employee_mname, $birthday, $address, $contact, $department));
	} catch (PDOException $e){
		if($e->getCode() == 0) {
		}else{
			$mess1 = $e->getMessage();
		} 
	} finally {
		echo $mess1;
	}
}

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
		header("location: dashboard.php");
	}
	echo"<script>alert('Wrong Employee No! Please try again')</script>";
	}
} 	


?>
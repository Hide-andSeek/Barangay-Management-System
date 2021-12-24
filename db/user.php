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
		echo '<script>alert("An error occured")</script>';
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
		header("location: dashboard.php");
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
		header("location: bcpc.php");
	}
	echo"<script>alert('Wrong Employee No! Please try again')</script>";
	}
} 

?>

<?php

//Barangay Clearance
if(isset($_POST['clearancebtn'])){
	
	$full_name = $_POST['full_name'];
	$age = $_POST['age'];
	$status = $_POST['status'];
	$nationality = $_POST['nationality'];
	$address = $_POST['address'];
	$purpose = $_POST['purpose'];
	$date_issued = $_POST['date_issued'];
	$ctc_no = $_POST['ctc_no'];
	$issued_at = $_POST['issued_at'];
	$precint_no = $_POST['precint_no'];
		
		$stmt = $db->prepare("INSERT INTO barangayclearance (full_name, age, status, nationality, address, purpose, date_issued, ctc_no, issued_at, precint_no) VALUES (:full_name, :age, :status, :nationality, :address, :purpose, :date_issued, :ctc_no, :issued_at, :precint_no)");

		$stmt->bindParam(':full_name', $full_name);
		$stmt->bindParam(':age', $age);
		$stmt->bindParam(':status', $status);
		$stmt->bindParam(':nationality', $nationality);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':purpose', $purpose);
		$stmt->bindParam(':date_issued', $date_issued);
		$stmt->bindParam(':ctc_no', $ctc_no);
		$stmt->bindParam(':issued_at', $issued_at);
		$stmt->bindParam(':precint_no', $precint_no);
		
	if($stmt->execute()){
		echo "<script>
				alert('Successfully Added!');
				window.location.href='resident-defaultpage.php';
			 </script>";
	}else{
		echo "<script>
				alert('An error occured');
				window.location.href='resident-defaultpage.php';
				</script>";
	}	
}
?>

<?php

//Live Search
if(isset($_POST['input'])){

$input = $_POST['input'];

$stmt = $db->prepare("SELECT * FROM barangayclearance WHERE name LIKE '($input)%'"); 

$control=$stmt->fetch(PDO::FETCH_OBJ);
	if($control>0){
		
	}else{
		echo "<h5 class='text-danger text-center mt-3'>No data found!</h5>";
	}
}
?>
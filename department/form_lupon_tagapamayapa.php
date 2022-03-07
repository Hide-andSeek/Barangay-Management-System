<?php
require_once "db/conn.php" ;

	if(isset($_POST['submit'])){

		$cname=$_POST['Complainant'];
		$aname=$_POST['Accussed'];
		$address=$_POST['Address'];
		$contact=$_POST['ContactNo'];
		$complaint=$_POST['Complaint'];

		$sql = mysqli_query($conn,"INSERT INTO lupondb(Complainant,Accussed,Address,ContactNo,Complaint,DateandTime)VALUES('$cname','$aname','$address','$contact','$complaint',NOW())");''
		
		if($sql){
			echo"<script>alert('Record Succesfully Added!!!');</script>";
			echo"<script>document.location='lupon_tagapamayapa.php';</script>";
		}else{
			echo"<script> alert('Something Went Wrong !!!');</script>";
		}
	}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn
	.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>--> 
    <link rel="stylesheet" href="css/styles.css">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/captain.css">
	
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Lupon Dashboard </title>
	 
	 
	 <style>
		div.align-box{padding-top: 23px; display: flex; align-item: center;}
		.box-report{
			width: 300px;
			font-size: 14px;
			border: 4px solid #7dc748;
			padding: 30px;
			margin: 10px;
			border-radius: 5px;
			align-items: center;

		}
	 </style>
   </head>
	<body>
	<section class="home-section">
			<!-- Top Section -->
			  <section class="top-section">
				  <div class="top-content">
					<div>
						<h5>OFFICE OF THE LUPONG TAGAPAMAYAPA
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
		

			    
				<div class="container" style="width:50%;">
				<div class="row">
						<div class="col-md-6">
							<h4> LUPON </h4> 
	</div>
	</div> 
				<form method="POST">
					<div class="row">
						<div class="col-md-6">
							<label>Complainant</label>
							<input type="text" name="Complainant" class="form-control" placeholder="Enter Name" required>
					</div>
					<div class="col-md-6">
							<label>Accused</label>
							<input type="text" name="Accussed" class="form-control" placeholder="Enter Name" required>
					</div>
					</div>
					<div class="row">
					<div class="col-md-12">
							<label>Address</label>
							<input type="text" name="Address" class="form-control" placeholder="Enter address" required>
					</div>
					</div>

					<div class="row">
					<div class="col-md-6">
							<label>Contact</label>
							<input type="text" name="Contact" class="form-control" placeholder="Enter contact" required>
					</div>
					</div>
					
					<div class="row">
					<div class="col-md-6">
							<label>Complaints</label>
							<input type="text" name="Complaint" class="form-control" placeholder="Enter complaints" required>
					</div>
					</div>

					<div class="row" style="margin-top:1%;">
					<div class="col-md-6">
							<button type="text" name="submit" class="btn btn-primary">Submit</button>
							<a href="#" class="btn btn-success">View Details</a>
					</div>
					</div>
				</form>
	</div>

	
	</section>
						</body>
</html>
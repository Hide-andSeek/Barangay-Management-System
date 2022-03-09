<?php
require_once "db/conn.php" ;

	if(isset($_POST['insert'])){

		$cname=$_POST['Complainant'];
		$aname=$_POST['Accused'];
		$address=$_POST['Address'];
		$contact=$_POST['ContactNo'];
		$complaint=$_POST['Complaint'];
		
		$sql = "INSERT INTO bpso(Complainant,Accused,Address,ContactNo,Complaint)VALUES(:cn,:an,:adrss,:cno,:comp)";
		$query = $db->prepare($sql);

		$query->bindParam(':cn',$cname,PDO::PARAM_STR);
		$query->bindParam(':an',$aname,PDO::PARAM_STR);
		$query->bindParam(':adrss',$address,PDO::PARAM_STR);
		$query->bindParam(':cno',$contact,PDO::PARAM_STR);
		$query->bindParam(':comp',$complaint,PDO::PARAM_STR);

		$query->Execute();

		$lastInsertId = $db->lastInsertId();
 
		if($lastInsertId){
			echo"<script>alert('Record Succesfully Added!!!');</script>";
			echo"<script>window.location='lupon_tagapamayapa.php'</script>";
		}else{
			echo"<script>alert('Something Went Wrong !!!');</script>";
			echo"<script>window.location='lupon_tagapamayapa.php'</script>";
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
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	 
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
<<<<<<< HEAD
		<!-- Side Navigation Bar-->
		   <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
			  <li>
			  <a class="side_bar" href="lupon.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			
			   

			<!--Setting Section-->
			 <li>
			   <a class="side_bar" href="settings.php">
				 <i class='bx bx-cog' ></i>
				 <span class="links_name">Setting</span>
			   </a>
			   <span class="tooltip">Setting</span>
			 </li>
			 
			 <li class="profile">
				 <div class="profile-details">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id="">User Type: <?php echo $dept; ?></div>
				   </div>
				 </div>
				 <a href="emplogout.php">
					<i class='bx bx-log-out d_log_out' id="log_out" ></i>
				 </a>
			 </li>
			</ul>
		  </div>
		  <!-- Middle Section -->
		  <section class="home-section">
=======
	<section class="home-section">
>>>>>>> 0b7318a54383eebb043598ac5976f623f28106e2
			<!-- Top Section -->
			  <section class="top-section">
				  
						
					
				  
					
				  
			  </section>
		

			    
				<div class="container" style="width:50%;">
				<div class="row">
						<div class="col-md-8">
							<h4 class="container" style="width:50%;"> CASE DETAILS </h4> 
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
							<input type="text" name="Accused" class="form-control" placeholder="Enter Name" required>
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
							<input type="text" name="ContactNo" class="form-control" placeholder="Enter contact" required>
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
							<input type="submit" name="insert" class="btn btn-success"></button>
							<a href="lupon.php" class="btn btn-danger">Back</a>
					</div>
					</div>
				</form>
	</div>

	
	</section>
						</body>
</html>
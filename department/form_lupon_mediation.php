<?php
session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
}
require 'db/conn.php';
?>

<?php
	$user = '';

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
	$dept = '';

	if(isset($_SESSION['type'])){
		$dept = $_SESSION['type'];
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
		
		 i.menu{color: #fff}
			 i.id{color: #a809b0}
			 i.clearance{color: #1cb009}
			 i.sms{color: #478eff}
			 i.blotter-com{color: #9e0202}
			 i.indigency{color: #0218bd}
			 i.permit{color: #e0149c}
	 </style>
   </head>
	<body>
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
			  
			 <li>
			   <a class="side_bar" href="form_lupon_printdocs.php">
				 <i class='fa fa-print'></i>
				 <span class="links_name">Print Document</span>
			   </a>
			   <span class="tooltip">Print Document</span>
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
				   <img class="profile_pic" src="img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id=""><?php echo $dept; ?></div>
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
			<!-- Top Section -->
			  <section class="top-section">
				  <div class="top-content">
					<div>
						<h5>FOR MEDIATION
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			    <br>
			  <div>
			

	<form action="user.php" method="POST">
				<div class="search_content">
                        <label>Search: 
                            <input type="text" class="r_search" name="keyword">
							<button type="button" name="search"><i class="bx bx-search"></i></button>
                        </label>
                </div> 
			  </form>

			  
				<div>
					<div><button type="button" class="btn btn-primary addbtn" onclick="document.getElementById('id1').style.display='block'"><i class="bx bx-user-plus"></i>Add New</button></div>
<!--Modal form for Add Employee-->
				<div id="formatValidatorName" >
					<div >
						  <div id="id1" class="employeemanagement-modal modal" >
								<div class="modal-contentemployee animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="employee_form" class="container">
												<div class="form-control inputtext information" style="text-align:center; color: white; background: blue; border-top-right-radius: 20px; border-top-left-radius: 20px;">
												Add Employee
												</div>
												
												
												<div class="information">
													<label class="employee-label"> Username </label>
													<input required class="form-control inputtext control-label" id="employee_uname" name ="employee_uname" type="text"  placeholder="Employee Username"> 
												</div>
												
												<div class="row align-items-start">
													<div class="information col">
														<label class="employee-label"> Last Name </label>
														<input required class="form-control inputtext lname" id="employee_lname" name ="employee_lname" type="text"  placeholder="Last Name"> 
													</div>
													
													<div class="information col">
														<label class="employee-label"> First Name </label> 
														<input required class="form-control inputtext fname" id="employee_fname" name ="employee_fname" type="text"  placeholder="First Name"> 
													</div>
													
													<div class="information col">
														<label class="employee-label"> Middle Name </label>
														<input required class="form-control inputtext mname" id="employee_mname" name ="employee_mname" type="text"  placeholder="Middle Name"> 
													</div>
												</div>
												<div class="information">
													<label class="employee-label"> Birthday </label>
													<input required class="form-control inputtext control-label" id="birthday" name ="birthday" type="date"  placeholder="Birthday"> 
												</div>
												
												<div class="information">
													<label class="employee-label"> Address </label>
													<input required class="form-control inputtext control-label" id="address" name ="address" type="text"  placeholder="Address"> 
												</div>
												
												<div class="information">
													<label class="employee-label"> Contact No </label>
													<input required class="form-control inputtext control-label" id="contact" name ="contact" type="number"  placeholder="Contact#"> 
												</div>
												
												<div>
													<label class="employee-label"> Department </label>
													<select class="form-control inputtext control-label" style="padding: 0px 0px 0px 
													5px;" id="department" name="department">
														<option disabled>--Select--</option>
														<option value="KAPITAN">KAPITAN</option>
														<option value="BCPC">BCPC</option>
														<option value="BAWC">BAWC</option>
														<option value="LUPON">LUPON</option>
														<option value="ACCOUNTING">ACCOUNTING</option>
														<option value="BPSO">BPSO</option>
														<option value="REQUESTDOCUMENT">REQUESTDOCUMENT</option>
														<option value="COMPLAINT">COMPLAINT</option>
													</select>
												</div>


												<div class="information">   
													<button type="submit" id="empBtn" name="empBtn" value="empBtn" class="inputtext submtbtn">
														<i class="bx bx-t67check"></i>Submit
													</button>  
												</div>
										</div> 	
									</form>
							  </div>
						</div>
					</div>
					
									
					
					<div class="reg_table emp_tbl">
						<table class="content-table">
						
						<?php
						include "db/conn.php";
	                    include "db/user.php";
							
						$mquery = "SELECT * FROM usersdb";
						$countemployee = $db->query($mquery)
						?>



							<thead>
								<tr class="t_head">
									<th>Employee No.</th>
									<th>Complainant</th>
									<th>Accused</th>
									<th>Respondent</th>
									<th>Tirahan</th>
									<th>Oras at Petsa</th>
									<th>Contact No.</th>
									<th>Attested By:</th>
									<th>Status</th>
									<th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countemployee as $data) 
							{
							?>
							<tr class="table-row">
									<td><?php echo $data ['user_no']; ?></td>
									<td><?php echo $data ['user_lname']; ?></td>
									<td><?php echo $data ['user_fname']; ?></td>
									<td><?php echo $data ['user_mname']; ?></td>
									<td><?php echo $data ['birthday']; ?></td>
									<td><?php echo $data ['address']; ?></td>
									<td><?php echo $data ['contact']; ?></td>
									<td><?php echo $data ['department']; ?></td>
										
								</tr>
							
							<?php
							}
							?>
						
						</table>
							<!--
								<input type="button" id="tst" value="ok" onclick="fnselect()"/>
						     -->
						</div>
					</div>
				</div>
				
			</section>
			
			<br>
			<br>
			<br>
			<br>
			<br>

			<script>
			
			 /*-- Fuction for Login Modal Form --*/
			var modal = document.getElementById('id1');
				window.onclick = function (event) {
					if (event.target == modal) {
					modal.style.display = "none";
				}
			}  
			</script>
			
			</section>
	</body>
</html>
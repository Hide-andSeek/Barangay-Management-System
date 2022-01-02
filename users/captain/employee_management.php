
<?php session_start();
if(!isset($_SESSION["official_name"])){
	header("location: users/captain/employee_management.php");
}
?>

<?php 
include "db/conn.php";
include "db/user.php";
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

	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Employee Management </title>

	 <style>
		 *{
    font-family: "Poppins" , sans-serif;
    font-size: 14px;
}

div.align-box{padding-top: 23px; display: flex; align-items: center;}
.box-report{
    width: 300px;
    font-size: 14px;
    border: 4px solid #7dc748;
    padding: 30px;
    margin: 10px;
    border-radius: 5px;
    align-items: center;
}


#formatValidatorName{
    top: 50px;
}

.employeemanagement-modal{
    display: none; 
    position: absolute; 
    z-index: 999; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 120%; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
    padding-top: 5px; 
    
}


.modal-contentemployee {
    font-family: 'Montserrat', sans-serif;
    padding-top: 1%;
    background-color: #fefefe;
    margin: 5% auto 2% auto;
    border: 1px solid #888;
    height: 78%;
    width: 68%; 
   
}

.inputtext, .inputpass {
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    height: 35px;
    width: 94%;
    padding: 10px 10px;
    margin: 4px 25px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.employee-label{margin-left: 26px;}

.submtbtn{
    height: 40px;
}


.closebtn:hover{
	background: red;
	color: white;
}

.submtbtn:hover{
    background: orange;
    color: black;
    height: 40px;
}


.lname, .fname, .mname{
     width: 80%;
}

.addbtn{
    position: absolute;
    margin-left: 25px;
    margin-top: -25px;
    font-family: inherit;
}

.emp_tbl{ 
    margin-top: 65px;
    border-collapse: collapse;
    table-layout: auto;
    width: 100%;
    transition: margin-left 300ms;
    overflow-y: scroll;  
    box-shadow: inset;
    display: block;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}


	 </style>
   </head>
	<body>
			<!-- Side Navigation Bar-->
		   <div class="sidebar captain_sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
				<li>
					<a class="side_bar" href="captaindashboard.php">
						<i class='bx bx-category-alt'></i>
						<span class="links_name">Dashboard</span>
					</a>
					 <span class="tooltip">Dashboard</span>
			 	</li>

			  <li>
			  <a class="side_bar" href="adminmanagement.php">
				  <i class='bx bx-user-circle'></i>
				  <span class="links_name">Admin Management</span>
				</a>
				 <span class="tooltip">Admin Management</span>
			  </li>	

			   <li>
				 <a class="side_bar" href="employeemanagement.php">
					  <i class='bx bx-group'></i>
					  <span class="links_name">Employee Management</span>
					</a>
					 <span class="tooltip">Employee Management</span>
				</li>

				<li>
				 <a class="side_bar" href="brgyofficialsmanagement.php">
					  <i class='bx bxs-user-detail'></i>
					  <span class="links_name">Brgy Official Management</span>
					</a>
					 <span class="tooltip">Brgy Official Management</span>
				</li>

				<li>
				 <a class="side_bar" href="residentcensus.php">
					  <i class='bx bxs-user-detail'></i>
					  <span class="links_name">Resident Census</span>
					</a>
					 <span class="tooltip">Resident Census</span>
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
				    
					 <div>Employee</div>
					 <div class="job" id="">Employee</div>
				   </div>
				 </div>
				 <a href="captainlogout.php">
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
						<h5>Employee Management
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
				
				<div>
					<div><button type="button" class="btn btn-primary addbtn" onclick="document.getElementById('addemployee').style.display='block'"><i class="bx bx-user-plus"></i>Add Employee</button></div>
<!--Modal form for Add Employee-->
				<div id="formatValidatorName" >
					<div >
						  <div id="addemployee" class="employeemanagement-modal modal" >
								<div class="modal-contentemployee animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="employee_form" class="container">

										<div class="information">   
													<span type="submit" onclick="document.getElementById('addemployee').style.display='none'" class="closebtn" style="float: right">
													X
													</span>  
												</div>
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
														<option value="BCPC">BCPC</option>
														<option value="VAWC">VAWC</option>
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
							include "db/users.php";
							
							$mquery = "SELECT * FROM employeedb";
							$countemployee = $db->query($mquery)
						?>
						
							<thead>
								<tr class="t_head">
									<th>Employee No.</th>
									<th>Last Name</th>
									<th>First name</th>
									<th>Middle name</th>
									<th>Birthday</th>
									<th>Address</th>
									<th>Contact No.</th>
									<th>Department</th>
									<th>Status</th>
									<th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countemployee as $data) 
							{
							?>
							<tr class="table-row">
									<td><?php echo $data ['employee_no']; ?></td>
									<td><?php echo $data ['employee_lname']; ?></td>
									<td><?php echo $data ['employee_fname']; ?></td>
									<td><?php echo $data ['employee_mname']; ?></td>
									<td><?php echo $data ['birthday']; ?></td>
									<td><?php echo $data ['address']; ?></td>
									<td><?php echo $data ['contact']; ?></td>
									<td><?php echo $data ['department']; ?></td>
									<td>Active</td>
									<td>
										<button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Edit</button>

												
										<button class="form-control btn-danger" style="font-size: 13px; width: 100px;"><i class="bx bx-trash"></i>Disable</button>
									</td>
								</tr>	
								<div id="id2" class="employeemanagement-modal modal" >
													<div class="modal-contentemployee animate" >
														<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
															<div id="employee_form" class="container">
																	<div class="form-control inputtext information" style="text-align:center; color: white; background: blue; border-top-right-radius: 20px; border-top-left-radius: 20px;">
																	Update Employee
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
																		<button type="submit" id="empBtn" name="empBtn" value="empBtn" class="inputtext submtbtn">
																			<i class="bx bx-t67check"></i>Submit
																		</button>  
																	</div>
															</div> 	
														</form>
												</div>
											</div>
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
			<script>
			
			 /*-- Fuction for Login Modal Form --*/
			var modal = document.getElementById('addemployee');
				window.onclick = function (event) {
					if (event.target == modal) {
					modal.style.display = "none";
				}
			}  

			var modal = document.getElementById('id2');
				window.onclick = function (event) {
					if (event.target == modal) {
					modal.style.display = "none";
				}
			}  

			var modal = document.getElementById('close');
				window.onclick = function (event) {
					if (event.target == modal) {
					modal.style.display = "none";
				}
			}  
			</script>
			
	</body>
</html>
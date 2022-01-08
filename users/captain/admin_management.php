
<?php session_start();
if(!isset($_SESSION["official_name"])){
	header("location: captain/admin_management.php");
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
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Admin Management </title>
	 
	 
	 <style>
	 *{
    font-family: "Poppins" , sans-serif;
    font-size: 13px;
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

.adminmanagement-modal{
    display: none; 
    position: absolute; 
    z-index: 999; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
    padding-top: 5px; 
    
}


.modal-contentadmin {
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
.admin-label{margin-left: 26px;}

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

.addadmin{margin-top: 340px; margin-left: 25px; font-size: 13px;}

 button.view_approvebtn{width: 150px; margin-bottom: 5px;}
 button.view_approvebtn:hover{color: green; background: orange;}

 .select__select{
	position: absolute;
	margin-left: 69%;
	font-size: 13px;
}
	 </style>
   </head>
	<body onload="display_ct()">
		<!-- Side Navigation Bar-->
		   <div class="sidebar captain_sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Captain</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
			<li>
					<a class="side_bar" href="captaindashboard.php">
						<i class='bx bx-category-alt dash'></i>
						<span class="links_name">Dashboard</span>
					</a>
					 <span class="tooltip">Dashboard</span>
			 	</li>

			  <li>
					<a class="side_bar" href="adminmanagement.php">
						<i class='bx bx-user-circle admin'></i>
						<span class="links_name">Admin Management</span>
					</a>
					<span class="tooltip">Admin Management</span>
			  </li>	

				<li>
				  <a class="side_bar" href="employeemanagement.php">
					  <i class='bx bx-group employee'></i>
					  <span class="links_name">Employee Management</span>
					</a>
					 <span class="tooltip">Employee Management</span>
				  </li>
			 
				<li>
				 <a class="side_bar" href="brgyofficialsmanagement.php">
					  <i class='bx bxs-user-detail official'></i>
					  <span class="links_name">Brgy Official Management</span>
					</a>
					 <span class="tooltip">Brgy Official Management</span>
				</li>

				<li>
				 <a class="side_bar" href="residentcensus.php">
					  <i class='bx bxs-group census'></i>
					  <span class="links_name">Resident Census</span>
					</a>
					 <span class="tooltip">Resident Census</span>
				</li>

				<li>
				 <a class="side_bar" href="postannouncement.php">
					  <i class='bx bx-news iannouncement'></i>
					  <span class="links_name">Post Announcement</span>
					</a>
					 <span class="tooltip">Post Announcement</span>
				</li>
				
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
						<h5>Admin Management
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>	

			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			  <div class="search_content">
						<label class="select__select" for="">Filter by: 
                            <select class="selection" name="filterstats">
                                <option disabled>--Select--</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
								<button class="filterbtn"><i class='bx bx-sort filter'></i></button>
                        </label>
                </div>
			</form>
			
					<div class="reg_table emp_tbl" style="padding-top: 25px;">
						<table class="content-table">

						<?php
							include "db/conn.php";
						

							if(isset($_POST['filterstats'])){
								$filter = $_POST["filterstats"];

								$filterquery = "SELECT * FROM admintbl WHERE status='$filter' ORDER BY admin_id";
							}else{
								$filterquery = "SELECT * FROM admintbl WHERE status='Active' ORDER BY admin_id";
							}
	
							$countadmin = $db->query($filterquery)
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
									<th>Status</th>
									<th>View</th>
									<th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countadmin as $data) 
							{
							?>
						<tbody>
							<tr class="table-row">
									<td><?php echo $data ['admin_id']; ?></td>
									<td><?php echo $data ['lastname']; ?></td>
									<td><?php echo $data ['middlename']; ?></td>
									<td><?php echo $data ['firstname']; ?></td>
									<td><?php echo $data ['birthday']; ?></td>
									<td><?php echo $data ['address']; ?></td>
									<td><?php echo $data ['contactno']; ?></td>
									<td><?php echo $data ['status']; ?></td>
									<td><button class="view_approvebtn">View Details</button></td>
									<td>
										<button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Edit</button>

										<button class="form-control btn-danger" style="font-size: 13px; width: 100px;"><i class="bx bx-trash"></i>Change Status</button>
									</td>
								</tr>	
								<div id="id2" class="adminmanagement-modal modal" >
													<div class="modal-contentadmin animate" >
														<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
															<div id="admin_form" class="container">

																	<div class="information">   
																		<span type="submit" onclick="document.getElementById('id2').style.display='none'" class="closebtn" style="float: right">
																		X
																		</span>  
																	</div>

																	<div class="form-control inputtext information" style="text-align:center; color: white; background: blue; border-top-right-radius: 20px; border-top-left-radius: 20px;">
																	Update Admin
																	</div>

																	<div class="information">
																		<label class="admin-label"> Full name </label>
																		<input required class="form-control inputtext control-label" id="employee_uname" name ="employee_uname" type="text"  placeholder="Firstname   Middlename   Lastname"> 
																	</div>
																	
																	<div class="row align-items-start">
																		<div class="information col">
																			<label class="admin-label"> Last Name </label>
																			<input required class="form-control inputtext lname" id="employee_lname" name ="employee_lname" type="text"  placeholder="Last Name"> 
																		</div>
																		
																		<div class="information col">
																			<label class="admin-label"> First Name </label> 
																			<input required class="form-control inputtext fname" id="employee_fname" name ="employee_fname" type="text"  placeholder="First Name"> 
																		</div>
																		
																		<div class="information col">
																			<label class="admin-label"> Middle Name </label>
																			<input class="form-control inputtext mname" id="employee_mname" name ="employee_mname" type="text"  placeholder="(Optional)"> 
																		</div>
																	</div>
																	<div class="information">
																		<label class="admin-label"> Birthday </label>
																		<input required class="form-control inputtext control-label" id="birthday" name ="birthday" type="date"  placeholder="Birthday"> 
																	</div>
																	
																	<div class="information">
																		<label class="admin-label"> Address </label>
																		<input required class="form-control inputtext control-label" id="address" name ="address" type="text"  placeholder="Address"> 
																	</div>
																	
																	<div class="information">
																		<label class="admin-label"> Contact No </label>
																		<input required class="form-control inputtext control-label" id="contact" name ="contact" type="number"  placeholder="Contact#"> 
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
						</tbody>
							<?php
							}
							?>
						
						</table>
							
						</div>
					</div>
				</div>
				<div style="clear:both"></div>
				<div>
					<div><button type="button" class="btn btn-primary addadmin" onclick="document.getElementById('addadmin').style.display='block'"><i class="bx bx-user-plus"></i>Add Admin</button></div>
<!--Modal form for Add Employee-->
				<div id="formatValidatorName" >
					<div >
						  <div id="addadmin" class="adminmanagement-modal modal" >
								<div class="modal-contentadmin animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="admin_form" class="container">

										<div class="information">   
													<span type="submit" onclick="document.getElementById('addadmin').style.display='none'" class="closebtn" style="float: right">
													X
													</span>  
												</div>
												<div class="form-control inputtext information" style="text-align:center; color: white; background: blue; border-top-right-radius: 20px; border-top-left-radius: 20px;">
												Add Admin
												</div>
												
												
												<div class="information">
													<label class="admin-label"> Email Address </label>
													<input required class="form-control inputtext control-label" id="email" name ="email" type="text"  placeholder="example@gmail.com"> 
												</div>

												<div class="information">
													<label class="admin-label"> Contact No </	<input required class="form-control inputtext control-label" id="contact" name ="contact" type="number"  placeholder="Contact#"> 
												</div>label>
												
												
												<div class="row align-items-start">
													<div class="information col">
														<label class="admin-label"> Last Name </label>
														<input required class="form-control inputtext lname" id="employee_lname" name ="employee_lname" type="text"  placeholder="Last Name"> 
													</div>
													
													<div class="information col">
														<label class="admin-label"> First Name </label> 
														<input required class="form-control inputtext fname" id="employee_fname" name ="employee_fname" type="text"  placeholder="First Name"> 
													</div>
													
													<div class="information col">
														<label class="admin-label"> Middle Name </label>
														<input class="form-control inputtext mname" id="employee_mname" name ="employee_mname" type="text"  placeholder="(Optional)"> 
													</div>
												</div>

												<div class="information">
													<label class="admin-label"> User Type: </label>
													<select class="form-control inputtext control-label" style="padding: 0px 0px 0px 
													5px;" id="department" name="department">
														<option disabled>--Select--</option>
														<option value="administrator">Administrator</option>
														
													</select>
												</div>

												<div class="information">
													<label class="admin-label"> Birthday </label>
													<input required class="form-control inputtext control-label" id="birthday" name ="birthday" type="date"  placeholder="Birthday"> 
												</div>
												
												<div class="information">
													<label class="admin-label"> Address </label>
													<input required class="form-control inputtext control-label" id="address" name ="address" type="text"  placeholder="Address"> 
												</div>
												
												<div class="information">
													<label class="admin-label"> Contact No </label>
													<input required class="form-control inputtext control-label" id="contact" name ="contact" type="number"  placeholder="Contact#"> 
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
					
			</section>
			<script src="resident-js/barangay.js"></script>
			
	</body>
</html>
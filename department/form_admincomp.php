<?php
session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
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
    <link rel="stylesheet" href="../css/styles.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Admin Complaints Dashboard </title>
	 
	 
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
			 i.id, i.lupon{color: #a809b0}
			 i.clearance, i.bpso{color: #1cb009}
			 i.sms{color: #478eff}
			 i.blotter-com, i.vawc{color: #9e0202}
			 i.indigency, i.bcpc{color: #0218bd}
			 i.permit{color: #e0149c}

			 .employeemanagement-modal{
			display: none; 
			position: absolute; 
			z-index: 999; 
			left: 0;
			top: 0;
			width: 100%; 
			height: 125%; 
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
			height: 82%;
			width: 52%; 
		
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

		input.comage, input.comgender {
			font-family: inherit;
			font-size: 14px;
			height: 35px;
			width: 80%;
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
		span.topright{display: flex; float: right; padding:8px 16px;font-size: 25px;}
		.topright:hover {color: red; cursor: pointer; float: right; padding:8px 16px;}
		.processbtn:hover{background: orange;}
		
	 </style>
   </head>
	<body>
		<!-- Side Navigation Bar-->
		   <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
			  <li>
			  <a class="side_bar" href="compAdmin_dashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			  <li>
			   <a class="side_bar" href="compAdmin_Lupon.php">
				 <i class='bx bx-user-circle lupon'></i>
				 <span class="links_name">Lupon</span>
			   </a>
			   <span class="tooltip">Lupon</span>
			 </li>
			 
			 <li>
			   <a class="side_bar" href="compAdmin_BPSO.php">
				 <i class='bx bx-user bpso'></i>
				 <span class="links_name">BPSO</span>
			   </a>
			   <span class="tooltip">BPSO</span>
			 </li>

			 <li>
			   <a class="side_bar" href="compAdmin_Vawc.php">
				 <i class='bx bx-user-check vawc'></i>
				 <span class="links_name">VAWC</span>
			   </a>
			   <span class="tooltip">VAWC</span>
			 </li>

			 <li>
			   <a class="side_bar" href="compAdmin_BCPC.php">
				 <i class='bx bx-user-pin bcpc'></i>
				 <span class="links_name">BCPC</span>
			   </a>
			   <span class="tooltip">BCPC</span>
			 </li>
			  
			 <li>
			   <a class="side_bar" href="vawc_sms.php">
				 <i class='bx bx-mail-send sms'></i>
				 <span class="links_name">SMS</span>
			   </a>
			   <span class="tooltip">SMS</span>
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
				   <img class="profile_pic" src="../img/1.jpeg">
				   <div class="name_job">
				    
					 <div><?php echo $_SESSION["employee_no"];?></div>
					 <div class="job" id="">Employee</div>
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
						<h5>Dashboard
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			  
			 <br> 
			 
	 <div>
		<div class="w3-row-padding w3-margin-bottom">
			<div class="w3-quarter">
			<div class="w3-container w3-red w3-padding-16">
				<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';

					$query = "SELECT resident_id FROM accreg_resident ORDER BY resident_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					
					?>
				</div>
				<div class="w3-clear"></div>
				<h4>LUPON</h4>
			</div>
			</div>

			<div class="w3-quarter">
				<div class="w3-container w3-blue w3-padding-16">
					<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
					<div class="w3-right">
					<?php 
						require '../db/conn.php';

						$query = "SELECT barangay_id FROM barangayid ORDER BY barangay_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						?>
			
					</div>
					<div class="w3-clear"></div>
					<h4>BPSO</h4>
				</div>
			</div>

			<div class="w3-quarter">
				<div class="w3-container w3-teal w3-padding-16">
					<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
					<div class="w3-right">
					<?php 
						require '../db/conn.php';
	
						$query = "SELECT indigency_id FROM certificateindigency ORDER BY indigency_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						?>
					
					</div>
					<div class="w3-clear"></div>
					<h4>VAWC</h4>
				</div>
			</div>
			<div class="w3-quarter">
				<div class="w3-container w3-orange w3-text-white w3-padding-16">
					<div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
					<div class="w3-right">
					<?php 
						require '../db/conn.php';
	
						$query = "SELECT indigency_id FROM certificateindigency ORDER BY indigency_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						?>
					
					</div>
					<div class="w3-clear"></div>
					<h4>BCPC</h4>
				</div>
			</div>

			<br>
			<br>
			<br>
		
			<div class="reg_table">
			<h5 style="text-align: center;">All Complaints</h5>
						<table class="content-table table_indigency"  id="table">
						
							<?php
							include "../db/conn.php";
							include "../db/user.php";
							
							$mquery = "SELECT * FROM blotterdb";
							$countn = $db->query($mquery);
							
							?>

							<thead>
								<tr class="t_head">
									<th>Complaint ID</th>
									<th>Fullname</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Address</th>
									<th>Incident Address</th>
									<th>Name of violaters</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Relationship</th>
									<th>Address</th>
									<th>Witnesses</th>
									<th>Complaints</th>
									<th>Valid ID</th>
									<th>View Details</th>
									<th>Message</th>
								</tr>                       
							</thead>
							<?php
							foreach($countn as $data) 
							{
							?>
								<tr class="table-row">
									<td><?php echo $data ['blotter_id']; ?></td>
									<td><?php echo $data ['n_complainant']; ?></td>
									<td><?php echo $data ['comp_age']; ?></td>
									<td><?php echo $data ['comp_gender']; ?></td>
									<td><?php echo $data ['comp_address']; ?></td>
									<td><?php echo $data ['inci_address']; ?></td>
									<td><?php echo $data ['n_violator']; ?></td>
									<td><?php echo $data ['violator_age']; ?></td>
									<td><?php echo $data ['violator_gender']; ?></td>
									<td><?php echo $data ['relationship']; ?></td>
									<td><?php echo $data ['violator_address']; ?></td>
									<td><?php echo $data ['witnesses']; ?></td>
									<td><?php echo $data ['complaints']; ?></td>
									<td><a class="view_approvebtn">Valid Id</a></td>

									<?php
									if(isset($_POST[''])){
			
										$n_complainant = $_POST['n_complainant'];
										$comp_age = $_POST['comp_age'];
										$comp_gender = $_POST['comp_gender'];
										$comp_address = $_POST['comp_address'];
										$inci_address = $_POST['inci_address'];
										$n_violator = $_POST['n_violator'];
										$violator_age = $_POST['violator_age'];
										$violator_gender = $_POST['violator_gender'];
										$relationship = $_POST['relationship'];
										$violator_address = $_POST['violator_address'];
										$witnesses = $_POST['witnesses'];
										$complaints = $_POST['complaints'];
											
										// checking empty fields
										if(empty($n_complainant) || empty($comp_age) || empty($comp_gender) || empty($comp_address) || empty($inci_address) || empty($n_violator) || empty($violator_age) || empty($violator_gender) || empty($relationship) || empty($violator_address) || empty($witnesses) || empty($complaints)) {	
												
											if(empty($n_complainant)) {
												echo "<font color='red'>Complainant field is empty.</font><br/>";
											}
											
											if(empty($comp_age)) {
												echo "<font color='red'>Complainant Age field is empty.</font><br/>";
											}
											
											if(empty($comp_gender)) {
												echo "<font color='red'>Complainant Gender field is empty.</font><br/>";
											}
											if(empty($comp_address)) {
												echo "<font color='red'>Complainant Address field is empty.</font><br/>";
											}	
											if(empty($inci_address)) {
												echo "<font color='red'>Incident Address field is empty.</font><br/>";
											}	
											if(empty($n_violator)) {
												echo "<font color='red'>Name of Violator field is empty.</font><br/>";
											}	
											if(empty($violator_age)) {
												echo "<font color='red'>Name of Violator Age field is empty.</font><br/>";
											}	
											if(empty($violator_gender)) {
												echo "<font color='red'>Name of Violator Gender field is empty.</font><br/>";
											}	
											if(empty($relationship)) {
												echo "<font color='red'>Relationship field is empty.</font><br/>";
											}	
											if(empty($violator_address)) {
												echo "<font color='red'>Violator Address field is empty.</font><br/>";
											}	
											if(empty($witnesses)) {
												echo "<font color='red'>Witnesses field is empty.</font><br/>";
											}
											if(empty($complaints)) {
												echo "<font color='red'>Complaint field is empty.</font><br/>";
											}	
										}	
									}

									?>
									<td><button class="form-control btn-info processbtn" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" name="processbtn" onclick="document.getElementById('lupon').style.display='block'"><i class="bx bx-edit"></i>Process</button></td>

									<td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td>
								</tr>	
							
								<div id="id2" class="employeemanagement-modal modal" >
													<div class="modal-contentemployee animate" >
														<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
														<span onclick="document.getElementById('id2').style.display='none'" class="topright">&times;</span>

														
														<div class="send-message">
																<div class="container">
																<div class="row">
																	<div class="col-md-8">
																	<div class="contact-form">
																	<div class="section-heading">
																		<h4>Send a Message</h4>
																	</div>
																		<form id="contact" action="" method="post">
																		<div class="row">
																			<div class="col-lg-12 col-md-12 col-sm-12">
																			<fieldset class="sms-section">
																				<input required type="number" class="form-control textarea" id="contact_no"
																				name="contact_no"placeholder="Contact no.">
																			</fieldset>
																			</div>
																			<div class="col-lg-12">
																			<fieldset >
																				<textarea name="msg" class="form-control textarea" id="message" placeholder="Text Message">Hello good evening < Name >, we received your Barangay ID Request. You are now in Step 2, wait for the confirmation of Barangay. Please be guided accordingly! Thank you 
																				-From Barangay Commonwealth</textarea>
																				<small id="messageHelp" class="form-text text-muted">160 characters remaining.</small>
																				
																			</fieldset>
																			
																			</div>
																			<div class="col-lg-12">
																			<fieldset >
																				<button type="submit" name="sendSms" id="form-submit" class="filled-button"><i class="bx bx-send"></i>Send Message</button>
																			</fieldset>
																			</div>
																		</div>
																		</form>
																	</div>
																	</div>
																</div>
																</div>
															</div>
															</div> 	
														</form>
												</div>
											</div>

											<div id="lupon" class="employeemanagement-modal modal" >
													<div class="modal-contentemployee animate" >
														<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
														<span onclick="document.getElementById('lupon').style.display='none'" class="topright">&times;</span>

											
														<div >
															<button class="w3-bar-item w3-button" onclick="openCity('London')">Complainant</button>
															<button class="w3-bar-item w3-button" onclick="openCity('Paris')">Violator</button>
															<button class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Approval</button>
														</div>

															<div id="London" class="w3-container city">
																<h5 style="text-align: center;">Complainant</h5>
																<div class="information col">
																	<label class="employee-label"> Complaint ID </label>
																	<input class="form-control inputtext " id="" name ="" type="text">
																</div>
						
																
																<div class="information col">
																	<label class="employee-label"> Fullname </label>
																	<?php echo isset($error['n_complainant']) ? $error['n_complainant'] : '';?>
																	<input required class="form-control inputtext " id="" name ="" type="text"  onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
																</div>

																<div class="row align-items-start">
																	<div class="information col">
																		<label class="employee-label"> Age </label>
																		<?php echo isset($error['comp_age']) ? $error['comp_age'] : '';?>
																		<input required class="form-control inputtext comage" id="comp_age" name ="comp_age" type="text"  value="<?php echo $row['comp_age']; ?>"> 
																	</div>
																	
																	<div class="information col">
																		<label class="employee-label"> Gender </label> 
																		<?php echo isset($error['comp_gender']) ? $error['comp_gender'] : '';?>
																		<input required class="form-control inputtext comgender" id="comp_gender" name ="comp_gender" type="text" value="<?php echo $row['comp_gender']; ?>" > 
																	</div>	
																</div>
																		<div class="information col">
																			<label class="employee-label"> Address </label>
																			<?php echo isset($error['comp_address']) ? $error['comp_address'] : '';?>
																			<input required class="form-control inputtext control-label address" id="comp_address" name ="comp_address" type="text"  
																			value="<?php echo $data['comp_address']; ?>"> 
																		</div>
																	
																	
																		<div class="information col">
																			<label class="employee-label">Incident Address </label>
																			<input required class="form-control inputtext control-label address" id="" name ="" type="text"  placeholder="Incident Address"> 
																		</div>
																	
																
															</div>

															<div id="Paris" class="w3-container city" style="display:none">
															<h5 style="text-align: center;">Violator</h5>

															<div class="information col">
																<label class="employee-label"> Fullname </label>
																<input required class="form-control inputtext " id="" name ="" type="text"  onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
															</div>

															<div class="row align-items-start">
																<div class="information col">
																	<label class="employee-label"> Age </label>
																	<input required class="form-control inputtext lname" id="employee_lname" name ="employee_lname" type="text"  placeholder="Last Name" value="<?php echo $data['violator_age']; ?>"> 
																</div>
																
																<div class="information col">
																	<label class="employee-label"> Gender </label> 
																	<input required class="form-control inputtext fname" id="" name ="" type="text"  placeholder="First Name"> 
																</div>
																
															</div>


															<div class="information">
																<label class="employee-label"> Employee No. </label>
																<input required class="form-control inputpass control-label" id="employee_no" name ="employee_no" type="password"  placeholder="Ex. 112-1001-01"> 
																<i class="bx bx-show" id="togglePassword" style="margin-left: -50px; cursor: pointer;"></i>
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
																	<input class="form-control inputtext mname" id="employee_mname" name ="employee_mname" type="text"  placeholder="(Optional)"> 
																</div>
															</div>

															<div class="information">
																<label class="employee-label"> Birthday </label>
																<input required class="form-control inputtext control-label" id="birthday" name ="birthday" type="date"  placeholder="Birthday"> 
															</div>
															<div class="row align-items-start">
															<div class="information col">
																<label class="employee-label"> Address </label>
																<input required class="form-control inputtext control-label address" id="address" name ="address" type="text"  placeholder="Address"> 
															</div>

															<div class="information col">
																<label class="employee-label"> Contact No </label>
																<input required class="form-control inputtext control-label contact" id="contact" name ="contact" type="number"  placeholder="Ex. 09123456789"> 
															</div>
															</div>
															<div class="row align-items-start">
															<div class="information col">
																<label class="employee-label"> User Type </label>
																<select class="form-control inputtext usr_type" style="padding: 0px 0px 0px 
																5px;" id="user_type" name="user_type">
																	<option disabled>--Select--</option>
																	<option value="Employee">Employee</option>
																</select>
															</div>
															</div>

															</div>

															<div id="Tokyo" class="w3-container city" style="display:none">
																<div class="information col">
																	<label class="employee-label"> Department </label>
																	<select class="form-control inputtext departmnt control-label" style="padding: 0px 0px 0px 
																	5px; " id="department" name="department">
																		<option disabled>--Select--</option>
																		<option value="BCPC">BCPC</option>
																		<option value="VAWC">VAWC</option>
																		<option value="LUPON">LUPON</option>
																		
																		<option value="BPSO">BPSO</option>
																		
																		<option value="DENY">DENY</option>
																	</select>
																</div>
																<div class="information">
																	<label class="employee-label ">Approval Date </label>
																	<input required type="date" class="form-control inputtext control-label" id="" name="">
																</div>

																<div class="information col">
																<label class="employee-label"> Approved By </label>
																<input required class="form-control inputtext control-label" id="" name ="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> 
															</div>
																<div class="information">   
																<button type="submit" id="empBtn" name="empBtn" value="empBtn" class="inputtext submtbtn">
																	<i class="bx bx-t67check"></i>Submit
																</button>  
															</div>
															</div>
															

											</div>


												
		
														</form>
												</div>
											</div>
							
							<?php
							}
							?>
						</table>
				</div>
		</div>
	</div>
				
			</section>
			<script>
				function openCity(cityName) {
				var i;
				var x = document.getElementsByClassName("city");
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";  
				}
				document.getElementById(cityName).style.display = "block";  
				}
			</script>
	</body>
</html>
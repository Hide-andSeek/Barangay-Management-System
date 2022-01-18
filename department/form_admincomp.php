<?php
session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
}
?>

<?php
	include ("../db/conn.php");
	include ("../db/user.php");

	if(isset($_POST['approvebtn'])){
	
		$blotterID = $_POST['blotterID'];
		$complainant = $_POST['complainant'];
		$c_age = $_POST['c_age'];
		$c_gender = $_POST['c_gender'];
		$c_address = $_POST['c_address'];
		$incident_add = $_POST['incident_add'];
		$violators = $_POST['violators'];
		$v_age = $_POST['v_age'];
		$v_gender = $_POST['v_gender'];
		$v_rel = $_POST['v_rel'];
		$v_address = $_POST['v_address'];
		$witness = $_POST['witness'];
		$ex_complaints = $_POST['ex_complaints'];
		$dept = $_POST['dept'];
		$app_date = $_POST['app_date'];
		$app_by = $_POST['app_by'];
			
			$stmt = $db->prepare("INSERT INTO admin_complaints (blotterID, complainant, c_age, c_gender, c_address, incident_add, violators, v_age, v_gender, v_rel, v_address, witness, ex_complaints, dept, app_date, app_by) VALUES (:blotterID, :complainant, :c_age, :c_gender, :c_address, :incident_add, :violators, :v_age, :v_gender, :v_rel, :v_address, :witness, :ex_complaints, :dept, :app_date, :app_by)");
	
			$stmt->bindParam(':blotterID', $blotterID);
			$stmt->bindParam(':complainant', $complainant);
			$stmt->bindParam(':c_age', $c_age);
			$stmt->bindParam(':c_gender', $c_gender);
			$stmt->bindParam(':c_address', $c_address);
			$stmt->bindParam(':incident_add', $incident_add);
			$stmt->bindParam(':violators', $violators);
			$stmt->bindParam(':v_age', $v_age);
			$stmt->bindParam(':v_gender', $v_gender);
			$stmt->bindParam(':v_rel', $v_rel);
			$stmt->bindParam(':v_address', $v_address);
			$stmt->bindParam(':witness', $witness);
			$stmt->bindParam(':ex_complaints', $ex_complaints);
			$stmt->bindParam(':dept', $dept);
			$stmt->bindParam(':app_date', $app_date);
			$stmt->bindParam(':app_by', $app_by);
			
		if($stmt->execute()){
			echo "<script>
					alert('Successfully added!');
					window.location.href='compAdmin_dashboard.php';
				 </script>";
		}else{
			echo '<script>
					alert("An error occured")
				</script>';
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
    <link rel="stylesheet" href="../css/styles.css">


	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
			width: 72%; 
		
		}

		.inputtext, .inputpass {
			font-family: 'Montserrat', sans-serif;
			font-size: 14px;
			height: 35px;
			width: 84%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		input.comage, input.comgender, input.inp {
			font-family: inherit;
			font-size: 14px;
			height: 35px;
			width: 88%;
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
		span.topright{text-align: right; padding:8px 16px;font-size: 25px;}
		.topright:hover {text-align: right;color: red; cursor: pointer;padding:8px 16px;}
		.processbtn:hover{background: orange;}
		.inputele{pointer-events: none; outline: 1px solid orange;}
		.displayflex{display: flex;}
		.approvebtn:hover{background: orange;}
	 </style>
   </head>
	<body onload="display_ct()">
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
			<?php 
                if(isset($_SESSION['message'])){
                    ?>
                    <span class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
					</span>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
						<table class="content-table table_indigency"  id="table">
						
							<?php
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
									<th>ID Type</th>
									<th>ID Image</th>
									<th>Action</th>
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
									<td><?php echo $data ['id_type']; ?></td>
									<td><?php echo $data ['id_name']; ?></td>
									<td><a class="view_approvebtn"><img src="img/fileupload_blotter/<?php echo $data['id_image']; ?>" width="90" height="90"></a></td>
									
									<td>
										<a class="btn btn-success btn-sm" data-toggle="modal" style="font-size: 13px; width: 100px;" onclick="document.getElementById('process_<?php echo $data['blotter_id']; ?>').style.display='block'"><i class="bx bx-edit"></i>Process</a>
									</td>
								</tr>	
						
										<div id="process_<?php echo $data['blotter_id']; ?>" class="employeemanagement-modal modal">
											
													<div class="modal-contentemployee animate displayflex" >
														<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
														
															
															<div>
															<div class="information col">
																	<label class="employee-label"> Valid ID </label>

										
																	<img src="img/fileupload_blotter/<?php echo $data['id_image']; ?>" width="90" height="90" name="id_image"/>

																	
																</div>
															</div>
															<div id="Complainant">
																<h5 style="text-align: center;">Complainant</h5>
																<hr>
															
																<div class="information col">
																	<label class="employee-label"> Complainant's ID </label>
																	<input class="form-control inputtext inputele"  id="blotterID" name ="blotterID" type="text" value="<?php echo $data['blotter_id'];?>">
																</div>
																
																<div class="information col">
																	<label class="employee-label"> Complainant's  name </label>
																	
																	<input class="form-control inputtext inputele" id="complainant" name ="complainant" type="text" value="<?php echo $data['n_complainant'];?>">
																</div>
															

																
																	<div class="information col">
																		<label class="employee-label"> Complainant's  Age </label>
																		<?php echo isset($error['comp_age']) ? $error['comp_age'] : '';?>
																		<input class="form-control inputtext inputele" id="c_age" name ="c_age" type="text" value="<?php echo $data['comp_age'];?>"> 
																	</div>
																	
																	<div class="information col">
																		<label class="employee-label"> Complainant's  Gender </label> 
												
																		<input class="form-control inputtext inputele" id="c_gender" name ="c_gender" type="text" value="<?php echo $data['comp_gender'];?>"> 
																	</div>	
															
																		<div class="information col">
																			<label class="employee-label">Complainant's  Address </label>
																			<?php echo isset($error['comp_address']) ? $error['comp_address'] : '';?>
																			<input  class="form-control inputtext inputele" id="c_address" name ="c_address" type="text"  
																			value="<?php echo $data['comp_address']; ?>"> 
																		</div>
																	
																	
																		<div class="information col">
																			<label class="employee-label">Incident Address </label>
																			<input class="form-control inputtext inputele" id="incident_add" name ="incident_add" type="text"  value="<?php echo $data['inci_address']; ?>"> 
																		</div>
															</div>
														
															<div id="Violator" >
															<h5 style="text-align: center;">Violator</h5>

															<hr>
															<div class="information col">
																<label class="employee-label"> Violator's name </label>
																<input class="form-control inputtext inputele" id="violators" name ="violators" type="text" value="<?php echo $data['n_violator']; ?>">
															</div>

															
																<div class="information col">
																	<label class="employee-label">Violator's Age </label>
																	<input class="form-control inputtext lname  inputele" id="v_age" name ="v_age" type="text"  placeholder="Last Name" value="<?php echo $data['violator_age']; ?>"> 
																</div>
																
																<div class="information col">
																	<label class="employee-label"> Violator's Gender </label> 
																	<input class="form-control inputtext fname  inputele" id="v_gender" name ="v_gender" type="text"
																	value="<?php echo $data['violator_gender']; ?>"> 
																</div>


															<div class="information">
																<label class="employee-label"> Relationship </label>
																<input class="form-control inputtext fname inputele" id="v_rel" name ="v_rel" type="text" value="<?php echo $data['relationship']; ?>"> 
															</div>

															<div class="information col">
																<label class="employee-label"> Violator's Address </label>
																<?php echo isset($error['comp_address']) ? $error['comp_address'] : '';?>
																<input  class="form-control inputtext control-label address inputele" id="v_address" name ="v_address" type="text" value="<?php echo $data['violator_address']; ?>"> 
															</div>

															<div class="information col">
																<label class="employee-label"> Witnesses </label>
																<input class="form-control inputtext inputele" id="witness" name ="witness" type="text" value="<?php echo $data['witnesses']; ?>">
															</div>

															<div class="information col">
																<label class="employee-label"> Complaints </label>
																<textarea name="ex_complaints" class="form-control inputtext inputele " id="ex_complaints" ><?php echo $data['complaints']; ?></textarea>
															</div>
															</div>
															
															<div id="Approval" >
															<span onclick="document.getElementById('process_<?php echo $data['blotter_id']; ?>').style.display='none'" class="topright">&times;</span>
															
																
																<div class="information col">
																	<label class="employee-label"> Department </label>
																	<select class="form-control inputtext control-label" style="padding: 0px 0px 0px 
																	5px; " id="dept" name="dept">
																		<option disabled>--Select--</option>
																		<option value="BCPC">BCPC</option>
																		<option value="VAWC">VAWC</option>
																		<option value="LUPON">LUPON</option>
																		
																		<option value="BPSO">BPSO</option>
																		
																		<option style="color: red;" value="DENY">DENY</option>
																	</select>
																</div>
																
																<div class="information">
																	<label class="employee-label ">Approval Date </label>
																	<input type="date" class="form-control inputtext control-label" id="app_date" name="app_date">
																</div>

																<div class="information col">
																<label class="employee-label"> Approved By </label>
																<input class="form-control inputtext control-label" id="app_by" name ="app_by" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> 
															</div>
																<div class="information">   
																<button type="submit" id="approvebtn" name="approvebtn" value="empBtn" class="inputtext submtbtn approvebtn"><i class="bx bx-check"></i>Approve
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
			<script src="../bootstrap/jquery.min.js"></script>
			<script src="../bootstrap/js/bootstrap.min.js"></script>
			
			<script>
				document.querySelector("#approvedate").valueAsDate = new Date();
			</script>
	</body>
</html>
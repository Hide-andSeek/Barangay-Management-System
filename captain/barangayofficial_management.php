<?php 
include "db/conn.php";
include "db/users.php";

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

     <title> Employee Management </title>
	 
	 
	 <style>
		*{
			font-family: 'Monserrat', sans-serif;
			font-size: 14px;
		}
		
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
		
		.captain_sidebar{
		  background: gray;
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
            height: 145%; 
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
			  <a class="side_bar" href="adminmanagement.php">
				  <i class='bx bx-grid-alt'></i>
				  <span class="links_name">Admin Management</span>
				</a>
				 <span class="tooltip">Admin Management</span>
			  </li>	

				<li>
				  <a class="side_bar" href="employeemanagement.php">
					  <i class='bx bxs-user-detail'></i>
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
						<h5>Barangay Official's Management
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
				
				<div>
					<div><button type="button" style="font-size: 13px;" class="btn btn-primary addbtn" onclick="document.getElementById('id1').style.display='block'"><i class="bx bx-plus"></i>Add Barangay Official</button></div>
<!--Modal form for Add Employee-->
				<div id="formatValidatorName" >
					<div >
						  <div id="id1" class="employeemanagement-modal modal" >
								<div class="modal-contentemployee animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="employee_form" class="container">
												<div class="form-control inputtext information" style="text-align:center; color: white; background: blue; border-top-right-radius: 20px; border-top-left-radius: 20px;">
												Add Barangay Officials
												</div>
												
												<div class="row align-items-start">
													<div class="information col">
														<label class="employee-label"> Brgy Official's Name </label>
														<input required class="form-control inputtext lname" id="official_name" name ="official_name" type="text"  placeholder="Official Name"> 
													</div>
													
													<div class="information col">
														<label class="employee-label"> Password </label> 
														<input required class="form-control inputtext fname" id="official_password" name ="official_password" type="password"  placeholder="Password"> 
													</div>
												</div>

												<div class="information">   
													<button type="submit" id="officialcreatebtn" name="officialcreatebtn" value="signin" class="inputtext submtbtn">
														<i class="bx bx-check"></i>Submit
													</button>  
												</div>
										</div> 	
									</form>
							  </div>
						</div>
					</div>
					
					<div class="modal fade" id="delete">
						<div class="modal-dialog" style="width:400px !important;">
							<form action="">
							  <div class="modal-content">
								<div class="modal-header bg-danger">
								  <h6 class="modal-title" style="margin-left:20%">Are you sure you want delete?</h6>
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								  </button>
								</div>
								<div class="modal-footer justify-content-between">
								  <button type="button" class="btn btn-danger" data-dismiss="id1"><i class="fa fa-times"></i> No</button>
								  <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Yes</button>
								</div>
							  </div>
							  </form>
							  <!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						  </div>
									
					
					<div class="reg_table emp_tbl">
						<table class="content-table">
						
						<?php
							include "db/conn.php";
							include "db/users.php";
							
							$query = "SELECT * FROM brgy_captain";
							$countbrgyofficials = $db->query($query)
						?>
						
							<thead>
								<tr class="t_head">
									<th>Employee No.</th>
									<th>Last Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countbrgyofficials as $data) 
							{
							?>
							<tr class="table-row">
									<td><?php echo $data ['brgycaptain_id']; ?></td>
									<td><?php echo $data ['official_name']; ?></td>
									<td>Active</td>
									<td>
										<button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;"><i class="bx bx-edit"></i>Edit</button>
										<button class="form-control btn-danger" style="font-size: 13px; width: 100px;"><i class="bx bx-trash"></i>Delete</button>
									</td>
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
	</body>
</html>
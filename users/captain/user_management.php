<?php session_start();

if(!isset($_SESSION["type"]))
{
    header("location: officials.php");
}
?>

<?php
	$user = '';

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
?>

<?php
	$dept = '';

	if(isset($_SESSION['type'])){
		$dept = $_SESSION['type'];
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">

	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> User Management </title>

	 <style>
		 *{
			font-family: "Poppins" , sans-serif;
			font-size: 13px;
		}

		#formatValidatorName{
			top: 50px;
		}

		.employeemanagement-modal{
			display: none; 
			position: absolute; 
			z-index: 9999; 
			left: 0;
			top: 0;
			width: 100%; 
			height: 100%; 
			background-color: rgb(0,0,0); 
			background-color: rgba(0,0,0,0.4); 

		}
		
		.modal-contentemployee{
			font-family: 'Montserrat', sans-serif;
			padding-top: 1%;
			background-color: #fefefe;
			margin: 5% auto 2% auto;
			border: 1px solid #888;
			height: 85%;
			width: 68%; 
			z-index: 9999;
			border-radius: 10px;
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


		.lname, .fname, .mname, .usr_type, .departmnt, .stats{
			width: 80%;
		}
		.formbday, .formadd, .formcontact{
			width: 80%;
		}


		.address, .contact, .emplo, .email{width:87.5%}

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


		.addemployee{margin-top: 390px; margin-left: 25px; font-size: 13px; }


		.select__select{
			position: absolute;
			margin-left: 69%;
			font-size: 13px;
		}

		.label-success{background-color:#5cb85c}.label-success[href]:focus,.label-success[href]:hover{background-color:#449d44}
		.label-danger{background-color:#d9534f}.label-danger[href]:focus,.label-danger[href]:hover{background-color:#c9302c}
		.label{display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em}
		.alert-success{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}
		.alert{padding:15px;margin-bottom:20px;border:1px solid transparent;border-radius:4px}
		.panel-default{margin-top: 60px;}

		.viewbtn{ height: 35px; background-color: #008CBA;color: white;  width: 150px; font-size: 12px;}
        .viewbtn:hover{background-color: white; color: black; border: 1px solid #008CBA;}
		.editbtn{width: 90px;}
	 </style>
   </head>
	<body onload="display_ct()">
			<!-- Side Navigation Bar-->
		   <div class="sidebar captain_sidebar myDIV">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Captain</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
				<li>
					<a class="side_bar nav-button" href="captaindashboard.php">
						<i class='bx bx-category-alt dash'></i>
						<span class="links_name">Dashboard</span>
					</a>
					 <span class="tooltip">Dashboard</span>
			 	</li>

				 <li>
					<a class="side_bar nav-button" href="contactmodule.php">
						<i class='bx bx-user-circle admin'></i>
						<span class="links_name">Contacts</span>
					</a>
					<span class="tooltip">Contacts</span>
			  	</li>

				<li>
				  <a class="side_bar nav-button nav-active" href="usermanagement.php">
					  <i class='bx bx-group employee'></i>
					  <span class="links_name">User Management</span>
					</a>
					 <span class="tooltip">User Management</span>
				  </li>
			 
					<li>
					<a class="side_bar nav-button" href="residentcensus.php">
						<i class='bx bxs-group census'></i>
						<span class="links_name">Resident Census</span>
						</a>
						<span class="tooltip">Resident Census</span>
					</li>

					<li>
					<a class="side_bar nav-button" href="postannouncement.php">
						<i class='bx bx-news iannouncement'></i>
						<span class="links_name">Post Announcement</span>
						</a>
						<span class="tooltip">Post Announcement</span>
					</li>
			 
				 <li class="profile">
					<div class="profile-details">
					<div class="name_job" style="font-size: 13px;">
						<div><strong><?php echo $user;?></strong></div>
						<div class="job" id=""><?php echo $dept; ?> || Online </div>
						</div>
					</div>
					<a href="officiallogout.php">
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
						<h5>User Management
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
                            <select class="selection" name="filterstat">
                                <option disabled>--Select--</option>
                                <option name="action" value="active">active</option>
                                <option name="action" value="inactive">inactive</option>
                            </select>
								<button class="filterbtn"><i class='bx bx-sort filter'></i></button>
                        </label>
                </div>
			</form>	
			
			<div class="container">
           
					<div class="panel panel-default">
						<span id="message"></span>
						<div class="panel-body">
							<div class="table-responsive" id="user_data">

							</div>
						</div>
					</div>

            <script>
				$(document).ready(function(){
					
					load_user_data();

					function load_user_data()
					{

						var action = 'fetch';
						$.ajax({
							url:"user-action.php",
							method: "POST",
							data:{action:action},
							success:function(data)
							{
								$('#user_data').html(data);
							}
						})
					}
					$(document).on('click', '.action', function(){
						var user_id = $(this).data('user_id');
						var status = $(this).data('status');
						var action = 'change_status';
						$('#message').html('');
						if(confirm("You want to change this status?"))
						{
							$.ajax({
								url:"user-action.php",
								method:"POST",
								data: {user_id:user_id, status:status, action:action},
								success:function(data)
								{
									if(data != '')
									{
										load_user_data();
										$('#message').html(data);
									}
								}
							})
						}else{
							return false;
						}
					});
				});
			</script>
			
        </div>
				<div>
					<div><button type="button" class="btn btn-primary addbtn addemployee" onclick="document.getElementById('adduser').style.display='block'"><i class="bx bx-user-plus"></i>Add User</button></div>
<!--Modal form for Add User-->
				<div id="formatValidatorName" >
					<div >
						  <div id="adduser" class="employeemanagement-modal modal" >
								<div class="modal-contentemployee animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="employee_form" class="container">

										<div class="information">   
													<span type="submit" onclick="document.getElementById('adduser').style.display='none'" class="closebtn" style="float: right; font-size: 20px;">
													&times;
													</span>  
												</div>
												<div class="form-control inputtext information" style="text-align:center; color: white; background: blue; border-top-right-radius: 20px; border-top-left-radius: 20px;">
												Add User
												</div>	
											<div class="row align-items-start">
												<div class="information col">
													<label class="employee-label"> Username <i class="asterisk">*</i></label>
													<input required class="form-control inputtext email" id="username" name ="username" type="text"  placeholder="Firstname   Middlename   Lastname" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> 
												</div>

											
												<div class="information col">
													<label class="employee-label"> Employee No. <i class="asterisk">*</i></label>
													<input required class="form-control inputpass emplo" id="user_no" name ="user_no" type="password"  placeholder="Password"><i class="bx bx-show" id="togglePassword" style="margin-left: -50px; cursor: pointer;"></i>
												</div>
											</div>

												<div class="information col">
													<label class="employee-label"> Email Address <i class="asterisk">*</i></label>
													<input required class="form-control inputpass " id="emailadd" name ="emailadd" type="email"  placeholder="example@gmail.com"> 
												</div>
											

												<div class="row align-items-start">
													<div class="information col">
														<label class="employee-label"> Last Name <i class="asterisk">*</i></label>
														<input required class="form-control inputtext lname" id="user_lname" name ="user_lname" type="text"  placeholder="Last Name"> 
													</div>
													
													<div class="information col">
														<label class="employee-label"> First Name <i class="asterisk">*</i></label> 
														<input required class="form-control inputtext fname" id="user_fname" name ="user_fname" type="text"  placeholder="First Name"> 
													</div>
													
													<div class="information col">
														<label class="employee-label"> Middle Name </label>
														<input class="form-control inputtext mname" id="user_mname" name ="user_mname" type="text"  placeholder="(Optional)"> 
													</div>
												</div>

												
											<div class="row align-items-start">
												<div class="information col">
													<label class="employee-label"> Birthday <i class="asterisk">*</i></label>
													<input required class="form-control inputtext formbday" id="birthday" name ="birthday" type="date"  placeholder="Birthday"> 
												</div>

												<div class="information col">
													<label class="employee-label"> Address <i class="asterisk">*</i></label>
													<input required class="form-control inputtext formadd" id="address" name ="address" type="text"  placeholder="Address"> 
												</div>
												
												<div class="information col">
													<label class="employee-label"> Contact No <i class="asterisk">*</i></label>
													<input required class="form-control inputtext formcontact" id="contact" name ="contact" type="number"  placeholder="Ex. 09123456789"> 
												</div>
											</div>

											<div class="row align-items-start">
												<div class="information col">
													<label class="employee-label"> User Type <i class="asterisk">*</i></label>
													<select class="form-control inputtext usr_type" style="padding: 0px 0px 0px 
													5px;" id="user_type" name="user_type">
														<option disabled>--Select--</option>
														<option value="Official">Brgy Official</option>
														<option value="Regular Employee">Regular Employee</option>
														<option value="Administrator">Administrator</option>
														<option value="Contractual Employee">Contractual Employee</option>
													</select>
												</div>

												<div class="information col">
													<label class="employee-label"> Department<i class="asterisk">*</i></label>
													<select class="form-control inputtext departmnt control-label" style="padding: 0px 0px 0px 
													5px; " id="department" name="department">
														<option disabled>--Select--</option>
														<option value="BRGYOFFICIAL">BRGY OFFICIAL</option>
														<option value="ADMIN">ADMIN</option>
														<option value="BCPC">BCPC</option>
														<option value="VAWC">VAWC</option>
														<option value="LUPON">LUPON</option>
														<option value="ACCOUNTING">ACCOUNTING</option>
														<option value="BPSO">BPSO</option>
														<option value="REQUESTDOCUMENT">REQUESTDOCUMENT</option>
														<option value="COMPLAINT">COMPLAINT</option>
														<option value="NONE">NONE</option>
													</select>
												</div>

												<div class="information col">
													<label class="employee-label"> Status <i class="asterisk">*</i></label>
													<select class="form-control inputtext stats control-label" style="padding: 0px 0px 0px 
													5px; " id="status" name="status">
														<option disabled>--Select--</option>
														<option style="color: green" value="active">active</option>
														<option style="color: red" value="inactive">inactive</option>
													</select>
												</div>
											</div>

												<div class="information">
													<label class="employee-label"> Added On <i class="asterisk">*</i></label>
													<input required class="form-control inputtext control-label" id="added_on" name ="added_on" type="datetime-local"> 
												</div>

												<div class="information">   
													<button type="submit" id="userbtn" name="userbtn" class="inputtext submtbtn">
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

			<script>
				/*-- Fuction for Login Modal Form --*/
				var modal = document.getElementById('adduser');
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

				const togglePassword = document.querySelector('#togglePassword');
				const password = document.querySelector('#user_no');
				
				togglePassword.addEventListener('click', function (e) {
					// toggle the type attribute
					const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
					password.setAttribute('type', type);
					// toggle the eye slash icon
					this.classList.toggle('fa-eye-slash');
				});
			</script>
	</body>
</html>
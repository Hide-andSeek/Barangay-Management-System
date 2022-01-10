
<?php session_start();
if(!isset($_SESSION["official_name"])){
	header("location: captainlogin.php");
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

     <title> Employee Management </title>

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
    height: 84%;
    width: 75%; 
   
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


.lname, .fname, .mname, .usr_type, .departmnt, .stats, .address, .contact{
     width: 80%;
}
.address, .contact{ width: 88%;}


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


.addemployee{margin-top: 340px; margin-left: 25px; font-size: 13px;}


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
	 </style>
   </head>
	<body onload="display_ct()">
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
				   <img class="profile_pic">
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
			
			<div class="container">
            <?php
			include('db/user.php');
				if($_SESSION['type'] == 'user')
				{
				
				}
                else
                {
			?>	
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
							url:"employee-action.php",
							method: "POST",
							data:{action:action},
							success:function(data)
							{
								$('#user_data').html(data);
							}
						})
					}
					$(document).on('click', '.action', function(){
						var employee_id = $(this).data('employee_id');
						var status = $(this).data('status');
						var action = 'change_status';
						$('#message').html('');
						if(confirm("Change status?"))
						{
							$.ajax({
								url:"employee-action.php",
								method:"POST",
								data: {employee_id:employee_id, status:status, action:action},
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
			<?php
			}
			?>
        </div>
				<div>
					<div><button type="button" class="btn btn-primary addbtn addemployee" onclick="document.getElementById('addemployee').style.display='block'"><i class="bx bx-user-plus"></i>Add Employee</button></div>
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
													<input required class="form-control inputtext control-label" id="employee_uname" name ="employee_uname" type="text"  placeholder="Firstname   Middlename   Lastname" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> 
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

												<div class="information col">
													<label class="employee-label"> Department </label>
													<select class="form-control inputtext departmnt control-label" style="padding: 0px 0px 0px 
													5px; " id="department" name="department">
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

												<div class="information col">
													<label class="employee-label"> Status </label>
													<select class="form-control inputtext stats control-label" style="padding: 0px 0px 0px 
													5px; " id="status" name="status">
														<option disabled>--Select--</option>
														<option style="color: green" value="active">active</option>
														<option style="color: red" value="inactive">inactive</option>
													</select>
												</div>
											</div>

												<div class="information">
													<label class="employee-label"> Added On </label>
													<input required class="form-control inputtext control-label" id="added_on" name ="added_on" type="datetime-local"> 
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

			const togglePassword = document.querySelector('#togglePassword');
			const password = document.querySelector('#employee_no');
			
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
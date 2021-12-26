<?php session_start();
include "db/conn.php";
include "db/users.php";
include "db/user.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->

	<!-- Customize Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/employee.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Employee - Barangay Commonwealth QC.</title>

	 <style>
		 
	 </style>
	 
   </head>
	<body>
		<main class="employee-main">
			<h2 style="text-align: center;">Login Forms</h2>
			<div class="employee-logform">
					
					<button type="button" class="btn btn-outline-primary btn-size" onclick="document.getElementById('id5').style.display='block'">BCPC</button>
					
					<div id="formatValidatorName" >
						  <div id="id5" class="docureq-modal">
								<div class="modal-contentdocreq animate">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<div class="information">
													<input required class="inputtext control-label" id="employee_no" name ="employee_no" type="text"  placeholder="Employee No."> 
												</div>
												
											   <div class="information">
													<input class="inputtext control-label" id="department" name="department" type="hidden" value="BCPC">
												</div>
												
												<div class="information">   
													<button type="submit" id="bcpcbtn" name="bcpcbtn" class="log_button sign_in">
														Login
													</button>  
												</div>
										</div> 	
									</form>
							  </div>
						</div>
					</div>
					<button type="button" class="btn btn-outline-primary btn-size" onclick="document.getElementById('id6').style.display='block'">BAWC</button>
					
					<div id="formatValidatorName" >
						  <div id="id6" class="docureq-modal">
								<div class="modal-contentdocreq animate">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<div class="information">
													<input required class="inputtext control-label" id="email" name ="email" type="text"  placeholder="Employee ID"> 
												</div>
												
										
											   <div class="information">
													<input class="inputtext control-label" id="department" name="department" type="hidden" value="BAWC">
												</div>
												
												<div class="information">   
													<button type="submit" id="officiallogbtn" name="officiallogbtn" value="Login" class="log_button sign_in">
														Login
													</button>  
												</div>
										</div> 	
									</form>
							  </div>
						</div>
					</div>
					<button type="button" class="btn btn-outline-primary btn-size" onclick="document.getElementById('id7').style.display='block'">Lupon</button>
					
					<div id="formatValidatorName" >
						  <div id="id7" class="docureq-modal">
								<div class="modal-contentdocreq animate">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<div class="information">
													<input required class="inputtext control-label" id="employee_no" name ="employee_no" type="text"  placeholder="Employee No."> 
												</div>
												
											   <div class="information">
													<input class="inputtext control-label" id="department" name="department" type="hidden" value="LUPON">
												</div>
												
												<div class="information">   
													<button type="submit" id="luponbtn" name="luponbtn" value="Login" class="log_button sign_in">
														Login
													</button>  
												</div>
										</div> 	
									</form>
							  </div>
						</div>
					</div>
					<button type="button" class="btn btn-outline-primary btn-size" onclick="document.getElementById('id8').style.display='block'">Accounting Department</button>

					<div id="formatValidatorName" >
						  <div id="id8" class="docureq-modal">
								<div class="modal-contentdocreq animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<div class="information">
													<input required class="inputtext control-label" id="email" name ="email" type="text"  placeholder="Employee ID"> 
												</div>
												
												<div class="information">
													<input class="inputtext control-label" id="department" name="department" type="hidden" value="BPSO">
												</div>

												<div class="information">   
													<button type="submit" id="logbtn" name="logbtn" value="signin" class="log_button sign_in">
														Login
													</button>  
												</div>
										</div> 	
									</form>
							  </div>
						</div>
					</div>
			</div>
			<div class="employee-logform">
					<button type="button" class="btn btn-outline-primary btn-size" onclick="document.getElementById('id3').style.display='block'">BPSO</button>
					
					<div id="formatValidatorName" >
						  <div id="id4" class="docureq-modal">
								<div class="modal-contentdocreq animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<div class="information">
													<input required class="inputtext control-label" id="email" name ="email" type="text"  placeholder="Employee ID"> 
												</div>
												
												<div class="information">
													<input class="inputtext control-label" id="department" name="department" type="hidden" value="BPSO">
												</div>

												<div class="information">   
													<button type="submit" id="logbtn" name="logbtn" value="signin" class="log_button sign_in">
														Login
													</button>  
												</div>
										</div> 	
									</form>
							  </div>
						</div>
					</div>
					
					<button type="button" class="btn btn-outline-primary btn-size" onclick="document.getElementById('id3').style.display='block'">Document Request</button>
					
									<!--Modal form for Login-->
					<div id="formatValidatorName" >
						  <div id="id3" class="docureq-modal">
								<div class="modal-contentdocreq animate">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<div class="information">
													<input required class="inputtext control-label" id="employee_no" name ="employee_no" type="text"  placeholder="Employee No."> 
												</div>
												
												<div class="information">
													<input class="inputtext control-label" id="department" name="department" type="hidden" value="REQUESTDOCUMENT">
												</div>
											   
												<div class="information">   
													<button type="submit" id="documentlogbtn" name="documentlogbtn" value="Login" class="log_button sign_in">
														Login
													</button>  
												</div>
										</div> 	
									</form>
							  </div>
						</div>
					</div>
					
					<button type="button" class="btn btn-outline-primary btn-size" onclick="document.getElementById('id4').style.display='block'">Complaints</button>
					
									<!--Modal form for Login-->
					<div id="formatValidatorName" >
						  <div id="id4" class="docureq-modal">
								<div class="modal-contentdocreq animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<div class="information">
													<input required class="inputtext control-label" id="email" name ="email" type="text"  placeholder="Employee ID"> 
												</div>
												
												<div class="information">
													<input class="inputtext control-label" id="department" name="department" type="hidden" value="COMPLAINT">
												</div>

												

												<div class="information">   
													<button type="submit" id="logbtn" name="logbtn" value="signin" class="log_button sign_in">
														Login
													</button>  
												</div>
										</div> 	
									</form>
							  </div>
						</div>
					</div>
			</div>
		</main>
		
		<script src="js/loginmodalform.js"></script>
	</body>
</html> 
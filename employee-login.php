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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   
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
		 *{
			 box-sizing: border-box;
		 }

		 main.employee-main{
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			padding-top: 115px;
		}

		.btn-size{
			flex: 25%;
			font-size: 15px;
		}

		.btn-box{
			flex: 50%;
			padding: 15px 10px;

		}

		.topright{
			width:100%;
			float:right;
			padding:8px 16px;
		}
		.topright:hover {
			color: red;
			cursor: pointer;
			width:100%;
			float:right;
			padding:8px 16px;
		}
		
		@media(max-width: 800px){
			.btn-box{
				flex: 100%;
			}
		}

.modal-contentdocreq {
        font-family: 'Montserrat', sans-serif;
        padding-top: 2%;
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        height: 32%;
        width: 30%; 
        border-radius: 20px;
    }
	 </style>
	 
   </head>
	<body>	
		<h2 style="text-align: center;">Login Forms</h2>
		<main class="employee-main">
		
			<div class="employee-logform">
					
				<div class="btn-box">
					<button type="button" class=" btn btn-outline-primary btn-size" onclick="document.getElementById('bcpc').style.display='block'">BCPC</button>
				</div>		
					<div id="formatValidatorName" >
						  <div id="bcpc" class="docureq-modal">
								<div class="modal-contentdocreq animate">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">

												<span onclick="document.getElementById('bcpc').style.display='none'" class="topright">&times;</span>

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
					<div class="btn-box">
						<button type="button" class=" btn btn-outline-primary btn-size" onclick="document.getElementById('vawc').style.display='block'">VAWC</button>
					</div>
					<div id="formatValidatorName" >
						  <div id="vawc" class="docureq-modal">
								<div class="modal-contentdocreq animate">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">

												<span onclick="document.getElementById('vawc').style.display='none'" class="topright">&times;</span>

												<div class="information">
													<input required class="inputtext control-label" id="employee_no" name ="employee_no" type="text"  placeholder="Employee ID"> 
												</div>
												
										
											   <div class="information">
													<input class="inputtext control-label" id="department" name="department" type="hidden" value="VAWC">
												</div>
												
												<div class="information">   
													<button type="submit" id="vawcbtn" name="vawcbtn" value="Login" class="log_button sign_in">
														Login
													</button>  
												</div>
										</div> 	
									</form>
							  </div>
						</div>
					</div>
					<div class="btn-box">
						<button type="button" class=" btn btn-outline-primary btn-size" onclick="document.getElementById('lupon').style.display='block'">Lupon</button>
					</div>
					<div id="formatValidatorName" >
						  <div id="lupon" class="docureq-modal">
								<div class="modal-contentdocreq animate">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">

												<span onclick="document.getElementById('lupon').style.display='none'" class="topright">&times;</span>

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
					<div class="btn-box">
						<button type="button" class=" btn btn-outline-primary btn-size" onclick="document.getElementById('accounting').style.display='block'">Accounting Department</button>
					</div>
					<div id="formatValidatorName" >
						  <div id="accounting" class="docureq-modal">
								<div class="modal-contentdocreq animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">

												<span onclick="document.getElementById('accounting').style.display='none'" class="topright">&times;</span>

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
				<div class=" btn-box">
					<button type="button" class=" btn btn-outline-primary btn-size" onclick="document.getElementById('bpso').style.display='block'">BPSO</button>
				</div>
					<div id="formatValidatorName" >
						  <div id="bpso" class="docureq-modal">
								<div class="modal-contentdocreq animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">

												<span onclick="document.getElementById('bpso').style.display='none'" class="topright">&times;</span>

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
					<div class=" btn-box">
						<button type="button" class=" btn btn-outline-primary btn-size" onclick="document.getElementById('docreq').style.display='block'">Document Request</button>
					</div>
					
									<!--Modal form for Login-->
					<div id="formatValidatorName" >
						  <div id="docreq" class="docureq-modal">
								<div class="modal-contentdocreq animate">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
											
												<span onclick="document.getElementById('docreq').style.display='none'" class="topright">&times;</span>

												<div class="information">
													<input class="inputtext control-label" id="employee_uname" name="employee_uname" type="text" placeholder="Username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
												</div>

												<div class="information">
													<input class="inputpass control-label" id="employeeno" name ="employee_no" type="password"  placeholder="Employee No."> 
													<i class="bx bx-show" id="togglePassword" style="margin-left: 10px; cursor: pointer;"></i>
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
					<div class="btn-box">
						<button type="button" class=" btn btn-outline-primary btn-size" onclick="document.getElementById('complaints').style.display='block'">Complaints</button>
					</div>
									<!--Modal form for Login-->
					<div id="formatValidatorName" >
						  <div id="complaints" class="docureq-modal">
								<div class="modal-contentdocreq animate" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">

												<span onclick="document.getElementById('complaints').style.display='none'" class="topright">&times;</span>

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
		<script>
			const togglePassword = document.querySelector('#togglePassword');
			const password = document.querySelector('#employeeno');
			
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
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
			font-family: "Poppins" , sans-serif;
			box-sizing: border-box;
		 }

		 main.employee-main{
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			padding-top: 100px;
			border-radius: none;
		}

		.btn-size{
			flex: 25%;
			font-size: 15px;
		}

		.btn-box{
			flex: 50%;
			padding: 15px 10px;

		}

		span.topright{
			display: flex;
			float: right;
			padding:8px 16px;
			font-size: 25px;
		}
		.topright:hover {
			color: red;
			cursor: pointer;
			float: right;
			padding:8px 16px;
		}
		
		@media(max-width: 800px){
			.btn-box{
				flex: 100%;
			}
		}

	.modal-contentdocreq {
        font-family: 'Montserrat', sans-serif;
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
		padding-top: 2%;
        height: 55%;
        width: 30%; 
		
    }
	.inputtext, .inputpass, .logbtn{width: 82%;}
	.showpass:hover{color:red}
	.center {display: block; margin-left: auto; margin-right: auto;}
	.txtalign{text-align: center; user-select: none;}
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
												
												<img class="center" src="resident-img/Brgy-Commonwealth_1.png">

												<h5 class="txtalign">BCPC Department</h5>

												<div class="information">
													<input class="inputtext control-label" id="employee_uname" name="employee_uname" type="text" placeholder="Username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
													<i class="bx bx-user-circle" style="margin-left: -20px;"></i>
												</div>
												
												<div class="information">
													<input class="inputpass control-label" id="bcpcemployeeno" name ="employee_no" type="password"  placeholder="Employee No."> 
													<i class="bx bx-show showpass ipass" id="bcpctogglePassword" style="margin-left: -20px; cursor: pointer;"></i>
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
												
												<img class="center" src="resident-img/Brgy-Commonwealth_1.png">

												<h5 class="txtalign">VAWC Department</h5>

												<div class="information">
													<input class="inputtext control-label" id="employee_uname" name="employee_uname" type="text" placeholder="Username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
													<i class="bx bx-user-circle" style="margin-left: -20px;"></i>
												</div>
												
												<div class="information">
													<input class="inputpass control-label" id="vawcemployeeno" name ="employee_no" type="password"  placeholder="Employee No."> 
													<i class="bx bx-show showpass ipass" id="vawctogglePassword" style="margin-left: -20px; cursor: pointer;"></i>
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
												
												<img class="center" src="resident-img/Brgy-Commonwealth_1.png">

												<h5 class="txtalign">Lupon Department</h5>

												<div class="information">
													<input class="inputtext control-label" id="employee_uname" name="employee_uname" type="text" placeholder="Username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
													<i class="bx bx-user-circle" style="margin-left: -20px;"></i>
												</div>
												
												<div class="information">
													<input class="inputpass control-label" id="luponemployeeno" name ="employee_no" type="password"  placeholder="Employee No."> 
													<i class="bx bx-show showpass ipass" id="lupontogglePassword" style="margin-left: -20px; cursor: pointer;"></i>
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
												
												<img class="center" src="resident-img/Brgy-Commonwealth_1.png">

												<h5 class="txtalign">Accounting Department</h5>

												<div class="information">
													<input class="inputtext control-label" id="employee_uname" name="employee_uname" type="text" placeholder="Username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
													<i class="bx bx-user-circle" style="margin-left: -20px;"></i>
												</div>
												
												<div class="information">
													<input class="inputpass control-label" id="accountingemployeeno" name ="employee_no" type="password"  placeholder="Employee No."> 
													<i class="bx bx-show showpass ipass" id="accountingtogglePassword" style="margin-left: -20px; cursor: pointer;"></i>
												</div>

												<div class="information">   
													<button type="submit" id="accountingbtn" name="accountingbtn" value="signin" class="log_button sign_in">
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

												<img class="center" src="resident-img/Brgy-Commonwealth_1.png">

												<h5 class="txtalign">Request Document Dept.</h5>
												<div class="information">
													<input class="inputtext control-label" id="employee_uname" name="employee_uname" type="text" placeholder="Username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
													<i class="bx bx-user-circle" style="margin-left: -20px;"></i>
												</div>
												
												<div class="information">
													<input class="inputpass control-label" id="employeeno" name ="employee_no" type="password"  placeholder="Employee No."> 
													<i class="bx bx-show showpass" id="togglePassword" style="margin-left: -20px; cursor: pointer;"></i>
												</div>
											   
												<div class="information">   
													<button type="submit" id="documentlogbtn" name="documentlogbtn" value="Login" class="log_button sign_in logbtn">
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
												
												<img class="center" src="resident-img/Brgy-Commonwealth_1.png">

												<h5 class="txtalign">Complaints Department</h5>

												<div class="information">
													<input class="inputtext control-label" id="employee_uname" name="employee_uname" type="text" placeholder="Username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
													<i class="bx bx-user-circle" style="margin-left: -20px;"></i>
												</div>
												
												<div class="information">
													<input class="inputpass control-label" id="complaintsemployeeno" name ="employee_no" type="password"  placeholder="Employee No."> 
													<i class="bx bx-show showpass ipass" id="complaintstogglePassword" style="margin-left: -20px; cursor: pointer;"></i>
												</div>

												
												<div class="information">   
													<button type="submit" id="complaintsbtn" name="complaintsbtn" value="signin" class="log_button sign_in">
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
		<script src="js/employee.js"></script>
	</body>
</html> 
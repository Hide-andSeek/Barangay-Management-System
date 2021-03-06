<?php session_start();
include "db/conn.php";
include "db/employee.php";

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
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/employee.css">
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">

	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Employee - Barangay Commonwealth QC.</title>

	<style>
		* {
			font-family: "Poppins", sans-serif;
			box-sizing: border-box;
		}

		span.topright {
			display: flex;
			float: right;
			padding: 8px 16px;
			font-size: 25px;
		}

		.topright:hover {
			color: red;
			cursor: pointer;
			float: right;
			padding: 8px 16px;
		}

		.btn-box {
			display: absolute;
			margin-left: 50px;
			margin-bottom: 50px;
		}

		@media(max-width: 800px) {
			.btn-box {
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

		.inputtext,
		.inputpass,
		.logbtn {
			width: 82%;
		}

		.showpass:hover {
			color: red
		}

		.center {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}

		.txtalign {
			text-align: center;
			user-select: none;
		}


		#message, #message1, #message2, #message3, #message4, #message5, #message6{
			display: none;
			color: #000;
			position: relative;
		}

		#message p, #message1 p, #message2 p, #message3 p, #message4 p, #message5 p, #message6 p{
			padding: 15px 45px;
			font-size: 13px;
		}


		/* Add a green text color and a checkmark when the requirements are right */
		.valid, .validcomplaint, .validbcpc, .validvawc, .validlupon, .validaccounting, .validbpso{
			color: green;
		}

		.valid:before, .validcomplaint:before, .validbcpc:before, .validvawc:before, .validlupon:before, .validaccounting:before, .validbpso:before{
			position: relative;
			left: -35px;
			content: "???";
		}

	

		/* Add a red text color and an "x" when the requirements are wrong */
		.invalid, .invalidcomplaint, .invalidbcpc, .invalidvawc, .invalidlupon, .invalidaccounting, .invalidbpso{
			color: red;
		}

		.invalid:before, .invalidcomplaint:before, .invalidbcpc:before, .invalidvawc:before, .invalidlupon:before, .invalidaccounting:before, .invalidbpso:before{
			position: relative;
			left: -35px;
			content: "???";
		}

	</style>

</head>

<body>

	<div class="d-lg-flex half" style="display: flex; justify-content: center; align-items: center; margin-top: 200px;">

		<div class="contents order-2 order-md-1">


				<div class="row align-items-center justify-content-center">
					
						<div class="mb-8">
							<h3><img src="resident-img/Brgy-Commonwealth_1.png" style="width:20%; height: 20%;" alt=""> Barangay Commonwealth</h3>
							<br>
							<p class="mb-8">Welcome to Barangay Commonwealth Department. Login your respective account!</p>
						</div>

<!-- Document Request-->
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div id="docreq" class="dept">
								<label> Document Request Dept. </label>
								<br>

								<div class="form-group first">
									<label for="username">Employee Name</label>
									<input type="text" class="form-control" id="username" name="username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
									<i class="bx bx-user-circle" style="float: right; margin-top: -20px;"></i>
								</div>

								<div class="form-group last mb-3">
									<label for="password">Password</label>
									<input name="user_no" id="employeeno" type="password" class="form-control" pattern="(?=.*\d)(?=.*)(?=.*).{8,}" title="Must contain at least 8" onKeyPress="if(this.value.length==10) return false;">
									<i class="bx bx-show showpass ipass" id="togglePassword" style="float: right; margin-top: -20px; cursor: pointer;"></i>
								</div>

								<div id="message">
									<p id="length" class="invalid">Maximum <b>10 numbers</b></p>
								</div>
			
								<input type="submit" name="documentlogbtn" value="Log In" class="btn btn-block btn-primary">
							</div>
						</form>
<!-- Admin Complaints-->
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div id="complaints" class="dept" style="display:none">
								Admin Complaints Dept.
								<br>
								<div class="form-group first">
									<label for="username">Employee Name</label>
									<input type="text" class="form-control" id="username" name="username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
									<i class="bx bx-user-circle" style="float: right; margin-top: -20px;"></i>
								</div>
								<div class="form-group last mb-3">
									<label for="password">Password</label>
									<input name="user_no" id="admincomp" type="password" class="form-control" pattern="(?=.*\d)(?=.*)(?=.*).{8,}" title="Must contain at least 8" onKeyPress="if(this.value.length==10) return false;">
									<i class="bx bx-show showpass ipass" id="complaintstogglePasswordd" style="float: right; margin-top: -20px; cursor: pointer;"></i>
								</div>
								<div id="message1">
									<p id="lengthcomplaint" class="invalidcomplaint">Maximum <b>10 numbers</b></p>
								</div>
								<input type="submit" name="complaintsbtn" value="Log In" class="btn btn-block btn-primary">
							</div>
						</form>
<!-- BCPC Dept-->
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div id="bcpc" class="dept" style="display:none">
								BCPC Dept.
								<br>
								<div class="form-group first">
									<label for="username">Employee Name</label>
									<input type="text" id="username" name="username" class="form-control" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
									<i class="bx bx-user-circle" style="float: right; margin-top: -20px;"></i>
								</div>
								<div class="form-group last mb-3">
									<label for="password">Password</label>
									<input name="user_no" id="bcpccemployeeno" type="password" class="form-control" pattern="(?=.*\d)(?=.*)(?=.*).{8,}" title="Must contain at least 8" onKeyPress="if(this.value.length==10) return false;">
									<i class="bx bx-show showpass ipass" id="vawctogglePassword" style="float: right; margin-top: -20px; cursor: pointer;"></i>
								</div>
								<div id="message2">
									<p id="lengthbcpc" class="invalidbcpc">Maximum <b>10 numbers</b></p>
								</div>
								<input type="submit" name="bcpcbtn" value="Log In" class="btn btn-block btn-primary">
							</div>
						</form>
<!-- VAWC Dept-->
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div id="vawc" class="dept" style="display:none">
								VAWC Dept.
								<br>
								<div class="form-group first">
									<label for="username">Employee Name</label>
									<input type="text" class="form-control" id="username" name="username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
									<i class="bx bx-user-circle" style="float: right; margin-top: -20px;"></i>
								</div>
								<div class="form-group last mb-3">
									<label for="password">Password</label>
									<input name="user_no" id="vawcemployeeno" type="password" class="form-control" pattern="(?=.*\d)(?=.*)(?=.*).{8,}" title="Must contain at least 8" onKeyPress="if(this.value.length==10) return false;">
									<i class="bx bx-show showpass ipass" id="vawctogglePassword" style="float: right; margin-top: -20px; cursor: pointer;"></i>
								</div>
								<div id="message3">
									<p id="lengthvawc" class="invalidvawc">Maximum <b>10 numbers</b></p>
								</div>
								<button type="submit" name="vawcbtn" class="btn btn-block btn-primary">Log in</button>
							</div>
						</form>
<!-- Lupon Dept-->
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div id="lupon" class="dept" style="display:none">
								Lupon Dept.
								<br>
								<div class="form-group first">
									<label for="username">Employee Name</label>
									<input type="text" class="form-control" id="username" name="username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
									<i class="bx bx-user-circle" style="float: right; margin-top: -20px;"></i>
								</div>
								<div class="form-group last mb-3">
									<label for="password">Password</label>
									<input name="user_no" id="luponemployeeno"  type="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*)(?=.*).{8,}" title="Must contain at least 8" onKeyPress="if(this.value.length==10) return false;">
									<i class="bx bx-show showpass ipass" id="vawctogglePassword" style="float: right; margin-top: -20px; cursor: pointer;"></i>
								</div>
								<div id="message4">
									<p id="lengthlupon" class="invalidlupon">Maximum <b>10 numbers</b></p>
								</div>
								<input type="submit" name="luponbtn" value="Log In" class="btn btn-block btn-primary">
							</div>
						</form>
<!-- Accounting Dept-->
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div id="accounting" class="dept" style="display:none">
								Accounting Dept.
								<br>
								<div class="form-group first">
									<label for="username">Employee Name</label>
									<input type="text" class="form-control" id="username" name="username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
									<i class="bx bx-user-circle" style="float: right; margin-top: -20px;"></i>
								</div>
								<div class="form-group last mb-3">
									<label for="password">Password</label>
									<input name="user_no" type="password" class="form-control" id="accountingemployeeno" pattern="(?=.*\d)(?=.*)(?=.*).{8,}" title="Must contain at least 8" onKeyPress="if(this.value.length==10) return false;">
									<i class="bx bx-show showpass ipass" id="vawctogglePassword" style="float: right; margin-top: -20px; cursor: pointer;"></i>
								</div>
								<div id="message5">
									<p id="lengthaccounting" class="invalidaccounting">Maximum <b>10 numbers</b></p>
								</div>
								<input type="submit" name="accountingbtn" value="Log In" class="btn btn-block btn-primary">
							</div>
						</form>
<!-- Accounting Dept-->
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div id="bpso" class="dept" style="display:none">
								BPSO Dept.
								<br>
								<div class="form-group first">
									<label for="username">Employee Name</label>
									<input type="text" class="form-control" id="username" name="username" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
									<i class="bx bx-user-circle" style="float: right; margin-top: -20px;"></i>
								</div>
								<div class="form-group last mb-3">
									<label for="password">Password</label>
									<input name="user_no" type="password" class="form-control" id="bpsoemployeeno" pattern="(?=.*\d)(?=.*)(?=.*).{8,}" title="Must contain at least 8"  onKeyPress="if(this.value.length==10) return false;">
									<i class="bx bx-show showpass ipass" id="vawctogglePassword" style="float: right; margin-top: -20px; cursor: pointer;"></i>
								</div>
								<div id="message6">
									<p id="lengthbpso" class="invalidbpso">Maximum <b>10 numbers</b></p>
								</div>
								<input type="submit" name="bpsobtn" value="Log In" class="btn btn-block btn-primary">
							</div>
						</form>
						<br>
						<span class="d-block text-center my-4 text-muted">&mdash; Select Department &mdash;</span>
						<div class="social-login">
							<a href="#" class="facebook btn d-flex justify-content-center align-items-center tablink" onclick="openCity(event,'docreq')">
								Document Request Deparment
							</a>
							<a href="#" class="facebook btn d-flex justify-content-center align-items-center tablink" onclick="openCity(event,'complaints')">
								Admin Complaints Deparment
							</a>
							<a href="#" class="facebook btn d-flex justify-content-center align-items-center tablink" onclick="openCity(event,'bcpc')">
								BCPC Department
							</a>
							<a href="#" class="facebook btn d-flex justify-content-center align-items-center tablink" onclick="openCity(event,'vawc')">
								VAWC Department
							</a>
							<a href="#" class="facebook btn d-flex justify-content-center align-items-center tablink" onclick="openCity(event,'lupon')">
							    Lupon Deparment
							</a>
							<a href="#" class="facebook btn d-flex justify-content-center align-items-center tablink" onclick="openCity(event,'accounting')">
								Accounting Deparment
							</a>
							<a href="#" class="facebook btn d-flex justify-content-center align-items-center tablink" onclick="openCity(event,'bpso')">
								BPSO Deparment
							</a>

						</div>
						<div style="float: left;">
							<a href="reg_employee_log.php"> <i class="bx bx-skip-previous"> Go to Time Log </i></a>
						</div>
						<br>
						<br>
					
				</div>

		</div>
	</div>

	</main>
	<script src="js/loginmodalform.js"></script>
	<script src="js/employee.js"></script>
	<script src="js/main.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script>
		function openCity(evt, cityName) {
			var i, x, tablinks;
			x = document.getElementsByClassName("dept");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablink");
			for (i = 0; i < x.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
			}
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " w3-red";
		}
	</script>

	<script>
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#employeeno');

		togglePassword.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});
	

		const bcpctogglePassword = document.querySelector('#bcpctogglePassword');
		const bcpcemployee_no = document.querySelector('#bcpcemployeeno');

		bcpctogglePassword.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = bcpcemployee_no.getAttribute('type') === 'password' ? 'text' : 'password';
			bcpcemployee_no.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});

		const lupontogglePassword = document.querySelector('#lupontogglePassword');
		const luponemployee_no = document.querySelector('#luponemployeeno');

		lupontogglePassword.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = luponemployee_no.getAttribute('type') === 'password' ? 'text' : 'password';
			luponemployee_no.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});

		const vawctogglePassword = document.querySelector('#vawctogglePassword');
		const vawcemployee_no = document.querySelector('#vawcemployeeno');

		vawctogglePassword.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = vawcemployee_no.getAttribute('type') === 'password' ? 'text' : 'password';
			vawcemployee_no.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});



		const accountingtogglePassword = document.querySelector('#accountingtogglePassword');
		const accountingemployee_no = document.querySelector('#accountingemployeeno');

		accountingtogglePassword.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = accountingemployee_no.getAttribute('type') === 'password' ? 'text' : 'password';
			accountingemployee_no.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});

		const bpsotogglePassword = document.querySelector('#bpsotogglePassword');
		const bpsoemployee_no = document.querySelector('#bpsoemployeeno');

		bpsotogglePassword.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = accountingemployee_no.getAttribute('type') === 'password' ? 'text' : 'password';
			bpsoemployee_no.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});
	</script>
	<script>
		const complaintstogglePassword = document.querySelector('#complaintstogglePasswordd');
		const password1 = document.querySelector('#complaintsemployeenoo');

		complaintstogglePassword.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
			password1.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});
	</script>
	<script>
		var myInput = document.getElementById("employeeno");

		var length = document.getElementById("length");
		// When the user clicks on the password field, show the message box
		myInput.onfocus = function() {
			document.getElementById("message").style.display = "block";
		}
		// When the user clicks outside of the password field, hide the message box
		myInput.onblur = function() {
			document.getElementById("message").style.display = "none";
		}

		myInput.onkeyup = function() {
			// Validate length
			if (myInput.value.length >= 8) {
				length.classList.remove("invalid");
				length.classList.add("valid");
			} else {
				length.classList.remove("valid");
				length.classList.add("invalid");
			}
		}
	</script>
	<script>				
		var myInputcomplaint = document.getElementById("admincomp");

		var lengthcomplaint = document.getElementById("lengthcomplaint");
		// When the user clicks on the password field, show the message box
		myInputcomplaint.onfocus = function() {
			document.getElementById("message1").style.display = "block";
		}
		// When the user clicks outside of the password field, hide the message box
		myInputcomplaint.onblur = function() {
			document.getElementById("message1").style.display = "none";
		}

		myInputcomplaint.onkeyup = function() {
			// Validate length
			if (myInputcomplaint.value.length >= 8) {
				lengthcomplaint.classList.remove("invalidcomplaint");
				lengthcomplaint.classList.add("validcomplaint");
			} else {
				lengthcomplaint.classList.remove("validcomplaint");
				lengthcomplaint.classList.add("invalidcomplaint");
			}
		}
	</script>
	<script>				
		var myInputbcpc = document.getElementById("bcpccemployeeno");

		var lengthbcpc = document.getElementById("lengthbcpc");
		// When the user clicks on the password field, show the message box
		myInputbcpc.onfocus = function() {
			document.getElementById("message2").style.display = "block";
		}
		// When the user clicks outside of the password field, hide the message box
		myInputbcpc.onblur = function() {
			document.getElementById("message2").style.display = "none";
		}

		myInputbcpc.onkeyup = function() {
			// Validate length
			if (myInputbcpc.value.length >= 8) {
				lengthbcpc.classList.remove("invalidbcpc");
				lengthbcpc.classList.add("validbcpc");
			} else {
				lengthbcpc.classList.remove("validbcpc");
				lengthbcpc.classList.add("invalidbcpc");
			}
		}
	</script>
	<script>				
		var myInputvawc = document.getElementById("vawcemployeeno");

		var lengthvawc = document.getElementById("lengthvawc");
		// When the user clicks on the password field, show the message box
		myInputvawc.onfocus = function() {
			document.getElementById("message3").style.display = "block";
		}
		// When the user clicks outside of the password field, hide the message box
		myInputvawc.onblur = function() {
			document.getElementById("message3").style.display = "none";
		}

		myInputvawc.onkeyup = function() {
			// Validate length
			if (myInputvawc.value.length >= 8) {
				lengthvawc.classList.remove("invalidvawc");
				lengthvawc.classList.add("validvawc");
			} else {
				lengthvawc.classList.remove("validvawc");
				lengthvawc.classList.add("invalidvawc");
			}
		}
	</script>
	<script>				
		var myInputlupon = document.getElementById("luponemployeeno");

		var lengthlupon = document.getElementById("lengthlupon");
		// When the user clicks on the password field, show the message box
		myInputlupon.onfocus = function() {
			document.getElementById("message4").style.display = "block";
		}
		// When the user clicks outside of the password field, hide the message box
		myInputlupon.onblur = function() {
			document.getElementById("message4").style.display = "none";
		}

		myInputlupon.onkeyup = function() {
			// Validate length
			if (myInputlupon.value.length >= 8) {
				lengthlupon.classList.remove("invalidlupon");
				lengthlupon.classList.add("validlupon");
			} else {
				lengthlupon.classList.remove("validlupon");
				lengthlupon.classList.add("invalidlupon");
			}
		}
	</script>
	<script>				
		var myInputaccounting = document.getElementById("accountingemployeeno");

		var lengthaccounting = document.getElementById("lengthaccounting");
		// When the user clicks on the password field, show the message box
		myInputaccounting.onfocus = function() {
			document.getElementById("message5").style.display = "block";
		}
		// When the user clicks outside of the password field, hide the message box
		myInputaccounting.onblur = function() {
			document.getElementById("message5").style.display = "none";
		}

		myInputaccounting.onkeyup = function() {
			// Validate length
			if (myInputaccounting.value.length >= 8) {
				lengthaccounting.classList.remove("invalidaccounting");
				lengthaccounting.classList.add("validaccounting");
			} else {
				lengthaccounting.classList.remove("validaccounting");
				lengthaccounting.classList.add("invalidaccounting");
			}
		}
	</script>
	<script>				
		var myInputbpso = document.getElementById("bpsoemployeeno");

		var lengthbpso = document.getElementById("lengthbpso");
		// When the user clicks on the password field, show the message box
		myInputbpso.onfocus = function() {
			document.getElementById("message6").style.display = "block";
		}
		// When the user clicks outside of the password field, hide the message box
		myInputbpso.onblur = function() {
			document.getElementById("message6").style.display = "none";
		}

		myInputbpso.onkeyup = function() {
			// Validate length
			if (myInputbpso.value.length >= 8) {
				lengthbpso.classList.remove("invalidbpso");
				lengthbpso.classList.add("validbpso");
			} else {
				lengthbpso.classList.remove("validbpso");
				lengthbpso.classList.add("invalidbpso");
			}
		}
	</script>
</body>

</html>
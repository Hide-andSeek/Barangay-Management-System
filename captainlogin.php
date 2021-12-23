<?php session_start();
include "db/conn.php";
include "db/users.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
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
			<button type="button" class="btn btn-outline-primary btn-size" style="display: flex; align-items: center; justify-alignment: center;" onclick="document.getElementById('id2').style.display='block'">Barangay Captain</button>
					
					<div id="formatValidatorName" >
						  <div id="id2" class="docureq-modal">
								<div class="modal-contentdocreq animate">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<div class="information">
													<input required class="inputtext control-label" id="official_name" name ="official_name" type="text"  placeholder="Barangay Official's Name"> 
												</div>
												
												<div class="information">
													<input required class="inputpass control-label" id="official_password" name="official_password" type="password"  placeholder="Password"> 
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
		</main>

		
	</body>
</html> 
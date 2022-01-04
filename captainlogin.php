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
		 /*Captain Login Form*/
		 .captain-mainpage{display: flex; justify-content: center; align-items: center;}
		 .center {display: block; margin-left: auto; margin-right: auto; width: 50%;}
	 </style>
	 
   </head>
	<body>
		<main class="captain-mainpage">
					<div id="formatValidatorName" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<img class="center" src="resident-img/Brgy-Commonwealth_1.png">
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
		</main>

		
	</body>
</html> 
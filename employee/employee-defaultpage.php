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

    <link rel="stylesheet" href="css/style.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Employee - Barangay Commonwealth QC.</title>
	 
	 
	 <style>
	*{
	  margin: 0;
	  padding: 0;
	  box-sizing: border-box;
	  font-family: "Poppins" , sans-serif;
	}
	
	main.employee-main{
		padding-top: 175px;

	}
	
	.employee-logform{
		min-height: 20vh;
		min-width: 90vh;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.btn-size{
		padding: 50px 50px 50px 50px;
		margin: 10px 10px 10px 10px;
	}
	
	
	.docureq-modal{
            display: none; 
            position: fixed; 
            z-index: 2; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 5px; 
			
        }
	
	.modal-contentdocreq {
		    font-family: 'Montserrat', sans-serif;
		    padding-top: 2%;
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
		    height: 22%;
            width: 30%; 
            border-radius: 20px;
		   
        }
		

        .f_l_name{
            margin-bottom: 25px;
        }
		

        .b_login{
            border: rgb(0, 177, 0);
        }


        .form-active{
            color:#fff!important;
            background-color:#ee544a!important;
        }

        .form-button:hover{
            color:#000!important;
            background-color:#ccc!important
        }

        .form-bar{
            padding-left: 25px;
            padding-bottom: 45px;

        }

        button.log_in{
            width: 43%;
            border-top-left-radius: 10px;
        }

        .form-bar-item{
            padding:8px 16px;
            float:left;
            width:auto;
            border:none;
            display:block;
            outline:0
        }

        .inputtext, .inputpass {
		    font-family: 'Montserrat', sans-serif;
			height: 35px;
            width: 87%;
            padding: 10px 10px;
            margin: 4px 25px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
		  
        }
		
		.form-text{
			font-size: 10px;
			margin: 3px 3px;
			color: red;
		}

        .c_password{
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        
		.log_heading{
			font-family: 'Montserrat', sans-serif;
			user-select: none;
		}
		
        .log_button {
            background-color: #808080;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
			height: 40px;
            cursor: pointer;
            width: 100%;
        }
		
		button.gmail{
			background-color: #dd4b39;
			color: #fff;
			margin-left: 25px;
			width: 87%;
			padding: 12px 20px;
			border-radius: 25px;
		}
		
		
		button.sign_in, button.create_acc {
			margin-left: 25px;
			width: 160px;
			text-decoration: none;
			background-color: #04AA6D;
			color: #fff;
			text-transform: capitalize;
			font-weight: 300;
			padding: 12px 20px;
			border-radius: 20px;
			transition: all 0.3s;
		}

        button.create_account{
            margin-left: 25px;
			width: 160px;
            border-top-right-radius: 10px;
        }


		button.sign_in:hover, button.create_acc:hover{
			background-color: #48c76e;
			color: #fff;
		}

        button.sign_in{
            width: 87%;
        }
		
		button.gmail:hover{
			background-color: #fc4949;
			color: #fff;
		}
		.fp{
			padding: 8px;
			margin-left: 145px;
		}

         
		 div.login_container{
		  align-items: center;
         }

        .button:hover {
          opacity: 0.8;
        }

        /* Center the image */
        .imgcontainer {
		  padding: 0px 125px;
          margin: 24px 0 12px 0;
          position: relative;
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
		<main class="employee-main">
			<h2 style="text-align: center;">Login Forms</h2>
			<div class="employee-logform">
					<button type="button" class="btn btn-outline-primary btn-size" onclick="document.getElementById('id2').style.display='block'">Barangay Captain</button>
					
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
					<button type="button" class="btn btn-outline-primary btn-size" onclick="document.getElementById('id5').style.display='block'">BCPC</button>
					
					<div id="formatValidatorName" >
						  <div id="id5" class="docureq-modal">
								<div class="modal-contentdocreq animate">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<div class="information">
													<input required class="inputtext control-label" id="email" name ="email" type="text"  placeholder="Employee ID"> 
												</div>
												
										
											   <div class="information">
													<input class="inputtext control-label" id="department" name="department" type="hidden" value="BCPC">
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
													<input required class="inputtext control-label" id="email" name ="email" type="text"  placeholder="Employee ID"> 
												</div>
												
										
											   <div class="information">
													<input class="inputtext control-label" id="department" name="department" type="hidden" value="LUPON">
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
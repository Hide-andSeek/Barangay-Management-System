<?php

require 'vendor/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

// Configure client
$config = Configuration::getDefaultConfiguration();
$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTYzOTY1MTE0MCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkyMDA2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.lPTgmVIR-RnDz2Z2OBr-lRcoy3Ppgi_5Nt-qQ_61eWE');
$apiClient = new ApiClient($config);
$messageClient = new MessageApi($apiClient);

if (isset($_POST["number"]) && isset($_POST["msg"])) {
    // Sending a SMS Message
    $sendMessageRequest2 = new SendMessageRequest([
        'phoneNumber' => $_POST["number"],
        'message' => $_POST["msg"],
        'deviceId' => 126644
    ]);
    $sendMessages = $messageClient->sendMessages([
        $sendMessageRequest2
    ]);
}
?>

<?php session_start();
if(!isset($_SESSION["employee_no"])){
	header("location: employee/form_sms.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Sms </title>
	 
	 <style>
	 .contact-form{margin-top: 350px; }
	 .sms-section{margin-bottom: 15px;}
	 .send-message{margin-left: 25px; font-size: 15px; font-family: inherit}
	 .textarea{font-family: inherit; font-size: 15px; width: 100% 

    .number::-webkit-outer-spin-button,
	.number::-webkit-inner-spin-button{
		-webkit-appearance: none;
		margin: 0;
	 }
	 </style>
	 
   </head>
	<body>
																							<!-- Side Navigation Bar-->
		  <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu' id="btn" style="color: white" ></i>
			</div>
			<ul class="nav-list">
			    <li>
			  <a class="side_bar" href="dashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  <li>
				<a class="side_bar" href="barangayid.php">
				   <i class='bx bx-id-card id'></i>
				  <span class="links_name">Barangay ID</span>
				</a>
				 <span class="tooltip">Barangay ID</span>
			  </li>
			  
			  <li>
				<a class="side_bar" href="barangayclearance.php">
				   <i class='bx bx-receipt clearance'></i>
				  <span class="links_name">Barangay Clearance</span>
				</a>
				 <span class="tooltip">Barangay Clearance</span>
			  </li>
			  
			  <li>
				<a class="side_bar" href="certificateofindigency.php">
				   <i class='bx bx-file indigency'></i>
				  <span class="links_name">Certificate of Indigency</span>
				</a>
				 <span class="tooltip">Certificate of Indigency</span>
			  </li>			  
			  
			  <li>
				<a class="side_bar" href="businesspermit.php">
				   <i class='bx bx-news permit'></i>
				  <span class="links_name">Business Permit</span>
				</a>
				 <span class="tooltip">Business Permit</span>
			  </li>
			  
			 <li>
			   <a class="side_bar" href="sms.php">
				 <i class='bx bx-mail-send sms'></i>
				 <span class="links_name">SMS</span>
			   </a>
			   <span class="tooltip">SMS</span>
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
					 <div><?php echo $_SESSION["employee_no"];?></div>
					 <div class="job" id="">Administrator</div>
				   </div>
				 </div>
				 <a href="emplogout.php">
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
						<h5>Sms
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  

					</div>
				  </div>
				  
			  </section>
			  
			  <div class="search_content">
                        <label for="">Search: 
                            <input class="r_search" type="search">
							<i class='bx bx-search'></i>
                        </label>
                        <label class="select__select" for="">Sort by: 
                            <select class="selection">
                                <option disabled>--Select--</option>
                                <option value="userid">Resident ID</option>
                                <option value="name">Full name</option>
                                <option value="date">Date</option>
                            </select>
								<i class='bx bx-sort'></i>
                        </label>
                </div> 
				
				
				<div class="reg_table">
						<table class="content-table">
							<thead>
								<tr class="t_head">
									<th id="">Resident ID</th>
									<th id="">First name</th>
									<th id="">Middle name</th>
									<th id="">Last Name</th>
									<th id="">Contact</th>
								</tr>                       
							</thead>
							<tbody>
								<tr class="table-row">
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
								</tr>
								<tr class="table-row">
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
								</tr>
								<tr class="table-row">
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
								</tr>
								<tr class="table-row">
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
									<td id="">Null</td>
								</tr>
							</tbody>
						</table>
			  
			   <div class="send-message">
				<div class="container">
				  <div class="row">
					<div class="col-md-8">
					  <div class="contact-form">
					   <div class="section-heading">
						<h4>Send a Message</h4>
					  </div>
						<form id="contact" action="" method="post">
						  <div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
							  <fieldset class="sms-section">
								<input name="number" type="number" class="form-control textarea" id="contact" placeholder="Contact no.">
							  </fieldset>
							</div>
							<div class="col-lg-12">
							  <fieldset >
								<textarea name="msg" rows="6" class="form-control textarea" id="message" placeholder="Text Message"></textarea>
								<small id="messageHelp" class="form-text text-muted">160 characters remaining.</small>
								
							  </fieldset>
							  
							</div>
							<div class="col-lg-12">
							  <fieldset >
								<button type="submit" name="sendSms" id="form-submit" class="filled-button"><i class="bxs-send"></i>Send Message</button>
							  </fieldset>
							</div>
						  </div>
						</form>
					  </div>
					</div>
				  </div>
				</div>
			</div>
			</section>
					
			<script href="resident-js/jquery.js">
			</script>
	</body>
</html>
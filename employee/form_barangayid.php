<?php
session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
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

// require '../vendor/autoload.php';

// use SMSGatewayMe\Client\ApiClient;
// use SMSGatewayMe\Client\Configuration;
// use SMSGatewayMe\Client\Api\MessageApi;
// use SMSGatewayMe\Client\Model\SendMessageRequest;

// // Configure client
// $config = Configuration::getDefaultConfiguration();
// $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTYzOTY1MTE0MCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkyMDA2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.lPTgmVIR-RnDz2Z2OBr-lRcoy3Ppgi_5Nt-qQ_61eWE');
// $apiClient = new ApiClient($config);
// $messageClient = new MessageApi($apiClient);

// if (isset($_POST["number"]) && isset($_POST["msg"])) {
//     // Sending a SMS Message
//     $sendMessageRequest2 = new SendMessageRequest([
//         'phoneNumber' => $_POST["number"],
//         'message' => $_POST["msg"],
//         'deviceId' => 126644
//     ]);
//     $sendMessages = $messageClient->sendMessages([
//         $sendMessageRequest2
		
//     ]);
// }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/documentprint_styles.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta http-equiv="refresh" content="120">

     <title> Req Document Dept. - Barangay ID </title>
	 
	 
	 <style>

		 /* Barangay ID CSS */
		.documentbtn{font-size: 15px;width: 250px; height: 40px; padding: 12px 12px 12px 12px; }
		.documentbtn:hover{background-color: gray;color: white;}
	
		.document-section{padding-left: 100px; margin-top:356px!important;margin-bottom:16px!important}
		.document-light-grey,.document-hover-light-grey:hover{color:#000!important;background-color:#f1f1f1!important}
		
		.document-button:hover{color:#000!important;background-color:#ccc!important; width:85%;}
		.document-block{display:block;width:85%}
		.document-hide{display:none!important;}
		.document-show{display:block!important}
		 
		 /*Barangay ID - Stylesheet*/
		 .barangayid_print{ padding-left: 5px; }
		 .background_id{background: #C8CB58}
		 .text_align{display: flex; align-items: center;  justify-content: center;}
		 p.text_align{padding-bottom: 2px;}
		 p.center_description{line-height: 0.2;}
		 p.personal_information{padding-left: 35px;}
		 .borderstyle{border: none;}
		 .id_dashed{border: 3px dashed gray; padding: 10px 10px 10px 10px; width: 990px;}
		
		 button.view_approvebtn{width: 150px; margin-bottom: 5px;}
		 button.view_approvebtn:hover{color: green; background: orange;}
		 button.view_declinebtn{background: #c24c44}
		 button.view_declinebtn:hover{color: white; background: #d9534a;}

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
			height: 100%; 
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
			height: 78%;
			width: 48%; 
		
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

		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button{
			-webkit-appearance: none;
			margin: 0;
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
		.send-message{margin: 15px 15px 15px 15px;}
		.viewbtn{width: 65px; height: 35px;}
		.mrgn{margin-left: 65%; max-width: 70%}
	 </style>
	<!-- Side Navigation Bar-->
		  <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
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
			
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="../img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id="">User Type: <?php echo $dept; ?></div>
				   </div>
				 </div>
				 <a href="../emplogout.php">
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
						<h5>Barangay ID
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
				
																					<!-- Table-->
				<div class="reg_table " >
					<div style="text-align: center;">
						<hr>
							<h6>Barangay ID: Pending Request</h6>
						<hr>
					</div>
				
						<table class="content-table" id="table">
							
							<?php
							include "../db/conn.php";
							include "../db/user.php";
							
							$myquery = "SELECT * FROM barangayid";
							$countnum = $db->query($myquery);
							
							?>
							
							<thead>
								<tr class="t_head">
									<th>Resident ID</th>
									<th>First name</th>
									<th>Middle name</th>
									<th>Last Name</th>
									<th>Address</th>
									<th>Birthday</th>
									<th>Place of Birth</th>
									<th>Guardian's Name</th>
									<th>Relative Address</th>
									<th>Emergency Contact</th>
									<th>Date of Request</th>
									<th>Date of Validity</th>
									<th>Valid ID</th>
									<th>Approved by</th>
									<th>Action</th>
									<th>Message</th>
								</tr>                       
							</thead>
							<?php
							foreach($countnum as $data) 
							{
							?>
							<tbody>
								<tr class="table-row">
									<td><?php echo $data ['barangay_id']; ?></td>
									<td><?php echo $data ['fname']; ?></td>
									<td><?php echo $data ['mname']; ?></td>
									<td><?php echo $data ['lname']; ?></td>
									<td><?php echo $data ['address']; ?></td>
									<td><?php echo $data ['birthday']; ?></td>
									<td><?php echo $data ['placeofbirth']; ?></td>
									<td><?php echo $data ['guardianname']; ?></td>
									<td><?php echo $data ['reladdress']; ?></td>
									<td><?php echo $data ['emrgncycontact']; ?></td>
									<td><?php echo $data ['dateissue']; ?></td>
									<td><?php echo $data ['dateissue']; ?></td>
									<td><img src="img/fileupload_barangayid/<?php echo $data ['id_image']; ?>" width="90" height="90"></td>
									<td><input class="form-control" style="width: 135px; font-size: 13px; user-select: none;" value="<?php echo $user;?>"></td>

									<td><button class="view_approvebtn">Approve</button>
									<button class="view_approvebtn view_declinebtn">Deny</button></td>
									<td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td>
								</tr>	
							</tbody>
								<div id="id2" class="employeemanagement-modal modal" >
													<div class="modal-contentemployee animate" >
														<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
														<span onclick="document.getElementById('id2').style.display='none'" class="topright">&times;</span>

														
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
																				<input required type="number" class="form-control textarea" id="contact_no"
																				name="contact_no"placeholder="Contact no.">
																			</fieldset>
																			</div>
																			<div class="col-lg-12">
																			<fieldset >
																				<textarea name="msg" class="form-control textarea" id="message" placeholder="Text Message">Hello good evening < Name >, we received your Barangay ID Request. You are now in Step 2, wait for the confirmation of Barangay. Please be guided accordingly! Thank you 
																				-From Barangay Commonwealth</textarea>
																				<small id="messageHelp" class="form-text text-muted">160 characters remaining.</small>
																				
																			</fieldset>
																			
																			</div>
																			<div class="col-lg-12">
																			<fieldset >
																				<button type="submit" name="sendSms" id="form-submit" class="filled-button"><i class="bx bx-send"></i>Send Message</button>
																			</fieldset>
																			</div>
																		</div>
																		</form>
																	</div>
																	</div>
																</div>
																</div>
															</div>
															</div> 	
														</form>
												</div>
											</div>
							
							<?php
							}
							?>
						</table>
				</div>
				<div style="display: flex;" class="mrgn document-section">
					<div>
						<label style="font-size: 14px;">Approved: </label>
						<button class="btn btn-success viewbtn" onclick="window.location.href='barangayidapproval.php'"><i class="bx bx-xs bx-checkbox-checked" style="font-size: 20px;"></i> </button>
					</div>
					<div>
						<label style="font-size: 14px;">Deny: </label>
						<button class="btn btn-danger viewbtn" onclick="window.location.href='barangayidapproval.php'"><i class="bx bx-xs bx-checkbox-checked" style="font-size: 20px;"></i> </button>	
					</div>
				</div>
			</div>
	</section>	
			
			<script>
				var table = document.getElementById('table');
				
				for (var i = 1; i < table.rows.length; i++)
				{
					table.rows[i].onclick = function()
					{
						
						document.getElementById("residentid").value = this.cells[0].innerHTML;
						document.getElementById("fname").value = this.cells[1].innerHTML;
						document.getElementById("mname").value = this.cells[2].innerHTML;
						document.getElementById("lname").value = this.cells[3].innerHTML;
						document.getElementById("address").value = this.cells[4].innerHTML;
						document.getElementById("birthday").value = this.cells[5].innerHTML;
						document.getElementById("placeofbirth").value = this.cells[6].innerHTML;
						document.getElementById("guardianname").value = this.cells[7].innerHTML;
						document.getElementById("reladdress").value = this.cells[8].innerHTML;
						document.getElementById("emrgncycontact").value = this.cells[9].innerHTML;
						document.getElementById("dateissue").value = this.cells[10].innerHTML;
					};
				}
				
				
				function myFunction(hidedocument) {
				var x = document.getElementById(hidedocument);
					if (x.className.indexOf("document-show") == -1) {
					x.className += " document-show";
					} else { 
						x.className = x.className.replace(" document-show", "");
					}
				}
			</script>
	</body>
</html>
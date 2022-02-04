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

     <title> Barangay ID - Approved Documents </title>
	 
	 
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
		
	 </style>
   </head>
	<body>
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

			  <li>
				<a class="side_bar" href="businesspermit.php">
				   <i class='bx bx-news permit'></i>
				  <span class="links_name">Payment</span>
				</a>
				 <span class="tooltip">Payment</span>
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
						<a href="postannouncement.php" style="text-decoration: none; color: white;">Barangay ID</a><label> >> </label><a href="#" style="text-decoration: underline; color: black;">Approved Barangay ID Request</a>
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
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
                        <!-- <label class="select__select" for="">Filter by: 
                            <select class="selection">
                                <option disabled>--Select--</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="decline">Decline</option>
                            </select>
								<i class='bx bx-sort'></i>
                        </label> -->
                </div> 
				
																					<!-- Table-->
				<div class="reg_table " >
						<table class="content-table" id="table">
							
							<?php
							include "../db/conn.php";
							include "../db/user.php";
	
							$stmt = $db->prepare("SELECT * FROM approved_brgyids ORDER BY app_brgyid DESC");
							$stmt->execute();
							$datalist = $stmt->fetchAll();
							if (count($datalist) > 0) {
							
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
									<th>Message</th>
								</tr>                       
							</thead>
							<?php
							foreach ($datalist as $data) {
							?>
								<tr class="table-row">
									<td><?php echo $data ['app_brgyid']; ?></td>
									<td><?php echo $data ['fname']; ?></td>
									<td><?php echo $data ['mname']; ?></td>
									<td><?php echo $data ['lname']; ?></td>
									<td><?php echo $data ['address']; ?></td>
									<td><?php echo $data ['birthday']; ?></td>
									<td><?php echo $data ['placeofbirth']; ?></td>
									<td><?php echo $data ['contact_no']; ?></td>
									<td><?php echo $data ['guardianname']; ?></td>
									<td><?php echo $data ['emrgncycontact']; ?></td>
									<td><?php echo $data ['reladdress']; ?></td>
									<td><?php echo $data ['dateissue']; ?></td>
									<td><?php echo $data ['emailadd']; ?></td>
									<!-- <td><img  src="img/fileupload_barangayid/<?php echo $data['id_image'];?>" width="90" height="90"/></td> -->
									<td><?php echo $data ['approvedby']; ?></td>
									<td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('reply_<?php echo $data['barangay_id'];?>').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td>
								</tr>	
							
								<div id="reply_<?php echo $data['barangay_id'];?>" class="employeemanagement-modal modal" >
													<div class="modal-contentemployee animate" >
														<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
														<span onclick="document.getElementById('reply_<?php echo $data['barangay_id'];?>').style.display='none'" class="topright">&times;</span>

														
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
							} else {
								echo "<div style='text-align: center;' class='errormessage'>
									  <i class='bx bx-error'></i>
									  No data to be shown!
									  </div>";
							}
							?>
						</table>
				</div>
					
<!-- Barangay ID PRINT -->
					
			<div class="document-light-grey document-section">
						<button onclick="myFunction('hidedocument3')" class="document-button document-block documentbtn">Show more</button>
						
				<div id="hidedocument3"	 class="document-hide">
					<div class="barangayid_print">
						<div class="id_dashed">
								<fieldset>
									<legend class="legend_brgyID">Barangay ID </legend>
									<section>
										<div class="background_id" style="padding-top: 15px; width: 965px;  height: 344px;">
											<div style="display: flex;">
												<img style="float: left; width: 80px; height: 70px; margin-left: 15px;" src="../img/QCSealnew.png">
													<div>
														<p class="center_description" style="font-size: 15px; padding-left: 75px;">Republika ng Pilipinas</p>
														<p class="center_description" style="color: #1700cd; padding-left: 35px;">BARANGAY COMMONWEALTH</p>
														<p class="center_description" style="font-size: 13px; padding-left: 55px">Lungsod Quezon, Metro Manila</p>
														<p class="center_description">Tel. No.: 427-9210/ TeleFax No.: 951-7912</p>
													</div>
												<img style=" display: flex; float: right; width: 80px; height: 80px;" class="commonwealthlogo" src="../img/Brgy-Commonwealth.png">
												
												<div style=" padding-left: 45px; padding-right: 45px;">
													<div style="position: absolute; padding-left: 5px; border: 2px solid; width: 430px; height: 100px; font-size: 15px;">
														In case of emergency pls. notify:  <input type="text" name="guardianname" id="guardianname" class="form-control borderstyle" style="position: absolute; width: 325px; height: 24px; margin-left: 65px; background:#C8CB58;"><br>
														Name:  <input type="text" name="reladdress" id="reladdress" class="form-control borderstyle" style="position: absolute; width: 325px; height: 24px; margin-left: 65px; background:#C8CB58;"><br>
														Address: <input type="text" name="emrgncycontact" id="emrgncycontact" class="form-control borderstyle" style="position: absolute; width: 325px; height: 24px; margin-left: 65px; background:#C8CB58;"><br>
														Tel no.:
														
														<div style="position: absolute; padding-left: 5px; border: 2px solid; width: 100px; height: 100px; font-size: 15px; margin-top: -90px; margin-left: 323px; background: #ffffff; font-size: 10px; padding-top: 60px; text-align: center;">
														Bearer's Right Thumb Mark
														</div>
													</div>
												</div>
													
											</div>
											<div>
											<hr style="border: 1px solid #000000; border-radius: 5px; margin: 0; width: 490px;"> 
										</div>
											<div style="display: flex;">
												<div style="background: white; width: 115px; height: 115px; margin-top: 8px; margin-left: 8px;">
													<p style="padding-top: 130px">ID NO.: <input type="text" name="residentid" id="residentid" class="form-control borderstyle" style="width: 80px; height: 24px; background:#C8CB58;"></p>
													<div style="background: #f9232c; width: 250px; color: white;">
													BARANGAY RESIDENT ID CARD
													</div>
													
												</div>
												
												<div style="display: flex; padding-top: 10px; font-size: 13px;">
													<div style="line-height: 0.3;">
														<p class="personal_information" style="color: #1700cd;">LAST NAME</p>
														<input type="text" name="lname" id="lname" class="form-control borderstyle" style="width: 100px; height: 24px; margin-left: 25px; background:#C8CB58;">
														<p class="personal_information" style="padding-top: 9px; color: #1700cd;">ADDRESS</p>
														<input type="text" name="address" id="address" class="form-control borderstyle" style="position: absolute; width: 325px; height: 24px; margin-left: 25px; background:#C8CB58;">
														<p class="personal_information" style="color: #1700cd; padding-top: 35px; line-height: none;">BIRTHDATE</p>
														<input type="text" name="birthday" id="birthday" class="form-control borderstyle" style="width: 100px; height: 24px; margin-left: 25px; background:#C8CB58;">
													</div>
													<div style="line-height: 0.3;">
														<p class="personal_information" style="color: #1700cd;">FIRST NAME</p>
														<input type="text" name="fname" id="fname" class="form-control borderstyle" style="width: 90px; height: 24px; margin-left: 25px; background:#C8CB58;">
														<p style="padding-left: 8px; color: #1700cd;  padding-top: 62px;">PLACE OF BIRTH</p>
														<input type="text" name="placeofbirth" id="placeofbirth" class="form-control borderstyle" style="width: 90px; height: 24px; margin-left: 25px; background:#C8CB58;">

													</div>
													
													<div style="line-height: 0.3;">
														<p class="personal_information" style="color: #1700cd;">MIDDLE INITIAL</p>
														<input type="text" name="mname" id="mname" class="form-control borderstyle" style="width: 85px; height: 24px; margin-left: 35px; background:#C8CB58;">
														<div style="position: absolute; width: 450px; height: 100px; line-height: 1.5; margin-left: 180px; text-align: center; padding-right: 150px; margin-top:-25px; ">
														This certifies that the person whose name, signature and picture on the reverse side of this card is a registered voter and bonafide resident of BARANGAY COMMONWEALTH
														</div>
														<div style="position: absolute;  width: 450px; height: 100px; line-height: 1.5; margin-left: 180px; text-align: center; padding-right: 150px; margin-top:55px;">
														This ID is issued granting the Bearer for what legal purposes it may serve.
														</div>
														
														<p class="personal_information" style="color: #1700cd; padding-top: 62px;">PRECINT NO.</p>
														<input type="text" name="lname" id="lname" class="form-control borderstyle" style="width: 90px; height: 24px; margin-left: 25px; background:#C8CB58;">
														<span style="margin-right: 15px;">
															<p style="margin-top: 25px; margin-left: 10px; line-height: 0.5;">____________</p>
															<p style="position: absolute; margin-top: 5px;  inline-block: none; font-size: 12px;">BEARER'S SIGNATURE</p>
														</span>
														
														<div style="margin-left: 200px; font-size: 12px; margin-top: -45px; color: #1700cd;">
															DATE ISSUED: 
															<input type="date" name="dateissue" id="dateissue" class="form-control" style="width: 150px; height: 24px; margin-left: -15px; margin-top: 5px; background:#C8CB58; font-size: 12px;">
														</div>
														<div style="margin-left: 340px; font-size: 12px; margin-top: -33px; color: #1700cd;">
															EXPIRED AT YEAR END:
															<input type="date" name="dateissued" id="dateissued" class="form-control" style="width: 150px; height: 24px; margin-top: 5px; background:#C8CB58; font-size: 12px; border: none;">

														</div>
														<div style="margin-left: 430px; font-size: 12px; margin-top: 5px; text-align: center;">
															<h5> MANUEL A. CO</h5>
															<p>Barangay Chairman</p>
														</div>
													</div>
												</div>
											</div>
									</section>
								</fieldset>
							</div>
						</div>
					</div>
						<button class="permitbtn" style="float: right; padding: 5px 5px 5px 5px;" onclick="window.print(); ">
							<i class="bx bx-save saveicon"></i>
						</button>
						
				</div>
			</div>
			<button class="form-control">Submit</button>
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
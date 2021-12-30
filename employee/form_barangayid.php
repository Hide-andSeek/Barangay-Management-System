<?php session_start();
if(!isset($_SESSION["employee_no"])){
	header("location: form-barangayid.php");
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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/documentprint_styles.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta http-equiv="refresh" content="60">

     <title> Barangay ID </title>
	 
	 
	 <style>
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
				   <img class="profile_pic" src="../img/1.jpeg">
				   <div class="name_job">
					 <div><?php echo $_SESSION["employee_no"];?></div>
					 <div class="job" id="">Employee</div>
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
			  <form action="user.php" method="POST">
				<div class="search_content">
                        <label>Search: 
                            <input type="text" class="r_search" name="keyword">
							<button type="button" name="search"><i class="bx bx-search"></i></button>
                        </label>
                </div> 
			  </form>
																					<!-- Table-->
				<div class="reg_table " >
						<table class="content-table" id="table">
							
							<?php
							include "../db/conn.php";
							include "../db/users.php";
							
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
									<th>ID Type</th>
									<th>Approved by</th>
									<th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countnum as $data) 
							{
							?>
		

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
									<td><a style="color: blue;">view id</a></td>
									<td><input class="form-control" style="width: 135px; font-size: 13px;" placeholder="Approved by.."></input></td>
									<td><button>Approve</button></td>
								</tr>	
							
							<?php
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
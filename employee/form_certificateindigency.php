<?php session_start();
if(!isset($_SESSION["employee_no"])){
	header("location: form_certificateindigency.php");
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn
	.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
	 <link rel="stylesheet" href="css/documentprint_styles.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Certificate of Indigency </title>
	
	<style>
		p.center_description{line-height: 0.2;}
		div.side_information{line-height: 0.1;}
		.offic{font-size:13px;}
		
		.documentbtn{font-size: 15px;width: 250px; height: 40px; padding: 12px 12px 12px 12px; }
		.documentbtn:hover{background-color: gray;color: white;}
	
		.document-section{padding-left: 100px; margin-top:356px!important;margin-bottom:16px!important}
		.document-light-grey,.document-hover-light-grey:hover{color:#000!important; background-color:#f1f1f1!important;}
		
		.document-button:hover{color:#000!important;background-color:orange!important; width:85%;}
		.document-block{display:block;width:85%}
		.document-hide{display:none!important; max-height: 300px; overflow-y: scroll; width:85%;}
		.document-show{display:block!important}
		.inp{border: none; }
		.borderb{border-bottom: 1px solid black}
	</style>
	
   </head>
	<body>
			<!-- Side Navigation Bar-->
		   <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
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
			 
			 <li>
			   <a class="side_bar" href="docblotter.php">
				 <i class='bx bx-mail-send sms'></i>
				 <span class="links_name">Blotter</span>
			   </a>
			   <span class="tooltip">Blotter</span>
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
						<h5>Certificate of Indigency
						<a href="#" class="circle">
							 <img src="img/dt.png" >
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
			  
			  <div class="reg_table">
						<table class="content-table table_indigency"  id="table">
						
							<?php
							include "db/conn.php";
							include "db/users.php";
							
							$mquery = "SELECT * FROM certificateindigency";
							$countn = $db->query($mquery);
							
							?>

							<thead>
								<tr class="t_head">
									<th>Indigency ID</th>
									<th>Fullname</th>
									<th>Address</th>
									<th>Purpose</th>
									<th>ID type</th>
									<th>Date Issued</th>
									<th>Date Expiration</th>
								</tr>                       
							</thead>
							<?php
							foreach($countn as $data2) 
							{
							?>
								<tr class="table-row">
									<td><?php echo $data2 ['indigency_id']; ?></td>
									<td><?php echo $data2 ['fullname']; ?></td>
									<td><?php echo $data2 ['address']; ?></td>
									<td><?php echo $data2 ['purpose']; ?></td>
									<td><?php echo $data2 ['id_type']; ?></td>
									<td><?php echo $data2 ['date_issue']; ?></td>
									<td><?php echo $data2 ['date_issue']; ?></td>
								</tr>	
							
							<?php
							}
							?>
						</table>
							<!--
								<input type="button" id="tst" value="ok" onclick="fnselect()"/>
						     -->
			</div>
			  
				<div class="document-light-grey document-section">
						<button onclick="myFunction('hidedocument')" class="document-button document-block documentbtn">Show more</button>
						<div id="hidedocument"	 class="document-hide">
							<div id="indigency_file" style="display: auto; ">
								<fieldset >
									<legend class="indigency">Barangay Indigency</legend>
									<section class="barangay_indigency">
										<div style="padding-top: 15px; width: 965px;  height: 344px;">
											<div style="display: flex;">
												<img style="float: left; width: 130px; height: 125px; margin-left: 35px;" src="img/QCSealnew.png">
													<div style="margin-left: 120px;">
														<p class="center_description" style="font-size: 17px; padding-left: 75px;">Republic of the Philippines</p>
														<p class="center_description" style="font-size: 15px; padding-left: 95px;">District II, Quezon City</p>
														<p class="center_description" style=" font-size: 19px; padding-left: 35px; padding-bottom: 15px;">BARANGAY COMMONWEALTH</p>
														<p class="center_description" style="font-size: 20px;">OFFICE OF THE BARANGAY CAPTAIN</p>
													</div>
												<img style=" display: flex; float: right; height: 130px; width: 130px; margin-left: 135px; " class="commonwealthlogo" src="img/Brgy-Commonwealth150x150.png">
											</div>
											<div>
												<div style="margin-top:5px; border-top: 2px solid #000000; width: 1220px; width: calc(100%  - 70px); transition: all 0.5s ease;"></div>
												<div style="border-left: 2px solid #000000; height: 1100px; margin-left: 245px;"></div>
													<div  style="position: inherit; margin-top: -1075px;">
														<p style="font-size: 21px; line-height: 0.5;">MANUEL A. CO</p>
														<p >Punong Barangay</p>
														<br>
														<div class="side_information">
															<p>PRESY C. BAQUIRING</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Barangay Justice and</p>
															<p class="offic">Rules, Human Rights and Ethics,</p>
															<p class="offic">VAWC, BCPC, PWD, Women</p>
															<p class="offic">Affairs, Senior Citizen, Finance</p>
														</div>
														<br>
														<div class="side_information">
															<p>ELMER M. BUENA</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Peace and Order and</p>
															<p class="offic">Public Order and Safety</p>
														</div>
														<br>
														<div class="side_information">
															<p>ROWENA E. LUCAS</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Education, Cultural</p>
															<p class="offic">and Tourism, Appropriation, Ways</p>
															<p class="offic">and Means</p>
														</div>
														<br>
														<div class="side_information">
															<p>REYNALDO O. SEVILLA</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Health,</p>
															<p class="offic">Environmental, Sanitation and</p>
															<p class="offic">Beautification, Bids and Awards</p>
														</div>
														<br>
														<div class="side_information">
															<p>JULIUS C. DELA CRUZ</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Transportation and</p>
															<p class="offic">Communication</p>
															<p class="offic">in, Bids and Awards Inspection</p>
														</div>
														<br>
														<div class="side_information">
															<p>IMELDA Q. CAJEDA</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Cooperation</p>
															<p class="offic">Livelihood, Socio-Cultural and</p>
															<p class="offic">Religious Affair</p>
														</div>
														<br>
														<div class="side_information">
															<p>HARUN W. DATU TAHIL</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Public Works,</p>
															<p class="offic">Infrastructure, HOA/PO's and</p>
															<p class="offic">Community Development</p>
														</div>
														<br>
														<div class="side_information">
															<p>RAYMART S. GARCIA</p>
															<p style="font-size: 14px;">SK CHAIRMAN</p>
														</div>
														<br>
														<div class="side_information">
															<p>CEFERINO C. CRISOSTOMO</p>
															<p style="font-size: 14px;">BARANGAY SECRETARY</p>
														</div>
														<br>
														<div class="side_information">
															<p>CHONA A. PINCA</p>
															<p style="font-size: 14px;">BARANGAY TREASURER</p>
														</div>
														
														
													</div>
											</div>
										</div>
										<div style="display: flex; ">
											<div style="display: auto;">
												<div style="margin-left: 40px;">
													<h4 style="margin-top: -45px; margin-left: 420px;">CERTIFICATE OF INDIGENCY</h4>
												</div>
												<br>
												<p style="margin-top: -5px; margin-left: 280px;">Whom It May Concern</p>
												<br>
												<p style="display: auto; margin-top: -10px; margin-left: 280px; text-align: justify; text-indent: 50px; padding-right: 65px;">This is to certify that <input class="inp" type="text" id="fullname" name="fullname" style="user-select:none;"  width="auto">, of legal age, Filipino and a bonafide resident of <input class="inp" type="text" id="address" name="address" width="auto"> District II, Quezon City.</p>
												<br>
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 65px;">Further certify that above-named subject is of good moral character and has good community standing, but unfortunately belongs to the indigent family in this Community</p>
												<br>
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 65px;">This certification is issued upon the request of the above-named party as supporting document needed for <input class="inp borderb" type="text" id="purpose" name="purpose" width="auto">.</p>
												<br>
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 65px;">Issued this <input class="inp" type="text" id="date_issue" name="date_issue" width="auto"> of December 2021, Quezon City.</p>
												<input style="visibility: hidden;" type="text" id="indigency_id" name="indigency_id" >
												<br>
												<br>
												<br>
												<div style="display: auto; float: right; text-align:center; padding-right: 65px;" class="side_information">
													<p>MANUEL A. CO</p>
													<p>Punong Barangay</p>
												</div>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<div >
													<div style="margin-left: 255px; font-size: 13px;">
														<em>Not valid without Barangay Seal</em>
														<p>CONTACT PERSON. MARK LEAN CRUZ</p>
													</div>
													<div style="margin-top: -45px; margin-left: 655px; font-size: 13px; margin-right: 65px; text-align: right;" class="side_information">
														<p> www.brgycommonwealth.com.ph</p>
														<p> @maningningnacommonwealth</p>
														<p> @BrgyCommonwealth</p>
														<p> maningning.commonwealth@gmail.com</p>
													</div>
												</div>
											</div>
										</div>
									</section>
								</fieldset>
							</div>
						</div>
						<button class="permitbtn" style="float: right; padding: 5px 5px 5px 5px;" onclick="window.print(); ">
							<i class="bx bx-save saveicon"></i>
						</button>
				</div>
			</section>
			
			<script>
			function myFunction(hidedocument) {
				var x = document.getElementById(hidedocument);
					if (x.className.indexOf("document-show") == -1) {
					x.className += " document-show";
					} else { 
						x.className = x.className.replace(" document-show", "");
					}
				}
				
			var table = document.getElementById('table');
				
				for (var i = 1; i < table.rows.length; i++)
				{
					table.rows[i].onclick = function()
					{
						document.getElementById("indigency_id").value = this.cells[0].innerHTML;
						document.getElementById("fullname").value = this.cells[1].innerHTML;
						document.getElementById("address").value = this.cells[2].innerHTML;
						document.getElementById("purpose").value = this.cells[3].innerHTML;
						document.getElementById("date_issue").value = this.cells[4].innerHTML;			
					};
				}
			</script>
	</body>
</html>
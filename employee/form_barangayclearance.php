<?php
session_start();
include "../db/conn.php";
include "../db/user.php";
include "../db/documents.php";


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
    <link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/documentprint_styles.css">

	<!--Font Styles-->
	<link rel="icon" type="/image/png" href="../img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Barangay Clearance </title>

	 <style>
	.preview{font-size:13px; padding-left:50px; inline-block: none;}
		.previewbtn{width: 350px; height: 90px; margin: 25px; width: calc(100% - 125px); transition: all 0.5s ease; } 
		.preview_txtbx{width: 350px; margin-bottom: 15px;}
		
		.respersonal_inf{border-radius: 5px; user-select:none; background:#b5f5c6; padding: 50px 50px 50px 50px}
		.personal_inf{padding-bottom: 5px;}
		.viewdetail{user-select: auto}
		
		.w3-section{margin-top:16px!important;margin-bottom:16px!important}
		.w3-light-grey,.w3-hover-light-grey:hover{color:#000!important;background-color:#f1f1f1!important}
		
		.w3-button:hover{color:#000!important;background-color:#ccc!important; width:100%;}
		.w3-block{display:block;width:100%}
		.w3-hide{display:none!important}
		.w3-show{display:block!important}
		 p.content{width: 450px; height: 300px;}
		 
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
						<h5>Barangay Clearance
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
                        <label class="select__select" for="">Filter by: 
                            <select class="selection">
                                <option disabled>--Select--</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="decline">Decline</option>
                            </select>
								<i class='bx bx-sort'></i>
                        </label>
                </div> 

			  <div class="reg_table">
							<table class="content-table "  id="table">
							<?php
								include "../db/conn.php";
								include "../db/user.php";
								
								$mquery = "SELECT * FROM barangayclearance";
								$countn = $db->query($mquery);
							?>
								<thead>
									<tr class="t_head">
										<th>File No</th>
										<th>Full name</th>
										<th>Age</th>
										<th>Status</th>
										<th>Nationality</th>
										<th>Address</th>
										<th>Purpose</th>
										<th>Date Issued</th>
										<th>CTC no</th>
										<th>Issued at</th>
										<th>Issued on</th>
										<th>Precint no</th>
										<th>ID</th>
										<th>Approved by</th>
										<th>Action</th>
									</tr>                       
								</thead>
								<?php
								foreach($countn as $data2) 
								{
								?>
								<tr class="table-row">
									<td><?php echo $data2 ['clearance_id']; ?></td>
									<td><?php echo $data2 ['full_name']; ?></td>
									<td><?php echo $data2 ['age']; ?></td>
									<td><?php echo $data2 ['status']; ?></td>
									<td><?php echo $data2 ['nationality']; ?></td>
									<td><?php echo $data2 ['address']; ?></td>
									<td><?php echo $data2 ['purpose']; ?></td>
									<td><?php echo $data2 ['date_issued']; ?></td>
									<td><?php echo $data2 ['ctc_no']; ?></td>
									<td><?php echo $data2 ['issued_at']; ?></td>
									<td><?php echo $data2 ['date_issued']; ?></td>
									<td><?php echo $data2 ['precint_no']; ?></td>
									<td><a style="color: blue;">view id</a></td>
									<td><input class="form-control" style="width: 135px; font-size: 13px;" placeholder="Approved by.."></input></td>
									<td><button>Approve</button></td>
								</tr>	
							
							<?php
							}
							?>
							</table>
						</div>

						<div class="document-light-grey document-section">
						<button onclick="myFunction('hidedocument')" class="document-button document-block documentbtn">Show more</button>
						<div id="hidedocument"	 class="document-hide">
							<div id="indigency_file" style="display: auto; ">
								<fieldset >
									<legend class="indigency">Barangay Clearance</legend>
									<section class="barangay_indigency">
										<div style="padding-top: 15px; width: 965px;  height: 344px;">
											<div style="display: flex;">
												<img style="float: left; width: 130px; height: 125px; margin-left: 35px;" src="../img/QCSeal.png">
													<div style="margin-left: 120px;">
														<p class="center_description" style="font-size: 17px; padding-left: 75px;">Republic of the Philippines</p>
														<p class="center_description" style="font-size: 15px; padding-left: 95px;">District II, Quezon City</p>
														<p class="center_description" style=" font-size: 19px; padding-left: 35px; padding-bottom: 15px; ">BARANGAY COMMONWEALTH</p>
														<p class="center_description" style="font-size: 20px; color: red;">OFFICE OF THE BARANGAY CAPTAIN</p>
													</div>
												<img style=" display: flex; float: right;  margin-left: 135px; " class="commonwealthlogo" src="../img/Brgy-Commonwealth.png">
											</div>
											<div>
												<div style="margin-top:5px; border-top: 2px solid #000000; width: 1220px; width: calc(100%  - 70px); transition: all 0.5s ease;"></div>
												<div style="border-left: 2px solid #000000; height: 1100px; margin-left: 245px;"></div>
													<div  style="position: inherit; margin-top: -1075px;">
														<p style="font-size: 21px; line-height: 0.5;">MANUEL A. CO</p>
														<em>Punong Barangay</em>
														<p style="margin-left: 730px; margin-top: -45px;">FILE NO.: <input class="inp" name="clearance_id" id="clearance_id" style="padding-left: 15px; width: 155px; font-size: 14px" placeholder="File no."></p>
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
												<div style="margin-left: 50px;">
													<h4 style="margin-top: -115px; margin-left: 420px; color: red;">BARANGAY CLEARANCE</h4>
												</div>
												<br>
												<br>
												<p style="display: auto; margin-top: -10px; margin-left: 280px; text-align: justify; text-indent: 50px; padding-right: 95px; word-spacing: 3.5px;">This is to certify that <strong>CLEARANCE</strong> is granted to <input class="inp borderb" style="width: 100%; padding-left: 15px;" type="text" id="full_name" name="full_name" width="auto" placeholder="FULL A. NAME"><input class="inp borderb" style="width: 10%; padding-left: 15px;" type="text" id="age" name="age" width="auto" placeholder="AGE"> years old <input class="inp borderb" style="width: 20%; padding-left: 25px;" type="text" id="status" name="status" width="auto" placeholder="STATUS">,<input class="inp borderb" style="width: 20%; padding-left: 25px;" type="text" id="nationality" name="nationality" width="auto" placeholder="NATIONALITY"> and a bonafide resident at No. <input class="inp borderb" style="width: 90%; padding-left: 25px;" type="text" id="address" name="address" width="auto" placeholder="ADDRESS">, Barangay Commonwealth, Quezon City, possesses with good moral character has no derogatory record in this office, law abiding citizen and reliable.</p>
												<br>
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 95px;">This certification is issued upon the request of the above-named party for <input class="inp borderb" style="width: 80%; padding-left: 55px;" type="text" id="purpose" name="purpose" width="auto" placeholder="PURPOSE"></p>
												<br>
												
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 65px;">Issued this <input class="inp borderb" type="text" id="date_issue" name="date_issue" placeholder="DAY" style="width:35px; padding-left: 5px;"> day of <input class="inp  borderb" style="padding-left: 10px; width:105px;" type="text" id="date_issue" name="date_issue" placeholder="MONTH"> <input class="inp  borderb" style="padding-left: 10px; width:55px;" type="text" id="date_issue" name="date_issue" placeholder="YEAR">, Quezon City.</p>
												<input style="visibility: hidden;" type="text" id="indigency_id" name="indigency_id" >
												<br>
												<div style="display: auto; float: left; text-align:center; padding-left: 290px;" class="side_information">
													<p><input class="inp  borderb"></p>
													<p>Signature of Applicant</p>
													
													<div style="text-align: left; margin-top: 45px;"> 
														CTC NO.: <input class="inp  borderb" style="width: 75px;" name="ctc_no" id="ctc_no"><br>
														Issued AT: <input class="inp  borderb" style="width: 215px;" name="issued_at" id="issued_at"><br>
														ISSUED ON: <input class="inp  borderb"  style="width: 215px;" name="date_issued" id="date_issued"><br>
														PRECINT NO.: <input class="inp  borderb" style="width: 75px;" name="precint_no" id="precint_no"><br>
													</div>
												</div>
												
												<div style="padding-right: 105px;">
												<img src="../img/1.jpeg" style="width: 140px; height: 140px; float: right; ">
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
														<div style="float: right; text-align: center; padding-right: 95px; margin-top: -45px;">
															<h5>MANUEL A. CO</h5>
															<p>Punong Barangay</p>
														</div>
														<em>Not valid without Barangay Seal</em>
														<p>CONTACT PERSON. MARK LEAN CRUZ</p>
														<br>
														<p>NOTE: This clearance is valid for a period of <br> Six (6) months from date of issue.</p>
													</div>
													<div style="margin-top: -70px; margin-left: 655px; font-size: 13px; margin-right: 65px; text-align: right;" class="side_information">
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

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			
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
						document.getElementById("clearance_id").value = this.cells[0].innerHTML;
						document.getElementById("full_name").value = this.cells[1].innerHTML;
						document.getElementById("age").value = this.cells[2].innerHTML;
						document.getElementById("status").value = this.cells[3].innerHTML;
						document.getElementById("nationality").value = this.cells[4].innerHTML;
						document.getElementById("address").value = this.cells[5].innerHTML;
						document.getElementById("purpose").value = this.cells[6].innerHTML;
						document.getElementById("ctc_no").value = this.cells[8].innerHTML;
						document.getElementById("issued_at").value = this.cells[9].innerHTML;
						document.getElementById("date_issued").value = this.cells[10].innerHTML;
						document.getElementById("precint_no").value = this.cells[11].innerHTML;						
					};
				}
			</script>
	</body>
</html>
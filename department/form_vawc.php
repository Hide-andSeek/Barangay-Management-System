<?php
session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
}
require '../db/conn.php';
?>
<?php
	$user = '';

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
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
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> VAWC Dashboard </title>
	 
	 
	 <style>
		.documentbtn{font-size: 15px;width: 200px; height: 100px; padding: 40px 40px 40px 40px; margin-bottom: 25px}
		.documentbtn:hover{background-color: gray;color: white;}
		.document_section{margin-top: 105px;margin-left: 35px; margin-right: 35px;}
		.previewbtn{width: 350px; height: 90px; margin: 25px; width: calc(100% - 125px); transition: all 0.5s ease; } 
		.document-section{margin-top:16px!important;margin-bottom:16px!important}
		.document-light-grey,.document-hover-light-grey:hover{border-top-right-radius: 20px;border-top-left-radius: 20px; border-bottom-right-radius: 20px;border-bottom-left-radius: 20px; color:#000!important;}

		.bgcolor{background-color:#ccc!important; }
		.document-button:hover{color:#000!important;background-color:#ccc!important; width:100%;}
		.document-block{display:block;width:100%}
		.document-hide{display:none!important}
		.document-show{display:block!important}
		p.content{width: 450px; height: 300px;}
		 
		div.align-box{padding-top: 23px; display: flex; align-item: center;}
		.box-report{
			width: 300px;
			font-size: 14px;
			border: 4px solid #7dc748;
			padding: 30px;
			margin: 10px;
			border-radius: 5px;
			align-items: center;

		}
		
		 i.menu{color: #fff}
			 i.id{color: #a809b0}
			 i.clearance{color: #1cb009}
			 i.sms{color: #478eff}
			 i.blotter-com{color: #9e0202}
			 i.indigency{color: #0218bd}
			 i.permit{color: #e0149c}
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
			  <a class="side_bar" href="vawcdashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			  <li>
			   <a class="side_bar" href="vawc_ongoing.php">
				 <i class='bx bx-user-circle'></i>
				 <span class="links_name">Ongoing Case</span>
			   </a>
			   <span class="tooltip">Ongoing Case</span>
			 </li>
			 
			 <li>
			   <a class="side_bar" href="vawc_pending.php">
				 <i class='bx bx-user'></i>
				 <span class="links_name">Pending Case</span>
			   </a>
			   <span class="tooltip">Pending Case</span>
			 </li>

			 <li>
			   <a class="side_bar" href="vawc_closed.php">
				 <i class='bx bx-user-check'></i>
				 <span class="links_name">Closed Case</span>
			   </a>
			   <span class="tooltip">Closed Cased</span>
			 </li>

			 <li>
			   <a class="side_bar" href="vawc_total.php">
				 <i class='bx bx-user-pin'></i>
				 <span class="links_name">Total Cases</span>
			   </a>
			   <span class="tooltip">Total Cases</span>
			 </li>
			  
			 <li>
			   <a class="side_bar" href="vawc_sms.php">
				 <i class='bx bx-mail-send sms'></i>
				 <span class="links_name">SMS</span>
			   </a>
			   <span class="tooltip">SMS</span>
			 </li>
												
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="../img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id="">User Type: <?php echo $dept; ?></div>
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
						<h5>Dashboard
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			  
			 <br> 
			 
	 <div>
		<div class="w3-row-padding w3-margin-bottom">
			<a href="vawc_total.php">
			<div class="w3-quarter">
			<div class="w3-container w3-red w3-padding-16">
				<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';

					$query = "SELECT resident_id FROM accreg_resident ORDER BY resident_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					
					?>
				</div>
				<div class="w3-clear"></div>
				<h4>Total Cases</h4>

			</div>
			</div>
	
	</a>

			<div class="w3-quarter">
			<div class="w3-container w3-blue w3-padding-16">
				<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';

					$query = "SELECT barangay_id FROM barangayid ORDER BY barangay_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
		
				</div>
				<div class="w3-clear"></div>
				<h4>Ongoing Cases</h4>
			</div>
			</div>

			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-padding-16">
				<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT indigency_id FROM certificateindigency ORDER BY indigency_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Pending Cases</h4>
			</div>
			</div>
			<div class="w3-quarter">
			<div class="w3-container w3-orange w3-text-white w3-padding-16">
				<div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT indigency_id FROM certificateindigency ORDER BY indigency_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Closed Cases</h4>
			</div>
			</div>
		</div>
	</div>


	<div class="document-light-grey document-section">
			<button onclick="myFunction('monday')" id="monday1" class="document-button document-block documentbtn form-control documentbtn bgcolor">
				<h5><i class="bx bx-receipt"></i>
					Monday</h5></button>
						<div id="monday" class="document-hide">
							<div class="preview">
							<table class="content-table table_indigency"  id="table">
						
						<?php
						$mquery = $db->prepare("SELECT * FROM blotterdb WHERE blotter_id ORDER BY blotter_id ASC");
						$mquery ->execute();
						$countn = $mquery->fetchAll();
						?>
						<thead>
							<tr class="t_head">
								<th>Complaint ID</th>
								<th>Fullname</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Incident Address</th>
								<th>Name of violaters</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Relationship</th>
								<th>Address</th>
								<th>Witnesses</th>
								<th>Complaints</th>
								<th>ID Type</th>
								<th>ID Image</th>
								<th>Action</th>
							</tr>                       
						</thead>
						<?php
						foreach($countn as $data) 
						{
						?>
							<tr class="table-row">
								<td><?php echo $data ['blotter_id']; ?></td>
								<td><?php echo $data ['n_complainant']; ?></td>
								<td><?php echo $data ['comp_age']; ?></td>
								<td><?php echo $data ['comp_gender']; ?></td>
								<td><?php echo $data ['comp_address']; ?></td>
								<td><?php echo $data ['inci_address']; ?></td>
								<td><?php echo $data ['n_violator']; ?></td>
								<td><?php echo $data ['violator_age']; ?></td>
								<td><?php echo $data ['violator_gender']; ?></td>
								<td><?php echo $data ['relationship']; ?></td>
								<td><?php echo $data ['violator_address']; ?></td>
								<td><?php echo $data ['witnesses']; ?></td>
								<td><?php echo $data ['complaints']; ?></td>
								<td><?php echo $data ['id_type']; ?></td>
								<td><img src="upload/<?php echo $data ['id_image']; ?>" title="<?php echo $data ['id_name']; ?>" width="90" height="90"/></td>
								<td>
									<a class="btn btn-success btn-sm" data-toggle="modal" style="font-size: 13px; width: 100px;" onclick="document.getElementById('process_<?php echo $data['blotter_id']; ?>').style.display='block'"><i class="bx bx-edit"></i>Process</a>
								</td>
							</tr>	
					
												
						<?php
						}
						?>
					</table>
							</div>
						</div>
		</div>

		<div class="document-light-grey document-section">
			<button onclick="myFunction('tuesday')" id="tuesday1" class="document-button document-block documentbtn form-control documentbtn bgcolor">
				<h5><i class="bx bx-receipt"></i>
					Tuesday</h5></button>
						<div id="tuesday" class="document-hide">
							<div class="preview">
							<table class=" table_indigency"  id="table">
						
						<?php
						$mquery = $db->prepare("SELECT * FROM blotterdb WHERE blotter_id ORDER BY blotter_id ASC");
						$mquery ->execute();
						$countn = $mquery->fetchAll();
						?>
						<thead>
							<tr class="t_head">
								<th>Complaint ID</th>
								<th>Fullname</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Incident Address</th>
								<th>Name of violaters</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Relationship</th>
								<th>Address</th>
								<th>Witnesses</th>
								<th>Complaints</th>
								<th>ID Type</th>
								<th>ID Image</th>
								<th>Action</th>
							</tr>                       
						</thead>
						<?php
						foreach($countn as $data) 
						{
						?>
							<tr class="table-row">
								<td><?php echo $data ['blotter_id']; ?></td>
								<td><?php echo $data ['n_complainant']; ?></td>
								<td><?php echo $data ['comp_age']; ?></td>
								<td><?php echo $data ['comp_gender']; ?></td>
								<td><?php echo $data ['comp_address']; ?></td>
								<td><?php echo $data ['inci_address']; ?></td>
								<td><?php echo $data ['n_violator']; ?></td>
								<td><?php echo $data ['violator_age']; ?></td>
								<td><?php echo $data ['violator_gender']; ?></td>
								<td><?php echo $data ['relationship']; ?></td>
								<td><?php echo $data ['violator_address']; ?></td>
								<td><?php echo $data ['witnesses']; ?></td>
								<td><?php echo $data ['complaints']; ?></td>
								<td><?php echo $data ['id_type']; ?></td>
								<td><img src="upload/<?php echo $data ['id_image']; ?>" title="<?php echo $data ['id_name']; ?>" width="90" height="90"/></td>
								<td>
									<a class="btn btn-success btn-sm" data-toggle="modal" style="font-size: 13px; width: 100px;" onclick="document.getElementById('process_<?php echo $data['blotter_id']; ?>').style.display='block'"><i class="bx bx-edit"></i>Process</a>
								</td>
							</tr>	
					
												
						<?php
						}
						?>
					</table>
							</div>
						</div>
		</div>

		<div class="document-light-grey document-section">
			<button onclick="myFunction('wednesday')" id="wednesday1" class="document-button document-block documentbtn form-control documentbtn bgcolor">
				<h5><i class="bx bx-receipt"></i>
					Wednesday</h5></button>
						<div id="wednesday" class="document-hide">
							<div class="preview">
							<form method="POST" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend>For Business</legend>
																<div class="form-group">
																	<label for="dateissued">Date issued: </label>
																	<input required type="date" class="form-control form-text" id="dateissued" name="dateissued">
																</div><br>
																
																<div class="form-group">
																	<label for="selection">Please Select:</label>
																	<span>
																		Renewal <input required type="radio" value="renewal" id="renewal" name="selection">
																		New <input required type="radio" value="new"  id="new" name="selection">
																	</span>
																</div><br>
																
																<div class="form-group">
																	<label for="ownername">Owner's Name: </label>
																	<input required type="text" class="form-control form-text" id="ownername" name="ownername" placeholder="Please write your Full name">
																</div><br>
																
																<div class="form-group">
																	<label for="businessname">Business Name: </label>
																	<input required type="text" class="form-control form-text" id="businessname" name="businessname">
																</div><br>	
																
																 <div class="form-group">
																	<label for="businessaddress">Business Address: </label>
																	<input required type="text" class="form-control form-text" id="businessaddress" name="businessaddress">
																</div></br>
																
																<div class="form-group">
																	<label for="plateno">Plate No.: </label>
																	<input type="number" class="form-control number form-text" id="plateno" name="plateno">
																</div><br>
																
																<div class="form-group">
																	<label for="contactno">Contact No.: </label>
																	<input type="number" class="form-control number form-text" id="contactno" name="contactno">
																</div><br>

																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="emailadd" name="emailadd">
																</div><br>

																<div class="form-group">
																	<label for="file">Attach Valid ID: <i class="red">*</i></label>
																	<input type='file' name='files[]' required/>
																</div>

															</fieldset>
														</div>
												</section>
													<button type="submit" name="permitBtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
										  </form> 
							</div>
						</div>
		</div>

		<div class="document-light-grey document-section">
			<button onclick="myFunction('thursday')" id="thursday1" class="document-button document-block documentbtn form-control documentbtn bgcolor">
				<h5><i class="bx bx-receipt"></i>
					Thursday</h5></button>
						<div id="thursday" class="document-hide">
							<div class="preview">
								<form method="POST" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend>For Business</legend>
																<div class="form-group">
																	<label for="dateissued">Date issued: </label>
																	<input required type="date" class="form-control form-text" id="dateissued" name="dateissued">
																</div><br>
																
																<div class="form-group">
																	<label for="selection">Please Select:</label>
																	<span>
																		Renewal <input required type="radio" value="renewal" id="renewal" name="selection">
																		New <input required type="radio" value="new"  id="new" name="selection">
																	</span>
																</div><br>
																
																<div class="form-group">
																	<label for="ownername">Owner's Name: </label>
																	<input required type="text" class="form-control form-text" id="ownername" name="ownername" placeholder="Please write your Full name">
																</div><br>
																
																<div class="form-group">
																	<label for="businessname">Business Name: </label>
																	<input required type="text" class="form-control form-text" id="businessname" name="businessname">
																</div><br>	
																
																 <div class="form-group">
																	<label for="businessaddress">Business Address: </label>
																	<input required type="text" class="form-control form-text" id="businessaddress" name="businessaddress">
																</div></br>
																
																<div class="form-group">
																	<label for="plateno">Plate No.: </label>
																	<input type="number" class="form-control number form-text" id="plateno" name="plateno">
																</div><br>
																
																<div class="form-group">
																	<label for="contactno">Contact No.: </label>
																	<input type="number" class="form-control number form-text" id="contactno" name="contactno">
																</div><br>

																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="emailadd" name="emailadd">
																</div><br>

																<div class="form-group">
																	<label for="file">Attach Valid ID: <i class="red">*</i></label>
																	<input type='file' name='files[]' required/>
																</div>

															</fieldset>
														</div>
												</section>
													<button type="submit" name="permitBtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
										  </form> 
							</div>
						</div>
		</div>

		<div class="document-light-grey document-section">
			<button onclick="myFunction('friday')" id="friday1" class="document-button document-block documentbtn form-control documentbtn bgcolor">
				<h5><i class="bx bx-receipt"></i>
					Friday</h5></button>
						<div id="monday" class="document-hide">
							<div class="preview">
								<form method="POST" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend>For Business</legend>
																<div class="form-group">
																	<label for="dateissued">Date issued: </label>
																	<input required type="date" class="form-control form-text" id="dateissued" name="dateissued">
																</div><br>
																
																<div class="form-group">
																	<label for="selection">Please Select:</label>
																	<span>
																		Renewal <input required type="radio" value="renewal" id="renewal" name="selection">
																		New <input required type="radio" value="new"  id="new" name="selection">
																	</span>
																</div><br>
																
																<div class="form-group">
																	<label for="ownername">Owner's Name: </label>
																	<input required type="text" class="form-control form-text" id="ownername" name="ownername" placeholder="Please write your Full name">
																</div><br>
																
																<div class="form-group">
																	<label for="businessname">Business Name: </label>
																	<input required type="text" class="form-control form-text" id="businessname" name="businessname">
																</div><br>	
																
																 <div class="form-group">
																	<label for="businessaddress">Business Address: </label>
																	<input required type="text" class="form-control form-text" id="businessaddress" name="businessaddress">
																</div></br>
																
																<div class="form-group">
																	<label for="plateno">Plate No.: </label>
																	<input type="number" class="form-control number form-text" id="plateno" name="plateno">
																</div><br>
																
																<div class="form-group">
																	<label for="contactno">Contact No.: </label>
																	<input type="number" class="form-control number form-text" id="contactno" name="contactno">
																</div><br>

																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="emailadd" name="emailadd">
																</div><br>

																<div class="form-group">
																	<label for="file">Attach Valid ID: <i class="red">*</i></label>
																	<input type='file' name='files[]' required/>
																</div>

															</fieldset>
														</div>
												</section>
													<button type="submit" name="permitBtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
										  </form> 
							</div>
						</div>
		</div>
		<script src="js/resident.js"></script>	
		
		
				<script>
				 //For Vawc

				 function myFunction(monday) {
        var x = document.getElementById(monday);
            if (x.className.indexOf("document-show") == -1) {
                x.className += " document-show";
                } else { 
                    x.className = x.className.replace(" document-show", "");
                }
                }
    function myFunction(tuesday) {
        var x = document.getElementById(tuesday);
            if (x.className.indexOf("document-show") == -1) {
                x.className += " document-show";
                } else { 
                    x.className = x.className.replace(" document-show", "");
                }
                }
    function myFunction(wednesday) {
        var x = document.getElementById(wednesday);
            if (x.className.indexOf("document-show") == -1) {
                x.className += " document-show";
                } else { 
                    x.className = x.className.replace(" document-show", "");
                }
                }
    function myFunction(thursday) {
        var x = document.getElementById(thursday);
            if (x.className.indexOf("document-show") == -1) {
                x.className += " document-show";
                } else { 
                    x.className = x.className.replace(" document-show", "");
                }
                }
    function myFunction(friday) {
        var x = document.getElementById(friday);
            if (x.className.indexOf("document-show") == -1) {
                x.className += " document-show";
                } else { 
                    x.className = x.className.replace(" document-show", "");
                }
                }
				</script>
			</section>
	</body>
</html>
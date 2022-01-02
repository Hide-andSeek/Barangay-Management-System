<?php session_start();
if(!isset($_SESSION["employee_no"])){
	header("location: ../employee/form_businesspermit.php");
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
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Business Permit </title>
	 
	 
	 <style>
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
		
		.content-table{max-height: 300px;}
		
		
		.preview{font-size:13px; padding-left:50px; inline-block: none;}
		.previewbtn{width: 350px; height: 90px; margin: 25px; width: calc(100% - 125px); transition: all 0.5s ease; } 
		.preview_txtbx{width: 350px; margin-bottom: 15px;}
		
		.respersonal_inf{border-radius: 5px; user-select:none; background:#b5f5c6; padding: 25px 25px 25px 25px; margin-top: 25px;}
		.personal_inf{width: 300px; padding-bottom: 5px; border: none;}
		.viewdetail{user-select: auto;}
	
		 p.content{width: 450px; height: 300px;}
	 </style>
   </head>
	<body class="body">
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
					 <div class="job" id="">Administrator</div>
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
						<h5>Business Permit
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
                </div> 
			
			<div class="reg_table">
						<table class="content-table"  id="table">
						
							<?php
							include "../db/conn.php";
							include "../db/users.php";
							
							$miquery = "SELECT * FROM businesspermit";
							$countnu = $db->query($miquery);
							
							?>

							<thead>
								<tr class="t_head">
									<th>Permit ID</th>
									<th>Date</th>
									<th>Selection</th>
									<th>Owner's name</th>
									<th>Business Name</th>
									<th>Business Address</th>
									<th>Plate No</th>
									<th>Contact no</th>
									<th>Front ID</th>
									<th>Back ID</th>
									<th>Approved by</th>
									<th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countnu as $data1) 
							{
							?>
								<tr class="table-row">
									<td><?php echo $data1 ['businesspermit_id']; ?></td>
									<td><?php echo $data1 ['dateissued']; ?></td>
									<td><?php echo $data1 ['selection']; ?></td>
									<td><?php echo $data1 ['ownername']; ?></td>
									<td><?php echo $data1 ['businessname']; ?></td>
									<td><?php echo $data1 ['businessaddress']; ?></td>
									<td><?php echo $data1 ['plateno']; ?></td>
									<td><?php echo $data1 ['contactno']; ?></td>
									<td><a style="color: blue;">view id</a></td>
									<td><a style="color: blue;">view id</a></td>
									<td><input class="form-control" style="width: 135px; font-size: 13px;" placeholder="Approved by.."></input></td>
									<td><button>Approve</button></td>
								</tr>	
							
							<?php
							}
							?>
						</table>
							<!--
								<input type="button" id="tst" value="ok" onclick="fnselect()"/>
						     -->
			</div>
							
						<div class="user-information print_businesspermit" >
							<div>
								<fieldset class="respersonal_inf">
									<legend>For Business </legend>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div>
													<label class="col-lg-3 col-md-3 col-sm-3">Business Permit ID:</label> 
													<input type="text" name="businesspermit_id" id="businesspermit_id" class="personal_inf col-lg-9 col-md-9 col-sm-9 form-control" placeholder="Resident ID">
											</div>
											<div>	
													Date: 
													<input type="text" name="dateissued" id="dateissued" class="personal_inf col-lg-9 col-md-9 col-sm-9 form-control" placeholder="Date">
											</div>
											<div>
													Please Check: 
													<input type="text" name="selection" id="selection" class="personal_inf col-lg-9 col-md-9 col-sm-9 form-control" placeholder="Selection">
											</div>
											<div>
													Owners Name: 
													<input type="text" name="ownername" id="ownername" class="personal_inf col-lg-9 col-md-9 col-sm-9 form-control" placeholder="Owner's Name">
											</div>
											<div>
													Business Name:
													<input type="text" name="businessname" id="businessname" class="personal_inf col-lg-9 col-md-9 col-sm-9 form-control" placeholder="Business Name" >
											</div>
											<div>
												<div>
														Business Address: 
														<input type="text" name="businessaddress" id="businessaddress" class="personal_inf col-lg-9 col-md-9 col-sm-9 form-control" placeholder="Business Address">
												</div>	
												<div>
														Plate No: 
														<input type="text" name="plateno" id="plateno" class="personal_inf col-lg-9 col-md-9 col-sm-9 form-control" placeholder="_________">
												</div>	
												<div>
														Amount: 
														<input type="number" class="personal_inf col-lg-9 col-md-9 col-sm-9 form-control" placeholder="_________">
												</div>	
												<div>
														Contact No: 
														<input type="text" name="contactno" id="contactno" class="personal_inf col-lg-9 col-md-9 col-sm-9 form-control" placeholder="Contact No">
												</div>
											</div>
										</div>
								</fieldset>
							</div>
						</div>
						<button class="permitbtn" style="margin-left: 50px; margin-top: 5px;" onclick="window.print(); ">
							<i class="bx bx-save"></i>
							Print
						</button>
										
			</section>
			<script>
				var table = document.getElementById('table');
				
				for (var i = 1; i < table.rows.length; i++)
				{
					table.rows[i].onclick = function()
					{
						document.getElementById("businesspermit_id").value = this.cells[0].innerHTML;
						document.getElementById("dateissued").value = this.cells[1].innerHTML;
						document.getElementById("selection").value = this.cells[2].innerHTML;
						document.getElementById("ownername").value = this.cells[3].innerHTML;
						document.getElementById("businessname").value = this.cells[4].innerHTML;
						document.getElementById("businessaddress").value = this.cells[5].innerHTML;
						document.getElementById("plateno").value = this.cells[6].innerHTML;
						document.getElementById("contactno").value = this.cells[7].innerHTML;				
					};
				}
			</script>
	</body>
</html>

<?php session_start();
if(!isset($_SESSION["official_name"])){
	header("location: users/captain/admin_management.php");
}
?>

<?php
include "db/conn.php";
include "db/captain.php";
include "db/users.php";
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
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Post - Announcement </title>
	 
	 
	 <style>
		 *{font-size: 13px;}

		.adminmanagement-modal{
            display: none; 
            position: absolute; 
            z-index: 999; 
            left: 0;
            top: 30;
            width: 100%; 
            height: 100%; 
			overflow-x: hidden; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 5px; 
			
        }
	
		.modal-contentadmin {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
		    height: 55%;
            width: 70%;
		
            border-radius: 5px;
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
		
		
		.closebtn{margin-right: 15px; font-stretch: expanded;}
		.closebtn:hover{color:red; }
		.description{ height: 50px; font-size: 13px;}

		.addannounce{margin-top: 340px; margin-left: 25px; font-size: 13px;}
		.fileupload{font-size: 13px; margin-left: 15px;}
	 </style>
   </head>
	<body onload="display_ct()">
		<!-- Side Navigation Bar-->
		   <div class="sidebar captain_sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Captain</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
				<li>
					<a class="side_bar" href="captaindashboard.php">
						<i class='bx bx-category-alt dash'></i>
						<span class="links_name">Dashboard</span>
					</a>
					 <span class="tooltip">Dashboard</span>
			 	</li>

			  <li>
					<a class="side_bar" href="adminmanagement.php">
						<i class='bx bx-user-circle admin'></i>
						<span class="links_name">Admin Management</span>
					</a>
					<span class="tooltip">Admin Management</span>
			  </li>	

				<li>
				  <a class="side_bar" href="employeemanagement.php">
					  <i class='bx bx-group employee'></i>
					  <span class="links_name">Employee Management</span>
					</a>
					 <span class="tooltip">Employee Management</span>
				  </li>
			 
				<li>
				 <a class="side_bar" href="brgyofficialsmanagement.php">
					  <i class='bx bxs-user-detail official'></i>
					  <span class="links_name">Brgy Official Management</span>
					</a>
					 <span class="tooltip">Brgy Official Management</span>
				</li>

				<li>
				 <a class="side_bar" href="residentcensus.php">
					  <i class='bx bxs-group census'></i>
					  <span class="links_name">Resident Census</span>
					</a>
					 <span class="tooltip">Resident Census</span>
				</li>

				<li>
				 <a class="side_bar" href="postannouncement.php">
					  <i class='bx bx-news iannouncement'></i>
					  <span class="links_name">Post Announcement</span>
					</a>
					 <span class="tooltip">Post Announcement</span>
				</li>
				
				<li>
				   <a class="side_bar" href="settings.php">
					 <i class='bx bx-cog' ></i>
					 <span class="links_name">Setting</span>
				   </a>
				   <span class="tooltip">Setting</span>
				 </li>
			 
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" >
				   <div class="name_job">
				    
					 <div>Employee</div>
					 <div class="job" id="">Employee</div>
				   </div>
				 </div>
				 <a href="captainlogout.php">
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
						<h5>Post Announcement
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
						<!--
						<label class="select__select" for="">Filter by: 
                            <select class="selection">
                                <option disabled>--Select--</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="decline">Decline</option>
                            </select>
								<i class='bx bx-sort'></i>
                        </label>
						-->
                </div>
			
				

                    <div class="reg_table emp_tbl">
						<table class="content-table">
						
						<?php
							include "db/conn.php";
							include "db/captain.php";
							
							$mquery = "SELECT * FROM announcement";
							$count = $db->query($mquery)
						?>
						
							<thead>
								<tr class="t_head">
									<th>Announcement ID</th>
									<th>Description</th>
                                    <th>Image Name</th>
                                    <th>Announcement Image</th>									
									<th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($count as $data) 
							{
							?>
							<tr class="table-row">
									<td><?php echo $data ['announcementid']; ?></td>
									<td ><?php echo $data ['description']; ?></td>
									<td><?php echo $data ['announcement_imgname']; ?></td>
									<td><?php echo $data ['announcement_image']; ?></td>
									<td>
										<button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Edit</button>
										<button class="form-control btn-danger" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;"><i class="bx bx-edit"></i>Delete</button>
									</td>
								</tr>	
								<div id="id2" class="adminmanagement-modal modal" >
											<div class="modal-contentadmin  animate" >
												<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
														<div id="Login" class="login_container form">
																<div class="information">   
																	<span type="submit" onclick="document.getElementById('id2').style.display='none'" class="closebtn" style="float: right">
																	X
																	</span>  
																</div>

																<div class="form-control inputtext information" style="text-align:center; color: white; background: green; border-top-right-radius: 20px; border-top-left-radius: 20px;">
																Edit Announcement
																</div>

																<div class="form-group">
																	<label for="file">Attach Photo<i class="red">*</i></label>
																	<input type='file' name='files[]' id='files 'class="form-control fileupload" required/>
																</div>
																<div class="information">
																	<label for="file" class="fileupload">Headline<i class="red">*</i></label>
																	<input type="text" class="form-control inputtext " name="headline" id="headline">
																</div>
																<div class="information">
																	<label for="file" class="fileupload">Add Description<i class="red">*</i></label>
																	<textarea required class="form-control inputtext control-label description" id="description" name ="description" type="text"  placeholder="Description"></textarea>
																</div>
																
																<div class="information">   
																	<button type="submit" id="announcebtn" name="announcebtn" class="inputtext submtbtn">
																		<i class="bx bx-t67check"></i>Submit
																	</button>  
																</div>
														</div> 	
													</form>
											</div>
									</div>
							<?php
							}
							?>
						
						</table>
							<!--
								<input type="button" id="tst" value="ok" onclick="fnselect()"/>
						     -->
						</div>
					</div>
				</div>
				</div>
				<div>
					<div ><button type="button" class="btn btn-primary addannounce" onclick="document.getElementById('id01').style.display='block'"><i class="bx bx-plus"></i>Add Announcement</button></div>
									<!--Modal form for Login-->
					<div id="formatValidatorName" >
						  <div id="id01" class="adminmanagement-modal modal">
								<div class="modal-contentadmin  animate" >
								
									<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
																<div class="information">   
																	<span type="submit" onclick="document.getElementById('id01').style.display='none'" class="closebtn" style="float: right">
																		X
																	</span>  
																</div>

																<div class="form-control inputtext information" style="text-align:center; color: white; background: blue; border-top-right-radius: 20px; border-top-left-radius: 20px;">
																Add Announcement
																</div>

																<div class="form-group">
																	<label for="file">Attach Photo<i class="red">*</i></label>
																	<input type='file' name='files[]' id='files 'class="form-control fileupload" required/>
																</div>
																<div class="information">
																	<label for="file" class="fileupload">Headline<i class="red">*</i></label>
																	<input type="text" class="form-control inputtext " name="headline" id="headline">
																</div>
																<div class="information">
																	<label for="file" class="fileupload">Add Description<i class="red">*</i></label>
																	<textarea required class="form-control inputtext control-label description" id="description" name ="description" type="text"  placeholder="Description" style="resize: none;"></textarea>
																</div>
																
																<div class="information">   
																	<button type="submit" id="announcebtn" name="announcebtn" class="inputtext submtbtn">
																		<i class="bx bx-t67check"></i>Submit
																	</button>  
																</div>
										</div> 	
									</form>
									<h1>Hgello</h1>
							  </div>
						</div>
					</div>
			</section>
			<script src="resident-js/barangay.js"></script>
	</body>
</html>
<?php session_start();

if(!isset($_SESSION["type"]))
{
    header("location: officials.php");
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
include "db/captain.php";
include "db/user.php";
include('db/conn.php'); 
include('announcement_includes/functions.php'); 
include "db/announcementquery.php";	
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
	<link rel="stylesheet" href="announcement_css/custom.css">
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Employee Management </title>
	 
	 <style>
         .detailwidth{width: 45%;}
         .btnmargin{margin-bottom: 5px;}
		 .widthinp{width: 50%}
		 .widthinput{width: 85%}
		 .disp{display: flex;}
	 </style>
   </head>
	<body onload="display_ct()" >
		<!-- Side Navigation Bar-->
		   <div class="sidebar captain_sidebar myDIV">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Captain</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
				<li>
					<a class="side_bar btnhover activehover" href="captaindashboard.php">
						<i class='bx bx-category-alt dash'></i>
						<span class="links_name">Dashboard</span>
					</a>
					 <span class="tooltip">Dashboard</span>
			 	</li>
				 <li>
					<a class="side_bar btnhover" href="contactmodule.php">
						<i class='bx bx-user-circle admin'></i>
						<span class="links_name">Contacts</span>
					</a>
					<span class="tooltip">Contacts</span>
			  	</li>

				  <li>
				  <a class="side_bar btnhover" href="usermanagement.php">
					  <i class='bx bx-group employee'></i>
					  <span class="links_name">User Management</span>
					</a>
					 <span class="tooltip">User Management</span>
				  </li>

				<li>
				 <a class="side_bar btnhover" href="residentcensus.php">
					  <i class='bx bxs-group census'></i>
					  <span class="links_name">Resident Census</span>
					</a>
					 <span class="tooltip">Resident Census</span>
				</li>

				<li>
				 <a class="side_bar btnhover" href="postannouncement.php">
					  <i class='bx bx-news iannouncement'></i>
					  <span class="links_name">Post Announcement</span>
					</a>
					 <span class="tooltip">Post Announcement</span>
				</li>
			 
				 <li class="profile">
					<div class="profile-details">
					<img class="profile_pic" >
					<div class="name_job" style="font-size: 13px;">
						<div><strong><?php echo $user;?></strong></div>
						<div class="job" id="">User Type: <?php echo $dept; ?></div>
						</div>
					</div>
					<a href="officiallogout.php">
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
                        <a href="postannouncement.php" style="text-decoration: none; color: white;">User Management</a><label> >> </label><a href="#" style="text-decoration: underline; color: black;">Edit User</a>
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>	  
					</div>
				  </div>
			  </section>
                    <div id="content" class="container col-md-12">
                        <?php 
                        
                            // if(isset($_GET['id'])){
                            //     $ID = $_GET['id'];
                            // }else{
                            //     $ID = "";
                            // }
                            
                            // if(isset($_POST['editemployeebtn'])){
			
                            // 	$employee_uname = $_POST['employee_uname'];
                            // 	$emailadd = $_POST['emailadd'];
                            // 	$birthday = $_POST['birthday'];
                            // 	$address = $_POST['address'];
                            // 	$contact = $_POST['contact'];
                            // 	$user_type = $_POST['user_type'];
                            // 	$department = $_POST['department'];
                            // 	$added_on = $_POST['added_on'];
                                                                        
                            // 	// checking empty fields
                            // 	if(empty($employee_uname) || empty($emailadd) || empty($birthday) || empty($address) || empty($contact) || empty($user_type) || empty($department) || empty($added_on)){	
                                                                            
                            // 	if(empty($employee_uname)) {
                            // 		echo "<font color='red'>Complainant Age field is empty.</font><br/>";
                            // 	}
                                                                        
                            // 	if(empty($emailadd)) {
                            // 		echo "<font color='red'>Complainant Gender field is empty.</font><br/>";
                            // 	}
                            // 	if(empty($birthday)) {
                            // 		echo "<font color='red'>Complainant Address field is empty.</font><br/>";
                            // 	}	
                            // 	if(empty($address)) {
                            // 		echo "<font color='red'>Incident Address field is empty.</font><br/>";
                            // 	}	
                            // 	if(empty($contact)) {
                            // 		echo "<font color='red'>Name of Violator field is empty.</font><br/>";
                            // 	}	
                            // 	if(empty($user_type)) {
                            // 		echo "<font color='red'>Name of Violator Age field is empty.</font><br/>";
                            // 	}	
                            // 	if(empty($department)) {
                            // 		echo "<font color='red'>Name of Violator Gender field is empty.</font><br/>";
                            // 	}	
                            // 	if(empty($added_on)) {
                            // 		echo "<font color='red'>Relationship field is empty.</font><br/>";
							// 	}else{

                            // 	//updating the table
                            // 	$sql = "UPDATE employeedb SET employee_uname=:employee_uname, emailadd=:emailadd,birthday=:birthday,address=:address,contact=:contact,user_type=:user_type,department=:department,added_on=:added_on WHERE employee_id=:employee_id";
                            // 	$query = $db->prepare($sql);
                                                                                    
                            // 	$query->bindparam(':employee_uname', $employee_uname);
                            // 	$query->bindparam(':emailadd', $emailadd);
                            // 	$query->bindparam(':birthday', $birthday);
                            // 	$query->bindparam(':address', $address);
                            // 	$query->bindparam(':contact', $contact);
                            // 	$query->bindparam(':user_type', $user_type);
                            // 	$query->bindparam(':department', $department);
                            // 	$query->bindparam(':added_on', $added_on);
                            // 	$query->execute();
                                                                                            
                            // 		header("Location: employeeeditacc.php");
                            // 		}	
                            // 	}
                            // }	
							

                        ?>
                        		<div class="col-md-12">
							<div style="text-align: center;">
								<hr>
									<h6>
										Edit User
									</h6>
								<hr>
							</div>
                        <span class="font-sizee"><?php echo isset($error['update_data']) ? $error['update_data'] : '';?></span>
                        <hr />
                        
                        <form method="post" action="" class="font-sizee">
                        <div>
							<div class="disp">
								<div>
									<label>Employee ID :</label>
									<input type="text" name="employee_id" class="form-control font-sizee widthinput" value=""/>
								</div>
								<div>
									<label>Username :</label>
									<input type="text" name="username" class="form-control font-sizee widthinput" value=""/>
								</div>
							</div>
							<div>
                                <label>Email Address :</label>
                                <input type="text" name="employee_id" class="form-control font-sizee widthinput" value=""/>
                            </div>
							<div>
                                <label>Last Name :</label>
                                <input type="text" name="username" class="form-control font-sizee widthinp" value=""/>
                            </div>
							<div>
                                <label>First Name :</label>
                                <input type="text" name="username" class="form-control font-sizee widthinp" value=""/>
                            </div>
							<div>
                                <label>Middle Name :</label>
                                <input type="text" name="username" class="form-control font-sizee widthinp" value=""/>
                            </div>
							<div>
                                <label>Birthday :</label>
                                <input type="text" name="employee_id" class="form-control font-sizee" value=""/>
                            </div>
							<div>
                                <label>Address :</label>
                                <input type="text" name="employee_id" class="form-control font-sizee" value=""/>
                            </div>
							<div>
                                <label>Contact :</label>
                                <input type="text" name="employee_id" class="form-control font-sizee" value=""/>
                            </div>
							<div>
								<label>User Type :</label>
								<select name="cid" class="form-control font-sizee">
									<option value="" >Official</option>
									<option value="" selected="">Employee</option>
									<option value="" >Admin</option>
								</select>  
							</div>
							<div>
								<label>Department :</label>
								<select name="cid" class="form-control font-sizee">
									<option value="" >BRGY OFFICIAL</option>
									<option value="" >ADMIN</option>
									<option value="" >BCPC</option>
									<option value="" >VAWC</option>
									<option value="" >LUPON</option>
									<option value="" >ACCOUNTING</option>
									<option value="" >BPSO</option>
									<option value="" >REQUEST DOCUMENT</option>
									<option value="" >COMPLAINT</option>
								</select>  
							</div>

                            <div>
                            <br>
								<label>Announcement Date :</label><?php echo isset($error['announcement_date']) ? $error['announcement_date'] : '';?>
								<input type="date" name="announcement_date" id="announcement_date" value="" class="form-control font-sizee">

								<br/>
								
								
                            </div>
                        </div>
                            
							<br/>
                            <div>
                                <input type="submit" class="btn-success btn form-control font-sizee btnmargin" value="Update" name="btnEditDetails" />
                                <a class="btn-primary btn font-sizee form-control" style="margin-bottom: 30px;" href="usermanagement.php">Back</a>
                            </div>
                        </form>
		</div>
			</section>
	
			<script src="resident-js/barangay.js"></script>	
	</body>
</html>
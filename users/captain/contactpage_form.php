<?php session_start();

if(!isset($_SESSION["type"]))
{
    header("location: officials.php");
}
require 'db/conn.php';
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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/captain.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Contact Module </title>
	 
	 <style>
         *{font-size: 13px;}
         .sender-modal{
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


		.modal-contentsender {
			padding-top: 1%;
			background-color: #fefefe;
			margin: 5% auto 2% auto;
			border: 1px solid #888;
			height: 82%;
			width: 60%; 
			border-radius: 10px;
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

		.messcompose, .send{display: flex;justify-content: center; align-items: center; margin-left: 40px; margin-right: 40px; margin-bottom: 20px;}
		.submtbtn{height: 40px;}
		.submtbtn:hover{
			background: #04AA6D;
			color: orange;
			height: 40px;
		}
		.user, .email{width:87.5%}
		.textareaa{width: 94%; margin-left: 25px;}
		span.topright{margin-left: -50px; margin-top: -15px; text-align: right; font-size: 25px;}
		span.topright:hover {text-align: right;color: red; cursor: pointer;}
		.display{display: flex;}
		.usersel{pointer-events: none; border: 1px solid orange}

		.main-content-email{margin-top: 32%;}
		.textarea{padding-left: 40px; padding-right: 40px; padding-top: 10px; margin-bottom: 15px;}
		.id{margin-left: 60px;}
		.em{margin-left: 40px;}
	 </style>
   </head>
	<body onload="display_ct()">																
		<!-- Side Navigation Bar-->
		   <div class="sidebar captain_sidebar myDIV">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt="Brgy Commonwealth Logo"/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
				<li>
					<a class="side_bar btnhover btnhover activehover" href="captaindashboard.php">
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
						<h5>Contacts
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
            
            <div style="text-align: center;">
            <hr>
                <h5>    
                    Concerns from Contact Us Page
                </h5>
            <hr>
            </div>
            
                    <div class="reg_table">
                        <table class="content-table"  id="table">
							<?php
							include "db/conn.php";
							include "db/user.php";
							
							$mquery = "SELECT * FROM contactustbl  ORDER BY id DESC;";
							$countn = $db->query($mquery);
							?>
							<thead>
								<tr>
									<th>User ID</th>
									<th>Fullname</th>
									<th>Email Address</th>
									<th>Subject</th>
                                    <th>Message</th>
								</tr>                       
							</thead>
							<?php
							foreach($countn as $data2) 
							{
							?>
							<tbody>
								<tr class="table-row">
                                    <td><?php echo $data2 ['id']; ?></td>
									<td><?php echo $data2 ['username']; ?></td>
									<td><?php echo $data2 ['email']; ?></td>
									<td><?php echo $data2 ['subject']; ?></td>
									<td><?php echo $data2 ['message']; ?></td>
									<!-- <td>
                                        <input class="btn btn-primary btnwidth" type="button" onclick="document.getElementById('reply_<?php echo $data2['id']; ?>').style.display='block'" value="Reply">
                                    </td> -->			
								</tr>
							</tbody>	
							<?php
							}
							?>
						</table>
			</div>
				<form method="POST" action="send_email.php">
					<div class="main-content-email">
					<fieldset>
						<legend style=" text-align: center;">Compose Email</legend>	
						<?php
						if(ISSET($_SESSION['status'])){
							if($_SESSION['status'] == "ok"){
						?>
									<div class="alert alert-info messcompose"><?php echo $_SESSION['result']?></div>
						<?php
								}else{
						?>
									<div class="alert alert-danger messcompose"><?php echo $_SESSION['result']?></div>
						<?php
								}
								
								unset($_SESSION['result']);
								unset($_SESSION['status']);
							}
						?>
						<div class="information col">
							<label class="employee-label "> ID: </label>
							<input type="number" class="form-control inputtext email usersel id" id="id" type="hidden">
						</div>

						<div class="information col">
							<label class="employee-label"> To: </label>
							<input class="form-control inputtext email usersel id" id="username" type="text">
						</div>

						<div class="information col">
							<label class="employee-label"> Email: </label>
							<input required class="form-control inputtext usersel email em" id="email" name="email" type="text">
						</div>

						<div class="information col">
							<label class="employee-label">Subject:  </label>
							<input required class="form-control inputtext email" id="subject" id="subject" name="subject" type="text"> 
						</div>
						
						<div class="information col textarea">
							<label>Body: </label>
							<textarea name="message" id="message" class="form-control" rows="32">Hello Good Day!, we received your concern</textarea>
							<script type="text/javascript" src="announcement_css/js/ckeditor/ckeditor.js"></script>
							<script type="text/javascript">                        
								CKEDITOR.replace( 'message' );
							</script>
						</div>
						<div class="send">
							<button name="send" class="form-control btn btn-primary"><span class="glyphicon glyphicon-envelope"></span> Send</button>
						</div>
					</fieldset>
					</div>
				</form>
				
			</section>
			<script src="resident-js/barangay.js"></script>
			<script language="javascript" type="text/javascript">
				function limitText(limitField, limitCount, limitNum) {
					if (limitField.value.length > limitNum) {
						limitField.value = limitField.value.substring(0, limitNum);
					} else {
						limitCount.value = limitNum - limitField.value.length;
					}
				}
				var table = document.getElementById('table');
					for (var i = 1; i < table.rows.length; i++)
					{
						table.rows[i].onclick = function()
						{
							document.getElementById("id").value = this.cells[0].innerHTML;
							document.getElementById("username").value = this.cells[1].innerHTML;
							document.getElementById("email").value = this.cells[2].innerHTML;
							document.getElementById("subject").value = this.cells[3].innerHTML;
						};
					}
			</script>
	</body>
</html>
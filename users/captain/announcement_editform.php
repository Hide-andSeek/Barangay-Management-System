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
	include_once('db/conn.php'); 
	include_once('announcement_includes/functions.php'); 
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Post - Announcement </title>
	 
	 <style>
		.announcement-modal, .edit-modal, .delete-modal{
            display: none; 
            position: absolute; 
            z-index: 999; 
            left: 0;
            top: 30;
            width: 100%; 
            height: 100%; 
			 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 5px; 
        }
	
		.modal-contentannouncement, .modal-contentedit, .modal-contentdelete{
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
		    height: 62%;
            width: 37%;
            border-radius: 5px;
        }
		.modal-contentdelete{height: 32%; }
		.modal-contentedit{height: 68%;  overflow-x: hidden;}

		::-webkit-scrollbar{ width: 15px; border-radius: 5px;}
		::-webkit-scrollbar-track{background: #f1f1f1;  border-radius: 5px;}
		::-webkit-scrollbar-thumb{background: #71b280; border-radius: 5px;}
		::-webkit-scrollbar-thumb:hover{background: #555; border-radius: 5px;}

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
		input.edit, input.del{width: 80;}
		
		.closebtn{margin-right: 15px; font-stretch: expanded;}
		.closebtn:hover{color:red; }
		.description{ height: 50px; font-size: 13px;}

		.addannounce{margin-top: 340px; margin-left: 25px; font-size: 13px;}
		.fileupload{font-size: 13px; margin-left: 15px;}
		.pagination{margin-top: 32%}
		.page{margin-left: 15px; }
		span.topright{margin-left: -50px; text-align: right; font-size: 25px;}
		.topright:hover {text-align: right;color: red; cursor: pointer;}

	  .submitbtn, .cattxtbox, .refreshbtn{
			font-size: 14px;
			height: 35px;
			width: 84%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		.errormsg, .del{color: #d8000c; background: #ffbaba; border-radius: 5px;}
		.edit{width: 40%; color: #9f6000; background: #feef83; margin-bottom: 5px; border-radius: 5px;}
		.del{width: 40%;}
		.select__select{margin-top: -32px; padding-left: 180px;}
		.bcircle:hover{color: black}
		.imgup{display: flex; justify-content: center; align-items: center;  padding: 5px 5px 5px 5px; margin-left: 20px; margin-right: 25px; }
		.btnpadding{margin-bottom:5px;}
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
						<a href="postannouncement.php" style="text-decoration: none; color: white;">Post Announcement</a><label> >> </label><a href="#" style="text-decoration: underline; color: black;">Edit Category</a>
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>  
					</div>
				  </div>
			  </section>
				<div id="content" style="text-align: center;" class="container font-sizee col-md-12">
					<hr/>
					<div class="col-md-12" >
						<h5>Edit Category</h5>
						<?php echo isset($error['update_category']) ? $error['update_category'] : '';?>
					</div>
					<hr/>

					<div>
						<form method="post" enctype="multipart/form-data" class="font-sizee" action="">
							<label>Category Name :</label>
							<?php echo isset($error['category_name']) ? $error['category_name'] : '';?>
							<input type="text" class="form-control font-sizee" name="category_name" value="<?php echo $data['category_name']; ?>"/>
							<br/>
							<label>Image :</label>
							<?php echo isset($error['category_image']) ? $error['category_image'] : '';?>
							<input type="file" class="form-control font-sizee fileimg" name="category_image" id="category_image" />
							<br/>s
							
							<img src="upload/category/<?php echo $data['category_image']; ?>" width="280" height="190"/>
							
							<br/><br/>
							<input type="submit" class="btn-success font-sizee btn form-control btnpadding" value="Update" name="btnEdit"/>
							<a class="btn-primary btn font-sizee form-control btnpadding" href="postannouncement.php">Back</a>
						</form>
					</div>

					<div class="separator"> </div>
				</div>
			</section>
			<script src="resident-js/barangay.js"></script>
	</body>
</html>
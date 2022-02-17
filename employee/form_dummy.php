<?php session_start();
include "../db/conn.php";
include "../db/documents.php";
include('../announcement_includes/functions.php'); 
 

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../announcement_css/custom.css">
	<!--Customize-->

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Dashboard:  Request Document </title>
	 
	 
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
		
		 i.menu{color: #fff}
		 i.id{color: #a809b0}
		 i.clearance{color: #1cb009}
		 i.sms{color: #478eff}
		 i.blotter-com{color: #9e0202}
		 i.indigency{color: #0218bd}
		 i.permit{color: #e0149c}
		 i.ikon{color: red;}

		.w3borderbot{ margin-bottom: 20px; background: #71b280;} 

		.notification {
		color: white;
		text-decoration: none;
		position: relative;
		display: inline-block;
		border-radius: 2px;
		color: black;
		width: 95%;
		}

		.opac{opacity: 0.5;}

		.notification .badge {
		position: absolute;
		top: -10px;
		right: -10px;
		padding: 5px 10px;
		border-radius: 50%;
		background-color: #ff4f4f;
		color: white;
		font-size: 14px;
		}
		.w3top{margin-top: -30px;}
		.announcement-modal, .edit-modal, .delete-modal, .addannouncement-modal{
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
		
		.modal-contentannouncement, .modal-contentaddannouncement{
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
		    height: 32%;
            width: 37%;
            border-radius: 5px;
        }

		.modal-contentaddannouncement{
			margin-top: 30%;
			width: 70%;
			height: 43%;
		}

		.modal-contentdelete{height: 32%; }
		.modal-contentedit{height: 68%;  overflow-x: hidden;}

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

		.submitbtn, .cattxtbox, .refreshbtn, .fileimg{
			font-size: 14px;
			height: 35px;
			width: 100%;
			padding: 10px 10px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			text-align: center;
		}

		.errormsg, .del{color: #d8000c; background: #ffbaba; border-radius: 5px;}
		.edit{width: 40%; color: #9f6000; background: #feef83; margin-bottom: 5px; border-radius: 5px;}
		.del{width: 40%;}
		.select__select{margin-top: -32px; padding-left: 180px;}

		.bcircle:hover{color: black}
		.imgup{display: flex; justify-content: center; align-items: center;  padding: 5px 5px 5px 5px; margin-left: 20px; margin-right: 25px; }
		.btnwidth{width: 70%; margin-bottom: 5px;}
		.announcedesc{margin-left: 20px;}
		.btnmargin{margin-bottom: 5px;}
		.hoverbtn:hover{background: orange;}
		.btnwidths{width: 40%}
		.descriptionStyle{overflow:auto; resize:none;}
		.addcat{background: #B6B4B4; border: 2px solid gray; height: 40px;}
		.tblinput{background: none; border: none; user-select: none; text-align: center;pointer-events: none;}

		.transact{margin-left: 65%; }
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
				<a class="side_bar" href="dummy.php">
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
						<h5>Document Request Dashboard
						<a href="#" class="circle">
								
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>  

              <div class="reg_table">
						<table class="content-table table_indigency"  id="table">
						
							<?php 
							include "../db/user.php";
							
							$mquery = "SELECT fullname, document_type, approvedby, app_date FROM approved_bpermits INNER JOIN approved_indigency ON approved_indigency.document_id = approved_bpermits.document_id";
                          
							$countn = mysql_num_rows($mquery);
							
							?>

							<thead>
								<tr class="t_head">
									<th>Fullname</th>
									<th>Document Type</th>
									<th>Approved By</th>
									<th>Approval Date</th>
								</tr>                       
							</thead>
							<?php
							for($i=1; $i<=$countn; $i++)
							{
								$data2 = mysql_fetch_array($mquery);
							?>
								<tr class="table-row">
									<td><?php echo $data2["fullname"]?></td>
									<td><?php echo $data2["document_type"]?></td>
									<td><?php echo $data2["approvedby"]?></td>
									<td><?php echo $data2["app_date"]?></td>
								</tr>	
							
							<?php
							}
							?>
			</section>
			<script href="test.js"></script>
	</body>
</html>
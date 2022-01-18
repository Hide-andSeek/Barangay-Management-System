
<?php session_start();
if(!isset($_SESSION["official_name"])){
	header("location: captainlogin.php");
}
?>

<?php
include "db/captain.php";
include "db/users.php";
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
		 *{font-size: 13px;}

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

	  .submitbtn, .cattxtbox, .refreshbtn, .fileimg{
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
		
	 </style>
   </head>
	<body onload="display_ct()" >
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

			 

<div id="content" class="container col-md-12">
	<?php 
		// create object of functions class
		$function = new functions;
		
		// create array variable to store data from database
		$data = array();
		
		if(isset($_GET['keyword'])){	
			// check value of keyword variable
			$keyword = $function->sanitize($_GET['keyword']);
			$bind_keyword = "%".$keyword."%";
		}else{
			$keyword = "";
			$bind_keyword = $keyword;
		}
			
		if(empty($keyword)){
			$sql_query = "SELECT cid, category_name, category_image
					FROM announcement_category
					ORDER BY cid DESC";
		}else{
			$sql_query = "SELECT cid, category_name, category_image
					FROM announcement_category
					WHERE category_name LIKE ? 
					ORDER BY cid DESC";
		}
		
		
		$stmt = $connect->stmt_init();
		if($stmt->prepare($sql_query)) {	
			// Bind your variables to replace the ?s
			if(!empty($keyword)){
				$stmt->bind_param('s', $bind_keyword);
			}
			// Execute query
			$stmt->execute();
			// store result 
			$stmt->store_result();
			$stmt->bind_result($data['cid'], 
					$data['category_name'],
					$data['category_image']
					);
			// get total records
			$total_records = $stmt->num_rows;
		}
			
		// check page parameter
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 1;
		}
						
		// number of data that will be display per page		
		$offset = 10;
						
		//lets calculate the LIMIT for SQL, and save it $from
		if ($page){
			$from 	= ($page * $offset) - $offset;
		}else{
			//if nothing was given in page request, lets load the first page
			$from = 0;	
		}	
		
		if(empty($keyword)){
			$sql_query = "SELECT cid, category_name , category_image
					FROM announcement_category
					ORDER BY cid DESC LIMIT ?, ?";
		}else{
			$sql_query = "SELECT cid, category_name, category_image
					FROM announcement_category
					WHERE category_name LIKE ? 
					ORDER BY cid DESC LIMIT ?, ?";
		}
		
		$stmt_paging = $connect->stmt_init();
		if($stmt_paging ->prepare($sql_query)) {
			// Bind your variables to replace the ?s
			if(empty($keyword)){
				$stmt_paging ->bind_param('ss', $from, $offset);
			}else{
				$stmt_paging ->bind_param('sss', $bind_keyword, $from, $offset);
			}
			// Execute query
			$stmt_paging ->execute();
			// store result 
			$stmt_paging ->store_result();
			$stmt_paging->bind_result($data['cid'], 
					$data['category_name'],
					$data['category_image']
					);
			// for paging purpose
			$total_records_paging = $total_records; 
		}

		// if no data on database show "No Reservation is Available"
		if($total_records_paging == 0){
	
	?>
	<h1>Category Not Available
		<a href="add-category.php">
			<button class="btn btn-danger">Add New Category</button>
		</a>
	</h1>
	<?php 
		// otherwise, show data
		}else{
			$row_number = $from + 1;
	?>

	<div class="col-md-12">
	<label class="select__select">
										New Category: 
										<button class="page-scroll login" onclick="document.getElementById('add_<?php echo $data['cid']; ?>').style.display='block'">
											<i class="bx bx-plus-circle" style="font-size: 16px;"></i> Click to Add
										</button>
										<button style="background: none;"><i style="color: gray; font-size: 21px;" class="bx bx-help-circle bcircle"></i></button>
									</label>
<!-- Modal form for Add Category -->
		<div id="formatValidatorName" >
						 <div id="add_<?php echo $data['cid']; ?>" class="announcement-modal modal" >
								<div class="modal-contentannouncement animate" >			
										<div id="employee_form" class="container">				
											<div id="content" class="container col-md-12">
												
												<div style="margin-top: 10px;">

													<span  onclick="document.getElementById('add_<?php echo $data['cid']; ?>').style.display='none'" class="topright">&times;</span>
													
													<br>
													<br>

													<h4 style="text-align: center;">Announcement Category</h4>

													<?php echo isset($error['add_category']) ? $error['add_category'] : '';?>
													<hr />
												</div>

															<div>
																<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

																	<input type="text" class="form-control cattxtbox" name="category_name" placeholder="Category name"/>

																	<?php echo isset($error['category_name']) ? $error['category_name'] : '';?>

																	<span>
																		<input type="file" class="form-control fileimg" name="category_image" id="category_image" />

																		<?php echo isset($error['category_image']) ? $error['category_image'] : '';?>
																	</span>
																	<br>
																	<span>
																		<button type="submit" class="btn-primary btn submitbtn" name="btnAdd"><i class="bx bx-check"></i> Submit</button>
																	</span>

																	<span>
																		<button type="reset" class="btn-warning btn refreshbtn" ><i class="bx bx-rotate-right"></i> Refresh</button>
																	</span>
																</form>
															</div>

												<div class="separator"> </div>
											</div>
	
										</div> 	
							  </div>
						</div>
		</div>
								
					
							<div class="search_content">
								<form class="list_header" method="get">
									<label>
										Search: 
										<input type="text" class=" r_search" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>" />
										<button type="submit" class="btn btn-primary" name="btnSearch" value="Search"><i class="bx bx-search-alt"></i></button>
									</label>
								</form>
									
							</div>
							<br>						
							<hr>
							<!-- end of search form -->
							
							<div class="col-md-12">
							<table class="content-table">
								<thead>
									<tr class="t_head">
										<th width="5%">Name</th>
										<th width="15%">Image</th>
										<th width="5%">Action</th>
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
									<tr>
										<td><?php echo $data['category_name'];?></td>
										<td width="20%"><img src="upload/category/<?php echo $data['category_image']; ?>" width="50" height="50"/></td>
										<td>
											<!-- <button onclick="document.getElementById('edit_<?php echo $data['cid']; ?>').style.display='block'" class="edit" > Edit</button> -->
											<button  class="edit">
												<a href="announcement_edit.php?id=<?php echo $data['cid'];?>">
												<i class="bx bxs-edit"></i>
													Edit
												</a>
											</button>
											<button onclick="document.getElementById('delete_<?php echo $data['cid']; ?>').style.display='block'" class="del"><i class="bx bxs-edit"></i> Delete
											</button>
										</td>
									</tr>
								<?php 
								} 
							}
						?>
							</table>
							</div>
<!-- Edit Category -->
							
<!--Modal form for Category Deletion -->
					<div id="formatValidatorName" >
							<div id="delete_<?php echo $data['cid']; ?>" class="delete-modal modal" >
								<div class="modal-contentdelete animate" >
								
								<span  onclick="document.getElementById('delete_<?php echo $data['cid']; ?>').style.display='none'" class="topright">&times;</span>

								<h4 style="text-align: center;">Confirm Action</h4>
								<hr />
								<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
									<p style="font-size: 15px; text-align: center;">Are you sure want to <strong style="color: red;"> DELETE </strong>this category?</p>
									<span style="float: right; padding: 15px 15px 15px 15px" >
									<input type="submit" class="btn btn-primary" value="Yes" name="btnDelete"/>
									<span onclick="document.getElementById('delete_<?php echo $data['cid']; ?>').style.display='none'"  class="btn " type="submit">No</span>
									</span>
								</form>
							</div>
						</div>
					</div>   	
							
							<div class="col-md-12 pagination">
								<h4 class="page">
									<?php 
										// for pagination purpose
										$function->doPages($offset, 'announce_cat.php', '', $total_records, $keyword);
									?>
								</h4>
							</div>
							</div>
							<div class="col-md-12">
			<div id="formatValidatorName" >
									<div id="edit_<?php echo $data['cid']; ?>" class="edit-modal modal" >
											<div class="modal-contentedit animate" >	
											
											<span  onclick="document.getElementById('edit_<?php echo $data['cid']; ?>').style.display='none'" class="topright">&times;</span>

											<br>
											<br>

											<h4 style="text-align: center;"><br> Edit Category </h4>
											
											<?php echo isset($error['update_category']) ? $error['update_category'] : '';?>
											<hr />
									
										
											<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
												<span>
												<input type="text" style="outline: 1px solid orange;" class="form-control cattxtbox " name="category_name" value="<?php echo $data['category_name']; ?>"/>
												<?php echo isset($error['category_name']) ? $error['category_name'] : '';?>
												</span>
												<input type="file" class="form-control fileimg" name="category_image" id="category_image" />
												<?php echo isset($error['category_image']) ? $error['category_image'] : '';?>

												<span class="imgup">
												<img  src="img/fileupload_announcement/<?php echo $data['category_image']; ?>" width="260" height="170"/>
												</span>
												<input type="submit" class="btn-primary btn submitbtn" value="Update" name="btnEdit"/>
											</form>
										</div>
									</div>
								</div>
						</div>
							<div class="separator"></div>
							</div>     
			</section>
	
			<script src="resident-js/barangay.js"></script>
			<script src="announcement_css/js/jquery.min.js"></script>
   			<script src="announcement_css/js/bootstrap.min.js"></script>	
	</body>
</html>
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

     <title> Post - Announcement </title>
	 
	 <style>
		 *{font-size: 13px;}
		 .home-section{
			min-height: 183vh;
			}

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
		.btnwidth{width: 70%; margin-bottom: 5px;}
		.announcedesc{margin-left: 20px;}
		.btnmargin{margin-bottom: 5px;}
		.hoverbtn:hover{background: orange;}
		.btnwidths{width: 40%}
		.descriptionStyle{overflow:auto; resize:none;}
		.addcat{background: #B6B4B4; border: 2px solid gray; height: 40px;}
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
					<a class="side_bar nav-button" href="captaindashboard.php">
						<i class='bx bx-category-alt dash'></i>
						<span class="links_name">Dashboard</span>
					</a>
					 <span class="tooltip">Dashboard</span>
			 	</li>

				<li>
					<a class="side_bar nav-button" href="contactmodule.php">
						<i class='bx bx-user-circle admin'></i>
						<span class="links_name">Contacts</span>
					</a>
					<span class="tooltip">Contacts</span>
			  	</li>

				  <li>
				  <a class="side_bar nav-button" href="usermanagement.php">
					  <i class='bx bx-group employee'></i>
					  <span class="links_name">User Management</span>
					</a>
					 <span class="tooltip">User Management</span>
				  </li>

				<li>
				 <a class="side_bar nav-button" href="residentcensus.php">
					  <i class='bx bxs-group census'></i>
					  <span class="links_name">Resident Census</span>
					</a>
					 <span class="tooltip">Resident Census</span>
				</li>

				<li>
				 <a class="side_bar nav-button nav-active" href="postannouncement.php">
					  <i class='bx bx-news iannouncement'></i>
					  <span class="links_name">Post Announcement</span>
					</a>
					 <span class="tooltip">Post Announcement</span>
				</li>
			 
				 <li class="profile">
					<div class="profile-details">
					<div class="name_job" style="font-size: 13px;">
						<div><strong><?php echo $user;?></strong></div>
						<div class="job" id=""><?php echo $dept; ?> || Online </div>
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
						<h5>Post Announcement
						<a href="#" class="circle">
							<img src="img/dt.png">
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
		$offset = 5;
						
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
	<hr/>
	<h5>Content <strong style="color: red; font-size: 15px;"> Not Available.</strong>  Please Add New Category. Just Click
		<a class="page-scroll login hoverbtn" style="cursor: pointer; font-size:15px;" onclick="document.getElementById('nocategory_<?php echo $data['cid']; ?>').style.display='block'">
		here
		</a>
	</h5>
	<hr/>
	<div id="formatValidatorName" >
						 <div id="nocategory_<?php echo $data['cid']; ?>" class="announcement-modal modal" >
								<div class="modal-contentannouncement animate" >			
										<div id="employee_form" class="container">				
											<div id="content" class="container col-md-12">
												
												<div style="margin-top: 10px;">

													<span  onclick="document.getElementById('nocategory_<?php echo $data['cid']; ?>').style.display='none'" class="topright">&times;</span>
													<br>
													<br>
													<h4 style="text-align: center;">Categories</h4>

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
	<?php 
		// otherwise, show data
		}else{
			$row_number = $from + 1;
	?>

	<div class="col-md-12">
<!-- Modal form for Add Category -->
		<div id="formatValidatorName" >
						 <div id="add_<?php echo $data['cid']; ?>" class="announcement-modal modal" >
								<div class="modal-contentannouncement animate" >			
										<div id="employee_form" class="container">				
											<div id="content" class="container col-md-12">
												
												<div style="margin-top: 10px;">

													<span onclick="document.getElementById('add_<?php echo $data['cid']; ?>').style.display='none'" class="topright">&times;</span>
													
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
		<div style="text-align: center;">
			<hr>
			<h5>Categories for Announcement</h5>
			<hr /> 
		</div>
<!-- Search -->
<div style="text-align: center;">
	<?php echo isset($error['category_name']) ? $error['category_name'] : '';?>
	<?php echo isset($error['category_image']) ? $error['category_image'] : '';?>	
</div>
							<div class="search_content">
								<form class="list_header" method="get">
									<label>
										Search: 
										<input type="text" class=" r_search" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>" />
										<button type="submit" class="btn btn-primary" name="btnSearch" value="Search"><i class="bx bx-search-alt"></i></button>
									</label>
								</form>
									<label class="select__select">
										New Category: 
										<button class="addcat hoverbtn" onclick="document.getElementById('add_<?php echo $data['cid']; ?>').style.display='block'"><i class="bx bx-plus-circle " style="font-size: 16px;"></i>Click to Add
										</button>
										
									</label>
							</div>
							<br>						
<!-- end of search form -->
	
					<div class="col-md-12">
							<table class="content-table">
								<thead>
									<tr class="t_head">
										<th width="5%">Category ID</th>
										<th width="5%">Category Name</th>
										<th width="15%">Category Image</th>
										<th width="5%"></th>
										<th width="5%"></th>
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
									<tr>
										<td><?php echo $data['cid'];?></td>
										<td><?php echo $data['category_name'];?></td>
										<td width="20%"><img src="upload/category/<?php echo $data['category_image']; ?>" width="90" height="60"/></td>
										<td>
											<input class="btn btn-primary btnwidth" type="button" onclick="location.href='announcement_edit.php?id=<?php echo $data['cid'];?>'" value="Edit">
										</td>
										<td>
											<input class="btn btn-danger btnwidth" type="button" onclick="location.href='announcement_delete.php?id=<?php echo $data['cid'];?>'" value="Delete">
										</td>
									</tr>
								</tbody>
								<?php 
								} 
							}
						?>
							</table>
							<!-- Edit Category -->
							<div id="formatValidatorName" >
								<div id="edit_<?php echo $data['cid']; ?>" class="edit-modal modal" >
										<div class="modal-contentedit animate">	
										<span  onclick="document.getElementById('edit_<?php echo $data['cid']; ?>').style.display='none'" class="topright">&times;</span>
										<br>
										<br>
										<h4 style="text-align: center;"><br> Edit Category </h4>
										<?php echo isset($error['update_category']) ? $error['update_category'] : '';?>
										<hr />
										<form method="post" action="" enctype="multipart/form-data">
											<span>
												<input type="text" style="outline: 1px solid orange;" class="form-control cattxtbox " name="category_name" value="<?php echo $data['category_name']; ?>"/>
												<?php echo isset($error['category_name']) ? $error['category_name'] : '';?>
											</span>
											<input type="file" class="form-control fileimg" name="category_image" id="category_image" />
											<?php echo isset($error['category_image']) ? $error['category_image'] : '';?>

											<span class="imgup">
												<img  src="upload/category/<?php echo $data['category_image']; ?>" width="260" height="170"/>
											</span>
											<input type="submit" class="btn-primary btn submitbtn" value="Update" name="btnEdit"/>
										</form>
										</div>
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
							<div class="separator"></div>
</div>     

<hr>									
<!-- For Adding Announcement -->
		
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
							$sql_query = "SELECT aid, announcement_heading, announcement_image, category_name, announcement_status, announcement_date 
									FROM tbl_announcement m, announcement_category c
									WHERE m.cat_id = c.cid  
									ORDER BY m.aid DESC";
						}else{
							$sql_query = "SELECT aid, announcement_heading, announcement_image, category_name, announcement_status, announcement_date 
									FROM tbl_announcement m, announcement_category c
									WHERE m.cat_id = c.cid AND announcement_heading LIKE ? 
									ORDER BY m.aid DESC";
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
							$stmt->bind_result($data['aid'], 
									$data['announcement_heading'], 
									$data['announcement_image'], 
									$data['category_name'],
									$data['announcement_status'], 
									$data['announcement_date']
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
							$sql_query = "SELECT aid, announcement_heading, announcement_image, category_name, announcement_status, announcement_date 
									FROM tbl_announcement m, announcement_category c
									WHERE m.cat_id = c.cid  
									ORDER BY m.aid DESC LIMIT ?, ?";
						}else{
							$sql_query = "SELECT aid, announcement_heading, announcement_image, category_name, announcement_status, announcement_date 
									FROM tbl_announcement m, announcement_category c
									WHERE m.cat_id = c.cid AND announcement_heading LIKE ? 
									ORDER BY m.aid DESC LIMIT ?, ?";
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
							$stmt_paging->bind_result($data['aid'], 
									$data['announcement_heading'], 
									$data['announcement_image'], 
									$data['category_name'],
									$data['announcement_status'], 
									$data['announcement_date']
									);
							// for paging purpose
							$total_records_paging = $total_records; 
						}

						// if no data on database show "No Reservation is Available"
						if($total_records_paging == 0){
					
					?>
					<hr/>
						<h5>Announcement <strong style="color: red; font-size: 15px;"> Not Available.</strong>  Please Add New Announcement. Just Click
							<a class="hoverbtn" style="cursor: pointer; font-size:15px;" onclick="document.getElementById('noannouncement_<?php echo $data['aid']; ?>').style.display='block'">
							here
							</a>
						</h5>
					<hr/>

<!-- This is for adding announcement into category -->
	<div id="formatValidatorName" >
						 <div id="noannouncement_<?php echo $data['aid']; ?>" class="addannouncement-modal modal" >
								<div class="modal-contentaddannouncement animate" >			
										<div id="employee_form" class="container">				
											<div id="content" class="container col-md-12">
												
												<div style="margin-top: 10px;">

													<span  onclick="document.getElementById('noannouncement_<?php echo $data['aid']; ?>').style.display='none'" class="topright">&times;</span>
													<h4 style="text-align: center;">Adding Announcement to Category</h4>

													<?php echo isset($error['add_category']) ? $error['add_category'] : '';?>
													<hr />
												</div>

															<div style="display:flex;">
																<form method="post" action="" enctype="multipart/form-data">

																<div style="display:flex;">
																	<div>
																		<div class="col-md-12">
																			<label>Announcement Heading :<i class="asterisk">*</i></label>
																			<span class="asterisk"><?php echo isset($error['announcement_heading']) ? $error['announcement_heading'] : '';?></span>
																			<input type="text" class="form-control" name="announcement_heading"/>
																		</div>
																		<div>
																			<label>Announcement Date :<i class="asterisk">*</i></label>
																			<span class="asterisk"><?php echo isset($error['announcement_date']) ? $error['announcement_date'] : '';?>
																			</span>
																			<input type="date" name="announcement_date" id="announcement_date" value="<?php if(isset($_GET['aid'])){echo $announcement_date['announcement_date'];}?>" class="form-control" readonly>

																			<label> Choose Category: <i class="asterisk">*</i></label>
																			<span class="asterisk">
																			<?php echo isset($error['cid']) ? $error['cid'] : '';?>
																			<select name="cid" class="form-control">
																				<?php while($stmt_category->fetch()){ ?>
																					<option value="<?php echo $category_data['cid']; ?>"><?php echo $category_data['category_name']; ?></option>
																				<?php } ?>
																			</select>
																			
																			<label>Image: <i class="asterisk">*</i></label>
																			<span class="asterisk"><?php echo isset($error['announcement_image']) ? $error['announcement_image'] : '';?>
																			</span>
																			<input type="file" class="form-control btnmargin" name="announcement_image" id="announcement_image"/>
																			<div>
														
																			<div class="panel-body">
																				<input type="submit" class="btn-primary btn form-control btnmargin" value="Add" name="btnAddAnnouncement" />
																				<input type="reset" class="btn-danger btn form-control btnmargin" value="Clear"/>
																			</div>
																	</div>
																		</div>
																	</div>
																		<div class="announcedesc">
																			<label>Announcement Description: <i class="asterisk">*</i></label>
																			<span class="asterisk"><?php echo isset($error['announcement_description']) ? $error['announcement_description'] : '';?>
																			</span>
																			<textarea name="announcement_description" id="announcement_description" class="form-control descriptionStyle" style="max-width: 60%; width: 60%"  rows="16"></textarea>
																			<script type="text/javascript" src="announcement_css/js/ckeditor/ckeditor.js"></script>
																			<script type="text/javascript">                        
																				CKEDITOR.replace( 'announcement_description' );
																			</script>
																		</div>
																	</div>
																	
																	<br/>
																	
																</form>
															</div>

												<div class="separator"> </div>
											</div>
	
										</div> 	
							  </div>
						</div>
				</div>
					<?php 
						// otherwise, show data
						}else{
							$row_number = $from + 1;
					?>

<!-- This is for adding announcement into category -->
<div id="formatValidatorName" >
						 <div id="addannounce_<?php echo $data['aid']; ?>" class="addannouncement-modal modal" >
								<div class="modal-contentaddannouncement animate" >			
										<div id="employee_form" class="container">				
											<div id="content" class="container col-md-12">
												
												<div style="margin-top: 10px;">

													<span  onclick="document.getElementById('addannounce_<?php echo $data['aid']; ?>').style.display='none'" class="topright">&times;</span>
													<h4 style="text-align: center;">Adding Announcement to Category</h4>

													<?php echo isset($error['add_category']) ? $error['add_category'] : '';?>
													<hr />
												</div>

															<div style="display:flex;">
																<form method="post" action="" enctype="multipart/form-data">

																<div style="display:flex;">
																	<div>
																		<div class="col-md-12">
																			<label>Announcement Heading :<i class="asterisk">*</i></label>
																			<span class="asterisk"><?php echo isset($error['announcement_heading']) ? $error['announcement_heading'] : '';?></span>
																			<input type="text" class="form-control" name="announcement_heading"/>
																		</div>
																		<div>
																			<label>Announcement Date :<i class="asterisk">*</i></label>
																			<span class="asterisk"><?php echo isset($error['announcement_date']) ? $error['announcement_date'] : '';?>
																			</span>
																			<input type="date" name="announcement_date" id="announcement_date" value="<?php if(isset($_GET['aid'])){echo $announcement_date['announcement_date'];}?>" class="form-control">

																			<label> Choose Category: <i class="asterisk">*</i></label>
																			<span class="asterisk">
																			<?php echo isset($error['cid']) ? $error['cid'] : '';?>
																			<select name="cid" class="form-control">
																				<?php while($stmt_category->fetch()){ ?>
																					<option value="<?php echo $category_data['cid']; ?>"><?php echo $category_data['category_name']; ?></option>
																				<?php } ?>
																			</select>
																			
																			<label>Image: <i class="asterisk">*</i></label>
																			<span class="asterisk"><?php echo isset($error['announcement_image']) ? $error['announcement_image'] : '';?>
																			</span>
																			<input type="file" class="form-control btnmargin" name="announcement_image" id="announcement_image"/>
																			<div>
														
																			<div class="panel-body">
																				<input type="submit" class="btn-primary btn form-control btnmargin" value="Add" name="btnAddAnnouncement" />
																				<input type="reset" class="btn-warning btn form-control" value="Clear"/>
																			</div>
																	</div>
																		</div>
																	</div>
																		<div class="announcedesc">
																			<label>Announcement Description: <i class="asterisk">*</i></label>
																			<span class="asterisk"><?php echo isset($error['announcement_description']) ? $error['announcement_description'] : '';?>
																			</span>
																			<textarea name="announcement_description" id="announcement_description" class="form-control " style="max-width: 60%; width: 60%;"  rows="16"></textarea>
																			<script type="text/javascript" src="announcement_css/js/ckeditor/ckeditor.js"></script>
																			<script type="text/javascript">                        
																				CKEDITOR.replace( 'announcement_description' );
																			</script>
																		</div>
																	</div>
																	
																	<br/>
																	
																</form>
															</div>

												<div class="separator"> </div>
											</div>
	
										</div> 	
							  </div>
						</div>
				</div>
		<div style="text-align: center;">
			<h5>Adding Announcement for Category</h5>
			<hr /> 
		</div>
					<!-- search form -->
					<div class="search_content">
								<form class="list_header" method="get">
									<label>
										Search: 
										<input type="text" class=" r_search" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>" />
										<button type="submit" class="btn btn-primary" name="btnSearch" value="Search"><i class="bx bx-search-alt"></i></button>
									</label>
								</form>
									<label class="select__select">
										New Announce: 
										<button class="hoverbtn addcat" onclick="document.getElementById('addannounce_<?php echo $data['aid']; ?>').style.display='block'">
											<i class="bx bx-plus-circle" style="font-size: 16px;"></i> Click to Add
										</button>
										
									</label>
					</div>						
					<!-- end of search form -->
					<br>
					<div class="col-md-12">
					<table class='content-table'>
						<thead class="t_head">
							<tr>
								<th width="15%">Announcement heading</th>
								<th width="5%">Announcement Image</th>
								<th width="5%">Announcement Date</th>
								<th width="15%">Announcement Category</th>
								<th width="3%">Action</th>
							</tr>
						</thead>
					<?php 
						while ($stmt_paging->fetch()){ ?>
						<tbody>
							<tr>
								<td><?php echo $data['announcement_heading'];?></td>
								<td><img src="upload/thumbs/<?php echo $data['announcement_image']; ?>" width="90" height="90"/></td>
								<td><?php echo $data['announcement_date'];?></td>
								<td><?php echo $data['category_name'];?></td>
								<td width="20%">
									<a class="btn btn-primary btnwidths btnmargin" href="announcement_details.php?id=<?php echo $data['aid'];?>">
										View
									</a>
									<br>
									<a class="btn btn-success btnwidths btnmargin" href="announcement_editdetails.php?id=<?php echo $data['aid'];?>">
										Edit
									</a>
									<br>
									<a class="btn-danger btn btnwidths btnmargin" href="announcement_delannouncement.php?id=<?php echo $data['aid'];?>">
										Delete
									</a>
								</td>
							</tr>
						</tbody>
						<?php 
						} 
					}
					?>
					</table>
					</div>

					<div class="col-md-12 pagination"> 
						<h4 class="page">
						<?php 
							// for pagination purpose
							$function->doPages($offset, 'news.php', '', $total_records, $keyword);?>
						</h4>
					</div>
					<div class="separator"> </div>
				</div>
</div>
			</section>
	
			<script src="resident-js/barangay.js"></script>
			<script src="announcement_css/js/jquery.min.js"></script>
   			<script src="announcement_css/js/bootstrap.min.js"></script>	
			<script>
				document.querySelector("#announcement_date").valueAsDate = new Date();
			</script>
	</body>
</html>
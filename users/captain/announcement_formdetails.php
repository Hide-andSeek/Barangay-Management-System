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
         
         
         #viewdetails {
          border-collapse: collapse;
          width: 100%;
        }

        #viewdetails td, #viewdetails th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #viewdetails tr:nth-child(even){background-color: #f2f2f2;}

        #viewdetails tr:hover {background-color: #ddd;}

        #viewdetails th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        .btnmargin{margin-bottom: 5px;}
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
						<div class="job" id=""><?php echo $dept; ?></div>
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
						<a href="postannouncement.php" style="text-decoration: none; color: white;">Post Announcement</a><label> >> </label><a href="#" style="text-decoration: underline; color: black;">Announcement Details</a>
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					</div>
				  </div>
			  </section>
            

              <div id="content" class="container col-md-12">
                <?php 
                    if(isset($_GET['id'])){
                        $ID = $_GET['id'];
                    }else{
                        $ID = "";
                    }
                    
                    // create array variable to store data from database
                    $data = array();
                    
                    // get all data from menu table and category table
                    $sql_query = "SELECT aid, announcement_heading, announcement_date, announcement_status, category_name, announcement_image, announcement_description 
                            FROM tbl_announcement m, announcement_category c
                            WHERE m.aid = ? AND m.cat_id = c.cid";
                    
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                        // Bind your variables to replace the ?s
                        $stmt->bind_param('s', $ID);
                        // Execute query
                        $stmt->execute();
                        // store result 
                        $stmt->store_result();
                        $stmt->bind_result($data['aid'], 
                                $data['announcement_heading'], 
                                $data['announcement_date'], 
                                $data['announcement_status'], 
                                $data['category_name'],
                                $data['announcement_image'],
                                $data['announcement_description']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }
                    
                ?>

            <div>
                <hr>
                <div style="text-align: center;">
                    <h6>
                    View: Announcement Details
                    </h6>
                </div>
                <hr>
                <form method="post">
                    <table id="viewdetails" class="font-sizee">
                        <tr>
                            <th>ID</th>
                            <td><?php echo $data['aid']; ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $data['announcement_heading']; ?></td>
                        </tr>
                        <tr>
                            <th>Added on</th>
                            <td><?php echo $data['announcement_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td class="detail"><?php echo $data['category_name']; ?></td>
                        </tr>
                        <tr>
                            <th class="detail">Image</th>
                            <td class="detail"><img src="upload/<?php echo $data['announcement_image']; ?>" width="200" height="150"/></td>
                        </tr>
                        <tr>
                            <th class="detail">Announcement Description</th>
                            <td class="detail"><?php echo $data['announcement_description']; ?></td>
                        </tr>
                    </table>
                </form>
                <br>
                <div id="option_menu">
                        <a href="announcement_editdetails.php?id=<?php echo $ID; ?>"><button class="btn btn-success font-sizee form-control btnmargin">Edit</button></a>
                        <a href=announcement_delannouncement.php?id=<?php echo $ID; ?>"><button class="btn btn-danger font-sizee form-control btnmargin" ">Delete</button></a>
                        <a class="btn-primary btn font-sizee form-control" style="margin-bottom: 30px;" href="postannouncement.php">Back</a>
                </div>
                
                </div>
                            
                <div class="separator"> </div>
            </div>
			
			 

				
			</section>
	
			<script src="resident-js/barangay.js"></script>
			<script src="announcement_css/js/jquery.min.js"></script>
   			<script src="announcement_css/js/bootstrap.min.js"></script>	
	</body>
</html>
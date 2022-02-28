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
         .detailwidth{width: 45%;}
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
                        <a href="postannouncement.php" style="text-decoration: none; color: white;">Post Announcement</a><label> >> </label><a href="#" style="text-decoration: underline; color: black;">Edit Announcement</a>
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
                            
                            // create array variable to store category data
                            $reply_data = array();
                                
                            $sql_query = "SELECT id, username 
                                    FROM contactustbl 
                                    ORDER BY id ASC";
                                    
                            $stmt_reply = $connect->stmt_init();
                            if($stmt_reply->prepare($sql_query)) {	
                                // Execute query
                                $stmt_reply->execute();
                                // store result 
                                $stmt_reply->store_result();
                                $stmt_reply->bind_result($reply_data['id'], 
                                    $reply_data['username']
                                    );
                                    
                            }
                            
                            
                            if(isset($_POST['btnReply'])){
                                
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $subject = $_POST['subject'];
                                $message = $_POST['message'];
                                
                                // get image info
                                $announcement_image = $_FILES['announcement_image']['name'];
                                $image_error = $_FILES['announcement_image']['error'];
                                $image_type = $_FILES['announcement_image']['type'];
                                    
                                // create array variable to handle error
                                $error = array();
                                
                                if(empty($announcement_heading)){
                                    $error['announcement_heading'] = " <span class='label label-danger'>Required, please fill out this field!!</span>";
                                }
                                    
                                if(empty($cid)){
                                    $error['cid'] = " <span class='label label-danger'>Required, please fill out this field!!</span>";
                                }				
                                    
                                if(empty($announcement_date)){
                                    $error['announcement_date'] = " <span class='label label-danger'>Required, please fill out this field!!</span>";
                                }			

                                if(empty($announcement_description)){
                                    $error['announcement_description'] = " <span class='label label-danger'>Required, please fill out this field!!</span>";
                                }
                                
                                // common image file extensions
                                $allowedExts = array("gif", "jpeg", "jpg", "png");
                                
                                // get image file extension
                                error_reporting(E_ERROR | E_PARSE);
                                $extension = end(explode(".", $_FILES["announcement_image"]["name"]));
                                
                                if(!empty($announcement_image)){
                                    if(!(($image_type == "image/gif") || 
                                        ($image_type == "image/jpeg") || 
                                        ($image_type == "image/jpg") || 
                                        ($image_type == "image/x-png") ||
                                        ($image_type == "image/png") || 
                                        ($image_type == "image/pjpeg")) &&
                                        !(in_array($extension, $allowedExts))){
                                        
                                        $error['announcement_image'] = "*<span class='label label-danger'>Image type must jpg, jpeg, gif, or png!</span>";
                                    }
                                }
                                
                                        
                                if( !empty($announcement_heading) && 
                                    !empty($cid) && 
                                    !empty($announcement_date) && 
                                    !empty($announcement_description) && 
                                    empty($error['announcement_image'])){
                                    
                                    if(!empty($announcement_image)){
                                        
                                        // create random image file name
                                        $string = '0123456789';
                                        $file = preg_replace("/\s+/", "_", $_FILES['announcement_image']['name']);
                                        $function = new functions;
                                        $announcement_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                    
                                        // delete previous image
                                        $delete = unlink('upload/'."$previous_announcement_image");
                                        $delete = unlink('upload/thumbs/'."$previous_announcement_image");
                                        
                                        // upload new image
                                        $unggah = 'upload/'.$announcement_image;
                                        $upload = move_uploaded_file($_FILES['announcement_image']['tmp_name'], $unggah);

                                        error_reporting(E_ERROR | E_PARSE);
                                        copy($announcement_image, $unggah);
                                                        
                                            $thumbpath= 'upload/thumbs/'.$announcement_image;
                                            $obj_img = new thumbnail_images();
                                            $obj_img->PathImgOld = $unggah;
                                            $obj_img->PathImgNew =$thumbpath;
                                            $obj_img->NewWidth = 72;
                                            $obj_img->NewHeight = 72;
                                            if (!$obj_img->create_thumbnail_images()) 
                                                {
                                                    echo "Thumbnail not created... please upload image again";
                                                    exit;
                                                }	 
                        
                                        // updating all data
                                        $sql_query = "UPDATE tbl_announcement 
                                                SET announcement_heading = ? , cat_id = ?, announcement_date = ?, announcement_image = ?, announcement_description = ? 
                                                WHERE aid = ?";
                                        
                                        $upload_image = $announcement_image;
                                        $stmt = $connect->stmt_init();
                                        if($stmt->prepare($sql_query)) {	
                                            // Bind your variables to replace the ?s
                                            $stmt->bind_param('ssssss', 
                                                        $announcement_heading, 
                                                        $cid, 
                                                        $announcement_date, 
                                                        $upload_image,
                                                        $announcement_description,
                                                        $ID);
                                            // Execute query
                                            $stmt->execute();
                                            // store result 
                                            $update_result = $stmt->store_result();
                                            $stmt->close();
                                        }
                                    }else{
                                        
                                        // updating all data except image file
                                        $sql_query = "UPDATE tbl_announcement 
                                                SET announcement_heading = ? , cat_id = ?, 
                                                announcement_date = ?, announcement_description = ? 
                                                WHERE aid = ?";
                                                
                                        $stmt = $connect->stmt_init();
                                        if($stmt->prepare($sql_query)) {	
                                            // Bind your variables to replace the ?s
                                            $stmt->bind_param('sssss', 
                                                        $announcement_heading, 
                                                        $cid,
                                                        $announcement_date, 
                                                        $announcement_description,
                                                        $ID);
                                            // Execute query
                                            $stmt->execute();
                                            // store result 
                                            $update_result = $stmt->store_result();
                                            $stmt->close();
                                        }
                                    }
                                        
                                    // check update result
                                    if($update_result){
                                        $error['update_data'] = " <span class='form-control alert alert-success font-sizee'>Successfully Updated Announcement.</span>";
                                    }else{
                                        $error['update_data'] = " <span class='label label-danger font-sizee'>Failed to Update Announcement.</span>";
                                    }
                                }
                                
                            }
                            
                            // create array variable to store previous data
                            $data = array();
                                
                            $sql_query = "SELECT * FROM tbl_announcement WHERE aid = ?";
                                
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
                                        $data['cid'], 
                                        $data['Price'], 
                                        $data['announcement_date'], 
                                        $data['announcement_image'],
                                        $data['announcement_description']
                                        );
                                $stmt->fetch();
                                $stmt->close();
                            }
                            
                                
                        ?>
                        <div class="col-md-12">
                            <div style="text-align: center;">
                                <hr>
                                    <h6>
                                        Edit Announcement
                                    </h6>
                                <hr>
                            </div>
                        <span class="font-sizee"><?php echo isset($error['update_data']) ? $error['update_data'] : '';?></span>
                        <hr />
                        </div>
                        <form method="post" enctype="multipart/form-data" class="font-sizee">
                        <div>
                            <label>Announcement Description :</label><?php echo isset($error['announcement_description']) ? $error['announcement_description'] : '';?>
                            <textarea name="announcement_description" id="announcement_description" class="form-control" rows="8"><?php echo $data['announcement_description']; ?></textarea>
                            <script type="text/javascript" src="announcement_css/js/ckeditor/ckeditor.js"></script>
                            <script type="text/javascript">                        
                                CKEDITOR.replace( 'announcement_description' );
                            </script>
                            <br>
                            <div>
                                <label>Menu Name :</label><?php echo isset($error['announcement_heading']) ? $error['announcement_heading'] : '';?>
                                <input type="text" name="announcement_heading" class="form-control font-sizee" value="<?php echo $data['announcement_heading']; ?>"/>
                            </div>

                            <div>
                            <br>

                            <label>Announcement Date :</label><?php echo isset($error['announcement_date']) ? $error['announcement_date'] : '';?>
                            <input type="date" name="announcement_date" id="announcement_date" value="<?php echo $data['announcement_date']; ?>" class="form-control font-sizee">
                            <br/>
                            <label>Category :</label><?php echo isset($error['cid']) ? $error['cid'] : '';?>
                            <select name="cid" class="form-control font-sizee">
                                <?php while($stmt_category->fetch()){ 
                                    if($category_data['cid'] == $data['cid']){?>
                                        <option value="<?php echo $category_data['cid']; ?>" selected="<?php echo $data['cid']; ?>" ><?php echo $category_data['category_name']; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $category_data['cid']; ?>" ><?php echo $category_data['category_name']; ?></option>
                                    <?php }} ?>
                            </select>
                            
                            <br/>
                            <label>Image :</label><?php echo isset($error['announcement_image']) ? $error['announcement_image'] : '';?>
                            <input type="file" class="form-control font-sizee" name="announcement_image" id="announcement_image"/><br />
                            <img  src="upload/<?php echo $data['announcement_image']; ?>" width="210" height="160"/>
                            </div>

                            <div>
                            
                            </div>
                        </div>
                            
                        <div>
                        <br/>
                            <div>
                                <input type="submit" class="btn-success btn form-control font-sizee btnmargin" value="Update" name="btnEditDetails" />
                                <a class="btn-primary btn font-sizee form-control" style="margin-bottom: 30px;" href="postannouncement.php">Back</a>
                            </div>
                        </form>
                        <div class="separator"> </div>
                    </div>
                    <br>
			</section>
	
			<script src="resident-js/barangay.js"></script>	
	</body>
</html>
<?php
session_start();

include "../db/conn.php";
include "../db/documents.php";
include('../announcement_includes/functions.php'); 
include "../db/viewdetinsert.php";
include('../send_email.php');

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admincompviewdet.css">
	<link rel="stylesheet" href="../announcement_css/custom.css">

	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Admin Complaint Details </title>
	 
	<!-- Side Navigation Bar-->
		  <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
            <li>
			  <a class="side_bar nav-button" href="compAdmin_dashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			  <li>
			   <a class="side_bar nav-button nav-active" href="compAdmin_Lupon.php">
				 <i class='bx bx-user-circle lupon'></i>
				 <span class="links_name">Lupon</span>
			   </a>
			   <span class="tooltip">Lupon</span>
			 </li>
			 
			 <li>
			   <a class="side_bar nav-button" href="compAdmin_BPSO.php">
				 <i class='bx bx-user bpso'></i>
				 <span class="links_name">BPSO</span>
			   </a>
			   <span class="tooltip">BPSO</span>
			 </li>

			 <li>
			   <a class="side_bar nav-button" href="compAdmin_Vawc.php">
				 <i class='bx bx-user-check vawc'></i>
				 <span class="links_name">VAWC</span>
			   </a>
			   <span class="tooltip">VAWC</span>
			 </li>

			 <li>
			   <a class="side_bar nav-button" href="compAdmin_BCPC.php">
				 <i class='bx bx-user-pin bcpc'></i>
				 <span class="links_name">BCPC</span>
			   </a>
			   <span class="tooltip">BCPC</span>
			 </li>
			  
			 <li class="profile">
				 <div class="profile-details">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
                        <div class="job" id=""><?php echo $dept; ?>|| Online</div>
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
						<h5>Lupon >> View Lupon Details
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
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
                    $sql_query = "SELECT  admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, bemailadd, n_violator, violator_age, violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image, created_on
                            FROM admin_complaints
                            WHERE admincomp_id = ?";
                    
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                        // Bind your variables to replace the ?s
                        $stmt->bind_param('s', $ID);
                        // Execute query
                        $stmt->execute();
                        // store result 
                        $stmt->store_result();
                        $stmt->bind_result($data['admincomp_id'], 
                            $data['n_complainant'],
                            $data['comp_age'],
                            $data['comp_gender'],
                            $data['comp_address'],
                            $data['inci_address'],
                            $data['contactno'],
                            $data['bemailadd'],
                            $data['n_violator'],
                            $data['violator_age'],
                            $data['violator_gender'],
                            $data['relationship'],
                            $data['violator_address'],
                            $data['witnesses'],
                            $data['complaints'],
                            $data['dept'],
                            $data['app_date'],
                            $data['app_by'],
                            $data['blotterid_image'],
                            $data['created_on']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }

                ?>

                 <div>
                <hr>
                <div style="text-align: center;">
                    <h5>
                    View: Lupon
                    </h5>
                </div>
                <hr>
        
                <div style="float: right; display: block;">
                    <a href="compAdmin_Lupon.php">
                        <img src="../img/back.png" title="Back?" class="hoverback" style="width: 50px; height: 50; cursor: pointer;" alt="Back?">
                    </a>
                </div>

                <iframe type="file" style="width:100%; height: 500px;" src="../img/fileupload_admin/<?php echo $data['blotterid_image']; ?>">Here's the Document</iframe>
                <br>
                <br>
                    <table id="viewdetails" class="font-sizee">
                        <tr>
                            <th width="30%">Assigned Department: </th>
                            <td><strong><?php echo $data['dept']; ?> Dept.</strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Approved Date: </th>
                            <td><strong><?php echo $data['app_date']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Facilitated by: </th>
                            <td><strong><?php echo $data['app_by']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Created on </th>
                            <td><strong><?php echo $data['created_on']; ?></strong></td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <label><strong>Complaints: </strong></label>
                    <strong>
                        <textarea class="form-control inputtext" style="padding: 20px; background: #D6EACA;  " disabled="disabled" id="" cols="175" rows="7" ><?php echo $data['complaints']; ?></textarea>
                    </strong>
                    <br>
                    <br>
                    <div style="display: flex;">
                    <table id="viewdetails" class="font-sizee" style="margin-right: 25px;">
                        <tr>
                            <th width="30%">ID No.</th>
                            <td><?php echo $data['admincomp_id']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Complainant's Name</th>
                            <td><strong><?php echo $data['n_complainant']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Complainant's Age</th>
                            <td><strong><?php echo $data['comp_age']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Complainant's Gender</th>
                            <td><?php echo $data['comp_gender']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Complainant's Address</th>
                            <td><?php echo $data['comp_address']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Incident Address</th>
                            <td><?php echo $data['inci_address']; ?></td>
                        </tr>
                       
                        <tr>
                            <th width="30%">Contact No</th>
                            <td><strong><?php echo $data['contactno']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Email</th>
                            <td><strong><?php echo $data['bemailadd']; ?></strong></td>
                        </tr>
                     </div>                    
                    </table>
                    
                    <table id="viewdetails" class="font-sizee">
                        <tr>
                            <th width="30%">Name of Violator</th>
                            <td><strong><?php echo $data['n_violator']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Violator's Age</th>
                            <td><strong><?php echo $data['violator_age']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Violator's Gender</th>
                            <td><?php echo $data['violator_gender']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Relationship</th>
                            <td><?php echo $data['relationship']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Violator's Address</th>
                            <td><?php echo $data['violator_address']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Witnesses</th>
                            <td><?php echo $data['witnesses']; ?></td>
                        </tr>
                    </table>
                    </div>
                   
                </div>
                <br>
                <br>
               
          
                </div>
                
                </div>
                            
                <div class="separator"> </div>
            </div>       
            <br>
            <br>
	</section>	
	</body>
</html>
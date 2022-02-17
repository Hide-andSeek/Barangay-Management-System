<?php
session_start();

include "../db/conn.php";
include "../db/documents.php";
include('../announcement_includes/functions.php'); 
include "../db/viewdetinsert.php";

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


<?php

// require '../vendor/autoload.php';

// use SMSGatewayMe\Client\ApiClient;
// use SMSGatewayMe\Client\Configuration;
// use SMSGatewayMe\Client\Api\MessageApi;
// use SMSGatewayMe\Client\Model\SendMessageRequest;

// // Configure client
// $config = Configuration::getDefaultConfiguration();
// $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTYzOTY1MTE0MCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkyMDA2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.lPTgmVIR-RnDz2Z2OBr-lRcoy3Ppgi_5Nt-qQ_61eWE');
// $apiClient = new ApiClient($config);
// $messageClient = new MessageApi($apiClient);

// if (isset($_POST["number"]) && isset($_POST["msg"])) {
//     // Sending a SMS Message
//     $sendMessageRequest2 = new SendMessageRequest([
//         'phoneNumber' => $_POST["number"],
//         'message' => $_POST["msg"],
//         'deviceId' => 126644
//     ]);
//     $sendMessages = $messageClient->sendMessages([
//         $sendMessageRequest2
		
//     ]);
// }
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
	<link rel="stylesheet" href="../announcement_css/custom.css">
	<link rel="stylesheet/less" type="text/css" href="../css/animated.less" />
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> View: Barangay Indigency </title>
	 
	 
	 <style>
 *{font-size: 13px;}
		 .home-section{
			min-height: 95vh;
			}

		 .home-section{
			min-height: 95vh;
			}
        #viewdetails {
          border-collapse: collapse;
          width: 100%;
          box-shadow:  0 3px 10px rgba(0 0 0/ 0.2)
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
          background-color: #D6EACA;
          color: black;
        }
        .btnmargin{margin-bottom: 5px;}

        #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
        display: absolute; /* Hidden by default */
        z-index: 1; /* Sit on top */
        padding-top: 120px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.6); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
        display: absolute;
        margin: auto;
        width: 80%;
        max-width: 700px;
        }


        /* Add Animation */
        .modal-content, #caption {  
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 25px;
        font-weight: bold;
        transition: 0.3s;
        }

        .close:hover,
        .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }
        .viewbtn{width: 100%; height: 35px;  background-color: #91D9F1; color: black; border: 1px solid #008CBA;}
        .viewbtn:hover{ background-color: #008CBA;color: white;}
	 </style>
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
						<h5>Barangay Indigency >> View Details
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
                    $sql_query = "SELECT indigency_id, fullname, address, purpose, contactnum, emailaddress, id_type, date_issue, status, indigencyid_image, indigencyfilechoice
                            FROM certificateindigency
                            WHERE indigency_id = ?";
                    
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                        // Bind your variables to replace the ?s
                        $stmt->bind_param('s', $ID);
                        // Execute query
                        $stmt->execute();
                        // store result 
                        $stmt->store_result();
                        $stmt->bind_result($data['indigency_id'], 
                                $data['fullname'],
                                $data['address'],
                                $data['purpose'],
                                $data['contactnum'],
                                $data['emailaddress'],
                                $data['id_type'],
                                $data['date_issue'],
                                $data['status'],
                                $data['indigencyid_image'],
                                $data['indigencyfilechoice']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }

                    if(isset($_POST['btnDeny'])){
                    
                      $status	= $_POST['status'];
                      $indigency_id = $_POST['indigency_id'];

                      $sql = "UPDATE certificateindigency SET status = 'Deny' WHERE indigency_id = $indigency_id";

                      if (mysqli_query($connect, $sql)) {
                        echo "<script>
                                  alert('Denied Request!');
                                  window.location.href='certificateofindigency.php';
                              </script>";
                      } else {
                        echo "Error updating record: " . mysqli_error($connect);
                      }
                  }

                  

                  if(isset($_POST['markasdone'])){

                      $status	= $_POST['status'];
                      $indigency_id = $_POST['indigency_id'];

                      $sql = "UPDATE certificateindigency SET status = 'Approved' WHERE indigency_id = $indigency_id";

                      if (mysqli_query($connect, $sql)) {
                      echo "<script>
                                  alert('Mark as Done Successfully!');
                                  window.location.href='certificateofindigency.php';
                              </script>";
                      } else {
                      echo "Error updating record: " . mysqli_error($connect);
                      }
                  }
                    
                ?>

            <div>
                <hr>
                <div style="text-align: center;">
                    <h5>
                    Certificate of Indigency: View Details
                    </h5>
                </div>
                <hr>
                <div style="float: right;">
                    <a href="certificateofindigency.php">
                        <img src="../img/back.png" title="Back?" class="hoverback" style="width: 50px; height: 50; cursor: pointer;" alt="Back?">
                    </a>
                </div>
                <form method="post" action=""  enctype="multipart/form-data">
                    <div style="display: flex;">
                    <table id="viewdetails" class="font-sizee">
                        <tr>
                            <th width="30%">ID No.</th>
                            <td><input type="hidden" name="approvedindigency_id" value="<?php echo $data['indigency_id']; ?>"><?php echo $data['indigency_id']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Fullname</th>
                            <td><input type="hidden" name="fullname" value="<?php echo $data['fullname']; ?>"><strong><?php echo $data['fullname']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Address</th>
                            <td><input type="hidden" name="address" value="<?php echo $data['address']; ?>"><strong><?php echo $data['address']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Purpose</th>
                            <td><input type="hidden" name="purpose" value="<?php echo $data['purpose']; ?>"><strong><?php echo $data['purpose']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Contact</th>
                            <td><input type="hidden" name="contactnum" value="<?php echo $data['contactnum']; ?>"><strong><?php echo $data['contactnum']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Email</th>
                            <td><input type="hidden" name="emailaddress" value="<?php echo $data['emailaddress']; ?>"><?php echo $data['emailaddress']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">ID Type</th>
                            <td><input type="hidden" name="id_type" value="<?php echo $data['id_type']; ?>"><?php echo $data['id_type']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Date Issued</th>
                            <td><input type="hidden" name="date_issue" value="<?php echo $data['date_issue']; ?>"><?php echo $data['date_issue']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Document Type</th>
                            <td><input type="hidden" name="indigencyfilechoice" value="<?php echo $data['indigencyfilechoice']; ?>"><?php echo $data['indigencyfilechoice']; ?></td>
                        </tr>
                    </table>
                    </div>
                    <br>
                    <!-- <h6>Identification Card (Click to Zoom): </h6>
                    <div id="myModal" class="modal" style="display: absolute;">
                        <span class="close">&times;</span>
                        <img src="../img/fileupload_indigency/<?php echo $data['indigencyid_image']; ?>" style=" width: 80%; height: 80%"  class="modal-content" id="img01"/>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <img id="myImg" src="../img/fileupload_indigency/<?php echo $data['indigencyid_image']; ?>" alt="Snow" style="width:100%;max-width:300px">
                    </div> -->
                <br>
                <div id="option_menu">
                      <div class="information col">
                        <label class="employee-label"> Approved By </label>
                          <input class="form-control btnmargin inputtext control-label" id="approvedby" value="<?php echo $user; ?>" name ="approvedby" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> 
                      </div>

                      <div class="information col">
                        <label class="employee-label ">Approval Date </label>
                          <input type="date" class="form-control btnmargin inputtext control-label" id="approvedate" name="app_date">
                      </div>
                     
                      <div class="information col">
                      <label class="employee-label ">Attach 2x2 Pic</label>
                          <input type='file' class="form-control" name='indigencyid_image' id="indigencyid_image"/>
                          <?php echo isset($error['indigencyid_image']) ? $error['indigencyid_image'] : '';?>
                      </div>
                        <input type="hidden" name="status" id="status" value="Approved">
                        <a><button class="btn btn-success font-sizee form-control btnmargin" name="insertindigency">Approve</button></a>
                  </form>
                        <form action="" method="post">
                                <input type="hidden" name="clearance_id" id="clearance_id" value="<?php echo $data['clearance_id']; ?>">
                                <input type="hidden" name="clearance_status" id="clearance_status" value="Deny">
                                 <a><button class="btn btn-danger font-sizee form-control btnmargin" name="btnDeny">Deny</button></a>
                            </div>
                        </form>
                        <?php
                        if(ISSET($_SESSION['status'])){
                        if($_SESSION['status'] == "ok"){
                            ?>
                        
                                <form action="" method="post">
                                    <div>
                                    
                                        <input type="hidden" name="indigency_id" id="indigency_id" value="<?php echo $data['indigency_id']; ?>">
                                        <input type="hidden" name="status" id="status" value="Approved">
                                        <div style="text-align: center;"><?php echo $_SESSION['result']?> </div>
                                        <button type="submit" style="cursor: pointer; margin-bottom: 5px;" class="form-control generate viewbtn done" id="markasdone" name="markasdone">Mark as done <i class="bx bx-check"></i></button>
                                        
                                    </div>
                                </form>
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
                </div>
                
                </div>
                            
                <div class="separator"> </div>
            </div>
			
	</section>	
    <script>
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        }

    </script>
    <script>
	    document.querySelector("#approvedate").valueAsDate = new Date();
    </script>
	</body>
</html>
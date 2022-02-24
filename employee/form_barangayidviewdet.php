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
	 <meta http-equiv="refresh" content="120">

     <title> Req Document Dept. - Barangay ID </title>
	 
	 
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
                .hoverback:hover{background: orange; border-radius: 70%;}
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

              <li>
				<a class="side_bar" href="payment_history.php">
				   <i class='bx bx-data payment'></i>
				  <span class="links_name">Payment History</span>
				</a>
				 <span class="tooltip">Payment History</span>
			  </li>
			
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="../img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id=""><?php echo $dept; ?></div>
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
						<h5>Barangay ID >> View Barangay Details
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
                    $sql_query = "SELECT  barangay_id, fname, mname, lname, address, birthday,placeofbirth, precintno, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, brgyidfilechoice, id_image
                            FROM barangayid
                            WHERE barangay_id = ?";
                    
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                        // Bind your variables to replace the ?s
                        $stmt->bind_param('s', $ID);
                        // Execute query
                        $stmt->execute();
                        // store result 
                        $stmt->store_result();
                        $stmt->bind_result($data['barangay_id'], 
                                $data['fname'],
                                $data['mname'],
                                $data['lname'],
                                $data['address'],
                                $data['birthday'],
                                $data['placeofbirth'],
                                $data['precintno'],
                                $data['contact_no'],
                                $data['emailadd'],
                                $data['guardianname'],
                                $data['emrgncycontact'],
                                $data['reladdress'],
                                $data['dateissue'],
                                $data['status'],
                                $data['brgyidfilechoice'],
                                $data['id_image']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }

                    if(isset($_POST['btnEdit'])){
                    
                        $status	= $_POST['status'];
                        $barangay_id	= $_POST['barangay_id'];

                        $sql = "UPDATE barangayid SET status = 'Deny' WHERE barangay_id = $barangay_id";

                        if (mysqli_query($connect, $sql)) {
                          echo "<script>
                                    alert('Denied Request!');
                                    window.location.href='barangayid.php';
                                </script>";
                        } else {
                          echo "Error updating record: " . mysqli_error($connect);
                        }
                    }

                    

                    if(isset($_POST['btnEditt'])){

                        $status	= $_POST['status'];
                        $barangay_id = $_POST['barangay_id'];

                        $sql = "UPDATE barangayid SET status = 'Approved' WHERE barangay_id = $barangay_id";

                        if (mysqli_query($connect, $sql)) {
                        echo "<script>
                                    alert('Mark as Done Successfully!');
                                    window.location.href='barangayid.php';
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
                    View: Barangay ID Details
                    </h5>
                </div>
                <hr>
                <div style="float: right;">
                    <a href="barangayid.php">
                        <img src="../img/back.png" title="Back?" class="hoverback" style="width: 50px; height: 50; cursor: pointer;" alt="Back?">
                    </a>
                </div>
                <!-- <iframe src="https://docs.google.com/gview?url=http://remote.url.tld/path/to/document.doc&embedded=true" ></iframe> -->
                <!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://remote.url.tld/img/fileupload_barangayid/<?php echo $data['id_image']; ?>/to/document.doc' width='100%' height='100%' frameborder='0'></iframe> -->

                <!-- <iframe type="file" style="width:100%; height: 500px;" src="../img/fileupload_barangayid/<?php echo $data['id_image']; ?>">Here's the Document</iframe> -->
                <?php
                        if(ISSET($_SESSION['status'])){
                        if($_SESSION['status'] == "ok"){
                    ?>
                   
                        <form action="" method="post">
                            <div class="alert alert-info messcompose"><?php echo $_SESSION['result']?>
                               
                                <input type="hidden" name="barangay_id" id="barangay_id" value="<?php echo $data['barangay_id']; ?>">
                                <input type="hidden" name="status" id="status" value="Approved">
                                <button type="submit" style="cursor: pointer;" class="form-control generate viewbtn done" name="btnEditt">Mark as done</button>
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
                <form method="post" action="" enctype="multipart/form-data">
                    <div style="display: flex;">
                    <table id="viewdetails" class="font-sizee">
                        <span><strong> Personal Information</strong></span>
                        <tr>
                            <th width="30%">ID No.</th>
                            <td><input type="hidden" name="app_brgyid" value="<?php echo $data['barangay_id']; ?>"><?php echo $data['barangay_id']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">First Name</th>
                            <td><input type="hidden" name="fname" value="<?php echo $data['fname']; ?>"><?php echo $data['fname']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Middle Name</th>
                            <td><input type="hidden" name="mname" value="<?php echo $data['mname']; ?>"><?php echo $data['mname']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Last Name</th>
                            <td><input type="hidden" name="lname" value="<?php echo $data['lname']; ?>"><?php echo $data['lname']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Address</th>
                            <td><input type="hidden" name="address" value="<?php echo $data['address']; ?>"><?php echo $data['address']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Birthday</th>
                            <td><input type="hidden" name="birthday" value="<?php echo $data['birthday']; ?>"><?php echo $data['birthday']; ?></td>
                        </tr>
                       
                        <tr>
                            <th width="30%">Place of Birth</th>
                            <td><input type="hidden" name="placeofbirth" value="<?php echo $data['placeofbirth']; ?>"><?php echo $data['placeofbirth']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Precint no.</th>
                            <td><input type="hidden" name="precintno" value="<?php echo $data['precintno']; ?>"><?php echo $data['precintno']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Contact</th>
                            <td><input type="hidden" name="contact_no" value="<?php echo $data['contact_no']; ?>"><?php echo $data['contact_no']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Email Address</th>
                            <td><input type="hidden" name="emailadd" value="<?php echo $data['emailadd']; ?>"><?php echo $data['emailadd']; ?></td>
                        </tr>
                 
                    </table>
                    <br>
                    <div><strong> In case of Emergency:</strong></div>
                    <br>
                    <table id="viewdetails" class="font-sizee">
                        <tr>
                            <th width="30%">Guardian name</th>
                            <td><input type="hidden" name="guardianname" value="<?php echo $data['guardianname']; ?>"><?php echo $data['guardianname']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Emergency Contact</th>
                            <td><input type="hidden" name="emrgncycontact" value="<?php echo $data['emrgncycontact']; ?>"><?php echo $data['emrgncycontact']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Guardian Address</th>
                            <td><input type="hidden" name="reladdress" value="<?php echo $data['reladdress']; ?>"><?php echo $data['reladdress']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Date Issued</th>
                            <td><input type="hidden" name="dateissue" value="<?php echo $data['dateissue']; ?>"><?php echo $data['dateissue']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Document Type</th>
                            <td><input type="hidden" name="brgyidfilechoice" value="<?php echo $data['brgyidfilechoice']; ?>"><?php echo $data['brgyidfilechoice']; ?></td>
                        </tr>
                    </table>
                    </div>
                    <br>
                    <!-- <div id="myModal" class="modal" style="display: absolute;">
                        <span class="close">&times;</span>
                        <img src="../img/fileupload_barangayid/<?php echo $data['id_image']; ?>" style=" width: 80%; height: 80%"  class="modal-content" id="img01"/>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <img id="myImg" src="../img/fileupload_barangayid/<?php echo $data['id_image']; ?>" alt="Snow" style="width:100%;max-width:300px">
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
                    <input type="hidden" name="status" id="status" value="Approved">
                    <div class="information col">
						<label class="employee-label ">Attach 2x2 Pic</label>
                        <input type='file' class="form-control" name='id_image' id="id_image"/>
                        <?php echo isset($error['id_image']) ? $error['id_image'] : '';?>
					</div>
                 
                        <a><button class="btn btn-success font-sizee form-control btnmargin" name="insertappbrgyid">Approve</button></a>
                </form>

                        <form action="" method="post">
                                <input type="hidden" name="barangay_id" id="barangay_id" value="<?php echo $data['barangay_id']; ?>">
                                <input type="hidden" name="status" id="status" value="Deny">
                                 <a><button class="btn btn-danger font-sizee form-control btnmargin" name="btnEdit">Deny</button></a>
                            </div>
                        </form>
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
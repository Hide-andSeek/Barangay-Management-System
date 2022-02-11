<?php
session_start();

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

     <title> Details: Barangay Clearance </title>
	 
	 
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
						<h5>Barangay Clearance >> View Barangay Clearance Detail
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
                    $sql_query = "SELECT clearance_id, full_name, age, status, nationality, address,contactno, emailadd, purpose,date_issued, ctc_no, issued_at, precint_no, clearanceid_image, clearance_status
                            FROM barangayclearance
                            WHERE clearance_id = ?";
                    
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                        // Bind your variables to replace the ?s
                        $stmt->bind_param('s', $ID);
                        // Execute query
                        $stmt->execute();
                        // store result 
                        $stmt->store_result();
                        $stmt->bind_result($data['clearance_id'], 
                            $data['full_name'],
                            $data['age'],
                            $data['status'],
                            $data['nationality'],
                            $data['address'],
                            $data['contactno'],
                            $data['emailadd'],
                            $data['purpose'],
                            $data['date_issued'],
                            $data['ctc_no'],
                            $data['issued_at'],
                            $data['precint_no'],
                            $data['certificate_image'],
                            $data['clearance_status']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }
                    
                ?>

            <div>
                <hr>
                <div style="text-align: center;">
                    <h5>
                    View: Barangay Clearance Detail
                    </h5>
                </div>
                <hr>
                <form method="post">
                    <div style="display: flex;">
                    <table id="viewdetails" class="font-sizee">
                        <tr>
                            <th width="30%">ID No.</th>
                            <td><?php echo $data['clearance_id']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Fullname</th>
                            <td><strong><?php echo $data['full_name']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Age</th>
                            <td><strong><?php echo $data['age']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Status</th>
                            <td><strong><?php echo $data['status']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Nationality</th>
                            <td ><?php echo $data['nationality']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Address</th>
                            <td ><?php echo $data['address']; ?></td>
                        </tr>
                       
                        <tr>
                            <th width="30%">Contact No</th>
                            <td><?php echo $data['contactno']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Email</th>
                            <td><strong><?php echo $data['emailadd']; ?></strong></td>
                        </tr>
                    </table>
                        <table id="viewdetails" class="font-sizee">
                        <tr>
                            <th width="30%">Purpose</th>
                            <td><strong><?php echo $data['purpose']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Date Issued</th>
                            <td><?php echo $data['date_issued']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">CTC no</th>
                            <td><?php echo $data['ctc_no']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Issued at</th>
                            <td><?php echo $data['issued_at']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Precint No</th>
                            <td><?php echo $data['precint_no']; ?></td>
                        </tr>
                    </table>
                    </div>
                    <br>
                    <h6>Identification Card (Click to Zoom): </h6>
                    <div id="myModal" class="modal" style="display: absolute;">
                        <span class="close">&times;</span>
                        <img src="../img/fileupload_clearance/<?php echo $data['certificate_image']; ?>" style=" width: 80%; height: 80%"  class="modal-content" id="img01"/>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <img id="myImg" src="../img/fileupload_clearance/<?php echo $data['certificate_image']; ?>" alt="Snow" style="width:100%;max-width:300px">
                    </div>
                </form>
                <br>
                <div id="option_menu">
                    <div class="information col">
						<label class="employee-label ">Approval Date </label>
							<input type="date" class="form-control btnmargin inputtext control-label" id="approvedate" name="app_date">
					</div>

			        <div class="information col">
						<label class="employee-label"> Approved By </label>
							<input class="form-control btnmargin inputtext control-label" id="app_by" value="<?php echo $user; ?>" name ="app_by" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> 
					</div>
                        <a><button class="btn btn-success font-sizee form-control btnmargin">Approve</button></a>
                        <a href=announcement_delannouncement.php?id=<?php echo $ID; ?>"><button class="btn btn-danger font-sizee form-control btnmargin">Deny</button></a>
                        <a class="btn-primary btn font-sizee form-control" style="margin-bottom: 30px;" href="barangayclearance.php">Back</a>
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
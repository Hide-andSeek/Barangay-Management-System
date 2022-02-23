<?php
session_start();

include "../db/conn.php";
include "../db/documents.php";
include('../announcement_includes/functions.php'); 
include "../db/viewdetinsert.php";
include "../send_email.php";

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

     <title> Make a Payment: Barangay ID </title>
	 
	 
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
        .viewbtn{width: 100%; height: 35px;  background-color: white; color: black; margin-bottom: 10px; border: 1px solid #008CBA;}
        .viewbtn:hover{ background-color: #008CBA;color: white;}
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
						<h5>Barangay ID >> View Approved Details >> Make a Payment
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
                    $sql_query = "SELECT app_brgyid, fname, mname, lname, address, birthday,placeofbirth, precintno,contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, id_image, brgyidfilechoice, approvedby, app_date, status
                            FROM approved_brgyids
                            WHERE app_brgyid = ?";
                    
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                        // Bind your variables to replace the ?s
                        $stmt->bind_param('s', $ID);
                        // Execute query
                        $stmt->execute();
                        // store result 
                        $stmt->store_result();
                        $stmt->bind_result($data['app_brgyid'], 
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
                                $data['id_image'],
                                $data['brgyidfilechoice'],
                                $data['approvedby'],
                                $data['app_date'],
                                $data['status']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }
                ?>

            <div>
                <hr>
                <div style="text-align: center;">
                    <h5>
                    Make a Payment
                    </h5>
                </div>
                <hr>
                <div style="float: right;">
                    <a href="barangayidapproval.php">
                        <img src="../img/back.png" title="Back?" class="hoverback" style="width: 50px; height: 50; cursor: pointer;" alt="Back?">
                    </a>
                </div>
                <?php
                        if(ISSET($_SESSION['status'])){
                        if($_SESSION['status'] == "ok"){
                    ?>
                        <div style="text-align: center;" class="alert alert-info messcompose"><?php echo $_SESSION['result']?> <?php echo $data['emailadd']; ?>. <label>Back to <a href="barangayidapproval.php" style="text-decoration: none;"> Approval Page</a> </label></div>
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
                  <div>  
                <form method="POST" action="" class="body">
                                        <div class="main-content-email">
                                           
                                            <div class="main-content">
                                                <div class="information col">
                                                    <label> Fullname: </label>
                                                    <input class="form-control emailwidth" id="fullname" name="fullname" value="<?php echo $data['fname']; ?> <?php echo $data['mname']; ?> <?php echo $data['lname']; ?>" type="text" placeholder="Enter Fullname">
                                                </div>

                                                <div class="information col">
                                                    <p> To: </p>
                                                    <input required class="form-control emailwidth" id="email" name="email" style="width:100%" value="<?php echo $data['emailadd']; ?>" type="text" placeholder="Enter Email Address">
                                                </div>

                                                <div class="information col">
                                                    <p> Subject: </p>
                                                    <input required class="form-control emailwidth" id="subject" name="subject" value="Payment: Barangay ID(Document Request)" type="text" placeholder="Enter Email">
                                                </div>
                                            </div>

                                            <div class="information col">
                                                <label>Body: </label>
                                                <textarea name="message" id="message" class="form-control inputtext" rows="16" placeholder="Your message">
                                                Good Day! Mr/Ms. <strong style="text-transform: uppercase"><?php echo $data['fname']; ?> <?php echo $data['mname']; ?> <?php echo $data['lname']; ?></strong>    
                                                <p>
                                                Thanks for filling out the form. Your request has been approved. To proceed, we are issuing a payment for a document specifically (Barangay ID) with a total amount of <strong> ₱50 bill</strong>. For a payment we are accepting GCash and Paymaya! Here is the number:
                                                <br>
                                                <br>
                                                Tagalog (Translation)
                                                <br>
                                                Salamat sa pagsagot sa form. Natanggap na namin ang iyong request. Kami ay humihingi ng danyos para sa dokumento partikular na sa (Barangay ID) na may kabuohang halaga na <strong> ₱50</strong>. Para sa pagbabayad kami ay tumatanggap ng GCash at Paymaya! Narito ang numero:
                                                <br>
                                                <br>
                                                For GCash: <strong>09123654789</strong>
                                                <br>
                                                For Paymaya: <strong>09147258963</strong>
                                                <br>
                                                <br>
                                                Kindly attach your reference number here for verification. Visit this page, by simply clicking this link
                                                <br>
                                                <br>
                                                Tagalog: Paki lagay ang iyong reference number para sa beripekasyon. Bisitahin ang pahinang ito, sa pamamagitan lamang ng pag-click sa link
                                                <br>
                                                <br>
                                                Paymaya: http://comm-bms.com/payment_link/paymaya_barangayid_payment.php?id=<?php echo $data['app_brgyid']; ?>
                                                <br>
                                                GCash: http://comm-bms.com/payment_link/gcash_barangayid_payment.php?id=<?php echo $data['app_brgyid']; ?>
                                                <br>
                                                <br>
                                                For more details/questions visit our website.
                                                <br>
                                                <br>
                                                http://comm-bms.com/contact.php
                                                </p>
                                                </textarea>
                                                <script type="text/javascript" src="../announcement_css/js/ckeditor/ckeditor.js"></script>
                                                <script type="text/javascript">                        
                                                    CKEDITOR.replace( 'message' );
                                                </script>
                                            </div>

                                            <div class="sendi">
                                                <button name="sendlinkpayment" class="form-control viewbtn" style="margin-top: 10px; width: 100%; cursor: pointer;"><span class="glyphicon glyphicon-envelope"></span> Send Link <i class="bx bx-send"></i></button>
                                            </div>
                                        </div>
                                    </form>
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
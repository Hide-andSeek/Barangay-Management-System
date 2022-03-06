<?php 
require('timezone.php');
require "db/conn.php";
include('announcement_includes/functions.php'); 

function start_session()
{
	$_SESSION['email']='';
	session_start();
if(empty($_SESSION['email']))
{
	header("Location:index.php");
	exit();
	}
}
echo start_session();
function db_query()
{
global $db;
$stmt=$db->prepare( "SELECT * FROM accreg_resident where resident_id=:uid") ;
if($stmt->execute(['uid'=>$_SESSION['email']]))
{
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$count=$stmt->rowcount();
	       }
	}
	echo db_query();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Profile - Barangay Commonwealth QC.</title>

    <!-- Bootstrap Core CSS -->

    <link href="resident-css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="resident-css/style.css">
    <link rel="stylesheet" href="resident-css/resident.css">
	
	
	<!-- Icon -->
	<link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

    <!-- Custom Fonts -->

   <link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom Animations -->

    <link rel="stylesheet" href="resident-css/animate.css">
	
	<style>
		.body{background: #ebebeb}
		.navnav{background:#35363A; opacity: 0.9;}
		.contact_block-text{width:100%}
    	.cntctbtn{margin-bottom: 15px;}

		#viewdetails {
          border-collapse: collapse;
          width: 100%;
		  text-align: center;
		 
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
		  text-align: center;
          /* background-color: #04AA6D; */
		  background: white;
          color: black;
        }
        .btnmargin{margin-bottom: 5px;}
		.find-us{ padding: 40px;}
		.table-heading{background: #ebebeb; text-align: center; padding: 10px;}
        .reminder{background: #FCF8F2; padding: 20px;}
        .reminder-heading{color: #EEA236}
        .blockqoute-color{border-left-color: #EEA236;}
		.linkpath:hover{color: orange;}
		.usersel{pointer-events: none; border: 1px solid orange}
		.left_userpersonal_info{display: flex;}
		
	</style>
</head>

<body onload=display_ct() id="contact" class="body">
    

    <header id="header">
         <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top navnav">
            <div class="container-fluid top-nav" >
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo-top page-scroll" href="index.php">
                            <img class="brgy-logo"  src="resident-img/Brgy-Commonwealth.png" alt="logo">
                    </a>
                </div>

                 <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden nav-buttons">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="resident-defaultpage.php">Home</a>
                        </li>
                        <li class="logdropdown">
                            <a class="page-scroll logout" href="javascript:void(0)">Announcement</a>
                            <span class="logdropdown-content">
                              <a class="page-scroll" href="residentacademic.php">Academic Related</a>
                              <a class="page-scroll" href="residentbarangayfunds.php">Barangay Funds</a>
                              <a class="page-scroll" href="residentannouncement.php">Latest Announcement</a>
                              <a class="page-scroll" href="residentvaccine.php">Vaccine</a>
                              <a class="page-scroll" href="residentbrgyprogram.php">Barangay Programs</a>
                            </span>
                        </li>
                        <li class="logdropdown">
                            <a class="page-scroll logout" href="javascript:void(0)">Services</a>
                            <span class="logdropdown-content">
                              <a class="page-scroll" href="reqdoc_barangayid.php">Barangay ID</a>
                              <a class="page-scroll" href="reqdoc_bpermit_new.php">Business Permit</a>
                              <a class="page-scroll" href="reqdoc_indigency.php">Certificate of Indigency</a>
                              <a class="page-scroll" href="reqdoc_clearance.php">Barangay Clearance</a>
                              <a class="page-scroll" href="reqdoc_blotter.php">Blotter</a>
                            </span>
                          </li>
                        <li>
                            <a class="page-scroll" href="residentcontactus.php">Contact Us</a>
                        </li>
                        <li class="logdropdown">
                        <?php
                            $id=$_SESSION['email'];
                            $query = $db->query("SELECT * FROM accreg_resident where resident_id='$id'");
                            while($roww = $query->fetch())
                            {
                            $resident_id = $roww['resident_id'];
							$resident_status = $roww['resident_status'];
			                    ?>
                          <a class="page-scroll logout" href="javascript:void(0)">
                          	<?php echo $roww['email']?>
						  </a>
                          <?php
                            }
                          ?>	
                          <span class="logdropdown-content">
                              <a class="page-scroll" href="resident_logout.php"><i class="bx bx-log-out"></i> Logout</a>
                              <a href="resident_viewprofile.php">View Profile</a>
                          </span>
						            </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

    </header>

 <section>
    <div class="contactus_content contactus_content1">
      <div class="find-us">
        <div class="container" >
          <div class="row">
		  <form method="POST" enctype="multipart/form-data" action="">
                                                            <hr>
															    <h4 style="text-align: center;" id="barangayid">Your Personal Information</h4>
														    <hr>
															<br>
															<div class="left_userpersonal_info left_userpersonal_info1">
															<?php
																$id=$_SESSION['email'];
																		$query = $db->query("SELECT * FROM accreg_resident where resident_id='$id'");
																		while($roww = $query->fetch())
																		{
																		$resident_id = $roww['resident_id'];
																		$fname = $roww['fname'];
																		$mname = $roww['mname'];
																		$lname = $roww['lname'];
																		$address = $roww['address'];
																		$birthday = $roww['birthday'];
																		$contactno = $roww['contactno'];
																		$time_joined = $roww['time_joined'];
																		$date_joined = $roww['date_joined'];
																		$gender = $roww['gender'];
																	?>
																	
																	
                                                           		<div class="form-group selec">
																	<label for="fname">First name:</label>
																	<input type="text" class="form-control form-text" value="<?php echo $roww['fname']?>" placeholder="Full name" style="background: #fff;" readonly>
																</div>

																<div class="form-group selec">
																	<label for="mname">Middle name:</label>
																	<input type="text" class="form-control form-text" value="<?php echo $roww['mname']?>" placeholder="Middle name" style="background: #fff;" readonly>
																</div>

																<div class="form-group selec">
																	<label for="lname">Last name:</label>
																	<input type="text" class="form-control form-text" value="<?php echo $roww['lname']?>" placeholder="Full name" style="background: #fff;" readonly>
																</div>
																
																 <div class="form-group selec">
																	<label for="address">Address:</label>
																	<input type="text" class="form-control form-text" placeholder="Address" value="<?php echo $roww['address']?>" style="background: #fff;" readonly>
																</div>
												
																
															</div>	
															<div class="left_userpersonal_info left_userpersonal_info1">
																
																<div class="form-group selec">
																	<label for="birthday">Birthday: </label>
																	<input type="text" class="form-control form-text" value="<?php echo $roww['birthday']?>" style="background: #fff;" placeholder="Birthday" readonly>
																</div></br>

																<div class="form-group selec">
																	<label for="contactno">Contact No.: </label>
																	<input type="text" class="form-control number form-text" name="contactnum" value="<?php echo $roww['contactno']?>" placeholder="Contact Number" style="background: #fff;" readonly>
																</div>
                                                            	<div class="form-group selec">
																	<label>Email Address: </label>
																	<input type="text" class="form-control form-text" placeholder="Email Address" value="<?php echo $roww['email']?>" style="background: #fff;" readonly>
																</div>

																<div class="form-group selec">
																	<label>Date Joined: </label>
																	<input type="text" class="form-control form-text" placeholder="Date Joined" value="<?php echo $roww['date_joined']?> | <?php echo $roww['time_joined']?>" style="background: #fff;" readonly>
																</div>
																<?php
																	}
																?>	
															</div>
															
													<br>
													<br>
													
												</div>
											</div>
							</form>
          </div>
        </div>
      </div>
    </div>
    <div class="contactus_content"  style="border-radius: 20px;">
      <div class="find-us">
        <div class="container">
          <div class="row">
		  <div style="text-align: center;">
			<hr>
			<h4>Transaction History: Things you've made</h3>
			<hr /> 
		</div>

							
					<div class="col-md-12">
							<br>
							<h5 class="table-heading">Barangay ID</h5>
								<table id="viewdetails" class="content-table">

								<?php
									$id=$_SESSION['email'];
									$query = $db->query("SELECT * FROM accreg_resident inner join barangayid on accreg_resident.resident_id=barangayid.resident_id where accreg_resident.resident_id='$id'");
								?>
								
								<thead>
									<tr class="t_head">
										<th width="5%">Full Name</th>
										<th width="5%">Document Type</th>
										<th width="5%">Birthday</th>
										<th width="5%">Address</th>
										<th width="5%">Contact no</th>
										<th width="5%">Email Address</th>
										<th width="5%">File Choice</th>
										<th width="5%">Date Requested</th>
									</tr>
								</thead>
								<?php
									while($roww = $query->fetch())
									{
									$resident_id = $roww['resident_id'];
									$resident_status = $roww['resident_status'];
									$birthday = $roww['birthday'];
									$address = $roww['address'];
									$doc_type = $roww['doc_type'];
									$dateissue = $roww['dateissue'];
									$fname = $roww['fname'];
									$mname = $roww['mname'];
									$lname = $roww['lname'];
									$brgyidfilechoice = $roww['brgyidfilechoice'];
								?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $roww['fname']; ?> <?php echo $roww['mname']; ?> <?php echo $roww['lname']; ?></td>
									<!-- <td><?php echo 'You last login was &nbsp;'.date("d/m/y H:i:sA",strtotime($roww['time_loged'])); ?></td> -->
									<td><?php echo $roww['doc_type']; ?></td>
									<td><?php echo $roww['birthday']; ?></td>
									<td><?php echo $roww['address']; ?></td>
									<td><?php echo $roww['contact_no']; ?></td>
									<td><?php echo $roww['emailadd']; ?></td>
									<td><?php echo $roww['brgyidfilechoice']; ?></td>
									<td><?php echo $roww['dateissue']; ?></td>
									
								</tr>	
								</tbody>
								<?php
								}
								?>	
							</table>
							<br>
							<h5 class="table-heading">Business Permit</h5>
							<table id="viewdetails" class="content-table">

								<?php
									$id=$_SESSION['email'];
									$query = $db->query("SELECT * FROM accreg_resident inner join businesspermit on accreg_resident.resident_id=businesspermit.resident_id  where accreg_resident.resident_id='$id'");
								?>
								
								<thead>
									<tr class="t_head">
										<th width="5%">Full Name</th>
										<th width="5%">Document Type</th>
										<th width="5%">Selection</th>
										<th width="5%">Business Name</th>
										<th width="5%">Plate no</th>
										<th width="5%">File Choice</th>
										<th width="5%">Email Address</th>
										<th width="5%">Date Requested</th>
									</tr>
								</thead>
								<?php
									while($roww = $query->fetch())
									{
									$resident_id = $roww['resident_id'];
									$fullname = $roww['fullname'];
									$businessname = $roww['businessname'];
									$businessaddress = $roww['businessaddress'];
									$bpermit_doctype = $roww['bpermit_doctype'];
									$plateno = $roww['plateno'];
									$permitfilechoice = $roww['permitfilechoice'];
									$email_add = $roww['email_add'];
									$dateissued = $roww['dateissued'];
									$status = $roww['status'];
									$selection = $roww['selection'];
								?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $roww['fullname']; ?></td>
									<td><?php echo $roww['bpermit_doctype']; ?></td>
									<td><?php echo $roww['selection']; ?></td>
									<td><?php echo $roww['businessname']; ?></td>
									<td><?php echo $roww['plateno']; ?></td>
									<td><?php echo $roww['permitfilechoice']; ?></td>
									<td><?php echo $roww['email_add']; ?></td>
									<td><?php echo $roww['dateissued']; ?></td>
								</tr>
								</tbody>
								<?php
								}
								?>	
							</table>
							<br>
							<h5 class="table-heading">Certificate of Indigency</h5>
							<table id="viewdetails" class="content-table">

								<?php
									$id=$_SESSION['email'];
									$query = $db->query("SELECT * FROM accreg_resident inner join certificateindigency on accreg_resident.resident_id=certificateindigency.resident_id  where accreg_resident.resident_id='$id'");
								?>
								
								<thead>
									<tr class="t_head">
										<th width="5%">Full Name</th>
										<th width="5%">Document Type</th>
										<th width="5%">Purpose</th>
										<th width="5%">Contact no</th>
										<th width="5%">Email Address</th>
										<th width="5%">File Choice</th>
										<th width="5%">Date Requested</th>
									</tr>
								</thead>
								<?php
									while($roww = $query->fetch())
									{
									$resident_id = $roww['resident_id'];
									$fullname = $roww['fullname'];
									$doc_type = $roww['doc_type'];
									$purpose = $roww['purpose'];
									$contactnum = $roww['contactnum'];
									$emailaddress = $roww['emailaddress'];
									$date_issue = $roww['date_issue'];
									$indigencyfilechoice = $roww['indigencyfilechoice'];
								?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $roww['fullname']; ?></td>
									<td><?php echo $roww['doc_type']; ?></td>
									<td><?php echo $roww['purpose']; ?></td>
									<td><?php echo $roww['contactnum']; ?></td>
									<td><?php echo $roww['emailaddress']; ?></td>
									<td><?php echo $roww['indigencyfilechoice']; ?></td>
									<td><?php echo $roww['date_issue']; ?></td>
								</tr>
								</tbody>
								<?php
								}
								?>	
							</table>
							<br>
							<h5 class="table-heading">Barangay Clearance</h5>
							<table id="viewdetails" class="content-table">

								<?php
									$id=$_SESSION['email'];
									$query = $db->query("SELECT * FROM accreg_resident inner join barangayclearance on accreg_resident.resident_id=barangayclearance.resident_id  where accreg_resident.resident_id='$id'");
								?>
								
								<thead>
									<tr class="t_head">
										<th width="5%">Full Name</th>
										<th width="5%">Document Type</th>
										<th width="5%">Age</th>
										<th width="5%">Status</th>
										<th width="5%">Nationality</th>
										<th width="5%">Email Address</th>
										<th width="5%">File Choice</th>
										<th width="5%">Date Requested</th>
									</tr>
								</thead>
								<?php
									while($roww = $query->fetch())
									{
									$resident_id = $roww['resident_id'];
									$full_name = $roww['full_name'];
									$document_type = $roww['document_type'];
									$age = $roww['age'];
									$status = $roww['status'];
									$nationality = $roww['nationality'];
									$purpose = $roww['purpose'];
									$date_issued = $roww['date_issued'];
									$filechoice = $roww['filechoice'];
									$emailadd = $roww['emailadd'];
								?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $roww['full_name']; ?></td>
									<td><?php echo $roww['document_type']; ?></td>
									<td><?php echo $roww['age']; ?></td>
									<td><?php echo $roww['status']; ?></td>
									<td><?php echo $roww['nationality']; ?></td>
									<td><?php echo $roww['emailadd']; ?></td>
									<td><?php echo $roww['filechoice']; ?></td>
									<td><?php echo $roww['date_issued']; ?></td>
								</tr>
								</tbody>
								<?php
								}
								?>	
							</table>
					</div>		

          </div>
        </div>
      </div>
    </div>
    </section>
     <!-- Footer -->
     <footer>
        <div class="container-fluid wrapper">
            <div class="col-lg-12 footer-info">
                <p class="footer_dt">
				    <span  id="date-time"></span>
                </p>
                <p class="footer-text">
					For any inquiries, please Email us and visit our Facebook Page 
                </p>
				<p class="footer-text">
					<a href="https://mail.google.com/mail/barangaycommonwealth0@gmail.com" target="_blank">barangaycommonwealth0@gmail.com</a>
                    <br>
					<a href="https://facebook.com//barangay.commonwealth.3551" target="_blank"> <i style="font-size: 20px;" class="fa fa-facebook" title="https://facebook.com//barangay.commonwealth.3551"></i></a> 
                </p>
				<div class="footer-text">
					<a>Terms of Service</a> | 
					<a>Privacy and Policy</a>
				</div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 copyright-bottom">
                <span class="copyright">
                    Copyright &copy; Barangay Commonwealth - 2022 Created By 
                    <a href="http://comm-bms.com/index.php" target="_blank">Beta Group</a>
                </span>
            </div>
        </div>
    </footer>

    <!-- Scroll-up -->
    <div class="scroll-up">
      <a href="#header" class="page-scroll"><i class="bx bx-arrow-to-top"></i></a>
    </div>
	
  <!-- jQuery -->
  <script src="resident-js/jquery.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="resident-js/bootstrap.min.js"></script>
  <!-- Color Settings script -->
  <script src="resident-js/settings-script.js"></script>
  <!-- Plugin JavaScript -->
  <script src="resident-js/jquery.easing.min.js"></script>
  <!-- Contact Form JavaScript -->
  <script src="resident-js/jqBootstrapValidation.js"></script>
  <!-- SmoothScroll script -->
  <script src="resident-js/smoothscroll.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="resident-js/barangay.js"></script>
  <!-- Isotope -->
  <script src="resident-js/jquery.isotope.min.js"></script>
  
  <script src="https://use.fontawesome.com/f7721642f4.js"></script>
  
  <script src="resident-js/accordions.js"></script>
  <script>
    function openContact(contactName) {
      var i;
      var x = document.getElementsByClassName("contactlist");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      document.getElementById(contactName).style.display = "block";  
    }
  </script>

</body>
</html>
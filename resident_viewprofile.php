<?php session_start();
include "db/conn.php";
include "db/user.php";
include('announcement_includes/functions.php'); 
?>
<?php
	$user = '';

	if(isset($_SESSION['email'])){
		$user = $_SESSION['email'];
	}
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
                              <a class="page-scroll" href="reqdoc_bpermit.php">Business Permit</a>
                              <a class="page-scroll" href="reqdoc_indigency.php">Certificate of Indigency</a>
                              <a class="page-scroll" href="reqdoc_clearance.php">Barangay Clearance</a>
                              <a class="page-scroll" href="reqdoc_blotter.php">Blotter</a>
                            </span>
                          </li>
                        <li>
                            <a class="page-scroll" href="residentcontactus.php">Contact Us</a>
                        </li>
                        <li class="logdropdown">
                        <a class="page-scroll logout" href="javascript:void(0)"><?php echo $user; ?></a>
                        <span class="logdropdown-content">
                          <a class="page-scroll" href="resident_logout.php"><i class="bx bx-log-out"></i> Logout</a>
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
    <div class="contactus_content">
      <div class="find-us">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <h2>Your Profile</h2>
              <div id="map" style="margin-top: 30px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.273526067959!2d121.0861187150456!3d14.69711778974107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ba0d1e186d73%3A0x575e861aa5cfcd55!2sBarangay%20Commonwealth%20Barangay%20Hall!5e0!3m2!1sen!2sph!4v1637581521007!5m2!1sen!2sph" width="100%" height="350" style="border:0;" allowfullscreen=""></iframe>
              </div>
            </div>
            <div class="col-md-4">
              <div class="left-content">
                <h2>Barangay Commonwealth</h2>
                <p>Barangay Commonwealth is located along the Commonwealth Avenue with an estimated population of 213,229 determined by the 2020 census. This represented 7.20% of the total population of Quezon City. A population that is considered to be one of the largest in the Quezon City. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="contactus_content">
      <div class="find-us">
        <div class="container">
          <div class="row">
           
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
			$sql_query = "SELECT barangay_id, fname, mname, lname, address, birthday,placeofbirth, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, id_image
					FROM barangayid WHERE status = 'Pending'
					ORDER BY barangay_id ASC";
		}else{
			$sql_query = "SELECT barangay_id, fname, mname, lname, address, birthday,placeofbirth, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, id_image
					FROM barangayid
					WHERE fname LIKE ? 
					ORDER BY barangay_id ASC";
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
			$stmt->bind_result($data['barangay_id'], 
					$data['fname'],
					$data['mname'],
					$data['lname'],
					$data['address'],
					$data['birthday'],
					$data['placeofbirth'],
					$data['contact_no'],
					$data['emailadd'],
					$data['guardianname'],
					$data['emrgncycontact'],
					$data['reladdress'],
					$data['dateissue'],
					$data['status'],
					$data['id_image']
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
		$offset = 50;
						
		//lets calculate the LIMIT for SQL, and save it $from
		if ($page){
			$from 	= ($page * $offset) - $offset;
		}else{
			//if nothing was given in page request, lets load the first page
			$from = 0;	
		}	
		
		if(empty($keyword)){
			$sql_query = "SELECT  barangay_id, fname, mname, lname, address, birthday,placeofbirth, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, id_image
					FROM barangayid WHERE status = 'Pending'
					ORDER BY barangay_id ASC LIMIT ?, ?";
		}else{
			$sql_query = "SELECT barangay_id, fname, mname, lname, address, birthday,placeofbirth, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, id_image
					FROM barangayid 
					WHERE fname LIKE ? 
					ORDER BY barangay_id ASC LIMIT ?, ?";
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
			$stmt_paging->bind_result($data['barangay_id'], 
					$data['fname'],
					$data['mname'],
					$data['lname'],
					$data['address'],
					$data['birthday'],
					$data['placeofbirth'],
					$data['contact_no'],
					$data['emailadd'],
					$data['guardianname'],
					$data['emrgncycontact'],
					$data['reladdress'],
					$data['dateissue'],
					$data['status'],
					$data['id_image']
					);
			// for paging purpose
			$total_records_paging = $total_records; 
		}

		// if no data on database show "No Reservation is Available"
		if($total_records_paging == 0){
			echo "
			<h3 style='text-align: center; margin-top: 5%;'>Data Not Shown!</h3>
			<div class='alert alert-warning cattxtbox'>
				<h6> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
				<div style='display: flex; justify-content: center; align-items: center; margin-top: 25px;'>
					<img style='opacity: 0.8;' src='../img/inmaintenance.png'/>
				</div>
			</div>
			<div style='text-align: center; margin-top: 5%'>
				<a href='barangayidapproval.php' class='viewbtn1' style='float: left;width: 40%; margin-left: 60px;' title='Visit?'><< Wanna visit <strong> approval page?</strong></a>
				<a href='barangayiddeny.php' class='viewbtn1' style='float: right; width: 40%; margin-right: 60px;' title='Visit?'>Wanna visit <strong> denied request page? >></strong></a>
			</div>
			";
	?>

	<?php 
		// otherwise, show data
		}else{
			$row_number = $from + 1;
	?>
		<div style="text-align: center;">
			<hr>
			<h3>Transaction History: Things you made char!</h3>
			<hr /> 
		</div>

							
					<div class="col-md-12">
							<table class="content-table">
								<thead>
									<tr class="t_head">
										<th width="5%">BarangayID No</th>
										<th width="5%">First name</th>
										<th width="5%">Middle name</th>
										<th width="5%">Last Name</th>
										<th width="5">Contact No.</th>
										<th width="5%">Address</th>
										<th width="5%">Date of Request</th>
										<!-- <th width="5%">Identification Card</th> -->
					
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $data ['barangay_id']; ?></td>
									<td><?php echo $data ['fname']; ?></td>
									<td><?php echo $data ['mname']; ?></td>
									<td><?php echo $data ['lname']; ?></td>
									<td><?php echo $data ['contact_no']?></td>
									<td><?php echo $data ['address']; ?></td>
									<td><?php echo $data ['dateissue']; ?></td>
		
									
								
								</tr>	
								</tbody>
								<?php 
								} 
							}
						?>
							</table>
					</div>
							<div class="col-md-12 pagination">
								
								<!-- <div class="transact">
									<label style="font-size: 14px;">Transaction History: </label>
									<button class="btn btn-danger viewbtn" onclick="window.location.href='barangayiddeny.php'"><i class="bx bx-xs bx-checkbox-checked" style="font-size: 20px;"></i> </button>	
								</div> -->
							</div>
							
	</div>
							<div class="separator"></div>
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
                    <a href="https://mail.google.com/mail/barangaycommonwealth0@gmail.com" target="_blank"> <i style="font-size: 20px;" class="fa fa-google" title="https://mail.google.com/mail/barangaycommonwealth0@gmail.com"></i></a>
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
<?php
session_start();

include "../db/conn.php";
include "../db/documents.php";
include('../announcement_includes/functions.php'); 
include('../qr_code/phpqrcode/qrlib.php'); 
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
	<?php

// if(isset($_POST['generate'])){
//     $qr = '';

//     $link = $_POST['link'];
//     $id = $_POST['barangay_id'];
//     $fname = $_POST['fname'];
//     $mname = $_POST['mname'];
//     $lname = $_POST['lname'];
//     $filename = $id;

//     $qr = "
//     <div style='margin-top: -61px; margin-left: -6px; margin-right: 25px;'>
//       <img width='98' height='97' style='border: 1px solid black;'  src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$link/$id/$fname/$mname/$lname&choe=UTF-8'>
//     </div>
//       ";
//     }else{
//     $qr = "<span style='font-weight: 600;'>Click Generate QR Code!</span>";
//     }


if(isset($_POST['generate']) ) {

$message = ''; 

$tempDir = '../img/qrcode_clearance'; 
$link = $_POST['link'];
$id = $_POST['approved_clearanceids'];
$full_name = $_POST['full_name'];
$add = $_POST['address'];
$filename = ($full_name);
$codeContents = ''.$link.'/'.urlencode($full_name).''.urlencode($add).'/'.urlencode($id).'/$verification.php'; 
QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L,5);
}else{
$message = "<span style='color: red; font-weight: 600; margin: 0;'>Click Generate QR Code!</span>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/documentprint_styles.css">
	

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Font Styles-->
	<link rel="icon" type="/image/png" href="../img/Brgy-Commonwealth.png">
    <title>Printed: Barangay Clearance</title>

    <style>
      
		
    </style>
</head>
<body>
  <?php 
                    if(isset($_GET['id'])){
                        $ID = $_GET['id'];
                    }else{
                        $ID = "";
                    }
                    
                    // create array variable to store data from database
                    $data = array();
                    
                    // get all data from menu table and category table
                    $sql_query = "SELECT approved_clearanceids, full_name, age, status, nationality, address,contactno, emailadd, purpose,date_issued, ctc_no, issued_at, precint_no, clearanceid_image, filechoice, approvedby, app_date, clearance_status
                            FROM approved_clearance
                            WHERE approved_clearanceids = ?";
                    
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                        // Bind your variables to replace the ?s
                        $stmt->bind_param('s', $ID);
                        // Execute query
                        $stmt->execute();
                        // store result 
                        $stmt->store_result();
                        $stmt->bind_result($data['approved_clearanceids'], 
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
								$data['clearanceid_image'],
								$data['filechoice'],
								$data['approvedby'],
								$data['app_date'],
								$data['clearance_status']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }
                    
					if(isset($_POST['btnEdit'])){
                    
                        $clearance_status	= $_POST['clearance_status'];
                        $approved_clearanceids	= $_POST['approved_clearanceids'];

                        $sql = "UPDATE approved_clearance SET clearance_status = 'Done' WHERE approved_clearanceids = $approved_clearanceids";

                        if (mysqli_query($connect, $sql)) {
                          echo "<script>
                                    alert('Mark as Done! Successfully!');
                                    window.location.href='clearanceapproval.php';
                                </script>";
                        } else {
                          echo "Error updating record: " . mysqli_error($connect);
                        }
                    }
                ?>

    <div id="indigency_file" style="display: auto; ">
	<?php
			if(!isset($filename)){
				$filename = "author";
			}
			?>
    <br>
					<?php
                        if(ISSET($_SESSION['status'])){
                        if($_SESSION['status'] == "ok"){
                    ?>
					 <form action="" method="post">
                            <div class="alert alert-info messcompose"><?php echo $_SESSION['result']?> <?php echo $data['emailadd']; ?>
                           <input type="hidden" name="approved_clearanceids" id="approved_clearanceids" value="<?php echo $data['approved_clearanceids']; ?>">
                            <input type="hidden" name="clearance_status" id="clearance_status" value="Done">
                            <button type="submit" style="cursor: pointer;" class="form-control generate viewbtn done" name="btnEdit">Mark as done</button>
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
								<form action="" method="post">
									<section class="barangay_indigency">
										<div style="padding-top: 15px; width: 965px;  height: 344px;">
											<div style="display: flex;">
												<img style="float: left; width: 130px; height: 125px; margin-left: 35px;" src="../img/QCSeal.png">
													<div style="margin-left: 120px;">
														<p class="center_description" style="font-size: 17px; padding-left: 75px;">Republic of the Philippines</p>
														<p class="center_description" style="font-size: 15px; padding-left: 95px;">District II, Quezon City</p>
														<p class="center_description" style=" font-size: 19px; padding-left: 35px; padding-bottom: 15px; ">BARANGAY COMMONWEALTH</p>
														<p class="center_description" style="font-size: 20px; color: red;">OFFICE OF THE BARANGAY CAPTAIN</p>
													</div>
												<img style=" display: flex; float: right;  margin-left: 135px; " class="commonwealthlogo" src="../img/Brgy-Commonwealth.png">
											</div>
											<div>
												<div style="margin-top:5px; border-top: 2px solid #000000; width: 1220px; width: calc(100%  - 70px); transition: all 0.5s ease;"></div>
												<div style="border-left: 2px solid #000000; height: 1100px; margin-left: 245px;"></div>
													<div  style="position: inherit; margin-top: -1075px;">
														<p style="font-size: 21px; line-height: 0.5;">MANUEL A. CO</p>
														<em>Punong Barangay</em>
														<p style="margin-left: 730px; margin-top: -45px;">FILE NO.: <input class="inp" name="approved_clearanceids" id="approved_clearanceids" value="BC-<?php echo $data['approved_clearanceids']; ?>" style="padding-left: 15px; width: 155px; font-size: 14px" placeholder="File no."></p>
														<br>
														<div class="side_information">
															<p>PRESY C. BAQUIRING</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Barangay Justice and</p>
															<p class="offic">Rules, Human Rights and Ethics,</p>
															<p class="offic">VAWC, BCPC, PWD, Women</p>
															<p class="offic">Affairs, Senior Citizen, Finance</p>
														</div>
														<br>
														<div class="side_information">
															<p>ELMER M. BUENA</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Peace and Order and</p>
															<p class="offic">Public Order and Safety</p>
														</div>
														<br>
														<div class="side_information">
															<p>ROWENA E. LUCAS</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Education, Cultural</p>
															<p class="offic">and Tourism, Appropriation, Ways</p>
															<p class="offic">and Means</p>
														</div>
														<br>
														<div class="side_information">
															<p>REYNALDO O. SEVILLA</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Health,</p>
															<p class="offic">Environmental, Sanitation and</p>
															<p class="offic">Beautification, Bids and Awards</p>
														</div>
														<br>
														<div class="side_information">
															<p>JULIUS C. DELA CRUZ</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Transportation and</p>
															<p class="offic">Communication</p>
															<p class="offic">in, Bids and Awards Inspection</p>
														</div>
														<br>
														<div class="side_information">
															<p>IMELDA Q. CAJEDA</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Cooperation</p>
															<p class="offic">Livelihood, Socio-Cultural and</p>
															<p class="offic">Religious Affair</p>
														</div>
														<br>
														<div class="side_information">
															<p>HARUN W. DATU TAHIL</p>
															<p style="font-size: 14px;">BARANGAY KAGAWAD</p>
															<p class="offic">Committee on Public Works,</p>
															<p class="offic">Infrastructure, HOA/PO's and</p>
															<p class="offic">Community Development</p>
														</div>
														<br>
														<div class="side_information">
															<p>RAYMART S. GARCIA</p>
															<p style="font-size: 14px;">SK CHAIRMAN</p>
														</div>
														<br>
														<div class="side_information">
															<p>CEFERINO C. CRISOSTOMO</p>
															<p style="font-size: 14px;">BARANGAY SECRETARY</p>
														</div>
														<br>
														<div class="side_information">
															<p>CHONA A. PINCA</p>
															<p style="font-size: 14px;">BARANGAY TREASURER</p>
														</div>
														
														
													</div>
											</div>
										</div>
										<div style="display: flex; ">
											<div style="display: auto;">
												<div style="margin-left: 50px;">
													<h4 style="margin-top: -115px; margin-left: 420px; color: red;">BARANGAY CLEARANCE</h4>
												</div>
												<br>
												<br>
												<p style="display: auto; margin-top: -10px; margin-left: 280px; text-align: justify; text-indent: 50px; padding-right: 95px; word-spacing: 3.5px;">This is to certify that <strong>CLEARANCE</strong> is granted to <input class="inp borderb" style="width: 100%; padding-left: 15px;" type="text" id="full_name" name="full_name" width="auto" placeholder="FULL A. NAME" value="<?php echo $data['full_name']; ?>"><input class="inp borderb" style="width: 10%; padding-left: 15px;" type="text" id="age" name="age" width="auto" placeholder="AGE" value="<?php echo $data['age']; ?>"> years old <input class="inp borderb" style="width: 20%; padding-left: 25px;" type="text" id="status" name="status" width="auto" placeholder="STATUS" value="<?php echo $data['status']; ?>">,<input class="inp borderb" style="width: 20%; padding-left: 25px;" type="text" id="nationality" name="nationality" width="auto" placeholder="NATIONALITY" value="<?php echo $data['nationality']; ?>"> and a bonafide resident at No. <input class="inp borderb" style="width: 90%; padding-left: 25px;" type="text" id="address" name="address" width="auto" placeholder="ADDRESS" value="<?php echo $data['address']; ?>">, Barangay Commonwealth, Quezon City, possesses with good moral character has no derogatory record in this office, law abiding citizen and reliable.</p>
												<br>
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 95px;">This certification is issued upon the request of the above-named party for <input class="inp borderb" style="width: 80%; padding-left: 55px;" type="text" id="purpose" name="purpose" width="auto" placeholder="PURPOSE" value="<?php echo $data['purpose']; ?>"></p>
												<br>
												
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 65px;">Issued this day of <input class="inp  borderb" style="padding-left: 10px; width:95px;" value="<?php echo $data['date_issued']; ?>" type="text" id="demo" name="date_issue" placeholder="YEAR">, Quezon City.</p>
												<input style="visibility: hidden;" type="text" id="indigency_id" name="indigency_id" >
												<br>
												<div style="display: auto; float: left; text-align:center; padding-left: 290px;" class="side_information">
													<p><input class="inp  borderb"></p>
													<p>Signature of Applicant</p>
													
													<div style="text-align: left; margin-top: 45px;"> 
														CTC NO.: <input class="inp  borderb" style="width: 75px;" name="ctc_no" id="ctc_no" value="<?php echo $data['ctc_no']; ?>"><br>
														ISSUED AT: <input class="inp  borderb" style="width: 215px;" name="issued_at" id="issued_at" value="<?php echo $data['issued_at']; ?>" ><br>
														ISSUED ON: <input class="inp  borderb"  style="width: 215px;" name="date_issued" id="date_issued" value="<?php echo $data['date_issued']; ?>"><br>
														PRECINT NO.: <input class="inp  borderb" style="width: 75px;" name="precint_no" id="precint_no" value="<?php echo $data['precint_no']; ?>"><br>
													</div>
												</div>
												
												<div style="padding-right: 105px;">
												<img src="../img/approved_clearance/<?php echo $data['clearanceid_image']; ?>" style="width: 140px; height: 140px; float: right; ">
												</div>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<div >
													<div style="margin-left: 255px; font-size: 13px;">
														<div style="float: right; text-align: center; padding-right: 95px; margin-top: -45px;">
															<h5>MANUEL A. CO</h5>
															<p>Punong Barangay</p>
														</div>
														<div style="margin-top: 20px; margin-left: 55px;">
                                                        <?php echo '<img src="../img/qrcode_clearance'. @$filename.'.png" style="width:110px; height: 110px;"><br>'; ?>
                                                        <span style="margin-left: -20px;"><?php echo $message;?></span>
                                                         </div>
														<em>Not valid without QR Code</em>
														<p>CONTACT PERSON. MARK LEAN CRUZ</p>
														<br>
														<p>NOTE: This clearance is valid for a period of <br> Six (6) months from date of issue.</p>
													</div>
													<div style="margin-top: -70px; margin-left: 655px; font-size: 13px; margin-right: 65px; text-align: right;" class="side_information">
														<p> www.brgycommonwealth.com.ph</p>
														<p> @maningningnacommonwealth</p>
														<p> @BrgyCommonwealth</p>
														<p> maningning.commonwealth@gmail.com</p>
													</div>
												</div>
											</div>
										</div>
										<input type="hidden" name="link" id="link" value="http://localhost:4000/Updated-Barangay-System">
										<br>
										<br>
										<br>
										<br>
										<br>
										<br>
										<br>
										<br>
                                            <div class="generatebtn" style="margin-top: 50px;">
                                                <button type="submit" style="cursor: pointer; " class="form-control generate viewbtn" name="generate">Generate</button>
												<div style="display: flex; justify; align-items: center; justify-content: center; text-align:center; margin-top: 5px; font-size: 15px;">
                                                <a style="text-decoration: none; margin-bottom: 5px;" class="form-control generate viewbtn" href="downloadqr.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
                                                </div>
                                            </div>
                                        </form>

										<form method="POST" action="" class="body" enctype="multipart/form-data">
                                        <div class="main-content-email">
                                           

                                            <div class="information col">
                                                <p> Fullname: </p>
                                                <input class="form-control inputtext usersel" id="fullname" name="fullname" type="text"  value="<?php echo $data['full_name']; ?>">
                                            </div>

                                            <div class="information col">
                                                <p> To: </p>
                                                <input required class="form-control inputtext" id="email" name="email" type="text"  value="<?php echo $data['emailadd']; ?>">
                                            </div>

                                            <div class="information col">
                                                <p>Subject:  </p>
                                                <input required class="form-control inputtext" id="subject" name="subject" type="text" value="Photocopy of your Request (Barangay Clearance)"> 
                                            </div>
                                        

                                            <div class="information col">
                                                <p>Attachment: </p>
                                                <input required class="form-control inputtext" style="background: white; height: 50px;" id="fileattach" name="fileattach" type="file" value=""> 
                                            </div>

                                            <div class="information col">
                                                <p>Body: </p>
                                                <textarea name="message" id="message" class="form-control inputtext" rows="32">Good Day <?php echo $data['full_name']; ?>!. Here is the pdf file of your Document Request <br><br> <br>  Website: comm-bms.com/index.php <br>
                                                FB Fan Page: @maningningnacommonwealth <br>
                                                Twitter Account: @BrgyCommonwealth</textarea>
                                                <script type="text/javascript" src="../announcement_css/js/ckeditor/ckeditor.js"></script>
                                                <script type="text/javascript">                        
                                                    CKEDITOR.replace( 'message' );
                                                </script>
                                            </div>

                                            <div class="sendi">
                                                <button name="clearancesendemail" class="form-control viewbtn" style="width: 96%; cursor: pointer;"><span class="glyphicon glyphicon-envelope"></span> Send <i class="bx bx-send"></i></button>
                                            </div>
                                        </div>
                                    </form>
									</section>
<script>
	const year = new Date();
	document.getElementById("#demo").innerHTML = year.getFullYear();
</script>

</body>
</html>
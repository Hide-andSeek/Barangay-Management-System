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
	if(isset($_POST['generate']) ) {

		$message = ''; 
	
		$tempDir = '../img/qrcode_indigency'; 
		$link = $_POST['link'];
		$id = $_POST['approvedindigency_id'];
		$fullname = $_POST['fullname'];
		$filename = ($fullname);
		$codeContents = ''.$link.'/'.urlencode($fullname).'/'.urlencode($id); 
		QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
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
	<link rel="stylesheet" href="../css/documentprint.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/print.css">

    <!--Font Styles-->
	<link rel="icon" type="/image/png" href="../img/Brgy-Commonwealth.png">
    <title>Printed: Indigency</title>

    <style>
		.offic{font-size:13px;}
        .inp{border: none; border-bottom: 1px solid black}
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
                    $sql_query = "SELECT approvedindigency_id, fullname, address, purpose, contactnum, emailaddress, id_type, date_issue, status, indigencyid_image
                            FROM approved_indigency
                            WHERE approvedindigency_id = ?";
                    
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                        // Bind your variables to replace the ?s
                        $stmt->bind_param('s', $ID);
                        // Execute query
                        $stmt->execute();
                        // store result 
                        $stmt->store_result();
                        $stmt->bind_result($data['approvedindigency_id'], 
                               $data['fullname'],
                                $data['address'],
                                $data['purpose'],
                                $data['contactnum'],
                                $data['emailaddress'],
                                $data['id_type'],
                                $data['date_issue'],
                                $data['status'],
                                $data['indigencyid_image']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }
					
					if(isset($_POST['btnEdit'])){
                    
                        $status	= $_POST['status'];
                        $approvedindigency_id	= $_POST['approvedindigency_id'];

                        $sql = "UPDATE approved_indigency SET status = 'Done' WHERE approvedindigency_id = $approvedindigency_id";

                        if (mysqli_query($connect, $sql)) {
                          echo "<script>
                                    alert('Mark as Done! Successfully!');
                                    window.location.href='indigencyapproval.php';
                                </script>";
                        } else {
                          echo "Error updating record: " . mysqli_error($connect);
                        }
                    }
                ?>

				  <?php
                if(!isset($filename)){
                    $filename = "author";
                }
                ?>
                <?php
                        if(ISSET($_SESSION['status'])){
                        if($_SESSION['status'] == "ok"){
                ?>
                   
                        <form action="" method="post">
                            <div class="alert alert-info messcompose"><?php echo $_SESSION['result']?> <strong><?php echo $data['emailaddress']; ?></strong>
                               
                                <input type="hidden" name="approvedindigency_id" id="approvedindigency_id" value="<?php echo $data['approvedindigency_id']; ?>">
                                <input type="hidden" name="status" id="status" value="Done">
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
							<div id="indigency_file" style="display: auto; ">
									<section class="barangay_indigency">
										<form action="" method="post">
										<div style="padding-top: 15px; width: 965px;  height: 344px;">
											<div style="display: flex;">
												<img style="float: left; width: 130px; height: 125px; margin-left: 35px;" src="../img/QCSeal.png">
													<div style="margin-left: 120px;">
														<p class="center_description" style="font-size: 17px; padding-left: 75px;">Republic of the Philippines</p>
														<p class="center_description" style="font-size: 15px; padding-left: 95px;">District II, Quezon City</p>
														<p class="center_description" style=" font-size: 19px; padding-left: 35px; padding-bottom: 15px;">BARANGAY COMMONWEALTH</p>
														<p class="center_description" style="font-size: 20px;">OFFICE OF THE BARANGAY CAPTAIN</p>
													</div>
												<img style=" display: flex; float: right; height: 130px; width: 130px; margin-left: 135px; " class="commonwealthlogo" src="../img/Brgy-Commonwealth.png">
											</div>
											<div>
												<div style="margin-top:5px; border-top: 2px solid #000000; width: 1220px; width: calc(100%  - 70px); transition: all 0.5s ease;"></div>
												<div style="border-left: 2px solid #000000; height: 1100px; margin-left: 245px;"></div>
													<div  style="position: inherit; margin-top: -1075px;">
														<p style="font-size: 21px; line-height: 0.5;">MANUEL A. CO</p>
														<p >Punong Barangay</p>
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
												<div style="margin-left: 40px;">
													<h4 style="margin-top: -45px; margin-left: 420px;">CERTIFICATE OF INDIGENCY</h4>
												</div>
												<br>
												<p style="margin-top: -5px; margin-left: 280px;">Whom It May Concern</p>
												<br>
												<p style="display: auto; margin-top: -10px; margin-left: 280px; text-align: justify; text-indent: 50px; padding-right: 65px;">This is to certify that <input class="inp" type="text" id="fullname" name="fullname" style="padding-left: 15px; " value="<?php echo $data['fullname']; ?>">, of legal age, Filipino and a bonafide resident of <input class="inp" type="text" id="address" name="address" style="padding-left:15px; width: 60%" value="<?php echo $data['address']; ?>"> District II, Quezon City.</p>
												<br>
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 65px;">Further certify that above-named subject is of good moral character and has good community standing, but unfortunately belongs to the indigent family in this Community</p>
												<br>
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 65px;">This certification is issued upon the request of the above-named party as supporting document needed for <input class="inp borderb" type="text" id="purpose" name="purpose" value="<?php echo $data['purpose']; ?>"></p>
												<br>
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 65px;">Issued this <input class="inp" type="text" id="date_issue" name="date_issue" width="auto" value="<?php echo $data['date_issue']; ?>"> of December 2021, Quezon City.</p>
												<input style="visibility: hidden;" type="text" id="indigency_id" name="indigency_id" >
												<br>
												<br>
												<br>
												<div style="display: auto; float: right; text-align:center; padding-right: 105px;" class="side_information">
													<p>MANUEL A. CO</p>
													<p>Punong Barangay</p>
												</div>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<div>
													<div style="margin-top: 20px; margin-left: 315px;">
                                                        <?php echo '<img src="../img/qrcode_indigency'. @$filename.'.png" style="width:110px; height: 110px;"><br>'; ?>
                                                        <span style="margin-left: -40px;"><?php echo $message;?></span>
                                                    </div>
													<div style="margin-left: 255px; font-size: 13px;">
														<em>Not valid without QR Code</em>
														<p>CONTACT PERSON. MARK LEAN CRUZ</p>
													</div>
													<div style="margin-top: -45px; margin-left: 655px; font-size: 13px; margin-right: 85px; text-align: right;" class="side_information">
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
												<input type="hidden" name="approvedindigency_id" value="<?php echo $data['approvedindigency_id']; ?>"/>
												<div style="display: flex; justify; align-items: center; justify-content: center; text-align:center; margin-top: 5px; font-size: 15px;">
                                                <a style="text-decoration: none; margin-bottom: 5px;" class="form-control generate viewbtn" href="downloadqr.php?indigencyfile=<?php echo $filename; ?>.png ">Download QR Code</a>
                                                </div>
                                            </div>
                                        </form>

										<form method="POST" action="" class="body" enctype="multipart/form-data">
                                        <div class="main-content-email">
                                           

                                            <div class="information col">
                                                <p> Fullname: </p>
                                                <input class="form-control inputtext usersel" id="fullname" name="fullname" type="text"  value="<?php echo $data['fullname']; ?>">
                                            </div>

                                            <div class="information col">
                                                <p> To: </p>
                                                <input required class="form-control inputtext" id="email" name="email" type="text"  value="<?php echo $data['emailaddress']; ?>">
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
                                                <textarea name="message" id="message" class="form-control inputtext" rows="32">Good Day <?php echo $data['fullname']; ?>!. Here is the pdf file of your Document Request <br><br> <br>  Website: comm-bms.com/index.php <br>
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
                             </div>

<script>
	const year = new Date();
	document.getElementById("#demo").innerHTML = year.getFullYear();
</script>

</body>
</html>
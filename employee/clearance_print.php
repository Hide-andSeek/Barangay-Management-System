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
        .inp{border: none; }
		.borderb{border-bottom: 1px solid black}
		.offic{font-size:13px;}
        
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

    <div id="indigency_file" style="display: auto; ">
    <br>
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
														<p style="margin-left: 730px; margin-top: -45px;">FILE NO.: <input class="inp" name="clearance_id" id="clearance_id" value="BC-<?php echo $data['clearance_id']; ?>" style="padding-left: 15px; width: 155px; font-size: 14px" placeholder="File no."></p>
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
												
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 65px;">Issued this <input class="inp borderb" type="text" id="date_issue" name="date_issue" placeholder="DAY" style="width:35px; padding-left: 5px;"> day of <input class="inp  borderb" style="padding-left: 10px; width:105px;" type="text" id="date_issue" name="date_issue" placeholder="MONTH"> <input class="inp  borderb" style="padding-left: 10px; width:55px;" type="text" id="demo" name="date_issue" placeholder="YEAR">, Quezon City.</p>
												<input style="visibility: hidden;" type="text" id="indigency_id" name="indigency_id" >
												<br>
												<div style="display: auto; float: left; text-align:center; padding-left: 290px;" class="side_information">
													<p><input class="inp  borderb"></p>
													<p>Signature of Applicant</p>
													
													<div style="text-align: left; margin-top: 45px;"> 
														CTC NO.: <input class="inp  borderb" style="width: 75px;" name="ctc_no" id="ctc_no" value="<?php echo $data['ctc_no']; ?>"><br>
														Issued AT: <input class="inp  borderb" style="width: 215px;" name="issued_at" id="issued_at" value="<?php echo $data['issued_at']; ?>" ><br>
														ISSUED ON: <input class="inp  borderb"  style="width: 215px;" name="date_issued" id="date_issued" value="<?php echo $data['date_issued']; ?>"><br>
														PRECINT NO.: <input class="inp  borderb" style="width: 75px;" name="precint_no" id="precint_no" value="<?php echo $data['precint_no']; ?>"><br>
													</div>
												</div>
												
												<div style="padding-right: 105px;">
												<img src="../img/fileupload_clearance/<?php echo $data['certificate_image']; ?>" style="width: 140px; height: 140px; float: right; ">
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
												<br>
												<br>
												<div >
													<div style="margin-left: 255px; font-size: 13px;">
														<div style="float: right; text-align: center; padding-right: 95px; margin-top: -45px;">
															<h5>MANUEL A. CO</h5>
															<p>Punong Barangay</p>
														</div>
														<em>Not valid without Barangay Seal</em>
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
									</section>
<script>
	const year = new Date();
	document.getElementById("#demo").innerHTML = year.getFullYear();
</script>

</body>
</html>
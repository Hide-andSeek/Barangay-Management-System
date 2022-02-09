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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    $sql_query = "SELECT indigency_id, fullname, address, purpose, contactnum, emailaddress, id_type, date_issue, status, indigencyid_image
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
                                $data['indigencyid_image']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }
                    
                ?>
							<div id="indigency_file" style="display: auto; ">
									<section class="barangay_indigency">
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
												<p style="display: auto; margin-left: 280px; text-indent: 50px; text-align: justify; padding-right: 65px;">This certification is issued upon the request of the above-named party as supporting document needed for <input class="inp borderb" type="text" id="purpose" name="purpose" style="width:45%;" value="<?php echo $data['purpose']; ?>">.</p>
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
														<em>Not valid without Barangay Seal</em>
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
									</section>
                             </div>

<script>
	const year = new Date();
	document.getElementById("#demo").innerHTML = year.getFullYear();
</script>

</body>
</html>
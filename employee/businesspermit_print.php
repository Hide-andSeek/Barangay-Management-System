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

if(isset($_POST['generate']) ) {

    $message = ''; 

	$tempDir = '../img/'; 
    $link = $_POST['link'];
    $id = $_POST['plateno'];
	$fname = $_POST['fullname'];
    $business = $_POST['businessname'];
    $address = $_POST['businessaddress'];
	$filename = ($fname);
	$codeContents = ''.$link.'/'.urlencode($fname).''.urlencode($business).'/'.urlencode($address).'/'.urlencode($id); 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}else{
    $message = "<span style='color: red; font-weight: 600; margin: 0;'>Click Generate QR Code!</span>";
}
?>

<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/documentprint.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Font Styles-->
	<link rel="icon" type="/image/png" href="../img/Brgy-Commonwealth.png">
    <title>Printed: Business Permit</title>

    <style>
        .inp{border: none; }
		.borderb{border-bottom: 1px solid black}
		.offic{font-size:13px;}
        .borderstyle{border: none; font-size: 15px;}  
        .barangay_permit{display: flex; justify; align-items: center; justify-content: center; margin-left: 15px; margin-top: -35px;}
        .viewbtn{width: 100%; height: 35px;  background-color: white; color: black; border: 1px solid #008CBA;}
        .viewbtn:hover{ background-color: #008CBA;color: white;}
        .done{width: 30%; font-size: 11px;}
        .inputtext, .inputpass {
			font-family: 'Montserrat', sans-serif;
			font-size: 14px;
			height: 35px;
			width:  96%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		.messcompose, .send{top: 0; display: flex;justify-content: center; align-items: center;  border: 1px solid #D8D8D8; padding: 10px;border-radius: 5px; font-size: 11px; text-transform: uppercase; background-color: rgb(236, 255, 216); color: green; text-align: center; margin-bottom: 25px;}
		.submtbtn{height: 40px;}
		.submtbtn:hover{
			background: #04AA6D;
			color: orange;
			height: 40px;
		}
		.user, .email{width:87.5%}
		.textareaa{width: 94%; margin-left: 25px;}
		span.topright{margin-left: -50px; margin-top: -15px; text-align: right; font-size: 25px;}
		span.topright:hover {text-align: right;color: red; cursor: pointer;}
		.display{display: flex;}
		.usersel{pointer-events: nne; border: 1px solid orange}

		.textarea{padding-left: 40px; padding-right: 40px; padding-top: 10px; margin-bottom: 15px;}
        .body{background: #ebebeb; padding: 50px; margin-right: 100px;}
        .sendi{margin-top: 20px;}
    </style>
</head>
<body >
  <?php 
                    if(isset($_GET['id'])){
                        $ID = $_GET['id'];
                    }else{
                        $ID = "";
                    }
                    
                    // create array variable to store data from database
                    $data = array();
                    
                    // get all data from menu table and category table
                    $sql_query = "SELECT approved_bpermitid, dateissued, fullname, contactno, businessname, businessaddress, plateno, email_add, app_date, approvedby, businessid_image, status
                            FROM approved_bpermits
                            WHERE approved_bpermitid = ?";
                    
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                        // Bind your variables to replace the ?s
                        $stmt->bind_param('s', $ID);
                        // Execute query
                        $stmt->execute();
                        // store result 
                        $stmt->store_result();
                        $stmt->bind_result($data['approved_bpermitid'], 
                            $data['dateissued'],
                            $data['fullname'],
                            $data['contactno'],
                            $data['businessname'],
                            $data['businessaddress'],
                            $data['plateno'],
                            $data['email_add'],
                            $data['app_date'],
                            $data['approvedby'],
                            $data['businessid_image'],
                            $data['status']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }
                    
                    if(isset($_POST['btnEdit'])){
                    
                        $status	= $_POST['status'];
                        $approved_bpermitid	= $_POST['approved_bpermitid'];

                        $sql = "UPDATE approved_bpermits SET status = 'Done' WHERE approved_bpermitid = $approved_bpermitid";

                        if (mysqli_query($connect, $sql)) {
                          echo "<script>
                                    alert('Mark as Done! Successfully!');
                                    window.location.href='businesspermitapproval.php';
                                </script>";
                        } else {
                          echo "Error updating record: " . mysqli_error($connect);
                        }
                    }
                    
                ?>
    <div id="indigency_file" style="display: auto; ">
    <br>
    <?php
			if(!isset($filename)){
				$filename = "author";
			}
			?>
            <div>
                    <?php
                        if(ISSET($_SESSION['status'])){
                        if($_SESSION['status'] == "ok"){
                    ?>
                   
                        <form action="" method="post">
                            <div class="alert alert-info messcompose"><?php echo $_SESSION['result']?>
                               
                                <input type="hidden" name="approved_bpermitid" id="approved_bpermitid" value="<?php echo $data['approved_bpermitid']; ?>">
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
									<section class="barangay_permit">
                                    <form action="" method="post">
										<div style="padding-top: 15px; width: 965px;  height: 344px;">
											<div style="display: flex;">
												<img style="float: left; width: 130px; height: 125px; margin-left: 35px;" src="../img/QCSeal.png">
													<div style="margin-left: 120px;">
														<p class="center_description" style="font-size: 17px; padding-left: 75px;">REPUBLIKA NG PILIPINAS</p>
														<p class="center_description" style="font-size: 20px; font-weight: 600; padding-left: -25px; color: red;">TANGGAPAN NG PUNONG BARANGAY</p>
														<p class="center_description" style=" font-size: 17px; padding-left: 35px; padding-bottom: 15px; ">BARANGAY COMMONWEALTH</p>
														<p class="center_description" style="font-size: 17px; margin-left: 35px;margin-top: -15px;">DISTRITO II, LUNGSOD QUEZON</p>
													</div>
												<img style=" display: flex; float: right;  margin-left: 135px; " class="commonwealthlogo" src="../img/Brgy-Commonwealth.png">
											</div>
											<div>
										</div>
										<div style="text-align: center; margin-left: -75px;font-size: 25px; margin-top: 25px; color: red;">BARANGAY BUSINESS PERMIT</div>
                                        <div style="margin-top: 100px; margin-left: 50px;"><p style="margin-top: 100px;">TO WHOM IT MAY CONCERN: </p></div>
                                        <div style="float: right;"><img src="../img/approved_bpermit/<?php echo $data['businessid_image']; ?>" style="width: 150px; height: 150px; margin-right: 120px; margin-top: -120px;"></div>
                                        <div style="margin-left: 710px;"><label>PLATE#</label> <input type="text" name="plateno" class="borderstyle" id="plateno" style="width: 50px; border-bottom: 1px solid black;" value="<?php echo $data['plateno']; ?>"> </div>
                                        <div style="margin-top: -5px; margin-left: 120px;">Pursuant to existing ordinance in this barangay, CLEARANCE is granted to,</div>
                                        <div style="margin-top: 5px;"><input type="text" class="borderstyle" style="border-bottom: 1px solid black; width: 75%; margin-left: 120px;padding-left: 50px; padding-left: 320px;" id="fullname" name="fullname" value="<?php echo $data['fullname']; ?>"><p style="text-align: center;"  >(NAME OF THE OWNER)</p></div>
                                        <div style="margin-top: -90px; margin-left: 220px; position: absolute;"><img src="../img/Brgy-Commonwealth150x150.png" style="width: 290%; height: 290%; opacity: 0.2" alt=""></div>
                                        <div style="margin-top: 30px; margin-left: 50px;"><label>And owner/proprietor of </label><input type="text" class="borderstyle" style="border-bottom: 1px solid black; width: 65%; padding-left: 175px;" id="businessname" name="businessname"  value="<?php echo $data['businessname']; ?>"><p style="text-align: center; margin-right: 80px;" >(BUSINESS NAME)</p></div>
                                        <div style="margin-left: 50px;"><label>Located at </label><input type="text" class="borderstyle" style="border-bottom: 1px solid black; width: 77%; padding-left: 30px;" id="businessaddress" name="businessaddress"  value="<?php echo $data['businessaddress']; ?>">,<p>Barangay Commonwealth, District II, Quezon City.</p></div>
                                        <div style="margin-top: 25px; margin-left: 120px;">This Clearance valid up to <input class="borderstyle" style="border-bottom: 1px solid black; width: 30%; text-align: center;" type="text" name="dateissued" id="dateissued" value="<?php echo $data['dateissued']; ?>">unless revoked to a valid cause.</div>
                                        <div style="margin-left: 50px; text-align: justify;"><label for="">CONDITIONS: <label style="margin-left: 60px;  margin-right: 50px;"> Applicant is hereby advised to follow strictly the existing ordinances in relation <br> <label style="margin-left: 163px;">  with  the conduct of his/her business. Violation of the same ground for the  revo<br><label style="margin-left:163px; "> cation of this clearance.</label></label></label></label></div>
                                        <div style="margin-top: 25px; margin-left: 120px;">Issued this <input class="borderstyle" style="text-align: center; border-bottom: 1px solid black; width: 45%;" type="text" name="dateissued" id="dateissued" value="<?php echo $data['dateissued']; ?>">, Quezon City, Metro Manila, <br> <label style="margin-left: -68px;"></label> Philippines.</div>
                                        <div style="margin-left: 50px; text-align: justify; margin-top: 50px;"><label for="">Verified By:</label> <input type="text" name="" id="" class="borderstyle" value="<?php echo $user; ?>" style="border-bottom: 1px solid black; width: 17%;"></div>
                                        <div style="margin-left: 50px; text-align: justify;"><label for="">File No.:</label> <input type="text" name="approved_bpermitid" id="approved_bpermitid" class="borderstyle" style="border-bottom: 1px solid black; width: 18%; padding-left: 60px;" value="<?php echo $data['approved_bpermitid']; ?>"></div>
                                        <div style="margin-left: 50px; text-align: justify;"><label for="">O.R. No.:</label> <input type="text" name="" id="" class="borderstyle" style="border-bottom: 1px solid black; width: 18%;"></div>
                                        <div style="margin-left: 50px; text-align: justify;"><label for="">Date Issued:</label> <input type="text" name="" id="" class="borderstyle" style="border-bottom: 1px solid black; width: 14%;padding-left: 20px;" value="<?php echo $data['dateissued']; ?>"> <label style="float: right;  margin-right: 280px; font-size: 16px;"><strong> MANUEL A. CO</strong></label></div>
                                        <div style="margin-left: 50px; text-align: justify;"><label for="">Place Issued:  <input type="text" name="" id="" class="borderstyle" style="border-bottom: 1px solid black; width: 13%;"><label  style="float: right; margin-right: 280px; font-size: 13px; "> Punong Barangay</label></label></div>
                                        <div style="margin-top: 20px; margin-left: 55px;">
                                                        <?php echo '<img style=" margin-top: 30px; position: absolute; width: 110px; height: 110px;" src="../img/'. @$filename.'.png" ><br>'; ?>
                                                        <span style="margin-left: -20px;"><?php echo $message;?></span>
                                        </div>
                                        <div style="font-size: 13px; margin-top: 100px;"><p>NOT VALID WITHOUT QR CODE </p><p> CONTACT PERSON: <strong> MARIE LEAN CRUZ</strong></p>
                                        <p style="margin-left: 125px;"><em> Secretary of Punong Barangay</em></p><p style="margin-left: 125px;"><strong>Tel. No. 2839695, (02) 5871963</strong> </p></div>
                                        <div style="float: right; margin-right: 100px; margin-top: -60px;">
                                        <p style="font-size: 14px; text-align: right;">www.brgycommonwealth.com.ph</p>
                                        <p style="font-size: 14px; text-align: right;"> @maningningnacommonwealth</p>
                                        <p style="font-size: 14px; text-align: right;"> @BrgyCommonwealth</p>
                                        <p style="font-size: 14px; text-align: right;"> maningning.commonwealth@gmail.com</p>
                                        </div>
                                        <div style=" position: absolute; margin-top: -220px; margin-left: 660px;"><img src="../img/starlogo.png" alt=""></div>

                                        
                                        <input type="hidden" name="link" id="link" value="http://localhost:4000/Updated-Barangay-System">
                                        
                                        <div class="instruc" id="instruc" style="margin-top: 30px; padding: 40px 40px; margin-left: 50px;">
                                        <hr style="height: 10px; margin-left: -110px; margin-bottom: 50px;">
                                                <h4>
                                                    Instruction: For Barangay Employees
                                                </h4>
                                                <ul>
                                                <li>
                                                    <p style="font-size: 14px;"> Please generate and authenticate QR Code. </p>
                                                </li>
                                                <li>
                                                    <p style="font-size: 14px;"> Kindly save or download QR Code. <em> This will serve as a proof of record in Barangay Commonwealth.</em> </p>
                                                </li>
                                            </ul>
                                            
                                        </div>

                                            <div class="generatebtn" style="margin-top: 50px; width: 90%;">
                                            <hr>
                                                <button type="submit" style="margin-top: 10px; cursor: pointer;  font-size: 15px;" class="form-control generate viewbtn" name="generate">Generate QR Code</button>
                                                <br>
                                                <div style="display: flex; justify; align-items: center; justify-content: center; text-align:center; margin-top: 5px; font-size: 15px;">
                                                <a style="text-decoration: none; margin-bottom: 5px;" class="form-control generate viewbtn" href="downloadqr.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
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
                                                <input required class="form-control inputtext" id="email" name="email" type="text"  value="<?php echo $data['email_add']; ?>">
                                            </div>

                                            <div class="information col">
                                                <p>Subject:  </p>
                                                <input required class="form-control inputtext" id="subject" name="subject" type="text" value="Photocopy of your Request (Business Permit)"> 
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
                                                <button name="sendemail" class="form-control viewbtn" style="width: 96%; cursor: pointer;"><span class="glyphicon glyphicon-envelope"></span> Send <i class="bx bx-send"></i></button>
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
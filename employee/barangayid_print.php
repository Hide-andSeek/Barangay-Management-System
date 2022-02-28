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

	$tempDir = '../img/qrcode_barangayid'; 
    $link = $_POST['link'];
    $id = $_POST['app_brgyid'];
	$fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
	$filename = ($fname);
	$codeContents = ''.$link.'/'.urlencode($fname).''.urlencode($mname).'/'.urlencode($lname).'/'.urlencode($id); 
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

    <link rel="stylesheet" href="../css/documentprint.css">
    <link rel="stylesheet" href="../css/print.css">
    <!-- <link rel="stylesheet" type="text/css" href="../qr_code/css/bootstrap.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Styles-->
	<link rel="icon" type="/image/png" href="../img/Brgy-Commonwealth.png">
    <title>Printed: Barangay ID</title>

    <style>
      /*Barangay ID - Stylesheet*/
		 .barangayid_print{ padding-left: 5px; }
		 .background_id{background: #C8CB58}
		 .text_align{display: flex; align-items: center;  justify-content: center;}
		 p.text_align{padding-bottom: 2px;}
		 p.personal_information{font-size: 11px;padding-left: 35px; font-weight: 600;}
		 .borderstyle{border: none; font-size: 15px;}
		 .id_dashed{border: 3px dashed gray; padding: 10px 10px 10px 10px; width: 990px;}
         .container{position: relative;}


         .inp{border: none; }
		.borderb{border-bottom: 1px solid black}
		.offic{font-size:13px;}
        .borderstyle{border: none; font-size: 15px;}  
        .barangay_permit{display: flex; justify; align-items: center; justify-content: center; margin-left: 15px; margin-top: -35px;}
        .viewbtn{ height: 35px;  background-color: white; color: black; border: 1px solid #008CBA; width: 100%;}
        .viewbtn:hover{ background-color: #008CBA;color: white;}
        .done{width: 30%; font-size: 11px;}
        .inputtext, .inputpass {
			font-family: 'Montserrat', sans-serif;
			font-size: 13px;
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
		.usersel{pointer-events: none; border: 1px solid orange}

		.textarea{padding-left: 40px; padding-right: 40px; padding-top: 10px; margin-bottom: 15px;}
        .body{ margin: 20px 170px; }
        .sendi{margin-top: 20px;}
         .draft1{position: absolute; z-index: 9999; margin-top: -20%; margin-left: 5%;}
         img.draft{width: 70%; height: 70%; opacity: 0.7; }
        .instruc{display: flex; justify-content: center; align-items: center;}
        label{font-size: 14px;}
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
                    
                    if(isset($_POST['btnEdit'])){
                    
                        $status	= $_POST['status'];
                        $app_brgyid	= $_POST['app_brgyid'];

                        $sql = "UPDATE approved_brgyids SET status = 'Done' WHERE app_brgyid = $app_brgyid";

                        if (mysqli_query($connect, $sql)) {
                          echo "<script>
                                    alert('Mark as Done! Successfully!');
                                    window.location.href='barangayidapproval.php';
                                </script>";
                        } else {
                          echo "Error updating record: " . mysqli_error($connect);
                        }
                    }
                ?>
<div class="barangayid_print">
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
                            <div class="alert alert-info messcompose"><?php echo $_SESSION['result']?>
                               
                                <input type="hidden" name="app_brgyid" id="app_brgyid" value="<?php echo $data['app_brgyid']; ?>">
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
                <div class="id_dashed"  style="margin-left: 13%;">
									<section >
                                      
                                    <form action="" class="brgyform" method="post">
										<div class="background_id" style="padding-top: 15px; width: 965px;  height: 344px;">
											<div style="display: flex;">
												<img style="float: left; width: 80px; height: 70px; margin-left: 15px;" src="../img/QCSealnew.png">
													<div>
														<p class="center_description" style="font-size: 15px; padding-left: 75px;">Republika ng Pilipinas</p>
														<p class="center_description" style="color: #1700cd; padding-left: 35px; font-weight: 500;">BARANGAY COMMONWEALTH</p>
														<p class="center_description" style="font-size: 13px; padding-left: 55px">Lungsod Quezon, Metro Manila</p>
														<p class="center_description" >Tel. No.: 427-9210/ TeleFax No.: 951-7912</p>
													</div>
												<img style=" display: flex; float: right; width: 80px; height: 80px;" class="commonwealthlogo" src="../img/Brgy-Commonwealth.png">
												
												<div style=" padding-left: 45px; padding-right: 45px;">
													<div style="position: absolute; padding-left: 5px; border: 2px solid; width: 430px; height: 100px; font-size: 15px;">
														In case of emergency pls. notify:  <input type="text" name="guardianname" id="guardianname" class="form-control borderstyle" style="position: absolute; width: 325px; height: 24px; margin-left: -185px; margin-top: 23px; background:#C8CB58;" value="<?php echo $data['guardianname']; ?>"><br>
														Name:  <input type="text" name="reladdress" id="reladdress" class="form-control borderstyle" style="margin-top: 23px;position: absolute; width: 325px; height: 24px; margin-left: 25px; background:#C8CB58;" value="<?php echo $data['reladdress']; ?>"><br>
														Address: <input type="text" name="emrgncycontact" id="emrgncycontact" class="form-control borderstyle" style="margin-top: 23px; position: absolute; width: 325px; height: 24px; margin-left: -5px; background:#C8CB58;" value="<?php echo $data['emrgncycontact']; ?>"><br>
														Tel no.:
														
														<div style="position: absolute; padding-left: 5px; border: 2px solid; width: 100px; height: 100px; font-size: 15px; margin-top: -90px; margin-left: 323px; background: #ffffff; font-size: 10px; padding-top: 60px; text-align: center;">
                                                        <div style="margin-top: -60px; margin-left: -6px;">
                                                        <?php echo '<img src="../img/'. @$filename.'.png" style="width:98px; height:98px;"><br>'; ?>
                                                        <?php echo $message;?>
                                                         </div>
														<!-- Bearer's Right Thumb Mark -->
														</div>
													</div>
												</div>
													
											</div>
											<div>
											<hr style="border: 1px solid #000000; border-radius: 5px; margin: 0; width: 520px;"> 
										</div>
											<div style="display: flex;">
												<div style="background: white; width: 115px; height: 115px; margin-top: 8px; margin-left: 8px;">
                                                    <img src="../img/approved_barangayid/<?php echo $data['id_image']; ?>" style="width: 115px; height: 115px;" alt="">
													<p style="color: #1700cd;">ID NO.: 
                                                    <input type="text" name="app_brgyid" id="app_brgyid" class="form-control borderstyle" style="width: 80px; height: 24px; background:#C8CB58;" value="BD-<?php echo $data['app_brgyid']; ?>"></p>
													<div style="background: #f9232c; width: 300px; color: white; font-weight: bold; padding: 5px 5px; letter-spacing: 2px; font-stretch: expanded;" >
													BARANGAY RESIDENT ID CARD
													</div>
                                                    
												</div>
												
												<div style="display: flex; padding-top: 10px; font-size: 13px;"> <div class="draft1"> 
                                                            <img src="../resident-img/draft.png" class="draft"/>
                                                        </div>
													<div style="line-height: 0.9;">
														<p class="personal_information" style="color: #1700cd;">LAST NAME</p>
														<input type="text" name="lname" id="lname" class="form-control borderstyle" style="width: 100px; height: 24px; margin-left: 45px; background:#C8CB58; font-size: 16px;" value="<?php echo $data['lname']; ?>">
														<p class="personal_information" style="padding-top: 9px; color: #1700cd;">ADDRESS</p>
														<input type="text" name="address" id="address" class="form-control borderstyle" style="position: absolute; width: 325px; height: 24px; margin-left: 45px; background:#C8CB58; font-size: 16px;" value="<?php echo $data['address']; ?>">
														<p class="personal_information" style="color: #1700cd; padding-top: 35px; line-height: none;">DATE OF BIRTH</p>
														<input type="text" name="birthday" id="birthday" class="form-control borderstyle" style="width: 100px; height: 24px; margin-left: 31px; background:#C8CB58;font-size: 16px;"  value="<?php echo $data['birthday']; ?>">
													</div>
                                                    
													<div style="line-height: 0.9;">
														<p class="personal_information" style="color: #1700cd;">FIRST NAME</p>
														<input type="text" name="fname" id="fname" class="form-control borderstyle" style="width: 90px; height: 24px; margin-left: 45px; background:#C8CB58; font-size: 16px;" value="<?php echo $data['fname']; ?>">
														<p class="personal_information" style="padding-left: 25px; color: #1700cd;  padding-top: 54px;">PLACE OF BIRTH</p>
														<input type="text" name="placeofbirth" id="placeofbirth" class="form-control borderstyle" style="width: 90px; height: 24px; margin-left: 25px; background:#C8CB58; font-size: 16px;" value="<?php echo $data['placeofbirth']; ?>">

													</div>
													
													<div style="line-height: 0.9;">
														<p class="personal_information" style="color: #1700cd;">MIDDLE INITIAL</p>
														<input type="text" name="mname" id="mname" class="form-control borderstyle" style="width: 85px; height: 24px; margin-left: 35px; background:#C8CB58; font-size: 16px;" value="<?php echo $data['mname']; ?>">
														<div style="position: absolute; width: 450px; height: 100px; line-height: 1.5; margin-left: 180px; text-align: center; padding-right: 150px; margin-top:-25px; ">
														This certifies that the person whose name, signature and picture on the reverse side of this card is a registered voter and bonafide resident of BARANGAY COMMONWEALTH
														</div>
                                                       
                                       
														<div style="position: absolute;  width: 450px; height: 100px; line-height: 1.5; margin-left: 180px; text-align: center; padding-right: 150px; margin-top:55px;">
														This ID is issued granting the Bearer for what legal purposes it may serve.
														</div>
                                                       

														<p class="personal_information" style="color: #1700cd; padding-top: 54px;">PRECINT NO.</p>
                                                        <span style="margin-top: 150px;">
														    <input type="text" name="precintno" id="precintno" value="<?php echo $data['precintno']; ?>" class="form-control borderstyle" style="width: 90px; height: 24px; margin-left: 25px; background:#C8CB58;">
                                                        </span>
														<span style="margin-right: 15px;">
															<input class="borderstyle" style="margin-top: 55px; margin-left: -180px; line-height: 1.5; border-bottom: 1px solid black;background:#C8CB58;" >
															<p style="position: absolute; font-size: 12px; margin-top: 5px;font-weight: 600;  margin-left: -35px;color: #1700cd;">BEARER'S SIGNATURE</p>
														</span>
														
														<div style="margin-left: 150px; font-size: 12px; margin-top: -45px; color: #1700cd; font-weight: 600;">
															DATE ISSUED: 
														</div>
                                                        <input type="text" name="dateissue" id="dateissue" class="form-control" style="margin-left: 155px; width: 95px; height: 24px; margin-top: 5px; background:#C8CB58; font-size: 15px; border: none; border-bottom: 1px solid black;" value="<?php echo $data['dateissue']; ?>">
                                                        
														<div style="margin-left: 270px; font-size: 12px; margin-top: -33px; color: #1700cd; font-weight: 600;">
															EXPIRED AT YEAR END:
														</div>
                                                        <input type="text" name="dateissued" id="dateissued" class="form-control" style="margin-left: 290px; width: 95px; height: 24px; margin-top: 5px; background:#C8CB58; font-size: 15px; border: none; border-bottom: 1px solid black;" value="<?php echo $data['dateissue']; ?>">
														<div style="margin-left: 430px; font-size: 12px; margin-top: 5px; text-align: center;">
															<p style="font-size: 18px; font-weight: 600;"> MANUEL A. CO</p>
															<p  style=" font-weight: 600;">Barangay Chairman</p>
														</div>
													</div>
												</div>
											</div>
                                            <input type="hidden" name="link" id="link" value="http://localhost:4000/Updated-Barangay-System">
                                            <div class="generatebtn" style="margin-top: 50px;">

                                                <button type="submit" style="margin-top: 10px; cursor: pointer;  font-size: 14px;" class="form-control generate viewbtn" name="generate">Generate QR Code</button>
                                                <br>
                                                <div style="display: flex; justify; align-items: center; justify-content: center; text-align:center; margin-top: 5px; font-size: 14px;">
                                                <a style="text-decoration: none; margin-bottom: 5px;" class="form-control generate viewbtn" href="downloadqr.php?barangayidfile=<?php echo $filename; ?>.png ">Download QR Code</a>
                                                </div>
                                            </div>
                                            </form>
									</section>
                                    
							</div>
                </div>


                <div class="instruc" style="margin-top: 150px; margin-left: 50px; ">
                        
                        <ul>
                        <h4>
                            Instruction: For Barangay Employees
                        </h4>
                        <li>
                            <p style="font-size: 14px;"> Please generate and authenticate QR Code. </p>
                        </li>
                        <li>
                            <p style="font-size: 14px;"> Kindly save or download QR Code. <em> This will serve as a proof of record in Barangay Commonwealth.</em> </p>
                        </li>
                        <li>
                            <p style="font-size: 14px;">Not valid without QR Code</p>
                            <p style="font-size: 14px;">Contact Person. <strong> Ms. Elionore Cajucom</strong></p>
                        </li>
                        <li>
                            <p style="font-size: 14px;">www.brgycommonwealth.com.ph</p>
                            <p style="font-size: 14px;"> @maningningnacommonwealth</p>
							<p style="font-size: 14px;"> @BrgyCommonwealth</p>
							<p style="font-size: 14px;"> maningning.commonwealth@gmail.com</p>
                        </li>
                    </ul>
                    
                </div>
                <div class="instruc1">
                    <form method="POST" action="" class="body" enctype="multipart/form-data">
                                        <div class="main-content-email">
                                            <div  style="text-align: center; font-weight: 600">
                                                <label>Send Attachment (Gmail)</label>
                                            </div>
                                            <div class="information col">
                                                <label> Fullname: </label>
                                                <input class="form-control inputtext usersel" id="fullname" name="fullname" type="text"  value="<?php echo $data['fname']; ?> <?php echo $data['mname']; ?> <?php echo $data['lname']; ?>">
                                            </div>

                                            <div class="information col">
                                                <label> To: </label>
                                                <input required class="form-control inputtext" id="email" name="email" type="text"  value="<?php echo $data['emailadd']; ?>">
                                            </div>

                                            <div class="information col">
                                                <label>Subject:  </label>
                                                <input required class="form-control inputtext" id="subject" name="subject" type="text" value="Photocopy of your Request (Barangay ID)"> 
                                            </div>
                                        

                                            <div class="information col">
                                                <label>Attachment: </label>
                                                <input required class="form-control inputtext" style="background: white; height: 50px;" id="fileattach" name="fileattach" type="file" value=""> 
                                            </div>

                                            <div class="information col">
                                                <label>Body: </label>
                                                <textarea name="message" id="message" class="form-control inputtext" rows="32">Good Day Ms/Mr. <?php echo $data['fname']; ?>  <?php echo $data['mname']; ?>  <?php echo $data['lname']; ?>, here is the pdf file of your Document Request <strong> (Barangay ID)</strong>
                                                <br>
                                                <br>
                                                Reminder: This is confidential document and intended for the specified recipient in message only. It is strictly forbidden to share, without a consent from the owner.
                                                <br>
                                                <br>
                                                Paalala: Ito ay kumpidensyal na dokumento at inilalaaan lamang sa tatanggap ng mensahe. Mahigpit na ipinagbabawal ang pagbabahagi, nang walang pahintulot mula sa may-ari.
                                                <br>
                                                <br>
                                                Best Regards,
                                                <br>
                                                Barangay Commonwealth
                                                <br>
                                                <br>
                                                For more details visit our: 

                                                <br>
                                                <br> 
                                                Website: http://comm-bms.com/index.php 
                                                <br>
                                                FB Fan Page: @maningningnacommonwealth 
                                                <br>
                                                Twitter Account: @BrgyCommonwealth
                                                <br>
                                                Contact us: http://comm-bms.com/contact.php
                                                </textarea>
                                                <script type="text/javascript" src="../announcement_css/js/ckeditor/ckeditor.js"></script>
                                                <script type="text/javascript">                        
                                                    CKEDITOR.replace( 'message' );
                                                </script>
                                            </div>

                                            <div class="sendi">
                                                <button name="barangayidsendemail" class="form-control viewbtn" style="width: 100%; cursor: pointer;"><span class="glyphicon glyphicon-envelope"></span> Send <i class="bx bx-send"></i></button>
                                            </div>
                                        </div>
                                    </form>
                        <div>
									</section>
                                

</body>
</html>
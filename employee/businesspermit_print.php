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
    <title>Printed: Business Permit</title>

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
														<p class="center_description" style="font-size: 17px; padding-left: 75px;">REPUBLIKA NG PILIPINAS</p>
														<p class="center_description" style="font-size: 20px; font-weight: 600; padding-left: -25px; color: red;">TANGGAPAN NG PUNONG BARANGAY</p>
														<p class="center_description" style=" font-size: 17px; padding-left: 35px; padding-bottom: 15px; ">BARANGAY COMMONWEALTH</p>
														<p class="center_description" style="font-size: 17px; margin-left: 35px;margin-top: -15px;">DISTRITO II, LUNGSOD QUEZON</p>
													</div>
												<img style=" display: flex; float: right;  margin-left: 135px; " class="commonwealthlogo" src="../img/Brgy-Commonwealth.png">
											</div>
											<div>
										</div>
										<div style="text-align: center; margin-left: -75px;font-size: 25px; margin-top: 25px;">BARANGAY BUSINESS PERMIT</div>
									</section>
<script>
	const year = new Date();
	document.getElementById("#demo").innerHTML = year.getFullYear();
</script>

</body>
</html>
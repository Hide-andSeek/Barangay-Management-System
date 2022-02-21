<?php
session_start();
include "db/conn.php";

//2.1 User Create Account Prepared Statement
if(isset($_POST['paymentbtn'])){
	
    $app_brgyid = $_POST['app_brgyid'];
	$fullname = $_POST['fullname'];
    $contact_no = $_POST['contact_no'];
	$reference_no = $_POST['reference_no'];
	$payment_status = $_POST['payment_status'];
    $payment_method = $_POST['payment_method'];

	$sql_create_acc = "SELECT COUNT(app_brgyid) AS num FROM payment_brgyid WHERE app_brgyid = :app_brgyid";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':app_brgyid', $app_brgyid);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Session Expired!";
        $_SESSION['status_code'] ="warning";
    
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO payment_brgyid (app_brgyid,fullname, contact_no, reference_no, payment_status, payment_method) VALUES (:app_brgyid, :fullname, :contact_no, :reference_no, :payment_status, :payment_method)");

        $stmt->bindParam(':app_brgyid', $app_brgyid);
		$stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':contact_no', $contact_no);
		$stmt->bindParam(':reference_no', $reference_no);
		$stmt->bindParam(':payment_status', $payment_status);
		$stmt->bindParam(':payment_method', $payment_method);

	if($stmt->execute()){
		$_SESSION['status'] ="Submitted Successfully";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="resident-css/bootstrap.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <script src="resident-js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="resident-css/style.css">
    <link rel="stylesheet" href="resident-css/payment.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Icon -->
    <link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

    <title>GCash - Payment</title>

    
    <style>
        img.PaymentMethodImage{width: 90px; height: 90px;}
        .swal {
        font-family: "Poppins" , sans-serif;
        }
    </style>
</head>
<body>
    <script>
        swal("Reminder/ Paalala:","This is one time payment transaction, be sure you put an accurate reference number. Ito ay isang beses lamang na transaksyon sa pagbabayad, siguraduhin na tama ang iyong ilalagay na reference number");
    </script>
    <?php
   if(isset($_GET['id'])){
                        $ID = $_GET['id'];
                    }else{
                        $ID = "";
                    }
                    
                    // create array variable to store data from database
                    $data = array();
                    
                    // get all data from menu table and category table
                    $sql_query = "SELECT app_brgyid, fname, mname, lname, address, birthday, placeofbirth, precintno,contact_no, emailadd, guardianname, emrgncycontact, reladdress, dateissue, id_image, brgyidfilechoice,status FROM approved_brgyids WHERE status = 'Approved' AND app_brgyid = ?";
                    
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
                                $data['status'],
                                $data['brgyidfilechoice'],
                                $data['id_image']
                                );
                        $stmt->fetch();
                        $stmt->close();
                    }
    ?>
   
    <main class="main">
    <!-- <img src="resident-img/login-page-img.png"/> -->
        <div class="main-content">
       
     
            <div style="padding: 20px 20px; background: #04AA6D;" class="fontweight">
                <label class="merchantname">BARANGAY COMMONWEALTH <i style="font-size: 20px;">online payment for </i></label> 
                <label class="merchantname sub_headmerchant" style="color: white; font-size: 35px; margin-left: 45px;"> BARANGAY ID</label> 
                    <div class="composition">
                            <img class="comlogo" src="img/Brgy-Commonwealth.png" alt="Barangay Commonwealth Logo">  
                    </div>
            </div>
     
            <div class="midpos">
                    <!-- <div class="gen" style="margin-right: 10px;">
                        <img class="PaymentMethodImage" alt="gcash" src="resident-img/gcash.jpg">
                    </div> -->
                        <form method="POST" action="">
                            <div class="margin" >
                                <div>
                                    <input type="hidden" id="app_brgyid" value="<?php echo $data ['app_brgyid']; ?>" class="form-control inpmargin usersel" name="app_brgyid">

                                    <label for="refno">Name: </label>
                                    <input type="text" id="fullname" class="form-control inpmargin usersel" name="fullname" placeholder="Your name" value="<?php echo $data ['fname']; ?> <?php echo $data ['mname']; ?> <?php echo $data ['lname']; ?>">
                                    <i aria-details="fullname" class="detailid">The name you registered in Document Request</i>
                                    <br>
                                    <label for="refno">Contact: </label>
                                    <input required type="number" id="contact_no" class="form-control inpmargin" name="contact_no" placeholder="Your name" value="<?php echo $data ['contact_no']; ?>">
                                    <i aria-details="fullname" class="detailid">Enter a number you used for a payment</i>
                                </div>
                                <div class="margin">
                                    <label for="refno">Reference No.</label>
                                    <input required type="text" id="reference_no" class="form-control inpmargin" name="reference_no" placeholder="XXXXXXXXX" onKeyPress="if(this.value.length==9) return false;" >

                                    <input type="hidden" id="payment_status" value="Approval" class="form-control inpmargin usersel" name="payment_status">
                                    <input type="hidden" id="payment_method" value="Gcash" class="form-control inpmargin usersel" name="payment_method">
                                </div>
                                <div class="gen">
                                    <div style="margin-right: 20px;">
                                        <img class="PaymentMethodImage" alt="gcash" src="resident-img/gcash.jpg">
                                    </div>
                                    
                                    <div class="g-recaptcha" data-sitekey="6LdD7I0eAAAAADNiE6z_yE7QQEHlWsa9G3bFVTOy"></div>
                                </div>
                                <button class="button form-control" name="paymentbtn"><span>Submit </span><button>
                                
                                
                            </div>
                            <p style="text-align:center;">
                                <span>Saan ko kukunin ang reference number? Basahin ang tagubilin<a href=""> dito </a></span>
                                <br>
                                <span>Read our terms and condition: <a href="">Privacy </a> and <a href="">Policy</a></span>
                                
                            </p>
                        </form>
                       
                    </div>  
                <div>
            </div>   
        </div>
        <div>
       
        </div>
        
    </main>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/payment.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
    <!-- <script type="text/javascript">
        var onloadCallback = function() {
            alert("grecaptcha is ready!");
        };
    </script> -->
   
        <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
        ?>
        <script>
            swal({
            title: "<?php echo $_SESSION['status']; ?>",
            // text: "You clicked the button!",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Ok Done!",
            });
        </script>
        <?php
        unset($_SESSION['status']);
        }
        ?>
    
</body>
</html>
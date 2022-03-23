<?php
session_start();
include "../db/conn.php";
include "../db/e_payment.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../resident-css/bootstrap.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <script src="../resident-js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../resident-css/style.css">
    <link rel="stylesheet" href="../resident-css/payment.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Icon -->
    <link rel="icon" type="image/png" href="../resident-img/Brgy-Commonwealth.png">

    <title>Paymaya - Payment</title>

    
    <style>
        img.PaymentMethodImage{width: 120px; height: 70px;}
        .swal {
        font-family: "Poppins" , sans-serif;
        }
        @media only screen and (max-width: 980px) {
            .main-content{width: 60%; }
            .form_group input{ width: 100%; }

		}

        @media only screen and (max-width: 730px) {

        .main-content{width: 70%; }
        .form_group input{ width: 100%; }

        }

        @media only screen and (max-width: 700px) {

            .main-content{width: 80%; }
            .form_group input{ width: 100%; }

		}

        @media only screen and (max-width: 550px) {

        .main-content{width: 90%; }
        .form_group input{ width: 100%; }

        }

        @media only screen and (max-width: 450px) {
        .fontweight{left: 0;}
        .main-content{width: 100%; }
        .form_group input, .margin input{ width: 90%; margin-left: 20px;}
        .form_group label, .margin label{margin-left: 20px;}
        .form_group i{margin-left: 70px;}
        .gen{display: block}
        .comlogo{margin-left: 20px; margin-top: -20px;width: 60%; height: 40%;}
        .pay, .but{display: flex; justify-content: center; align-items: center;}
        .button{width: 90%;}
        }

    </style>
</head>
<body>
    <script>
        swal("Reminder:","This is one time payment transaction, be sure you put an accurate reference number");
    </script>
   
    <main class="main">
    <!-- <img src="resident-img/login-page-img.png"/> -->
        <div class="main-content">
       
     <?php
            if(isset($_GET['id'])){
                $ID = $_GET['id'];
                }else{
                $ID = "";
            }
                            
            // create array variable to store data from database
            $data = array();
                            
            // get all data from menu table and category table
            $sql_query = "SELECT approved_bpermitid, dateissued, selection, fullname, contactno, businessname, businessaddress, plateno, email_add, businessid_image, permitfilechoice, approvedby, app_date, status FROM approved_bpermits WHERE status = 'Approved' AND approved_bpermitid = ?";
                            
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
                        $data['selection'],
                        $data['fullname'],
                        $data['contactno'],
                        $data['businessname'],
                        $data['businessaddress'],
                        $data['plateno'],
                        $data['email_add'],
                        $data['businessid_image'],
                        $data['permitfilechoice'],
                        $data['approvedby'],
                        $data['app_date'],
                        $data['status']
                    );
                $stmt->fetch();
                $stmt->close();
            }    
     ?>
            <div style="padding: 20px 20px; background: #04AA6D;" class="fontweight">
                <label class="merchantname">BARANGAY COMMONWEALTH <i style="font-size: 20px;">online payment for </i></label> 
                <label class="merchantname sub_headmerchant" style="color: white; font-size: 35px; margin-left: 45px;"> BUSINESS PERMIT</label> 
                    <div class="composition">
                            <img class="comlogo" src="../img/Brgy-Commonwealth.png" alt="Barangay Commonwealth Logo">  
                    </div>
            </div>
     
            <div class="midpos">
                    <!-- <div class="gen" style="margin-right: 10px;">
                        <img class="PaymentMethodImage" alt="gcash" src="resident-img/gcash.jpg">
                    </div> -->
                        <form method="POST" action="">
                            <div class="margin" >
                                <div class="form_group">
                                    <input type="hidden" id="document_id" value="<?php echo $data ['approved_bpermitid']; ?>" class="form-control inpmargin usersel" name="document_id">

                                    <label for="refno">Name: </label>
                                    <input required type="text" id="fullname" class="form-control inpmargin usersel" name="fullname" placeholder="Your name" value="<?php echo $data ['fullname']; ?> ">
                                    <i aria-details="fullname" class="detailid">The name you registered in Document Request</i>
                                    <br>
                                    <label for="refno">Contact: </label>
                                    <input required type="number" id="contact_no" class="form-control inpmargin" name="contact_no" placeholder="Your number" onKeyPress="if(this.value.length==11) return false;"  value="<?php echo $data ['contactno']; ?>">
                                    <i aria-details="contact_no" class="detailid">Enter a number you used for a payment</i>
                                </div>
                                <div class="margin">
                                    <label for="refno">Reference ID:</label>
                                    <input required type="text" id="reference_no" class="form-control inpmargin" name="reference_no" placeholder="XXXXXXXXXXXX" onKeyPress="if(this.value.length==12) return false;" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">

                                    <input type="hidden" id="document_type" value="Business Permit" class="form-control inpmargin usersel" name="document_type" readonly>

                                    <input type="hidden" id="payment_status " value="Approval" class="form-control inpmargin usersel" name="payment_status" readonly>

                                    <input type="hidden" id="payment_method" value="Paymaya" class="form-control inpmargin usersel" name="payment_method" readonly>

                                    <input type="hidden" id="amount" value="10" class="form-control inpmargin " name="amount" readonly>
                                </div>
                                <div class="gen">
                                    <div class="pay" style="margin-right: 20px;">
                                        <img class="PaymentMethodImage" alt="paymaya" src="../resident-img/paymaya.jpeg">
                                    </div>
                                    
                                    <div class="g-recaptcha" data-sitekey="6LdD7I0eAAAAADNiE6z_yE7QQEHlWsa9G3bFVTOy"></div>
                                </div>
                                <div class="but">
                                <button class="button form-control" name="payamayabpermitbtn"><span>Submit </span><button>
                                </div>
                                
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
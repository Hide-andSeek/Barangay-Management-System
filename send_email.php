<?php
/* 
----------------------------------------------------------------
			TABLE OF CONTENTS: PREPARED STATEMENT
----------------------------------------------------------------
Compose Email

1.0 Contact Us 
----------------------------------------------------------------
*/

// 1.0 Contact Us Page

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';


if(isset($_POST['send'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $attachfile = $_FILES['fileattach']['tmp_name'];

	if (isset($_FILES['fileattach']['name']) && $_FILES['fileattach']['name'] != "") {
		$file = "img/" . basename($_FILES['fileattach']['name']);
		move_uploaded_file($_FILES['fileattach']['tmp_name'], $file);
	} else
		$file = "";
   
    //Load composer's autoloader

    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'barangaycommonwealth0@gmail.com';     
        $mail->Password = 'gepalitanmopayungpasswordbuddy';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('barangaycommonwealth0@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('barangaycommonwealth0@gmail.com');
        
        $mail->addAttachment ($file, 'Barangay Clearance');
   
        //Content
        $mail->isHTML(true);        

        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
		
       $_SESSION['result'] = 'Message has been sent';
	   $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }
	
	header("location: contactmodule.php");
	unlink($file);

}

if(isset($_POST['sendemail'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $attachfile = $_FILES['fileattach']['tmp_name'];

	if (isset($_FILES['fileattach']['name']) && $_FILES['fileattach']['name'] != "") {
		$file = "../img/" . basename($_FILES['fileattach']['name']);
		move_uploaded_file($_FILES['fileattach']['tmp_name'], $file);
	} else
		$file = "";
   
    //Load composer's autoloader

    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'barangaycommonwealth0@gmail.com';     
        $mail->Password = 'gepalitanmopayungpasswordbuddy';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('barangaycommonwealth0@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('barangaycommonwealth0@gmail.com');
        
        $mail->addAttachment ($file, 'Softcopy: Business Permit');
   
        //Content
        $mail->isHTML(true);        

        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
		
       $_SESSION['result'] = 'File has been sent to ';
	   $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }
	
	unlink($file);

}

if(isset($_POST['clearancesendemail'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $attachfile = $_FILES['fileattach']['tmp_name'];

	if (isset($_FILES['fileattach']['name']) && $_FILES['fileattach']['name'] != "") {
		$file = "../img/" . basename($_FILES['fileattach']['name']);
		move_uploaded_file($_FILES['fileattach']['tmp_name'], $file);
	} else
		$file = "";
   
    //Load composer's autoloader

    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'barangaycommonwealth0@gmail.com';     
        $mail->Password = 'gepalitanmopayungpasswordbuddy';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('barangaycommonwealth0@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('barangaycommonwealth0@gmail.com');
        
        $mail->addAttachment ($file, 'Softcopy: Barangay Clearance');
   
        //Content
        $mail->isHTML(true);        

        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
		
       $_SESSION['result'] = 'File has been sent to ';
	   $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }
	
	unlink($file);

}

if(isset($_POST['barangayidsendemail'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $attachfile = $_FILES['fileattach']['tmp_name'];

	if (isset($_FILES['fileattach']['name']) && $_FILES['fileattach']['name'] != "") {
		$file = "../img/" . basename($_FILES['fileattach']['name']);
		move_uploaded_file($_FILES['fileattach']['tmp_name'], $file);
	} else
		$file = "";
   
    //Load composer's autoloader

    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'barangaycommonwealth0@gmail.com';     
        $mail->Password = 'gepalitanmopayungpasswordbuddy';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('barangaycommonwealth0@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('barangaycommonwealth0@gmail.com');
        
        $mail->addAttachment ($file, 'Softcopy: Barangay ID');
   
        //Content
        $mail->isHTML(true);        

        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
		
       $_SESSION['result'] = 'File has been sent to ';
	   $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }
	
	unlink($file);

}

if(isset($_POST['indigencysendemail'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $attachfile = $_FILES['fileattach']['tmp_name'];

	if (isset($_FILES['fileattach']['name']) && $_FILES['fileattach']['name'] != "") {
		$file = "../img/" . basename($_FILES['fileattach']['name']);
		move_uploaded_file($_FILES['fileattach']['tmp_name'], $file);
	} else
		$file = "";
   
    //Load composer's autoloader

    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'barangaycommonwealth0@gmail.com';     
        $mail->Password = 'gepalitanmopayungpasswordbuddy';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('barangaycommonwealth0@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('barangaycommonwealth0@gmail.com');
        
        $mail->addAttachment ($file, 'Softcopy: Certificate of Indigency');
   
        //Content
        $mail->isHTML(true);        

        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
		
       $_SESSION['result'] = 'File has been sent to ';
	   $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }
	
	unlink($file);

}

if(isset($_POST['admincompsendemail'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $attachfile = $_FILES['fileattach']['tmp_name'];

	// if (isset($_FILES['fileattach']['name']) && $_FILES['fileattach']['name'] != "") {
	// 	$file = "../img/" . basename($_FILES['fileattach']['name']);
	// 	move_uploaded_file($_FILES['fileattach']['tmp_name'], $file);
	// } else
	// 	$file = "";
   
    //Load composer's autoloader

    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'barangaycommonwealth0@gmail.com';     
        $mail->Password = 'gepalitanmopayungpasswordbuddy';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('barangaycommonwealth0@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('barangaycommonwealth0@gmail.com');
        
        // $mail->addAttachment ($file, 'From: Admin Complaints Department');
   
        //Content
        $mail->isHTML(true);        

        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
		
       $_SESSION['resultadmincomp'] = 'Message successfully sent' ;
	   $_SESSION['statusadmincomp'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['resultadmincomp'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['statusadmincomp'] = 'error';
    }
	
	// unlink($file);

}

if(isset($_POST['denysendmail'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $attachfile = $_FILES['fileattach']['tmp_name'];

   
    //Load composer's autoloader

    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'barangaycommonwealth0@gmail.com';     
        $mail->Password = 'gepalitanmopayungpasswordbuddy';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('barangaycommonwealth0@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('barangaycommonwealth0@gmail.com');
        
   
        //Content
        $mail->isHTML(true);        

        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
		
       $_SESSION['result'] = 'Message has been sent';
	   $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }

}
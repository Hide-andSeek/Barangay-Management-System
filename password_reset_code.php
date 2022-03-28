<?php
session_start();
include ('db/conn.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token)
{
    $mail->isSMTP();                                     
    $mail->Host = 'smtp.gmail.com';                      
    $mail->SMTPAuth = true;                             
    $mail->Username = 'barangaycommonwealth01@gmail.com';     
    $mail->Password = 'gepalitanmopapasswordbuddy';             
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
    $mail->setFrom('barangaycommonwealth01@gmail.com', $get_name);
    
    //Recipients
    $mail->addAddress($get_email);              
    $mail->addReplyTo('barangaycommonwealth01@gmail.com');
    
    // $mail->addAttachment ($file, 'From');

    //Content
    $mail->isHTML(true);        

    $mail->Subject = "Reset Password Notification";
    $email_template = "
    <h2>Good Day!</h2>
    <h3>You receive this email because we received a password reset request for your account. </h3>
    <br><br>
    <a href='http://localhost/Updated-Barangay-System/email-verification/change_password.php?token=$token&email=$get_email'>Click Here</a>
    ";
    $mail->Body = $email_template;
    $mail->send();
}

if(isset($_POST['password_reset_link']))
{
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM accreg_resident WHERE email ='$email' LIMIT 1";
    $check_email_run = mysqli_query($connect, $check_email);

    if(mysqli_num_rows() > 0)
    {
        $rows = mysqli_fetch_array($check_email_run);
        $get_name = $rows['uname'];
        $get_email = $rows['email'];

        $update_token = "UPDATE accreg_resident SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($connect, $update_token);

        if($update_token_run)
        {
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "We emailed your password reset link";
            header("Location: reset_password.php");
            exit(0);
        }else
        {
            $_SESSION['status'] = "Something went wrong.";
            header("Location: reset_password.php");
            exit(0);
        }
    }
    else{
        $_SESSION['status'] = "No Email Found";
        header("Location: reset_password.php");
        exit();
    }
}
?>
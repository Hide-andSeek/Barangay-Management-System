<?php
session_start();
include "../../db/conn.php";



if(isset($_POST['password_update']))
{
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $new_password = mysqli_real_escape_string($connect, $_POST['npassword']);
    // $confirm_password = mysqli_real_escape_string($connect, $_POST['cpassword']);
    $token = mysqli_real_escape_string($connect, $_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password))
        {
            $check_token = "SELECT verify_token FROM accreg_resident WHERE verify_token = '$token' LIMIT 1";
            $check_token_run = mysqli_query($connect, $check_token);
            
            if(mysqli_num_rows($check_token_run) > 0)
            {
                // if($new_password == $confirm_password)
                // {
                    $update_password = "UPDATE accreg_resident SET password = '$new_password' WHERE verify_token = '$token' LIMIT 1";
                    $update_password_run = mysqli_query($connect, $update_password);

                    if($update_password_run)
                    {
                        $_SESSION['status'] = "New Password Succesfully Changed!";
                        header("Location: index.php");
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['status'] = "Your password did not update. Something went wrong!";
                        header("Location: change_password.php?token=$token&email=$email");
                        exit(0);
                    }
                // }
                // else
                // {
                //     $_SESSION['status'] = "Password and Confirm Password does not match";
                //     header("Location: change_password.php?token=$token&email=$email");
                //     exit(0);
                // }
            }
            else
            {
                $_SESSION['status'] = "Invalid Token";
                header("Location: change_password.php?token=$token&email=$email");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "Required Fields";
            header("Location: change_password.php?token=$token&email=$email");
            exit(0);
        }
    }else{
        $_SESSION['status'] = "No Token Available";
        header("Location: change_password.php");
        exit(0);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <link rel="icon" type="image/png" href="../../resident-img/Brgy-Commonwealth.png">
    <script src="../../resident-js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../../css/preloader.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    <title>Reset Password: Barangay Commonwealth QC.</title>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #viewdetails {
            border-collapse: collapse;
            width: 100%;

        }

        #viewdetails td,
        #viewdetails th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #viewdetails tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #viewdetails tr:hover {
            background-color: #ddd;
        }

        #viewdetails th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #D9DDDC;
            color: black;
        }

        .btnmargin {
            margin-bottom: 5px;
        }

        #message,
        #message1,
        #message2,
        #message3,
        #message4,
        #message5,
        #message6 {
            display: none;
            color: #000;
            position: relative;
        }

        #message p,
        #message1 p,
        #message2 p,
        #message3 p,
        #message4 p,
        #message5 p,
        #message6 p {
            padding: 15px 45px;
            font-size: 13px;
        }


        /* Add a green text color and a checkmark when the requirements are right */
        .valid,
        .validcomplaint,
        .validbcpc,
        .validvawc,
        .validlupon,
        .validaccounting,
        .validbpso, .confirmvalid{
            color: green;
        }

        .valid:before,
        .validcomplaint:before,
        .validbcpc:before,
        .validvawc:before,
        .validlupon:before,
        .validaccounting:before,
        .validbpso:before, .confirmvalid:before{
            position: relative;
            left: -35px;
            content: "✔";
        }



        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid,
        .invalidcomplaint,
        .invalidbcpc,
        .invalidvawc,
        .invalidlupon,
        .invalidaccounting,
        .invalidbpso, .confirminvalid {
            color: red;
        }

        .invalid:before,
        .invalidcomplaint:before,
        .invalidbcpc:before,
        .invalidvawc:before,
        .invalidlupon:before,
        .invalidaccounting:before,
        .invalidbpso:before, .confirminvalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }

    </style>
</head>

<body class="hold-transition login-page">
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <div class="login-box">
        <div>
            <div class="login-box-body">
                <h4 class="login-box-msg">Change Password</h4>
                <div style="text-align: center;">
                    <?php
                    if (isset($_SESSION['status'])) {
                    ?>
                        <div class="alert alert-info messcompose">
                            <h5><?= $_SESSION['status']; ?> <?php if(isset($_GET['email'])) {echo $_GET["email"];}?></h5>
                        </div>
                    <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                </div>
                <form method="post" action="">
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <img src="../../resident-img/Brgy-Commonwealth_1.png" style="width: 122px; height: 120px" alt="">
                    </div>
                    <br>

                    <div class="form-group" style="text-align: left;">
                        <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])) {echo $_GET["token"];}?>">
                        <label for="fname">Email: <i class="red">*</i></label>
                        <input type="email" name="email" value="<?php if(isset($_GET['email'])) {echo $_GET["email"];}?>" class="form-control form-text" placeholder="Enter Email Address" pattern="^.*@gmail\.com$" title="This should be @gmail.com" disabled>
                        <div style="float:right; margin-top: -25px; margin-right: 10px;">
                            <i class="bx bx-message-alt showpass ipass" id="employeetogglePassword" style="font-size: 18px; margin-left:-20px; cursor: pointer;"></i>
                        </div>
                    </div>

                    <div class="form-group" style="text-align: left;">
                        <label for="npassword">New Password:</label>
                        <input type="password" class="form-control form-text" name="npassword" placeholder="Enter New Password" id="txtNewPassword" onChange="checkPasswordMatch();">
                        <div style="float:right; margin-top: -25px; margin-right: 10px;">
                            <i class="bx bx-show showpass ipass" id="togglePassword" style="font-size: 18px; margin-left:-20px; cursor: pointer;"></i>
                        </div>
                    </div>

                    <div class="form-group" style="text-align: left;">
                        <label for="cpassword">Confirm Password: <i class="red">*</i></label>
                        <input type="password" id="txtConfirmPassword" class="form-control form-text"  placeholder="Enter Confirm Password" onChange="checkPasswordMatch();" pattern="(?=.*\d)(?=.*)(?=.*).{8,}" title="Must contain at least 8 character or more">

                        <div id="message">
                            <p id="divCheckPasswordMatch"></p>
                            <p id="length" class="invalid">Minimum <b>8 numbers</b></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <button type="submit" id="btn-submit" class="btn btn-primary btn-block btn-flat" name="password_update"> Update</button>
                        </div>
                    </div>

                </form>

                <br>
            </div>
            <br>
            <br>
        </div>


        <!-- jQuery 3 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Moment JS -->
        <script src="js/moment.js"></script>

        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        ?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['status']; ?>",
                    // text: "You can now print the document",
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    button: "Ok Done!",
                });
            </script>
        <?php
            unset($_SESSION['status']);
        }
        ?>

        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/preloader.js"></script>
        <script>
            function checkPasswordMatch() {
                var password = $("#txtNewPassword").val();
                var confirmPassword = $("#txtConfirmPassword").val();

                if (password != confirmPassword)
                    $("#divCheckPasswordMatch").html(" <div style='color: red;' class='invalid passwordvalid confirminvalid'> <strong>Password</strong> do not match! </div>");
                else
                    $("#divCheckPasswordMatch").html(" <div style='color: green;' class='valid passwordvalid confirmvalid'> <strong>Password</strong> matched </div>");
            }

            $(document).ready(function() {
                $("#txtConfirmPassword").keyup(checkPasswordMatch);
            });
        </script>
        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#txtNewPassword');

            togglePassword.addEventListener('click', function(e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
            });
        </script>
        <script>
            var myInput = document.getElementById("txtConfirmPassword");

            var length = document.getElementById("length");
            // When the user clicks on the password field, show the message box
            myInput.onfocus = function() {
                document.getElementById("message").style.display = "block";
            }
            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function() {
                document.getElementById("message").style.display = "none";
            }

            myInput.onkeyup = function() {
                // Validate length
                if (myInput.value.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }
            }
        </script>
</body>

</html>